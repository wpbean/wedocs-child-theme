<footer class="content-info" role="contentinfo">
    <div class="container">
        <div class="row">

            <?php if ( is_active_sidebar( 'sidebar-footer' ) ): ?>
                <div class="widget-area clearfix">
                    <?php dynamic_sidebar('sidebar-footer'); ?>
                </div>
            <?php endif; ?>

            <div class="col-md-12 copyright clearfix">

                <?php $credit = get_theme_mod( 'wedocs_footer_credit', true ); ?>
                <?php do_action( 'wedocs_credits' ); ?>
                <span class="copy-text text-center">
                    <?php if ( $footer_text = get_theme_mod( 'wedocs_footer_text' ) ) {
                        echo esc_html( $footer_text );
                    } else { ?>
                        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
                    <?php } ?>
                </span>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
