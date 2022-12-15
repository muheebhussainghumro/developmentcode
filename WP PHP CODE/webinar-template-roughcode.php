

<table class="webinar-table hp-upcoming-webinar-table ">
        <thead>
            <tr>
                <th class="table-title">Presentation Title</th>
                <th class="table-title">Date & Time</th>
                <th class="table-title">Presenter | Company</th>
				<th class="table-title"></th>
            </tr>
        </thead>
    </table>
</div>




<?php  
    // PAGINATION CODE
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $mainarray = array(
        'post_type' => array('post'),
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 9,
        'paged'       => $paged,
    );
    $q = new WP_Query($mainarray); 
    ?>

    <div class="custom-main-blog-wrapper">
        <div class="container">
            <div class="owl-carousel-blog owl-carousel">

                <!-- Loop Start -->

                <?php while ($q->have_posts()) : $q->the_post(); ?>

                <?php 
                    if(has_post_thumbnail()):
                        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
                    endif;
                ?>

                <div class="slide">

				<div class="webinar-content-row">
    <div class="webinar-inner">
        <div class="uw-content">
            <h4 class="upcoming-webinar-haeding"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
           <p>
			   <?php if(!empty(get_the_excerpt())){
					echo strip_tags(substr(get_the_excerpt(), 0, 200));
				}
			   else{
				   echo strip_tags(substr(get_the_content(), 0, 200));
			   } ?>
			</p>
        </div>
        <div class="uw-date">
            <p class="table-text">TBD 2023</p>
        </div>
        <div class="uw-text">
            <p class="table-text"><?php the_field('presenter_name'); ?>
					<?php the_field('presenter_title'); ?>
            </p>
        </div>
        <div class="uw-btn">
            <p class="table-btn"><a href="<?php the_permalink(); ?>">Register ➜</a></p>
        </div>
    </div>
</div>

                </div>

                <?php endwhile; ?>
                <!-- Loop End -->
                <?php wp_reset_postdata(); ?>

            </div>

        </div>
    </div>


    <script>
        jQuery(document).ready(function () {
            jQuery(".owl-carousel-blog").owlCarousel({
                loop: true,
                margin: 35,
                responsiveClass: true,
                nav: true,
                dots: false,
                autoplay: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 3,
                    }
                }
            });
        });

    </script>