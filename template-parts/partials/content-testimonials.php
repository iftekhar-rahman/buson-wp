<!-- Testimonial Start -->
<div class="testimonial-area fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-9 col-md-9">
                <div class="h1-testimonial-active">
                    <?php
                    $args = array(
                        'post_type' => 'testimonial',
                        'posts_per_page'    => 3
                    );
                    $query = new WP_Query($args);
                        while($query->have_posts()){
                            $query->the_post();
                            ?>
                            <div class="single-testimonial pt-65">
                                <!-- Testimonial tittle -->
                                <div class="testimonial-icon mb-45">
                                    <img src="<?php echo the_post_thumbnail_url(); ?>" class="ani-btn " alt="">
                                </div>
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption text-center">
                                    <?php the_content(); ?>
                                    <!-- Rattion -->
                                    <div class="testimonial-ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="rattiong-caption">
                                        <span><?php the_field('reviewer_name'); ?><span> <?php the_field('reviewer_title'); ?></span> </span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->