<?php
/**
 * Functions and Definitions for basicblog wordpress theme
 * @author AR Rony <ar.rony87@gmail.com>
 * @version 1.0.0
 * @package Basicblog
 * @copyright Basic Blog 2019
 * 
 */

// Exit if Accessed directly
if(! defined('ABSPATH')){
    exit;
}
//Core Constants
define('THEMESHUB_THEME_DIR', get_theme_file_path( ));
define('THEMESHUB_THEME_URI', get_theme_file_uri( ));

// THEMESHUB CLASS
class Themeshub{
    /**
     * Main Theme Class Constructor
     * @since 1.0.0
     */
    public function __construct(){
        // Define Constants
        add_action('after_setup_theme', array('Themeshub', 'themeshub_constants'), 0);

        // Include all Core Theme function files
        add_action('after_setup_theme', array('Themeshub', 'themeshub_includes'), 1);

        // Load Theme Classes
        add_action( 'after_setup_theme', array('Themeshub', 'themeshub_classes'), 2);

        // Add Themes Features and supports
        add_action('after_setup_theme', array('Themeshub', 'themeshub_setup'), 3);

        // Register CSS Files
        add_action('wp_enqueue_scripts', array('Themeshub', 'themeshub_css'), 4 );

        // Register JS Files
        add_action('wp_enqueue_scripts', array('Themeshub', 'themeshub_js'), 5);

        // Register WIdgets and Sidebars
        add_action('widgets_init', array('Themeshub', 'themeshub_widgets'), 6);

        // Add Customizer CSS to Head
        add_action('wp_head', array('Themeshub', 'themeshub_customizer_css'));

    } // End __consturct function

    /**
     * Define Themehub Constants
     * @since 1.0.0
     */
    public static function themeshub_constants(){
        $version = self::theme_version();

		// Theme version
        define( 'THEMESHUB_THEME_VERSION', $version );
        
        // JavaScript and CSS Paths
        define('THEMESHUB_JS_DIR_URI', THEMESHUB_THEME_URI.'/assets/js/');
        define('THEMESHUB_CSS_DIR_URI', THEMESHUB_THEME_URI.'/assets/css/');

        // Themeshub Includes Path
        define('THEMESHUB_INC_DIR', THEMESHUB_THEME_DIR.'/inc/');
        define('THEMESHUB_INC_DIR_URI', THEMESHUB_THEME_URI.'/inc/');
    } // End Themes Constants

    /**
	 * Returns current theme version
	 *
	 * @since   1.0.0
	 */
	public static function theme_version() {

		// Get theme data
		$theme = wp_get_theme();

		// Return theme version
		return $theme->get( 'Version' );
	}


    /**
     * Include all Core Theme function files
     * @since 1.0.0
     */
    public static function themehub_includes(){
        $dir = THEMESHUB_INC_DIR;
        // require_once($dir.'customizer.php');
    }

    /**
     * Load Themeshub Core Classes
     */
    public static function themeshub_classes(){
        $dir = THEMESHUB_INC_DIR;
        require_once($dir.'customizer/customizer.php')
    }

    /**
     * Theme Setup
     * @since 1.0.0
     */
    public static function themeshub_setup(){
        // Load Themes Text Domain
        load_theme_textdomain('themeshub', THEMESHUB_THEME_DIR.'/languages');

        // Set Content Width based on Themes Default Design
        if(! isset($content_width)){
            $content_width = 1170;
        }

        // Registering Menus For Theme Support
        register_nav_menus(array(
            'main_menu'         => __('Main Menu', 'themeshub'),
        ));
        // Post Thumbnail Support
        add_theme_support('post-thumbnails');
        add_image_size( 'product_thumb', 590, 300, false );
        // Enable Support for Post Format
        add_theme_support('post-formats', array('video', 'gallery', 'audio', 'quote'));

        // Enable Support For <title> tag
        add_theme_support('title-tag');

        /**
		 * Enable support for site logo
		 */
		add_theme_support( 'custom-logo',array(
			'height'      => 45,
			'width'       => 164,
			'flex-height' => true,
			'flex-width'  => true,
		));

		/*
		 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'widgets',
        ) );
        
        

    }// End Theme Setup

    /**
     * Call Themes CSS Files
     * @since 1.0.0
     */
    public static function themeshub_css(){
        // Theme Version
        $version = self::theme_version();
        wp_enqueue_style('fontawesome', THEMESHUB_CSS_DIR_URI.'font-awesome.min.css', array(), '4.7.0', 'all');
        wp_enqueue_style('uikitcss', THEMESHUB_CSS_DIR_URI.'uikit.min.css', array(), '3.1.7', 'all');
        wp_enqueue_style('app', THEMESHUB_CSS_DIR_URI.'app.css', array(), $version, 'all');
        wp_enqueue_style('main-stylesheet', get_stylesheet_uri(), array(), $version, 'all');
    }

    /**
     * Call Themes JS Files
     * @since 1.0.0
     */
    public static function themeshub_js(){
        // Theme Version
        $version = self::theme_version();
        wp_enqueue_script('scriptjs', THEMESHUB_JS_DIR_URI.'jquery.min.js', array(), '3.4.1', false);
        wp_enqueue_script('theme-customizer', THEMESHUB_JS_DIR_URI.'customizer.js', array(), $version, true);
        wp_enqueue_script('uikit-js', THEMESHUB_JS_DIR_URI.'uikit.min.js', array(), '3.1.7', true);
        wp_enqueue_script('main-js', THEMESHUB_JS_DIR_URI.'main.js', array(), $version, true);
    }

    /**
     * Register Themeshub Widgets and Sidebars
     * @since 1.0.0
     */
    public static function themeshub_widgets(){
        register_sidebar( array(
            'id'                  => 'main_sidebar',
            'name'                  => __('Main Sidebar', 'themeshub'),
            'description'           => __('This Sidebar is used in Home and Other Pages', 'themeshub'),
            'before_widget'           => '<div class="sidebar">',
            'after_widget'           => '</div>',
            'before_title'           => '<h2 class="sidebar__title">',
            'after_title'           => '</h2>',
        ) );
    }

    /**
     * Themeshub Customizer CSS
     * Adding css using wp_head hook 
     * @since Themeshub 1.0.0 
     */
    public static function themeshub_customizer_css(){
        if( false === get_theme_mod( 'th_display_header' ) ) { ?>
            <style type="text/css">
                .themeshub__header{
                    display: none;
                }
            </style>
        <?php }
    }


}
// End Themeshub Class

// Initializing Themeshub
new Themeshub;
