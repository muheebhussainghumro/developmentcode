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
    // PAGINATION CODE
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $mainarray = array(
        'post_type' => array('post'),
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 6,
        'paged'       => $paged,
    );
    $q = new WP_Query($mainarray); 
?>

    <div class="row custom-blog-main-wrapper">
        <?php while ($q->have_posts()) : $q->the_post(); ?>
        <div class="col-md-4 col-sm-6">
            <div class="blog-news-wrapper">
                <div class="blog-image">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()):
$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
?>
                        <img src="<?php echo $thumbnail[0]; ?>" alt="Picture" class="featured-image">
                        <?php else: ?>
                        <img src="<?php echo site_url('PATH'); ?>" alt="Picture" class="featured-image">
                        <?php endif; ?>
                    </a>
                </div>
                <div class="blog-content">
                    <p class="blog-date">
                        <?php echo get_the_date('M d Y'); ?>
                    </p>
                    <h3 class="blog-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <div class="blog-inner">
                        <p class="blog-text">
                            <?php if(!empty(get_the_excerpt())){
                                echo strip_tags(substr(get_the_excerpt(), 0, 200));
                            }
                            else{
                                echo strip_tags(substr(get_the_content(), 0, 200));
                            } ?>
                        </p>
                        <div class="blog-btn">
                            <a href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php endwhile; ?>
		</div>
		
<div class="row custom-paging-row">
    <div class="col-md-12">
        <div class="text-center pagination">
            <?php if (function_exists("pagination")) {
                pagination($q->max_num_pages);
            } ?>
        </div>
    </div>
</div>


<?php wp_reset_postdata(); ?>

    
</body>
</html>