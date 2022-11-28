<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php  
    
    $mainarray = array(
        'post_type' => array('events'),
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 4,
       
    );
    $q = new WP_Query($mainarray); 
?>


<?php  
    $today = date('Ymd'); // 20221012
    $mainarray = array(
        'post_type' => array('events'),
        'post_status' => array('publish'),
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_key' => 'event_date',
        'posts_per_page' => 4,
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'value' => $today,
                'type' => 'numeric',
                'compare' => '>='
            )
        ),
        
    );
    $q = new WP_Query($mainarray);
?>

    <div class="row event-main-row">
        <?php while ($q->have_posts()) : $q->the_post(); ?>
        <div class="col-lg-3 col-md-4 col-sm-6 custom-blog-col">

            <div class="custom-events-wrapper">
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
                            <div class="event-title">
                                <h4>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                            </div>
							<div class="event-text">
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
                    </div>
                </div>
            </div>
			
        </div>
        <?php endwhile; ?>
    </div>

</body>
</html>