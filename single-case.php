<?php get_header(); ?>
    <main>

        <?php get_template_part('template-parts/partials/content', 'breadcrumb'); ?>

        <!-- Services Details Start -->
        <div class="services-details section-padding2">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-12">
                        <div class="s-detailsImg">
                            <img src="assets/img/gallery/services_details.jpg" alt="">
                        </div>
                    </div>
                    <div class="offset-xl-12">
                        <div class="s-details-caption">
                            <h2><?php the_title(); ?></h2>
                            <?php the_content(); ?>

                            <!-- btn -->
                            <?php
                                $contact_us_url = get_field('contact_btn_url');
                                if($contact_us = get_field('contact_btn')){
                            ?>
                                <a href="<?php echo $contact_us_url; ?>" class="btn red-btn"><?php echo $contact_us; ?> <i class="ti-angle-double-right"></i></a>
                            <?php
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services Details End -->
    </main>
<?php get_footer(); ?>