<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php  /*Template Name: Job Position */ get_header();

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $mainarray = array(
        'post_type' => array('job_post'),
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 12,
        'paged'       => $paged,
    );
    $q = new WP_Query($mainarray);
?>



<section class="job-titles-sec">
    <div class="jt-heading">
        <h3 class="j-title">Search Job Titles</h3>
    </div>
    
    <div class="row jobs-cards">
        <?php while ($q->have_posts()) : $q->the_post(); ?>
        <div class="col-sm-6 col-lg-4 col-md-4 column-cards ">
            <div class="job-card" onclick="window.location.href = '<?php the_permalink(); ?>'">
                <?php if (has_post_thumbnail()):  
        		    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
        		?>
        			<img src="<?php echo $thumbnail[0]; ?>" alt="Picture" class="featured-image">			
        		<?php else: ?>
                    <img src="<?php echo site_url('/wp-content/uploads/2022/12/placeholder.png'); ?>" alt="Picture" class="featured-image">
        	    <?php endif; ?>
                <div class="jt-details">
                    <h4><?php the_title(); ?></h4>
                    <p>
                        <?php if(!empty(get_the_excerpt())){
                            echo strip_tags(get_the_excerpt());
                        }
                        else{
                            echo strip_tags(substr(get_the_content(), 0, 300));
                        } ?>
                    </p>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php if( $q->have_posts() ): ?>
    <div class="row custom-paging-row">
        <div class="col-md-12">
            <div class="text-center pagination">
                <?php if (function_exists("pagination")) {
                    pagination($q->max_num_pages);
                } ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>


    
</body>
</html>