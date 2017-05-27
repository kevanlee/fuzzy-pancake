<?php
/**
 * pancake functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pancake
 */

if ( ! function_exists( 'pancake_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pancake_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on pancake, use a find and replace
	 * to change 'pancake' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'pancake', get_template_directory() . '/languages' );
	// Add theme support for logo
	add_theme_support( 'custom-logo' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'pancake' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'pancake_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'pancake_setup' );

add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
	add_image_size( 'mini-thumb', 100, 100, array( 'center', 'center' ) ); // 300 pixels wide (and unlimited height)
	add_image_size( 'card-thumb', 300, 250, array( 'center', 'center' ) ); // 300 pixels wide (and unlimited height)
}

add_action( 'customize_register' , 'my_theme_options' );

function my_theme_options( $wp_customize ) {
	$wp_customize->add_section(
		'pancake_header_options',
		array(
			'title'       => __( 'Pancake Homepage Settings', 'pancake' ),
			'priority'    => 200,
			'capability'  => 'edit_theme_options',
			'description' => __('Here are some theme things to edit if you would like.', 'pancake'),
		)
	);
	$wp_customize->add_section(
		'pancake_misc_options',
		array(
			'title'       => __( 'Pancake Misc Settings', 'pancake' ),
			'priority'    => 300,
			'capability'  => 'edit_theme_options',
			'description' => __('Here are some more things to edit if you would like.', 'pancake'),
		)
	);
	$wp_customize->add_setting( 'hero_heading',
		array(
			'default' => 'Your awesome heading goes here',
			'sanitize_callback' => 'sanitize_hero_heading',
		)
	);
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
		'hero_heading_control',
		array(
			'label'    => __( 'Main heading', 'pancake' ),
			'section'  => 'pancake_header_options',
			'type'     => 'textarea',
			'settings' => 'hero_heading',
			'priority' => 10,
		)
	));
	$wp_customize->add_setting( 'hero_subheading',
		array(
			'default' => 'Your brilliant subheading goes here. Feel free to use HTML if you wish.',
			'sanitize_callback' => 'sanitize_hero_subheading',
		)
	);
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
		'hero_subheading_control',
		array(
			'label'    => __( 'Main sub-heading', 'pancake' ),
			'section'  => 'pancake_header_options',
			'type'     => 'textarea',
			'settings' => 'hero_subheading',
			'priority' => 10,
		)
	));
	$wp_customize->add_setting( 'button_text',
		array(
			'default' => 'Ask me anything',
			'sanitize_callback' => 'sanitize_button_text',
		)
	);
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
		'button_text_control',
		array(
			'label'    => __( 'Button text', 'pancake' ),
			'section'  => 'pancake_header_options',
			'type'     => 'text',
			'settings' => 'button_text',
			'priority' => 12,
		)
	));
	$wp_customize->add_setting( 'button_link',
		array(
			'default' => '/blog',
			'sanitize_callback' => 'sanitize_button_link',
		)
	);
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
		'button_link_control',
		array(
			'label'    => __( 'Button link', 'pancake' ),
			'section'  => 'pancake_header_options',
			'type'     => 'text',
			'settings' => 'button_link',
			'priority' => 13,
		)
	));
	$wp_customize->add_setting( 'login-image',
		array(
			'default' => 'https://espnfivethirtyeight.files.wordpress.com/2017/05/2020pool4x3.jpg',
			'sanitize_callback' => 'sanitize_login-image',
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control(
  $wp_customize,
     'login-image',
     array(
         'label'      => __( 'Upload a custom login image', 'pancake' ),
         'section'    => 'pancake_misc_options',
         'settings'   => 'login-image',
				 'priority' => 14,
           )
       )
   );
	 $wp_customize->add_setting( 'quote_text',
 		array(
 			'default' => 'If you give freely, there will always be more.',
			'sanitize_callback' => 'sanitize_quote_text',
 		)
 	);
 	$wp_customize->add_control( new WP_Customize_Control(
 	$wp_customize,
 		'quote_text',
 		array(
 			'label'    => __( 'Footer quote', 'pancake' ),
 			'section'  => 'pancake_header_options',
 			'type'     => 'text',
 			'settings' => 'quote_text',
 			'priority' => 16,
 		)
 	));
	$wp_customize->add_setting( 'quote_author',
		array(
			'default' => 'Anne Lamott',
			'sanitize_callback' => 'sanitize_quote_author',
		)
	);
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
		'quote_author',
		array(
			'label'    => __( 'The author', 'pancake' ),
			'section'  => 'pancake_header_options',
			'type'     => 'text',
			'settings' => 'quote_author',
			'priority' => 17,
		)
	));
	$wp_customize->add_setting( 'featured_cat',
		array(
			'default' => 'Featured',
			'sanitize_callback' => 'sanitize_featured_cat',
		)
	);
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
		'featured_cat',
		array(
			'label'    => __( 'Featured category name', 'pancake' ),
			'section'  => 'pancake_header_options',
			'type'     => 'text',
			'settings' => 'featured_cat',
			'priority' => 18,
		)
	));
	$wp_customize->add_setting( 'head_code',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_head_code',
		)
	);
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
		'head_code',
		array(
			'label'    => __( 'Custom code and scripts in the head', 'pancake' ),
			'section'  => 'pancake_misc_options',
			'type'     => 'textarea',
			'settings' => 'head_code',
			'priority' => 19,
		)
	));
}


function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri() . '/css/style-login.css" />';
}
add_action('login_head', 'my_custom_login');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pancake_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pancake_content_width', 640 );
}
add_action( 'after_setup_theme', 'pancake_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pancake_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pancake' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in the sidebar.', 'pancake' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
register_sidebar( array(
		'name'          => __( 'Author Box', 'pancake' ),
		'id'            => 'author',
		'description'   => __( 'Add widgets here to appear in the author box underneath each post.', 'pancake' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

add_action( 'widgets_init', 'pancake_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pancake_scripts() {
	wp_enqueue_style( 'pancake-style', get_stylesheet_uri() );

	wp_enqueue_style( 'pancake-custom', get_template_directory_uri() . '/css/custom.css',false,'1.1','all');

	wp_enqueue_script( 'pancake-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'pancake-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'pancake-jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pancake_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
