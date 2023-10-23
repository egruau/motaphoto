<?php 

// Ajout feuilles de styles et scripts //
function enqueue_custom_styles() {
    wp_enqueue_style('motaphoto', get_stylesheet_uri());
	wp_enqueue_style('allstyle', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);
	wp_enqueue_script('script-home', get_template_directory_uri() . '/assets/js/home.js', array('jquery'), '1.0', true);
    wp_enqueue_script('lightbox', get_template_directory_uri() . '/assets/js/lightbox.js', array('jquery'), '1.0', true);
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


// Ajout barre d'administration wordpress//
function custom_toolbar() {
	if (is_admin_bar_showing()) {
	  return;
	}
	add_filter('show_admin_bar', '__return_true');
  }
  add_action('wp_head', 'custom_toolbar');

// Action qui empeche le plugin "Contact Form 7" d'ajouter automatiquement des balises paragraphes supplémentaires. //
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
} 


// Ajout des articles de la page d'accueil
function load_initial_articles() {
    $dateOrderSelected = $_POST['dateOrderSelected'];
    $catgSelected = $_POST['catgSelected'];
    $formatSelected = $_POST['formatSelected'];

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 12,
        'orderby' => 'date',
        'order' => $dateOrderSelected,
    );

    if (!empty($catgSelected)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'categories',
            'field' => 'slug',
            'terms' => $catgSelected,
        );
    }

    if (!empty($formatSelected)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $formatSelected,
        );
    }

    $ajaxposts = new WP_Query($args);

    $response = '';

    if ($ajaxposts->have_posts()) {
        ob_start();
        while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
            $response .= get_template_part('templates-parts/photo_block');
        endwhile;
        $output = ob_get_clean();
    } else {
        $output = '';
    }

    $max_pages = $ajaxposts->max_num_pages;

    $result = [
        'max' => $max_pages,
        'html' => $output,
    ];

    echo json_encode($result);
    exit;
}

add_action('wp_ajax_load_initial_articles', 'load_initial_articles');
add_action('wp_ajax_nopriv_load_initial_articles', 'load_initial_articles');

// Fonction pour charger plus d'articles
function load_more_articles() {
    $paging = $_POST['paged'];
    $dateOrderSelected = $_POST['dateOrderSelected'];
    $catgSelected = $_POST['catgSelected'];
    $formatSelected = $_POST['formatSelected'];

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 12,
        'orderby' => 'date',
        'order' => $dateOrderSelected,
        'paged' => $paging,
    );

    if (!empty($catgSelected)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'categories',
            'field' => 'slug',
            'terms' => $catgSelected,
        );
    }

    if (!empty($formatSelected)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $formatSelected,
        );
    }

    $ajaxposts = new WP_Query($args);

    $response = '';
    $max_pages = $ajaxposts->max_num_pages;

    if ($ajaxposts->have_posts()) {
        ob_start();
        while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
            $response .= get_template_part('templates-parts/photo_block');
        endwhile;
        $output = ob_get_clean();
    } else {
        $output = '';
    }

    $result = [
        'max' => $max_pages,
        'html' => $output,
    ];

    echo json_encode($result);
    exit;
}

add_action('wp_ajax_load_more_articles', 'load_more_articles');
add_action('wp_ajax_nopriv_load_more_articles', 'load_more_articles');