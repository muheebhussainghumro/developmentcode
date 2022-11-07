<?php  
    // PAGINATION CODE
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $mainarray = array(
        'post_type' => array('POST_TYPE_NAME'),
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 9,
        'paged'       => $paged,
    );
    $q = new WP_Query($mainarray); 
?>


<!-- POST WITH CONDITIONS -->
<?php  
    $datetime = new DateTime();
    $today = $datetime->format('Y m d'); 
    $mainarray = array(
        'post_type' => array('POST_TYPE_NAME'),
        'post_status' => array('publish'),
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_key' => 'META_KEY',
        'posts_per_page' => 1,
        'meta_query' => array(
            array(
                'key' => 'META_KEY',
                'value' => $today,
                'type' => 'numeric',
                'compare' => '>='
            )
        ),
        
    );
    $q = new WP_Query($mainarray);
?>

    <!-- POST LOOP -->
    <?php while ($q->have_posts()) : $q->the_post(); ?>
    
        <!-- POST THUMBNAIL -->
		<?php if (has_post_thumbnail()):  
		    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
		?>
			<img src="<?php echo $thumbnail[0]; ?>" alt="Picture" class="featured-image">			
		<?php else: ?>
            <img src="<?php echo site_url('PATH'); ?>" alt="Picture" class="featured-image">
	    <?php endif; ?>
        
		<!-- POST ACTION LINK  -->
        <?php the_permalink(); ?>
		
        <!-- POST TITLE -->
		<?php the_title(); ?>

        <!-- POST CONTENT / EXCERPT -->
        <?php the_content(); ?>
        <?php echo strip_tags(substr(get_the_content(), 0, 200)); ?>
        
        <?php the_excerpt(); ?>
        <?php echo strip_tags(substr(get_the_excerpt(), 0, 100)); ?>

        <?php if(!empty(get_the_excerpt())){
            echo strip_tags(substr(get_the_excerpt(), 0, 200));
        }
        else{
            echo strip_tags(substr(get_the_content(), 0, 200));
        } ?>

        <!-- POSTED DATE ( F/m = FULL MONTH/SHORT MONTH; Y/y = FULL YEAR 0000 / HALF YEAR 00; D/d = FULL DAY NAME / HALF DAY NAME) -->
        <?php echo get_the_date('m d Y'); ?>
        
        <!-- SHOW CURRENT CATEGORY/ CUSTOM TAXONOMY OF THE POST -->
        <?php echo get_the_category(get_the_ID())[0]->name; ?>
        <?php $terms = get_the_terms($post->ID, 'TAXONOMY_NAME'); foreach($terms as $term){echo $term->name;} ?>

        <!-- GET REQUIRED DAY/MONTH/YEAR OR TIME h:i A -->
        <?php date('h:i A', strtotime('11/12/2020 02:20 PM')); ?>
        <?php date('d', strtotime('11/12/2020 02:20 PM')); ?>

	<?php endwhile; ?>

<!-- PAGINATION CODE -->
<div class="row custom-paging-row">
    <div class="col-md-12">
        <div class="text-center pagination">
            <?php if (function_exists("pagination")) {
                pagination($q->max_num_pages);
            } ?>
        </div>
    </div>
</div>

<!-- CALLING SIDEBAR BY ID - NOTE( HTML ID is a sidebar ID) -->
<?php dynamic_sidebar('sidebar-1'); ?>


<!-- custom field image code -->
<?php $custom_img_object = get_filed('program_box_icon'); echo $custom_img_object['url']; ?>