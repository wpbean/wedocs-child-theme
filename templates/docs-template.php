<?php

/**
 * Template Name: Docs Template
 */

global $allowedtags;

if ( $headline = get_theme_mod( 'wedocs_home_text' ) ) { ?>
    <div class="jumbotron card card-padding">
        <h1><?php echo wp_kses( $headline, $allowedtags ); ?></h1>

        <?php if ( $tagline = get_theme_mod( 'wedocs_home_text_tag' ) ) { ?>
            <p><?php echo wp_kses( $tagline, $allowedtags ); ?></p>
        <?php } ?>
    </div>
<?php } ?>

<ul class="docs-list row">
    <?php 
        $args = array(
            'post_type' => 'docs',
            'title_li'  => '',
            'walker'    => new Bootstrap_Page_List()
        );
        
        wp_list_pages( $args ); 
    ?>
</ul>