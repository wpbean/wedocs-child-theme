<?php
/**
 * wedocs customizer
 *
 * @author WeDevs
 */
class WeDocs_Customizer {

    function __construct() {
        add_action( 'customize_register', array($this, 'register_control') );
    }

    function register_control( $wp_customize ) {

        // Style Settings
        $wp_customize->add_section( 'wedocs_style_settings_section', array(
            'title' => __( 'Style Settings', 'wedocs' ),
        ) );

        $wp_customize->add_setting( 'wedocs_primary_color', array(
           'capability' => 'edit_theme_options',
            'default'   => '#f92c8b'
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wedocs_primary_color', array(
            'label' => __( 'Primary Color', 'wedocs' ),
            'section' => 'wedocs_style_settings_section',
            'settings' => 'wedocs_primary_color',
        ) ) );


        $wp_customize->add_setting( 'wedocs_secondary_color', array(
           'capability' => 'edit_theme_options',
            'default'   => '#de20b3'
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wedocs_secondary_color', array(
            'label' => __( 'Secondary Color', 'wedocs' ),
            'section' => 'wedocs_style_settings_section',
            'settings' => 'wedocs_secondary_color',
        ) ) );


        // homepage and footer
        $wp_customize->add_section( 'wedocs_text_section', array(
            'title' => __( 'weDocs Options', 'wedocs' )
        ) );

        // homepage text
        $wp_customize->add_setting( 'wedocs_home_text', array(
           'capability' => 'edit_theme_options',
            'default' => ''
        ) );

        $wp_customize->add_control( 'wedocs_home_text', array(
            'label' => __( 'Homepage Text - header', 'wedocs' ),
            'section' => 'wedocs_text_section',
            'type' => 'text'
        ));

        // homepage text
        $wp_customize->add_setting( 'wedocs_home_text_tag', array(
            'capability' => 'edit_theme_options',
            'default' => ''
        ) );

        $wp_customize->add_control( 'wedocs_home_text_tag', array(
            'label' => __( 'Homepage Text - tagline', 'wedocs' ),
            'section' => 'wedocs_text_section',
            'type' => 'text'
        ));

        // footer text
        $wp_customize->add_setting( 'wedocs_footer_text', array(
            'capability' => 'edit_theme_options',
            'default' => sprintf( __( '&copy; %d. All rights are reserved.', 'wedocs' ), date( 'Y' ) )
        ));

        $wp_customize->add_control('wedocs_footer_text', array(
            'label' => __( 'Footer Text', 'wedocs' ),
            'section' => 'wedocs_text_section',
            'type' => 'text'
        ));
    }

}

new WeDocs_Customizer();