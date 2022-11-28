<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>







    <div class="col-md-6 img-col">
                    <div class="blog-img-wrapper">
                        <?php if (has_post_thumbnail()):  
                            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
                        ?>
                        <img src="<?php echo $thumbnail[0]; ?>" alt="Picture" class="featured-image">
                        <?php else: ?>
                        <img src="<?php echo site_url('PATH'); ?>" alt="Picture" class="featured-image">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6 content-col">
                    <div class="blog-content">
                        <p class="custom-blog-date">
                            <?php echo get_the_date('m d Y'); ?>
                        </p>
                        <h4 class="custom-blog-title">
                            <?php the_title(); ?>
                        </h4>
                        <p class="custo-blog-text">
                            <?php if(!empty(get_the_excerpt())){
                                echo strip_tags(substr(get_the_excerpt(), 0, 200));
                            }
                            else{
                                echo strip_tags(substr(get_the_content(), 0, 200));
                            } ?>

                        </p>
                    </div>
                </div>





    <?php  
    
    $mainarray = array(
        'post_type' => array('POST'),
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 2,
       
    );
    $q = new WP_Query($mainarray); 
?>


    <div class="row blog-main-row">
        <?php while ($q->have_posts()) : $q->the_post(); ?>
        <div class="col-md-3 custom-blog-col">

            <!-- blog -->
            <div class="row custom-events-wrapper">

                <div class="events-main-wrapper">
                    <div class="event-img-wrapper">
                        <?php if (has_post_thumbnail()):  
                            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
                        ?>
                        <img src="<?php echo $thumbnail[0]; ?>" alt="Picture" class="featured-image">
                        <?php else: ?>
                        <img src="<?php echo site_url('PATH'); ?>" alt="Picture" class="featured-image">
                        <?php endif; ?>
                    </div>
                    <div class="event-content-col">
                        <div class="event-content">
                            <div class="event-title-wrapper">
                                <h4 class="event-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                            </div>
                            <p class="event-text">
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
            </div>
            <!-- blog end -->
        </div>
        <?php endwhile; ?>
    </div>




</body>

</html>