<?php get_header(); ?>

<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/breadcumb.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>
                            <?php
                            printf(
                                /* translators: %s: Search term. */
                                esc_html__( 'Results for "%s"', 'twentytwentyone' ),
                                '<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
                            );
                            ?>    
                        </h2>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- slider Area End-->

<div class="container">
    <div class="row">
        <div class="col-lg-6">
        <div class="row">
                <?php
                        $args = array(
                            'post_type' => 'post'
                        );
                        $query = new WP_Query($args);
                            while($query->have_posts()){
                                $query->the_post();
                        ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img rounded-0', 'title' => 'Feature image']);
?>
                                <a href="#" class="blog_item_date">
                                    <h3>15</h3>
                                    <p>Jan</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="<?php the_permalink(); ?>">
                                    <h2><?php the_title(); ?></h2>
                                </a>
                                <?php the_excerpt(); ?>
                                <ul class="blog-info-link">
                                    <li>
                                        <i class="fa fa-user"></i> 
                                        <?php echo the_category(', '); ?>
                                    </li>
                                    <li><a href="#"><i class="fa fa-comments"></i> <?php 	
echo comments_number(); ?></a></li>
                                </ul>
                            </div>
                        </article>
                        <?php
                            }
                            wp_reset_postdata();
                        ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>