<?php
/**
 * fjorge code challenge functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fjorge_code_challenge
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'fjorge_code_challenge_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fjorge_code_challenge_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fjorge code challenge, use a find and replace
		 * to change 'fjorge-code-challenge' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fjorge-code-challenge', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'fjorge-code-challenge' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'fjorge_code_challenge_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'fjorge_code_challenge_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fjorge_code_challenge_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fjorge_code_challenge_content_width', 640 );
}
add_action( 'after_setup_theme', 'fjorge_code_challenge_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fjorge_code_challenge_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'fjorge-code-challenge' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fjorge-code-challenge' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'fjorge_code_challenge_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fjorge_code_challenge_scripts() {
	wp_enqueue_style( 'fjorge-code-challenge-style', get_stylesheet_uri(), array(), _S_VERSION );	
	wp_enqueue_style( 'normalize', get_stylesheet_directory_uri() . '/assets/css/normalize.css', array() );
	wp_enqueue_style( 'fjorge-style', get_stylesheet_directory_uri() . '/assets/css/fjorge-style.css', array() );
	wp_style_add_data( 'fjorge-code-challenge-style', 'rtl', 'replace' );

	wp_enqueue_script( 'fjorge-code-challenge-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'fjorge-code-challenge-menu', get_template_directory_uri() . '/js/menu.js', array() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fjorge_code_challenge_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*
* Create custom post type for benefits
*/
function custom_post_type_benefits() {
 
	// Set UI labels for Custom Post Type
			$labels = array(
					'name'                => 'Benefits',
					'singular_name'       => 'Benefit', 
					'menu_name'           => 'Benefits',
					'all_items'           => 'All Benefits',
					'view_item'           => 'View Benefit',
					'add_new_item'        => 'Add Benefit',
					'add_new'             => 'Add New Benefit',
					'edit_item'           => 'Edit Benefit',
					'update_item'         => 'Update Benefit',
			);
			 
	// Set other options for Custom Post Type
			 
			$args = array(
					'label'               => 'Benefits',
					'description'         => 'Benefits of being a fjorge team member',
					'labels'              => $labels,
					// Features this CPT supports in Post Editor
					'supports'            => array( 'title','thumbnail','custom-fields'),
					// You can associate this CPT with a taxonomy or custom taxonomy. 
					'taxonomies'          => array( 'category' ),
					/* A hierarchical CPT is like Pages and can have
					* Parent and child items. A non-hierarchical CPT
					* is like Posts.
					*/ 
					'hierarchical'        => true,
					'public'              => true,
					'show_ui'             => true,
					'show_in_menu'        => true,
					'show_in_nav_menus'   => true,
					'show_in_admin_bar'   => true,
					'menu_position'       => 100,
					'can_export'          => true,
					'has_archive'         => true,
					'exclude_from_search' => false,
					'publicly_queryable'  => true,
					'capability_type'     => 'post',
					'menu_icon' => 'dashicons-awards',     
			);
			 
			// Registering your Custom Post Type
			register_post_type( 'benefits', $args );
	 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/
 
add_action( 'init', 'custom_post_type_benefits', 0 );



function wpse_custom_menu_order( $menu_ord ) {
    if ( !$menu_ord ) return true;

    return array(
        'index.php', // Dashboard
        'edit.php?post_type=page', // Pages
        'separator1', // First separator
        'edit.php?post_type=benefits', // Benefits
        'upload.php', // Media
        'separator2', // Second separator
        'edit.php', // Posts
        'edit-comments.php', // Comments
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
        'separator-last', // Last separator
    );
}
add_filter( 'custom_menu_order', 'wpse_custom_menu_order', 10, 1 );
add_filter( 'menu_order', 'wpse_custom_menu_order', 10, 1 );


// SHORT CODES

/**
 * Post title shortcode.
 * `[post_title]` to use in the loop. Or `[post_title id="123"]` to get a specific post's title, by ID
 * 
 * @return  string  The post's title.
 */
add_shortcode( 'post_title', function( $atts ) {
    $atts = shortcode_atts( array(
        'id' => get_the_ID(),
    ), $atts, 'post_title' );
    return get_the_title( absint( $atts['id'] ) );
});

// >> Create Shortcode to Display Benefits Post Types
 
function create_shortcode_benefits_post_type(){
 
    $args = array(
                    'post_type'      => 'benefits',
					'orderby' => 'date',
					'order'   => 'ASC',
                    'posts_per_page' => '10',
                    'publish_status' => 'published',
                 );
 
    $query = new WP_Query($args);
 
    if($query->have_posts()) :
 
        while($query->have_posts()) :
 
			$query->the_post() ;
			$iconSmall = get_field('benefit-icon-small');
			$beneText = get_field('benefit-text');
     
			$result .= '<div class="grid-item">';
			$result .= '<img src="' . $iconSmall . '">';
			$result .= '<h5>' . $beneText . '</h5>';
			$result .= '</div>';
 
        endwhile;
 
        wp_reset_postdata();
 
    endif;    
 
    return $result;            
}
 
add_shortcode( 'benefits-list', 'create_shortcode_benefits_post_type' ); 
 
// shortcode code ends here
