<?php

// Theme Support
function buson_theme_setup(){
    load_theme_textdomain('buson', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails', array('post', 'slider', 'services', 'case', 'team', 'testimonial') );

    /** HTML5 support **/
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    add_theme_support( 'custom-logo' );

    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'buson' ),
    ) );
}
add_action('after_setup_theme', 'buson_theme_setup');


// Theme Assets
function buson_assets(){

    // CSS
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome-all.min.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all' );

    wp_enqueue_style('style-css', get_stylesheet_uri());

    // JS
    wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/js/jquery.sticky.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true );

    
}
add_action('wp_enqueue_scripts', 'buson_assets');




/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function buson_cpt_init() {
   
    // slider
    register_post_type('slider', array(
        'labels' => array(
            'name'                  => __( 'Sliders', 'Post type general name', 'buson' ),
            'singular_name'         => __( 'Slider', 'Post type singular name', 'buson' ), 
            'add_new'               => __( 'Add New', 'buson' ),
            'add_new_item'          => __( 'Add New Slider', 'buson' ),
        ),
        'public'             => true,
        'supports'           => array( 'title', 'thumbnail' ),
    ));

    // services
    register_post_type('services', array(
        'labels'    =>  array(
            'name'              => __('Services', 'buson'),
            'singular_name'     => __('Service', 'buson'),
            'add_new'               => __( 'Add New', 'buson' ),
            'add_new_item'          => __( 'Add New Service', 'buson' ),
        ),
        'public'    => true,
        'supports'  => array( 'title', 'thumbnail', 'editor' )
    ));

    // cases
    register_post_type('case', array(
        'labels'    =>  array(
            'name'              => __('Completed Cases', 'buson'),
            'singular_name'     => __('Completed Case', 'buson'),
            'add_new'               => __( 'Add New', 'buson' ),
            'add_new_item'          => __( 'Add New Case', 'buson' ),
        ),
        'public'    => true,
        'supports'  => array( 'title', 'thumbnail', 'editor', 'excerpt' ),
        'show_in_rest' => true,
    ));

    // team
    register_post_type('team', array(
        'labels'    =>  array(
            'name'              => __('Teams', 'buson'),
            'singular_name'     => __('Team', 'buson'),
            'add_new'           => __( 'Add New', 'buson' ),
            'add_new_item'      => __( 'Add New Team', 'buson' ),
            'featured_image'    => __('Team Member Photo', 'buson'),
        ),
        'public'    => true,
        'supports'  => array( 'title', 'thumbnail' )
    ));

    // team
    register_post_type('testimonial', array(
        'labels'    =>  array(
            'name'              => __('Testimonials', 'buson'),
            'singular_name'     => __('Testimonial', 'buson'),
            'add_new'           => __( 'Add New', 'buson' ),
            'add_new_item'      => __( 'Add New Testimonial', 'buson' ),
        ),
        'public'    => true,
        'supports'  => array( 'editor', 'thumbnail' )
    ));
}
 
add_action( 'init', 'buson_cpt_init' );



if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> __('Theme Options', 'buson'),
		'menu_title'	=> __('Theme Options', 'buson'),
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> __('Theme Header Options', 'buson'),
		'menu_title'	=> __('Header Option', 'buson'),
		'parent_slug'	=> 'theme-general-settings',
	));
    // About
	acf_add_options_sub_page(array(
		'page_title' 	=> __('Theme About Options', 'buson'),
		'menu_title'	=> __('About Option', 'buson'),
		'parent_slug'	=> 'theme-general-settings',
	));
    // Call to action
	acf_add_options_sub_page(array(
		'page_title' 	=> __('Theme Call to Action Options', 'buson'),
		'menu_title'	=> __('Call to Action', 'buson'),
		'parent_slug'	=> 'theme-general-settings',
	));
    // Completed Cases
	acf_add_options_sub_page(array(
		'page_title' 	=> __('Theme Completed Cases Options', 'buson'),
		'menu_title'	=> __('Completed Cases', 'buson'),
		'parent_slug'	=> 'theme-general-settings',
	));
    // Footer
	acf_add_options_sub_page(array(
		'page_title' 	=> __('Theme Footer Options', 'buson'),
		'menu_title'	=> __('Footer', 'buson'),
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

function buson_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer-1', 'buson' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'buson' ),
			'before_widget' => '<div id="%1$s" class="widget footer-tittle %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer-2', 'buson' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'buson' ),
			'before_widget' => '<div id="%1$s" class="widget footer-tittle %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Main Sidebar', 'buson' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Sidebar will appear on Blog / Single Blog.', 'buson' ),
			'before_widget' => '<div id="%1$s" class="widget single_sidebar_widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget_title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'buson_widgets_init' );