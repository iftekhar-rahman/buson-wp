<?php
/*
*   Template Name: About Page
*/ 
get_header();
?>

    <main>

        <?php get_template_part('template-parts/partials/content', 'breadcrumb'); ?>

        <?php get_template_part('template-parts/partials/content', 'about'); ?>
      
        <?php get_template_part('template-parts/partials/content', 'testimonials'); ?>

        <?php get_template_part('template-parts/partials/content', 'blog'); ?>

    </main>
<?php get_footer(); ?>