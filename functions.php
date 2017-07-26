<?php

/**
 * Child theme functions
 * Parent theme: weDocs
 * Child Theme Author: XooThemes
 */


/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */


if ( ! function_exists( 'xt_wedocs_main_fonts_url' ) ) {

	function xt_wedocs_main_fonts_url() {
	    $fonts_url = '';
	    $fonts     = array();
	    $subsets   = '';

	    if ( 'off' !== esc_html_x( 'on', 'Poppins font: on or off', 'wedocs-child-theme' ) ) {
	        $fonts[] = 'Poppins:300,400,500,600,700';
	    }

	    if ( $fonts ) {
	        $fonts_url = add_query_arg( array(
	            'family' => urlencode( implode( '|', $fonts ) ),
	            'subset' => urlencode( $subsets ),
	        ), 'https://fonts.googleapis.com/css' );
	    }

	    return $fonts_url;
	}
}



/**
 * Adding Child Theme Scripts
 */

add_action('wp_enqueue_scripts', 'xt_wedocs_adding_scripts', 5 );

function xt_wedocs_adding_scripts() {
    wp_dequeue_style('open-sans');
    wp_enqueue_style( 'xt-wedocs-google-fonts', xt_wedocs_main_fonts_url(), array(), null );
    wp_enqueue_style( 'wedocs-child-style', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_style( 'wedocs-materialize', get_stylesheet_directory_uri() . '/css/materialize.min.css' );
    wp_enqueue_style( 'wedocs-child-main', get_stylesheet_directory_uri() . '/css/main.css', array( 'bootstrap', 'wedocs-main' ) );
    wp_enqueue_style( 'wedocs-child-color', get_stylesheet_directory_uri() . '/css/color.css', array( 'bootstrap', 'wedocs-main' ) );
    wp_enqueue_style( 'wedocs-bootstrap-dropdown', get_stylesheet_directory_uri() . '/css/bootstrap-dropdownhover.min.css', array( 'bootstrap', 'wedocs-main' ) );

    wp_enqueue_script( 'wedocs-child-main', get_stylesheet_directory_uri() . '/js/bootstrap-dropdownhover.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'wedocs-bootstrap-dropdown', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0', true );
}


/**
 * Add Inline Styles
 */

function xt_wedocs_adding_inline_style() {

    $color = get_theme_mod( 'wedocs_primary_color', '#f92c8b' );
    $secondary_color = get_theme_mod( 'wedocs_secondary_color', '#de20b3' );
    $custom_css = "
            .top-search-form .btn-primary, .btn-primary, aside.doc-nav-widget ul.doc-nav-list > li.current_page_parent > a, aside.doc-nav-widget ul.doc-nav-list > li.current_page_item > a, aside.doc-nav-widget ul.doc-nav-list > li.current_page_ancestor > a, .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
                    background-color: {$color};
            }";

    $custom_css .= "
    	a, a:hover, .site-main-header.navbar-default .navbar-nav>.active>a, .site-main-header.navbar-default .navbar-nav>.active>a:focus, .site-main-header.navbar-default .navbar-nav>.active>a:hover, .site-main-header.navbar-default .navbar-nav>.open>a, .site-main-header.navbar-default .navbar-nav>.open>a:focus, .site-main-header.navbar-default .navbar-nav>.open>a:hover {
    		color: {$color};
    	}";

    $custom_css .= "
    	aside.doc-nav-widget ul.doc-nav-list > li.current_page_parent li.current_page_item > a, aside.doc-nav-widget ul.doc-nav-list > li.current_page_item li.current_page_item > a, aside.doc-nav-widget ul.doc-nav-list > li.current_page_ancestor li.current_page_item > a {
    		border-left-color: {$color};
    	}";

     $custom_css .= "
            body .wedocs-contact-modal input[type='text']:focus, body .wedocs-contact-modal input[type='email']:focus, body .wedocs-contact-modal textarea:focus {
                border-color: {$color};
            }";    

    $custom_css .= "
            .banner .navbar-nav li > a:hover, .banner .navbar-nav li > a:focus, .top-search-form .btn-primary:hover, .top-search-form .btn-primary:focus, .btn-primary:hover, .btn-primary:focus, .banner .navbar-nav .open a:hover, .banner .navbar-nav .open a:focus, .banner .navbar-nav .active > a, .banner .navbar-nav .active > a:hover, .banner .navbar-nav .active > a:focus, .banner .navbar-nav .dropdown-menu .active > a, .banner .navbar-nav .dropdown-menu .active > a:hover {
                    background-color: {$secondary_color};
            }";

    $custom_css .= "
            .top-search-form .btn-primary:hover, .top-search-form .btn-primary:focus, .btn-primary:hover, .btn-primary:focus, .btn-primary {
                border-color: {$secondary_color};
            }";

    $custom_css .= "input:not([type]):focus:not([readonly]), input[type=text]:not(.browser-default):focus:not([readonly]), input[type=password]:not(.browser-default):focus:not([readonly]), input[type=email]:not(.browser-default):focus:not([readonly]), input[type=url]:not(.browser-default):focus:not([readonly]), input[type=time]:not(.browser-default):focus:not([readonly]), input[type=date]:not(.browser-default):focus:not([readonly]), input[type=datetime]:not(.browser-default):focus:not([readonly]), input[type=datetime-local]:not(.browser-default):focus:not([readonly]), input[type=tel]:not(.browser-default):focus:not([readonly]), input[type=number]:not(.browser-default):focus:not([readonly]), input[type=search]:not(.browser-default):focus:not([readonly]), textarea.materialize-textarea:focus:not([readonly]) {
            border-bottom-color: {$color};
            box-shadow: none;
        }";              

    	

    wp_add_inline_style( 'wedocs-child-color', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'xt_wedocs_adding_inline_style' );


/**
 * Adding required files
 */

require_once locate_template( '/lib/page-walker.php' ); // page list walker