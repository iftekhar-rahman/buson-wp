<?php
/*
*   Template Name: Cases Page
*/ 
get_header();
?>

    <main>

        <?php get_template_part('template-parts/partials/content', 'breadcrumb'); ?>

        <!-- Completed Cases Start -->
        <div class="completed-cases section-padding3">
            <div class="container">
                <div class="row">
                    
                    <?php
                    $args = array(
                        'post_type' => 'case',
                        'posts_per_page' => 6
                    );
                    $query = new WP_Query($args);
                        while($query->have_posts()){
                            $query->the_post();
                        ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-cases-img  size mb-30">
                                    <img src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                                    <!-- img hover caption -->
                                    <div class="single-cases-cap single-cases-cap2">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- Completed Cases end -->

    </main>
<?php get_footer(); ?>