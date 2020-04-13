<?php 

function custom_theme_enqueue() {
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('maincss', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap');
    wp_enqueue_style('fontAwesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

    wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js', '', '', true);
    wp_enqueue_script('mainjs', get_template_directory_uri() . '/assets/js/main.js', '', '', true);
}

add_action('wp_enqueue_scripts', 'custom_theme_enqueue');

function custom_theme_widgets_init() {
  register_sidebar(array(
    'name'          => 'sidebar',
    'id'            => 'sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));
}

add_action('widgets_init', 'custom_theme_widgets_init');

register_nav_menus(array('header' => 'Custom Primary Menu',));

add_theme_support('title-tag');
add_theme_support('post-thumbnails');

add_image_size('post_image', 1200, 625, false);

require_once get_template_directory() . '/class-wp-navwalker.php';