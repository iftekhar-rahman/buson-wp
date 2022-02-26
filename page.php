<?php get_header(); ?>

<?php get_template_part('template-parts/partials/content', 'breadcrumb'); ?>

<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-lg-12">
            <?php the_title(); ?>
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>