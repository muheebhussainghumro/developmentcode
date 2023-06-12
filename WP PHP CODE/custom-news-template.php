<?php  
    // PAGINATION CODE
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $mainarray = array(
        'post_type' => array('POST'),
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'ASC',
        'posts_per_page' => 99,
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

                    <div class="custom-blog-container" style="background-image: url('<?php echo $thumbnail[0]; ?>')">
                        <div class="custom-blog-content">
                            <h4>
                            <?php if(!empty(get_the_excerpt())){
                                echo strip_tags(substr(get_the_excerpt(), 0, 200));
                            }
                            else{
                                echo strip_tags(substr(get_the_content(), 0, 200));
                            } ?>
                            </h4>
                            <div class="custom-blog-date">
                                <div class="date-col">
                                <p class="news-date">
                                    <?php echo get_the_date('d'); ?>
                                </p>
                                </div>
                                <div class="date-col">
                                <p class="news-date-text">
                                <?php echo get_the_date('Y'); ?>
                                </p>
                                <p class="news-date-text">
                                    <?php echo get_the_date('M'); ?>
                                </p>
                                </div>      
                            </div>
                        </div>
                    </div>

                </div>
				
                <?php endwhile; ?>
<!-- Loop End -->
            </div>

        </div>
    </div>


<script>jQuery(document).ready(function() {
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
});</script>




--------------


<?php  
    // PAGINATION CODE
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $mainarray = array(
        'post_type' => array('POST'),
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'ASC',
        'posts_per_page' => 99,
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

                    <div class="custom-blog-container" style="background-image: url('<?php echo $thumbnail[0]; ?>')">
                        <div class="custom-blog-content">
                            <h4>
                            <?php the_title(); ?>
                            </h4>
                            <div class="custom-blog-date">
                                <p>
                                    <?php echo get_the_date('d'); ?>
                                </p>
                                <p>
                                    <?php echo get_the_date('M'); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
				
                <?php endwhile; ?>
<!-- Loop End -->
            </div>

        </div>
    </div>


<script>jQuery(document).ready(function() {
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
});</script>