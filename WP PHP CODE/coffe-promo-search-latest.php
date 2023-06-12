<?php

if (!empty($_GET['search'])) :

    $q = array(
        'post_type' => array('organization'),
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => -1,
        's' => $_GET['search'],
        'tax_query'    => array(
            'relation'      => 'OR',
            array(
                'key'       => 'org-category',
                'value'     => $_GET['category'],
                'compare'   => 'LIKE',
            ),
            array(
                'key'       => 'org-location',
                'value'     => $_GET['location'],
                'compare'   => 'LIKE',
            ),
        )
    );
    $q = new WP_Query($q);

else :

    $q = array(
        'post_type' => array('organization'),
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => -1,
    );
    $q = new WP_Query($q);

endif;

?>

<div id="primary" class="main-organization-wrapper">
    <div id="main" class="container" style="margin: 0; max-width: 100%; padding: 0;display: inline;">

        <div class="organization-search-form">
            <form action="" method="get">
                <div class="row cf-field">
                    <div class="col-md-12 search-wrapper">
                        <input type="search" name="search" placeholder="Search" class="field" value="<?php echo esc_attr(get_search_query()); ?>">
                        <div class="search-icon"><i class="far fa-search"></i></div>
                    </div>
                    <div class="col-md-6 search-fields-wrapper">
                        <select name="category" id="category">
                            <option value="">Category</option>
                            <?php
                            $categories = get_terms(array(
                                'taxonomy' => 'org-category',
                                'hide_empty' => false,
                            ));
                            foreach ($categories as $category) {
                                echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 search-fields-wrapper">
                        <select name="location" id="location">
                            <option value="">Location</option>
                            <?php
                            $locations = get_terms(array(
                                'taxonomy' => 'org-location',
                                'hide_empty' => false,
                            ));
                            foreach ($locations as $location) {
                                echo '<option value="' . esc_attr($location->slug) . '">' . esc_html($location->name) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12 submit-btn-wrapper">
                        <input type="submit" value="Find My Organization" class="submit-btn">
                    </div>
                </div>
            </form>
        </div>

        <div class="row organization-main-row">
            <div class="col-md-6 organization-boxes-col">
                <!-- All Organizations -->
                <div class="organization-wrapper">
                    <div class="organization-wrapper-inner">
                        <?php if ($q->have_posts()) : ?>
                            <?php while ($q->have_posts()) : $q->the_post(); ?>
                                <?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', true); ?>
                                <div class="organization-inner">
                                    <a href="" class="team-link" data-title="<?php the_title(); ?>" data-thumb="<?php echo $thumbnail[0]; ?>" data-location="<?php the_field('organization_location'); ?>" data-email="<?php the_field('organization_email'); ?>" data-facebook="<?php the_field('facebook_link'); ?>" data-instagram="<?php the_field('instagram_link'); ?>" data-twitter="<?php the_field('twitter_link'); ?>" data-organizationlink="<?php the_permalink(); ?>">
                                        <div class="organization-box-img">
                                            <img src="<?php echo $thumbnail[0]; ?>" alt="Picture" class="featured-image">
                                        </div>
                                        <div class="organization-content-wrapper">
                                            <div class="organization-content-inner">
                                                <h3 class="organization-title"><?php the_title(); ?></h3>
                                                <p class="organition-info"><i class="fas fa-map-marker"></i><?php echo get_post_meta(get_the_ID(), 'organization_location', true); ?></p>
                                                <p class="organition-info"><i class="fas fa-envelope"></i><?php echo get_post_meta(get_the_ID(), 'organization_email', true); ?></p>
                                            </div>
                                            <div class="organization-btn-wrapper">
                                                <a href="#">Shop Now</a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>

                        <?php else : ?>

                            <p>No post found!</p>

                        <?php endif ?>

                    </div>
                </div>

            </div>
            <div class="col-md-6 organization-detail-col">
                <!-- organization detail -->
                <div class="container">

                    <div class="organization-detail-box">
                        <div class="organization-box-img"><img src="" alt="Organization"></div>
                        <div class="organization-content-wrapper">
                            <div class="organization-content-inner">
                                <h3 class="organization-title"></h3>
                                <p class="organition-info organization-email"></p>
                                <p class="organition-info organization-location"></p>
                            </div>
                            <div class="organization-btn-wrapper">

                            </div>
                        </div>
                    </div>
                    <div class="social-icons-wrapper">
                        <div class="social-icon-item facebook-link"><a href="#"><i class="fab fa-facebook-f"></i></a></div>
                        <div class="social-icon-item insta-link"><a href="#"><i class="fab fa-instagram"></i></a></div>
                        <div class="social-icon-item twitter-link"><a href="#"><i class="fab fa-twitter"></i></a></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function() {

        jQuery('a.team-link').click(function(event) {
            event.preventDefault();
            var title = jQuery(this).data('title');
            var thumbnail = jQuery(this).data('thumb');
            var email = jQuery(this).data('email');
            var location = jQuery(this).data('location');
            var facebook = jQuery(this).data('facebook');
            var instagram = jQuery(this).data('instagram');
            var twitter = jQuery(this).data('twitter');
            var organizationlink = jQuery(this).data('organizationlink');

            jQuery('.organization-detail-col .organization-title').text(title);
            jQuery('.organization-detail-col .organization-box-img img').attr('src', thumbnail);
            jQuery('.organization-detail-col .organization-location').html('<i class="fas fa-map-marker"></i>' + location);
            jQuery('.organization-detail-col .organization-email').html('<a href="mailto:' + email + '"><i class="fas fa-envelope"></i>' + email + '</a>');
            jQuery('.organization-detail-col .facebook-link a').attr('href', facebook);
            jQuery('.organization-detail-col .insta-link a').attr('href', instagram);
            jQuery('.organization-detail-col .twitter-link a').attr('href', twitter);
            jQuery('.organization-detail-col .organization-btn-wrapper').html('<a href="' + organizationlink + '">Shop Now</a>');


        });

        jQuery('.organization-inner:first-child').addClass('active').find('.team-link').trigger('click');
        jQuery('.organization-inner').on('click', function() {
            jQuery('.organization-inner').removeClass('active');
            jQuery(this).addClass('active');
        });


    });
</script>