<?php
function luke_fair_styles()
{
    // wp_enqueue_style('sweet-alerts','//cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js');
    wp_enqueue_style( 'font-awesome', '//use.fontawesome.com/releases/v5.14.0/css/all.css');
    wp_enqueue_style('google_fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
    wp_enqueue_script('main_scripts', get_theme_file_uri('/js/script.js'), null, '1.0', true);
    // wp_enqueue_style('styles', get_theme_file_uri().'/css/styles.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/styles.css?ver=1.0.1', null, '1.0.0', 'all');
};

add_action('wp_enqueue_scripts', 'luke_fair_styles');

function custom_theme_support()
{
    add_theme_support('post-thumbnails');
}

add_action('init', 'custom_theme_support');

add_action('get_header', 'my_filter_head');

function my_filter_head()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_filter('login_headerurl', 'custom_header_url');

function custom_header_url()
{
    return esc_url(site_url());
}

add_action('login_enqueue_scripts', 'custom_login_css');

function custom_login_css()
{
    wp_enqueue_style('style', get_template_directory_uri() . '/css/styles.css', null, '1.0.0', 'all');
}
add_filter('login_headertext', 'custom_login_title');

function custom_login_title()
{
    return get_bloginfo('name');
}
