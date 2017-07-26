<?php
global $post;
?>
<div class="row wedocs-single-wrap">
    <div class="col-sm-<?php echo $skip_sidebar == 'yes' ? '12 skip-sidebar' : 9; ?> wedocs-single-content">
    	<div class="card card-padding clearfix">
	        <?php wedocs_breadcrumbs(); ?>
	        <?php get_template_part('templates/content', 'single'); ?>
        </div>
    </div>
    <div class="col-sm-3 sidebar">
    	<?php dynamic_sidebar( 'sidebar-primary' ); ?>
    </div>
</div>