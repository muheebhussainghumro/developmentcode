 



<?php  
    $datetime = new DateTime();
    $today = $datetime->format('Ymd');
    $mainarray = array(
        'post_type' => array('webinar'),
        'post_status' => array('publish'),
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'posts_per_page' => 4,
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
		'posts_per_page' => 4,
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

<div class="upcoming-webinar">
    <table class="webinar-table hp-upcoming-webinar-table ">
        <thead>
            <tr>
                <th class="table-title">Presentation Title</th>
                <th class="table-title">Date & Time</th>
                <th class="table-title">Presenter | Company</th>
				<th class="table-title"></th>
            </tr>
        </thead>
        <tbody>
			</tbody>
    </table>
			<div class="owl-carousel">
            <?php if($q->have_posts()): while ($q->have_posts()) : $q->the_post(); ?>
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
            <?php endwhile; 
				elseif($ps->have_posts()): while ($ps->have_posts()) : $ps->the_post(); ?>
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
            <?php endwhile; ?>				
			<div>
				
				<table class="webinar-table hp-upcoming-webinar-table ">
        <thead>
			<?php else: ?>
				
            <tr>
                <th class="table-record-heading">No Record Found!</th>
                <script>jQuery(document).ready(function(){ jQuery(document).find('.custom-btn').hide(); });</script>
            </tr>
            <?php endif; wp_reset_postdata(); ?>
        </tbody>
    </table>
</div>