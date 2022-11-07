<?php
$mainarrayq = array(
'post_type' => array('post'),
'post_status' => array('publish'),
'orderby' => 'date',
'order' => 'DESC',
'posts_per_page' => 3,
);
$q = new WP_Query($mainarrayq); ?>

<div class="row blogs-row">
    <?php while ($q->have_posts()) : $q->the_post(); ?>
    <div class="col-lg-4 col-sm-6">
        <div class="blogs-wrapper">
            <div class="blogs-icon">
                <?php if (has_post_thumbnail()):
				$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
				?>
                <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>" width="100%"></a>
                <?php else: ?>
                <?php endif ?>
            </div>
            <div class="blogs-content">
                <p class="date">
                    <?php echo get_the_date(); ?>
                </p>
                <h4 class="title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h4>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>