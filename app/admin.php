<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

/**
 * Hide ACF
 */
add_action('admin_menu', function() { 
    // List of users that don't have pages removed 
    $admins = [ 
        'admin',
        'sca', 
        'Corey' 
    ]; 
    
    $current_user = wp_get_current_user(); 
    if (!in_array($current_user->user_login, $admins)) { 
        remove_menu_page('edit.php?post_type=acf-field-group'); 
    } 
}, PHP_INT_MAX);

/**
 * Custom styles from ACF options
 */
add_action('acf/save_post', function() {
    $ss_dir = get_stylesheet_directory();
    //print $ss_dir;
    ob_start();
    require($ss_dir . '/assets/styles/theme-styles.php');
    $css = ob_get_clean();
    file_put_contents($ss_dir . '/assets/styles/common/_theme-styles.scss', $css, LOCK_EX);
}, 20);