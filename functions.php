<?php

define("THEME_DIR", get_template_directory_uri());

/*--- REMOVE GENERATOR META TAG ---*/
remove_action('wp_head', 'wp_generator');


add_theme_support( 'menus' ); // Wordpress will not give you the option to add menus to your theme without this
add_theme_support( 'post-thumbnails' ); // Features images for posts

$headerArgs = array(
    'default-image' => THEME_DIR . '/img/amy_galbraith_photography_logo.png',
    'uploads'       => true,
);
add_theme_support( 'custom-header', $headerArgs );


function register_theme_menus() {

	register_nav_menus( // defines menus for the theme, but doesn't define where they go in the theme (need to do that manually)
		array(
			'primary-menu'	=> __( 'Primary Menu' )
		)
	);
}
add_action( 'init', 'register_theme_menus' ); // when wordpress is initializing, add the register theme menus function


function wpt_theme_styles() {

    wp_enqueue_style( 'foundation_css', THEME_DIR . '/css/foundation.css' );
    wp_enqueue_style( 'normalize_css', THEME_DIR . '/css/normalize.css' );
    wp_enqueue_style( 'googlefont_css', 'https://fonts.googleapis.com/css?family=Lusitana|Quicksand:400,700' );
    wp_enqueue_style( 'fontawesome_css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css' );
    wp_enqueue_style( 'style_css', THEME_DIR . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'wpt_theme_styles' );

function wpt_theme_js() {

    //wp_enqueue_script( 'modernizr_js', THEME_DIR . '/js/modernizr.js', '', '', false );
    wp_enqueue_script( 'sticky_js', THEME_DIR . '/js/jquery.sticky.js', array('jquery'), '', true );
    wp_enqueue_script( 'foundation_js', THEME_DIR . '/js/foundation.min.js', array( 'jquery' ), '', true ); // true outputs to the footer
    wp_enqueue_script( 'main_js', THEME_DIR . '/js/app.js', array( 'jquery', 'foundation_js', 'sticky_js' ), '', true );

}
add_action( 'wp_enqueue_scripts', 'wpt_theme_js' );


function wpt_theme_widgets() {
	if ( function_exists('register_sidebar') )
        register_sidebar( 
		array(
			'name'          => 'Home Right Sidebar',
			'id'            => 'home_right_1',
			'before_widget' => '<div class="sidebar-widget widget-container">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);
    if ( function_exists('register_sidebar') )
        register_sidebar( 
        array(
            'name'          => 'Mobile Overlay Menu',
            'id'            => 'mobile_overlay_menu',
            'before_widget' => '<div class="widget-container">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        )
    );  
}
add_action( 'widgets_init', 'wpt_theme_widgets' );

// add the namespace to the RSS opening element
function add_media_namespace() {
  echo "xmlns:media='http://search.yahoo.com/mrss/'n";
}

// add the requisite tag where a thumbnail exists
function add_media_thumbnail() {
  global $post;
  if( has_post_thumbnail( $post->ID )) {
    $thumb_ID = get_post_thumbnail_id( $post->ID );
    $details = wp_get_attachment_image_src($thumb_ID, 'thumbnail');
    if( is_array($details) ) {
      echo '<media:thumbnail url="' . $details[0]
        . '" width="' . $details[1] 
        . '" height="' . $details[2] . '"></media:content>';
    }
  }
}

// add the two functions above into the relevant WP hooks
add_action( 'rss2_ns', 'add_media_namespace' );
add_action( 'rss2_item', 'add_media_thumbnail' );

?>