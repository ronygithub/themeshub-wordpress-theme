<?php 
/**
 * Customize Header Options
 * @since Themeshub 1.0.0
 */
if(! define( 'ABSPATH' ) ){
    exit;
}
if(! class_exists('Themeshub_Customize_Header_Options') ):
    class Themeshub_Customize_Header_Options{
        /**
         * Setup Class
         * @since Themeshub 1.0.0
         */
        public function __construct(){
            add_action('customize_register', array($this, 'customize_header'));
        }
        /**
         * Customize Heade Options
         */
        public function customize_header( $wp_customize ){
            /**
             * Panel
             */
            $panel = 'header_options_panel';
            $wp_customize->add_panel($panel, array(
                'title'             => esc_html__( 'Header', 'themeshub' ),
                'priority'          => 100
            ));

            /**
             * Section
             */
            $wp_customize->add_section('header_general', array(
                'title'             => esc_html__('General', 'themeshub'),
                'priority'          => 1,
                'panel'             => $panel
            ));

            /**
			 * Header Style
			 */
			$wp_customize->add_setting( 'header_style', array(
				'default'           	=> 'minimal',
				'sanitize_callback' 	=> 'oceanwp_sanitize_select',
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_style', array(
				'label'	   				=> esc_html__( 'Style', 'oceanwp' ),
				'type' 					=> 'select',
				'section'  				=> 'header_general',
				'settings' 				=> 'header_style',
				'priority' 				=> 10,
				'choices' 				=> array(
					'minimal' 		=> esc_html__( 'Minimal', 'oceanwp' ),
					'transparent' 	=> esc_html__( 'Transparent', 'oceanwp' ),
					'top'			=> esc_html__( 'Top Menu', 'oceanwp' ),
					'full_screen'	=> esc_html__( 'Full Screen', 'oceanwp' ),
					'center'		=> esc_html__( 'Center', 'oceanwp' ),
					'medium'		=> esc_html__( 'Medium', 'oceanwp' ),
					'vertical'		=> esc_html__( 'Vertical', 'oceanwp' ),
					'custom'		=> esc_html__( 'Custom Header', 'oceanwp' ),
				),
			) ) );
        }
    }
endif;
return new Themeshub_Customize_Header_Options;