<?php
/**
 * Theme Customizer File for Themeshub
 * Add Customize setting for your theme to make it more usable
 * @package Themeshub
 * @version 1.0.0
 * @author AR_Rony <ar.rony87@gmail.com>
 */
function themeshub_customizer_settings($wp_customize){
    /**
     * Customize Header Options
     */
    // Add Sections
    $wp_customize->add_section('header_section', array(
        'title'         => __('Header', 'themeshub'),
        'priority'      => 10,
    ));
    // Add Settings
    $wp_customize->add_setting('header_textcolor', array(
        'default'       => '#000000',
        'transport'     => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label'         => __('Header Color', 'themeshub'),
        'section'         => 'header_section',
        'settings'         => 'header_textcolor',
    )));

    /**
     * Customize Showcase Options
     */
    // Banner Section
    $wp_customize->add_section('banner_section', array(
        'title'          => __('Banner Options', 'themeshub'),
        'priority'       => 11,
    ));

    $wp_customize->add_setting('add_banner_color', array(
        'default' => 'red',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'banner_color', array(
        'label'         => __('Banner Bg Color', 'themeshub'),
        'section'       => 'banner_section',
        'settings'      => 'add_banner_color'
    )));

    /**
     * Customize Display Option
     */
    // Section
    $wp_customize->add_section('th_display_options', array(
        'title'     => __('Display Options', 'themeshub'),
        'priority'  => 12,
    ));

    // Setting
    $wp_customize->add_setting('th_display_header', array(
        'default'  => 'true',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_setting('th_display_sidebar', array(
        'default'  => 'true',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_setting('th_color_scheme', array(
        'default'   => 'normal',
        'transport' => 'postMessage',
    ));

    // Control
    $wp_customize->add_control('th_display_header', array(
        'section'       => 'th_display_options',
        'label'         => __('Display Header?', 'themeshub'),
        'type'          => 'checkbox'
    ));
    $wp_customize->add_control('th_display_sidebar', array(
        'section'       => 'th_display_options',
        'label'         => __('Display Sidebar?', 'themeshub'),
        'type'          => 'checkbox'
    ));

    $wp_customize->add_control('th_color_scheme', array(
        'section' => 'th_display_options',
        'label'   => __('Color Scheme', 'themeshub'),
        'type'    => 'radio',
        'choices' => array(
            'normal' => 'Normal',
            'inverse'=> 'Inverse'
        ),
    ));


}
add_action('customize_register', 'themeshub_customizer_settings');