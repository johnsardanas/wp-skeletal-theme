<?php 

function files_enqueue(){
    $version = '0.0.1';

    $css_files = array(
        'fonts' => 'https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap',
        'fontawesome' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
        'style' => get_template_directory_uri() . '/style.css',
        'maincss' => get_template_directory_uri() .'/assets/files/css/main.css'
    );

    foreach( $css_files as $label => $url ){
        wp_enqueue_style( $label, $url, array(), $version );
    }

    $js_files = array(
        'mainjs' => get_template_directory_uri() .'/assets/files/js/main.js'
    );
    
    foreach( $js_files as $label => $url ){
        wp_enqueue_script( $label, $url, array(), $version, true );
    }
}

function custom_theme_widgets_init(){
  register_sidebar(array(
    'name'          => 'sidebar',
    'id'            => 'sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));
}

function custom_reading_time(){
  $content = get_post_field( 'post_content', $post->ID );
  $word_count = str_word_count( strip_tags( $content ) );
  $readingtime = ceil($word_count / 200);
  
  if($readingtime == 1) {
    $timer = " minute read";
  }else{
    $timer = " minutes read";
  }
  
  $totalreadingtime = $readingtime . $timer;
  
  return $totalreadingtime;
}

function custom_pagination($pages = '', $range = 3){
     $showitems = $range * 2;  
     global $paged;
     
     if(empty($paged)) $paged = 1;
     
     if($pages == ''){
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         
         if(!$pages){
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."' class='arrow-previous'></a>";

         for ($i=1; $i <= $pages; $i++){
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."' class='arrow-next'></a>";
         echo "</div>\n";
     }
}

function change_comment_title($arg){
    $arg['title_reply'] = __('Ask the Author');
    return $arg;
}

function remove_comment_url($arg){
    $arg['url'] = '';
    return $arg;
}

function move_comment_field($fields){
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  return $fields;
}

register_nav_menus(array('header' => 'Custom Primary Menu',));

add_image_size('post_image', 1200, 625, false);

add_action('wp_enqueue_scripts', 'files_enqueue');
add_action('widgets_init', 'custom_theme_widgets_init');

add_theme_support('title-tag');
add_theme_support('post-thumbnails');

add_filter('comment_form_default_fields', 'remove_comment_url');
add_filter('comment_form_fields', 'move_comment_field');
add_filter('comment_form_defaults', 'change_comment_title');

require_once get_template_directory() . '/class-wp-navwalker.php';