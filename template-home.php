<?php 
/*
* Template Name: Home Page
*/ 

get_header(); ?>

    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">

                <?php
                $args = array(
                    'post_type' => 'slider',
                    'posts_per_page' => 3
                );
                $query = new WP_Query($args);
                    while($query->have_posts()){
                        $query->the_post();
                        ?>
                        <div class="single-slider slider-height d-flex align-items-center" style="background-image:url('<?php echo the_post_thumbnail_url(); ?>')">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-10 mx-auto">
                                        <div class="hero__caption">
                                            <?php
                                                $slider_subtitle = get_field('slider_sub_title');
                                                $slider_btn = get_field('slider_btn');
                                                $slider_btn_url = get_field('slider_btn_url');
                                            ?>
                                            <?php
                                                if($slider_subtitle){
                                            ?>
                                                <p><?php echo $slider_subtitle; ?></p>
                                            <?php
                                            }
                                            ?>
                                            <h1><?php the_title(); ?></h1>
                                            <!-- Hero-btn -->
                                            <?php
                                            if($slider_btn){
                                            ?>
                                                <div class="hero__btn">
                                                    <a href="<?php echo $slider_btn_url; ?>" class="btn hero-btn"><?php echo $slider_btn; ?></a>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
        <!-- slider Area End-->

        <?php get_template_part('template-parts/partials/content', 'about'); ?>
        
        <?php get_template_part('template-parts/partials/content', 'services'); ?>

        <?php
            $call_to_action_title = get_field('call_to_action_title', 'options');
            $call_to_action_desc = get_field('call_to_action_desc', 'options');
            $call_to_action_btn = get_field('call_to_action_btn', 'options');
            $call_to_action_btn_url = get_field('call_to_action_btn_url', 'options');
        ?>
        <!-- Request Back Start -->
        <div class="request-back-area section-padding30">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-8 mx-auto text-center">
                        <div class="request-content">
                            <h3><?php echo $call_to_action_title; ?></h3>
                            <p><?php echo $call_to_action_desc; ?></p>
                            <a href="<?php echo $call_to_action_btn_url; ?>" class="btn trusted-btn"><?php echo $call_to_action_btn; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Request Back End -->
        
        <!-- Completed Cases Start -->
        <div class="completed-cases section-padding3">
            <div class="container">
                <div class="row">
                    <?php
                    $cases_title = get_field('cases_title', 'options');
                    $cases_desc = get_field('cases_desc', 'options');
                    $cases_btn = get_field('cases_btn', 'options');
                    $cases_btn_url = get_field('cases_btn_url', 'options');
                    ?>
                    <!-- slider Heading -->
                    <div class="col-xl-4 col-lg-4 col-md-8">
                        <div class="single-cases-info mb-30">
                            <h3><?php echo $cases_title; ?></h3>
                            <p><?php echo $cases_desc; ?></p>
                            <a href="<?php echo $cases_btn_url; ?>" class="border-btn border-btn2"><?php echo $cases_btn; ?></a>
                        </div>
                    </div>
                    <!-- OwL -->
                    <div class="col-xl-8 col-lg-8 col-md-col-md-7">
                        <div class=" completed-active owl-carousel"> 
                            <?php
                            $args = array(
                                'post_type' => 'case',
                                'posts_per_page' => 5,
                                'order'   => 'ASC'
                            );
                            $query = new WP_Query($args);
                                while($query->have_posts()) : $query->the_post();
                            ?>
                            <div class="single-cases-img">
                                <img src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                                <!-- img hover caption -->
                               <div class="single-cases-cap">
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <?php the_excerpt(); ?>
                                    <span><?php the_field('sub_text'); ?></span>
                               </div>
                            </div>
                            <?php 
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Completed Cases end -->

        <!-- Team-profile Start -->
        <div class="team-profile team-padding">
            <div class="container">
                <!-- section tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <h2><?php echo esc_html__('Teams', 'buson'); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $args = array(
                        'post_type' => 'team',
                        'posts_per_page' => 4
                    );
                    $query = new WP_Query($args);
                        while($query->have_posts()) : $query->the_post();
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="single-profile mb-30">
                            <!-- Front -->
                            <div class="single-profile-front">
                                <div class="profile-img">
                                    <img src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                                </div>
                                <div class="profile-caption">
                                    <h4><?php the_title(); ?> <span><?php the_field('team_item_sub_title'); ?></span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <!-- Team-profile End-->


        <?php get_template_part('template-parts/partials/content', 'testimonials'); ?>
        
        <?php get_template_part('template-parts/partials/content', 'blog'); ?>

        

    </main>
    <?php get_footer(); ?>