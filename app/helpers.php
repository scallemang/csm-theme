<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

/**
 * Theme helpers
 */
function return_button($group = null, $link = null)
{
    $button = array();
    if( $group ) {
        $button['text'] = $group['button__text'];
        $button['colour'] = $group['button__colour'];
        $button['link'] = return_link($group);
    } else {
        $button['text'] = get_sub_field('button__text');
        $button['colour'] = get_sub_field('button__colour');
        $button['link'] = return_link();
    }
    return $button;
}

function return_icon( $group = null )
{
    $icon = null;
    if( $group ) {
        switch( $group['icon__type'] ) {
            case 'fa':
                print $group['icon__fa'];
                break;
            case 'custom':
                break;
            default:
                break;
        }
    } else {
        switch( get_sub_field('icon__type') ) {
            case 'fa':
                $icon = get_sub_field('icon__fa');
                break;
            case 'custom':
                $image = get_sub_field('icon__custom');
                $icon = '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" class="img-fluid">';
                break;
            default:
                break;
        }
    }
    return $icon;
}

function return_link( $group = null )
{
    $link = array(
        'onclick' => null,
        'target' => null,
        'url' => null,
        'title' => null
    );
    if( $group ) {
        switch( $group['link__type'] ) {
            case 'icegram':
                $link['onclick'] = $group['link__icegram_code'];
                break;
            case 'page':
                $link['url'] = $group['link__page_picker']['url'];
                $link['title'] = $group['link__page_picker']['title'];
                break;
            case 'site':
                $link['url'] = $group['link__site_url'];
                $link['title'] = $group['button__text'];
                $link['target'] = "_blank";
                break;
            case 'email':
                $link['url'] = 'mailto:' . $group['link__email_address'];
                $link['target'] = "_blank";
                break;
            case 'phone':
                $link['url'] = 'tel:' . $group['link__phone_number'];
                $link['target'] = "_blank";
                break;
            default:
                break;
        }
    } else {

    }
    return $link;
}

function return_fiftyfifty_col( $group = null )
{
    $col = array(
        'type' => null,
        'heading' => null,
        'subheading' => null,
        'copy' => null,
        'image' => null
    );
    if( $group ) {
        switch( $group['fiftyfifty__column_type'] ) {
            case 'image':
                $col['image'] = array(
                    'id'  => $group['fiftyfifty__image']['id'],
                    'url' => $group['fiftyfifty__image']['sizes']['large'],
                    'alt' => $group['fiftyfifty__image']['alt']
                );
                break;
            case 'text':
                $col['heading'] = $group['fiftyfifty__heading'];
                $col['subheading'] = $group['fiftyfifty__subheading'];
                $col['copy'] = $group['fiftyfifty__copy'];
                break;
            default:
                break;
        }
    } else {

    }
    return $col;
}

function return_background()
{

}

function return_color()
{

}

function strip_phone( $phone )
{
    return preg_replace('/\D+/', '', $phone);
}

function return_contact_info($checkbox = null)
{
    $info = array(
        'name' => get_field('business__name', 'option'),
        'map' => get_field('business__map', 'option'),
        'form' => get_field('business__form', 'option'),
        'phone' => get_field('business__phone', 'option'),
        'address' => get_field('business__address', 'option'),
        'hours' => get_field('business__hours', 'option'),
    );
    if( $checkbox ) {
        $info['map'] = in_array('map', $checkbox) ? $info['map'] : null;
        $info['form'] = in_array('form', $checkbox) ? $info['form'] : null;
        $info['phone'] = in_array('phone', $checkbox) ? $info['phone'] : null;
        $info['address'] = in_array('address', $checkbox) ? $info['address'] : null;
        $info['hours'] = in_array('hours', $checkbox) ? $info['hours'] : null;
    } else {

    }
    return $info;
}

function return_cta()
{
    $cta = array(
        'heading' => null,
        'subheading' => null,
        'button' => null,
        'background' => null
    );
    $type = get_sub_field('cta__type');
    switch($type) {
        case 'global':
            $id = get_sub_field('cta__picker')[0]->ID;
            // Apparently, get_post_meta is good for speed per https://support.advancedcustomfields.com/forums/topic/whats-faster/
            $ctaMeta = get_post_meta($id);
            $cta['heading'] = get_field('cta__heading', $id);
            $cta['subheading'] = get_field('cta__subheading', $id);
            $hasButton = get_field('cta__has_button', $id);
            if( $hasButton ):
                $cta['button'] = return_button( get_field('cta__button', $id) );
            endif;
            break;
        case 'custom':
            $cta['heading'] = get_sub_field('cta__heading');
            $cta['subheading'] = get_sub_field('cta__subheading');
            $hasButton = get_sub_field('cta__has_button');
            if( $hasButton ):
                $cta['button'] = return_button( get_sub_field('cta__button') );
            endif;
            break;
        default:
            break;
    }
    return $cta;
}