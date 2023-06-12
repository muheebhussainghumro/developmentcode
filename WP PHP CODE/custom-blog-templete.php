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
        'post_type' => 'team',
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'ASC',
        'posts_per_page' => -1,
    );

    $team_general = new WP_Query($mainarray); ?>

    <div class="team-general-section">
        <div class="team-general-inner">
            <div class="row">
                <?php while ($team_general->have_posts()) : $team_general->the_post(); ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-profile">
                            <div class="profile-image">
                                <?php if (has_post_thumbnail()) :
                                    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium', true);
                                ?>
                                    <a href="#" class="open-profile"><img src="<?php echo $thumbnail[0]; ?>"></a>
                                <?php else : ?>
                                    <a href="#" class="open-profile">
                                        <img src="<?php echo home_url() . '/wp-content/uploads/2021/05/No-Image.png'; ?>">
                                    </a>
                                <?php endif ?>
                            </div>
                            <div class="profile-content">
                                <h3 class="profile-title"><?php the_title(); ?></h3>
                                <p class="profile-designation"><?php the_field('designation'); ?></p>
                                <div class="contentt" style="display: none;">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <div class="mfp-hide popup-team-info">
        <section class="mfp-with-anim woodmart-promo-popup custom-pad" style="background-color: #ffff;">

            <div class="popup-self">
                <div class="pop-head mt-minus">
                    <div class="profile-image">
                        <?php if (has_post_thumbnail()) :
                            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium', true);
                        ?>
                            <img src="<?php echo $thumbnail[0]; ?>">
                        <?php else : ?>
                            <img src="<?php echo home_url() . '/wp-content/uploads/2021/05/No-Image.png'; ?>">
                        <?php endif ?>
                    </div>
                </div>
                <div class="pop-body">
                    <p class="pop-text">
                        Hi! I am Jaz, a Project Manager, and I get excited with the only thing that’s constant – it’s change. I love dogs and the smell of opening new books. My goals for 2021 is to gain a strategic understanding of the company’s goals, implement relevant initiatives, and execute more high-impact projects with our incredible team!
                    </p>
                </div>
                <div class="pop-footer">
                    <div class="pop-foot">
                        <h3 class="profile-title">Jaz S.</h3>
                        <p class="profile-designation mb-0">PROJECT MANAGER</p>
                    </div>
                </div>
            </div>

        </section>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function($) {

            jQuery(document).on('click', '.open-profile', function(e) {
                e.preventDefault();

                var avatar = jQuery(this).closest('.team-profile').find('.profile-image a img').attr('src');
                var title = jQuery(this).closest('.team-profile').find('.profile-title').text();
                var subtitle = jQuery(this).closest('.team-profile').find('.profile-designation').text();
                var content = jQuery(this).closest('.team-profile').find('.contentt').html();



                jQuery('.popup-team-info .profile-image img').attr('src', avatar);
                jQuery('.popup-team-info .profile-title').text(title);
                jQuery('.popup-team-info .profile-designation').text(subtitle);
                jQuery('.popup-team-info .pop-body').html(content);


                console.log(content);


                jQuery(this).magnificPopup({
                    items: {
                        src: '.popup-team-info',
                        type: 'inline'
                    },
                    fixedContentPos: true,
                    callbacks: {
                        beforeOpen: function() {
                            jQuery('html').addClass('mfp-helper');
                        },
                        close: function() {
                            jQuery('html').removeClass('mfp-helper');
                        }
                    }
                }).magnificPopup('open');

            }); //click ends here	
        });
    </script>






    <?php

    $mainarray = array(
        'post_type' => array('team'),
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => -1,
    );
    ?>

    <div class="row team-main-row">
        <?php while ($q->have_posts()) : $q->the_post(); ?>
            <div class="col-md-3 custom-blog-col">

                <!-- blog -->
                <div class="row custom-events-wrapper">

                    <div class="events-main-wrapper">
                        <div class="event-img-wrapper">
                            <?php if (has_post_thumbnail()) :
                                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', true);
                            ?>
                                <img src="<?php echo $thumbnail[0]; ?>" alt="Picture" class="featured-image">
                            <?php else : ?>
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
                <!-- blog end -->
            </div>
        <?php endwhile; ?>
    </div>



    <div class="col-md-6 img-col">
        <div class="blog-img-wrapper">
            <?php if (has_post_thumbnail()) :
                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', true);
            ?>
                <img src="<?php echo $thumbnail[0]; ?>" alt="Picture" class="featured-image">
            <?php else : ?>
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
                <?php if (!empty(get_the_excerpt())) {
                    echo strip_tags(substr(get_the_excerpt(), 0, 200));
                } else {
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
        'posts_per_page' => 9,

    );
    $q = new WP_Query($mainarray);
    ?>


    <div class="row blog-main-row">
        <?php while ($q->have_posts()) : $q->the_post(); ?>
            <div class="col-md-3 custom-blog-col">

                <!-- blog -->
                <div class="custom-blog-wrapper">

                    <div class="blog-wrapper">
                        <div class="blog-img-wrapper">
                            <?php if (has_post_thumbnail()) :
                                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', true);
                            ?>
                                <img src="<?php echo $thumbnail[0]; ?>" alt="Picture" class="featured-image">
                            <?php else : ?>
                                <?php $placeholder_image_path = '/wp-content/uploads/2023/05/dummy-image-square.jpg'; ?>
                                <img src="<?php echo site_url() . $placeholder_image_path; ?>" alt="Picture" class="featured-image">
                            <?php endif; ?>

                        </div>
                        <div class="blog-content-col">
                            <div class="blog-content">
                                <div class="blog-title-wrapper">
                                    <h4 class="blog-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                </div>
                                <p class="blog-text">
                                    <?php if (!empty(get_the_excerpt())) {
                                        echo strip_tags(substr(get_the_excerpt(), 0, 200));
                                    } else {
                                        echo strip_tags(substr(get_the_content(), 0, 200));
                                    } ?>

                                </p>
                                <div class="blog-btn">
                                    <a href="<?php the_permalink(); ?>">
                                        Read More
                                    </a>
                                </div>
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