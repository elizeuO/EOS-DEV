<?php 

//removes wordpress admin bar
add_filter('show_admin_bar', '__return_false');

//Get theme image
function getThemeImage($image)
{
    $path = '/dist/img/' . $image;
    return get_template_directory_uri() . $path;
}

//Register and enqueue the scripts
function registerScripts()
{
    $path = get_template_directory_uri() . '/dist/js/';
    //Removes the default wordpress jquery script
    wp_deregister_script('jquery');

    wp_register_script('jquery', $path . 'jquery.min.js', array(), '3.7.1', true);
    wp_enqueue_script('jquery');

    wp_register_script('typeit', $path . 'typeit.min.js', array(), '8.7.1', true);
    wp_enqueue_script('typeit');

    wp_register_script('eos-dev', $path . 'eos-dev.js', array(), '1.0.0', true);
    wp_enqueue_script('eos-dev');
}

add_action('wp_enqueue_scripts', 'registerScripts');

//Register and enqueue the CSS styles
function registerStyles()
{
    $path = get_template_directory_uri() . '/dist/style/';
    wp_register_style('normalize', $path . 'normalize.min.css', array(), false, false);
    wp_enqueue_style('normalize');

    wp_register_style('eos-dev', $path . 'eos-dev.css', array(), false, false);
    wp_enqueue_style('eos-dev');
}
add_action('wp_enqueue_scripts', 'registerStyles');
