col-md-4 (1 big) / col-md-4 (2 small) / col-md-4 2 small

<div class="row">
	<div class="<?php echo (is_front_page()) ? 'col-lg-4' : 'col-12'; ?>">
		<?php
		$mainarrayr = array(
			'post_type' => array('event'),
			'post_status' => array('publish'),
			'orderby' => 'date',
			'order' => 'DESC',
			'posts_per_page' => 1,
		);
		$r = new WP_Query($mainarrayr); ?>

		<div class="events-row featured-event-row">
			<?php while ($r->have_posts()) : $r->the_post(); ?>
				<div class="events-wrapper">
					<div class="event-date">
						<span class="month"><?php echo date_format(date_create(get_field('event_date')), 'M'); ?></span>
						<span class="date"><?php echo date_format(date_create(get_field('event_date')), 'd'); ?></span>
					</div>
					<div class="events-content">
						<h4 class="title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h4>
						<p class="text"><?php echo substr(strip_tags(get_the_content()), 0, (is_front_page() ? 250 : 350)); ?>...</p>
						<a href="<?php the_permalink(); ?>" class="btn btn-scheme-dark btn-scheme-hover-dark btn-style-link btn-style-rectangle btn-size-extra-large">
							View Event
						</a>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
	<div class="<?php echo (is_front_page()) ? 'col-lg-8' : 'col-12'; ?>">
		<?php
		$mainarrayq = array(
			'post_type' => array('event'),
			'post_status' => array('publish'),
			'orderby' => 'date',
			'order' => 'DESC',
			'posts_per_page' => 4,
			'offset' => 1
		);
		$q = new WP_Query($mainarrayq); ?>

		<div class="row events-row">
			<?php while ($q->have_posts()) : $q->the_post(); ?>
				<div class="col-md-6">
					<div class="events-wrapper">
						<div class="event-date">
							<span class="month"><?php echo date_format(date_create(get_field('event_date')), 'M'); ?></span>
							<span class="date"><?php echo date_format(date_create(get_field('event_date')), 'd'); ?></span>
						</div>
						<div class="events-content">
							<h4 class="title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h4>
							<p class="text"><?php echo substr(strip_tags(get_the_content()), 0, (is_front_page() ? 200 : 350)); ?>...</p>
							<a href="<?php the_permalink(); ?>" class="btn btn-scheme-dark btn-scheme-hover-dark btn-style-link btn-style-rectangle btn-size-extra-large">
								View Event
							</a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>