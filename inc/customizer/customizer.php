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
        add_action('customize_register', array($this, 'register_settings'));
        add_action('customize_register', array($this, 'custom_controls'));
    }

    /**
     * Add Customizer options
     * @since 1.0.0
     */
    public function register_settings(){
        $dir = THEMESHUB_INC_DIR.'customizer/settings/';
        $files = array(
            'general',
            'header',
            'blog',
            'sidebar',
            'footer',
        );
        foreach ($files as $key) {
            require_once( $dir.$key.'.php');
        }
    }
}

endif;
return new Themeshub_Customize;