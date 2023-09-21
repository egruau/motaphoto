<?php 

function enqueue_custom_styles() {
    wp_enqueue_style('motaphoto', get_stylesheet_uri());
	wp_enqueue_style('allstyle', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js');
}

add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

// Action qui permet de rajouter un logo personnalisé au site //
add_theme_support( 'custom-logo' ); 
function themename_custom_logo_setup() 
{
	$defaults = array( 
	'height'      => 100, 
	'width'       => 400, 
	'flex-height' => true, 
	'flex-width'  => true, 
	'header-text' => array( 'site-title', 'site-description' ), ); 
	add_theme_support( 'custom-logo', $defaults ); 
} 
add_action( 'after_setup_theme', 'themename_custom_logo_setup' ); 


// Ajout menu depuis le backoffice //
function register_my_menus() {
    register_nav_menus(
    array(
    'header-menu' => __( 'Menu Header' ),
    'footer-menu' => __( 'Menu Footer' ),
    )
    );
}
add_action( 'init', 'register_my_menus' );


?>