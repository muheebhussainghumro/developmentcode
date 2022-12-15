<?php  
    $datetime = new DateTime();
    $today = $datetime->format('Ymd');
    $mainarray = array(
        'post_type' => array('webinar'),
        'post_status' => array('publish'),
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => 'select_date',
                'value' => $today,
                'type' => 'numeric',
                'compare' => '>='
            )
        ),
    );
	$argsarray = array(
		'post_type' => array('webinar'),
		'post_status' => array('publish'),
		'orderby' => 'meta_value_num',
		'order' => 'DESC',
		'posts_per_page' => -1,
		'meta_query' => array(
			array(
				'key' => 'select_date',
				'value' => $today,
				'type' => 'numeric',
				'compare' => '<='
			)
		),
	);
    $q = new WP_Query($mainarray);
	$ps = new WP_Query($argsarray);
?>
	
    <div class="webinar-main-wrapper">
        <div class="webinar-container">
            <div class="webinar-carosuel owl-carousel">
                <!-- Loop Start -->
				
                <?php 
                    if($q->have_posts()): 
                        while ($q->have_posts()) : 
                            $q->the_post(); 
                ?>
				<div class="slide">
                    <div class="webinar-content-row">
                        <div class="webinar-inner">
                            <div class="uw-title">
                                <div class="table-title-wrapper">
                                    <p class="table-title">Presentation Title</p>
                                </div>
                                <div class="uw-content">
                                    <h4 class="upcoming-webinar-haeding"><a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
									</h4>
                                    <p>
                                        <?php if(!empty(get_the_excerpt())){
                                            echo strip_tags(substr(get_the_excerpt(), 0, 200));
                                        }
                                    else{
                                        echo strip_tags(substr(get_the_content(), 0, 200));
                                    } ?>
                                    </p>
                                </div>
                            </div>
                            <div class="uw-date">
                                <div class="table-title-wrapper">
                                    <p class="table-title">Date & Time</p>
                                </div>
                                <div class="uw-content">
                                    <p class="table-text">TBD 2023</p>
                                </div>
                            </div>
                            <div class="uw-text">
                                <div class="table-title-wrapper">
                                    <p class="table-title">Presenter | Company</p>
                                </div>
                                <div class="uw-content">
                                    <p class="table-text">
                                        <?php the_field('presenter_name'); ?>
                                        <?php the_field('presenter_title'); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="uw-btn">
                                <div class="table-title-wrapper">
                                    <p class="table-title"></p>
                                </div>
                                <div class="uw-content">
                                    <p class="table-btn"><a href="<?php the_permalink(); ?>">Register ➜</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endwhile; 
				
				elseif($ps->have_posts()): 
                    while ($ps->have_posts()) : 
                        $ps->the_post(); 
                ?>
                <div class="slide">
                    <div class="webinar-content-row">
                        <div class="webinar-inner">
                            <div class="uw-title">
                                <div class="table-title-wrapper">
                                    <p class="table-title">Presentation Title</p>
                                </div>
                                <div class="uw-content">
                                    <h4 class="upcoming-webinar-haeding"><a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a></h4>
                                    <p>
                                        <?php if(!empty(get_the_excerpt())){
                                            echo strip_tags(substr(get_the_excerpt(), 0, 200));
                                        }
                                    else{
                                        echo strip_tags(substr(get_the_content(), 0, 200));
                                    } ?>
                                    </p>
                                </div>
                            </div>
                            <div class="uw-date">
                                <div class="table-title-wrapper">
                                    <p class="table-title">Date & Time</p>
                                </div>
                                <div class="uw-content">
                                    <p class="table-text">TBD 2023</p>
                                </div>
                            </div>
                            <div class="uw-text">
                                <div class="table-title-wrapper">
                                    <p class="table-title">Presenter | Company</p>
                                </div>
                                <div class="uw-content">
                                    <p class="table-text">
                                        <?php the_field('presenter_name'); ?>
                                        <?php the_field('presenter_title'); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="uw-btn">
                                <div class="table-title-wrapper">
                                    <p class="table-title"></p>
                                </div>
                                <div class="uw-content">
                                    <p class="table-btn"><a href="<?php the_permalink(); ?>">Register ➜</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php else: ?>
            <div class="table-record-wrapper">
                <div class="table-record-heading">No Record Found!</div>
                <script>jQuery(document).ready(function () { jQuery(document).find('.custom-btn').hide(); });</script>
            </div>
            <?php endif; wp_reset_postdata(); ?>
            <!-- Loop End -->
        </div>
    </div>


    <script>
        jQuery(document).ready(function () {
            jQuery(".webinar-carosuel").owlCarousel({
                loop: false,
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
                        items: 1,
                    },
                    1000: {
                        items: 1,
                    }
                }
            });
        });

    </script>