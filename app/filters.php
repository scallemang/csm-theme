<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'embed'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    collect(['get_header', 'wp_head'])->each(function ($tag) {
        ob_start();
        do_action($tag);
        $output = ob_get_clean();
        remove_all_actions($tag);
        add_action($tag, function () use ($output) {
            echo $output;
        });
    });
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);

// CSM Customizations
add_filter('acf/fields/flexible_content/layout_title', function( $title, $field, $layout, $i ) {
    // remove layout title from text
    
    // load text sub field
    if( $text = get_sub_field( 'block__title' ) ) {
        $title .= ': <strong>' . $text . '</strong>';
    }
    
    // return
    return $title;
}, 10, 4);

// add_filter('template_include', function ($template) {
//     if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
//         $amp_template = locate_template(['amp/'.basename($template)]);

//         return ($amp_template) ? $amp_template : $template;
//     }

//     return $template;
// }, 100);

add_filter( 'tiny_mce_before_init', function ( $init ) {

    $formats = array(
        'p'          => __( 'Paragraph', 'text-domain' ),
        'h1'         => __( 'Heading 1', 'text-domain' ),
        'h2'         => __( 'Heading 2', 'text-domain' ),
        'h3'         => __( 'Heading 3', 'text-domain' ),
        'h4'         => __( 'Heading 4', 'text-domain' ),
        'h5'         => __( 'Heading 5', 'text-domain' ),
        'h6'         => __( 'Heading 6', 'text-domain' ),
        'pre'        => __( 'Preformatted', 'text-domain' ),
        'p-xxl' => __( 'XXL Paragraph', 'text-domain' ),
        'p-xl' => __( 'XL Paragraph', 'text-domain' ),
        'p-l' => __( 'L Paragraph', 'text-domain' ),
        'p-s' => __( 'S Paragraph', 'text-domain' ),
        'p-xs' => __( 'XS Paragraph', 'text-domain' ),
    );
    
    // concat array elements to string
    array_walk( $formats, function ( $key, $val ) use ( &$block_formats ) {
        $block_formats .= esc_attr( $key ) . '=' . esc_attr( $val ) . ';';
    }, $block_formats = '' );

    $init['block_formats'] = $block_formats;

    return $init;
});

add_filter('tiny_mce_before_init', function( $init ) {
    $hash = '/#\w+\s*/';

    $custom_colours = '
        "' . ltrim(get_field('colour__primary', 'option'), '#') . '", "Primary brand colour",
        "' . ltrim(get_field('colour__secondary', 'option'), '#') . '", "Secondary brand colour",
        "' . ltrim(get_field('colour__info', 'option'), '#') . '", "Brand info colour",
        "' . ltrim(get_field('colour__text', 'option'), '#') . '", "Brand text colour",
        "' . ltrim(get_field('colour__background', 'option'), '#') . '", "Brand background colour"
    ';

    $no_hash_colours =preg_replace($hash, '', $custom_colours);

    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$no_hash_colours.']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 1;

    return $init;
});

//WP PageNavi
add_filter( 'wp_pagenavi', __NAMESPACE__ . '\\gc_pagination', 10, 2 );
function gc_pagination($html) {
    $out = '';
    $out = str_replace('<div','',$html);
    $out = str_replace('class=\'wp-pagenavi\' role=\'navigation\'>','',$out);
    $out = str_replace('<a','<li class="page-item"><a class="page-link"',$out);
    $out = str_replace('</a>','</a></li>',$out);
    $out = str_replace('<span aria-current=\'page\' class=\'current\'','<li aria-current="page" class="page-item active"><span class="page-link current"',$out);
    $out = str_replace('<span class=\'pages\'','<li class="page-item"><span class="page-link pages"',$out);
    $out = str_replace('<span class=\'extend\'','<li class="page-item"><span class="page-link extend"',$out);  
    $out = str_replace('</span>','</span></li>',$out);
    $out = str_replace('</div>','',$out);
    return '<ul class="pagination" role="navigation">'.$out.'</ul>';
}