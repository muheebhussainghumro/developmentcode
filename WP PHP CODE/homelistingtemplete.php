    <?php  
        // PAGINATION CODE
        $mainarray = array(
            'post_type' => array('home_listing'),
            'post_status' => array('publish'),
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 8,
        );
        $q = new WP_Query($mainarray); 
    ?>


    <div class="row home-listing-row">
            <?php while ($q->have_posts()) : $q->the_post(); ?>
            <div class="col-lg-3 col-sm-6 home-listing-col">

                <!-- blog -->

                    <?php 
                        if(has_post_thumbnail()):
                            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
                        endif;
                    ?>
                        <div class="home-listing-main" style="background-image: url('<?php echo $thumbnail[0]; ?>')">
                            <a href="<?php the_permalink(); ?>"></a>
                            <div class="home-listing-content">
                                <h4> <?php the_title(); ?> </h4>
                                <div class="home-listing-arrow-btn"> 
                                <a href="<?php the_permalink(); ?>">→</a>
                                </div>
                            </div>
                            
                        </div>


                <!-- blog end -->
            </div>
            <?php endwhile; ?>
        </div>











<div class="custom-home-listing-wrapper">
        <div class="container">
				
<!-- Loop Start -->

				
            <?php while ($q->have_posts()) : $q->the_post(); ?>

                <?php 
                    if(has_post_thumbnail()):
                        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
                    endif;
                ?>

                    <div class="custom-blog-container" style="background-image: url('<?php echo $thumbnail[0]; ?>')">
                        <div class="custom-blog-content">
                            <h4>
                            <?php the_title(); ?>
                            </h4>
                            <a href="">→</a>
                        </div>
                    </div>
				
                <?php endwhile; ?>
<!-- Loop End -->

            </div>
    </div>