<?php
/**
 * Themeshub Customizer Class
 * Add Customize setting for your theme to make it more usable
 * @package Themeshub
 * @version 1.0.0
 * @author AR_Rony <ar.rony87@gmail.com>
 */

/**
 * Preventing Script From Direct Accessing into the file
 */
if( ! defined( 'ABSPATH' )){
    exit;
}

if( ! class_exists( 'Themeshub_Customize' ) ):

/**
 *  Customizer Class
 */
class Themeshub_Customize{
    /**
     * Setup Class 
     * @since 1.0.0
     */
    public function __construct(){
        add_action('customize_register', array($this, 'custom_settings'));
        add_action('customize_register', array($this, 'custom_controls'));
    }

    /**
     * Load Custom Settings Classes
     */
    public static function custom_settings($wp_customize){
        $dir = THEMESHUB_INC_DIR.'customizer/settings/';
    }
}

endif;
return new Themeshub_Customize;