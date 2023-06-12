<?php
$today = date('Ymd'); // 20221012
$mainarray = array(
    'post_type' => array('event'),
    'post_status' => array('publish'),
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_key' => 'event_date',
    'posts_per_page' => 2,
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

<div class="event-date-wrapper">
    <div class="event-date-style">
        <p><?php echo date_format(date_create(get_field('event_date')), 'F Y'); ?></p>
    </div>
</div>
<div class="row event-main-row">

    <?php while ($q->have_posts()) : $q->the_post(); ?>
        <div class="col-lg-12 custom-blog-col">

            <div class="custom-events-wrapper">
                <div class="row events-main-wrapper">
                    <div class="col-lg-6 event-content-col">
                        <div class="event-content">
                            <div class="event-date">
                                <span class="date"><?php echo date_format(date_create(get_field('event_date')), 'd'); ?></span>
                            </div>
                            <div class="event-title">
                                <div class="event-date">
                                    <span class="month"><?php echo date_format(date_create(get_field('event_date')), 'F j g:i a'); ?></span>
                                </div>
                                <h4>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                            </div>
                            <div class="event-text">
                                <p>
                                    <?php if (!empty(get_the_excerpt())) {
                                        echo strip_tags(substr(get_the_excerpt(), 0, 200));
                                    } else {
                                        echo strip_tags(substr(get_the_content(), 0, 200));
                                    } ?>
                                </p>
                            </div>
                            <div class="event-btn-wrapper">
                                <a href="<?php the_permalink(); ?>" class="btn event-btn">SEE DETAILS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 event-img-wrapper">
                        <?php if (has_post_thumbnail()) :
                            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', true);
                        ?>
                            <img src="<?php echo $thumbnail[0]; ?>" alt="Picture" class="featured-image">
                        <?php else : ?>
                            <img src="<?php echo site_url('PATH'); ?>" alt="Picture" class="featured-image">
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    <?php endwhile; ?>
</div>


<!-- ================ -->



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