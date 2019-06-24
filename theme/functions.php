<?php
// Register styles and scripts
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

function theme_name_scripts() {
  wp_enqueue_style( 'bootstrapcdn', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );
  wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css' );
  // wp_enqueue_style( 'font-montserrat', 'https://fonts.googleapis.com/css?family=Montserrat' );
  // wp_enqueue_style( 'font-caveat', 'https://fonts.googleapis.com/css?family=Caveat:700' );
  // wp_enqueue_style( 'font-Prosto+One', 'https://fonts.googleapis.com/css?family=Prosto+One' );
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  
  wp_deregister_script( 'jquery' );
  // wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js');
  wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js');
  wp_enqueue_script( 'jquery' );
  
  wp_deregister_script( 'cdnjs' );
	wp_register_script( 'cdnjs', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
  wp_enqueue_script( 'cdnjs' );
  
  wp_deregister_script( 'bootstrapcdn' );
	wp_register_script( 'bootstrapcdn', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
	wp_enqueue_script( 'bootstrapcdn' );
}

//Register nav menu
add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'header_menu' => 'Header menu',
		'footer_menu' => 'Footer menu'
	) );
});

// Default size of thumbnails
if ( function_exists('add_theme_support') ) {
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 240, 240 );
}

// Post type support
if ( function_exists('add_post_type_support') ) {
	add_post_type_support('page', array('custom-fields', 'excerpt', 'thumbnail', 'page-attributes'));
}
;?>