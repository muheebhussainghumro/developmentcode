<?php      
    $mainarray = array(
        'post_type' => array('POST'),
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 3, 
    );
    $q = new WP_Query($mainarray); 
?>

<div class="media-main-row">
    <?php while ($q->have_posts()) : $q->the_post(); ?>
        <div class="media-main-wrapper">
            <div class="media-inner">
                <div class="row media-date-wrapper">
                    <div class="col-md-6">
                        <div class="media-title">
                            <p><?php the_field('press_label'); ?> </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="media-date">
                            <?php echo get_the_date('d m Y'); ?>
                        </p>
                    </div>
                </div>
                <div class="media-content-wrapper">
                    <p class="media-text">
                    <?php if(!empty(get_the_excerpt())){
                        echo strip_tags(substr(get_the_excerpt(), 0, 200));
                    }
                    else{
                        echo strip_tags(substr(get_the_content(), 0, 200));
                    } ?>
                    </p>
                </div>
            </div>    
        </div>
    <?php endwhile; wp_reset_postdata();?>
</div>