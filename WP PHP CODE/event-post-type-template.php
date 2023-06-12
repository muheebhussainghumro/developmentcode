<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!-- col-md-7 'image' / col-md-5 'title' 'content'  -->

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
            <div class="col-lg-12 custom-blog-col">
                <div class="row custom-events-wrapper">
                    <div class="col-md-7">
                        <div class="event-img-wrapper">
                            <?php if (has_post_thumbnail()) :
                                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', true);
                            ?>
                                <img src="<?php echo $thumbnail[0]; ?>" alt="Picture" class="featured-image">
                            <?php else : ?>
                                <img src="<?php echo site_url('PATH'); ?>" alt="Picture" class="featured-image">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-5">
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
                                        <?php if (!empty(get_the_excerpt())) {
                                            echo strip_tags(substr(get_the_excerpt(), 0, 200));
                                        } else {
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