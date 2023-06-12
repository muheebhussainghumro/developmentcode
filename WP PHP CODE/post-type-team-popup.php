<style>
    #team-info-popup {
        max-width: 980px;
        margin: auto;
        position: relative;
    }

    .team-member-img,
    .team-member-img img {
        width: 100%;
        min-height: 320px;
        object-fit: cover;
    }

    #team-info-popup .team-title {
        font-weight: 700 !important;
        font-size: 32px;
        color: #60A0AB;
        margin-bottom: 0;
        text-transform: capitalize !important;
    }

    .team-content-box {
        padding: 10px;
        text-align: center;
    }

    .team-member-inner {
        background: #ffffff;
        border: 1px solid #eaeaea;
        margin-bottom: 30px;
    }

    .team-member-title {
        font-weight: 700;
        font-size: 20px;
        color: #60a0ab;
        margin-bottom: 0 !important;
    }

    .member-contact-link {
        margin-bottom: 0 !important;
    }

    .member-contact-link a {
        font-style: italic;
        font-weight: 275;
        font-size: 14px;
        color: #21335f;
    }

    .team-btn-wrapper .team-link {
        font-weight: 400;
        font-size: 16px;
        text-decoration-line: underline;
        color: #21335f;
    }

    .white-popup {
        background-color: #ffffff;
        padding: 5% 2%;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .white-popup p {
        color: #21335f !important;
    }

    button.mfp-close {
        position: absolute;
        right: 0;
        font-size: 22px;
        color: #B8B8B8 !important;
    }

    @media(max-width:768px) {
        .white-popup.row {
            row-gap: 20px;
        }

        .white-popup h2,
        .white-popup p {
            text-align: center;
        }

        .team-member-img {
            margin-bottom: 20px;
        }
    }
</style>

<?php
$mainarray = array(
    'post_type' => 'team',
    'post_status' => array('publish'),
    'orderby' => 'date',
    'order' => 'ASC',
    'posts_per_page' => -1,
);

$team_general = new WP_Query($mainarray); ?>

<div id="primary" class="main-team-wrapper">
    <div id="main" class="container" style="margin: 0; max-width: 100%; padding: 0;display: inline;">
        <?php
        $team = new WP_Query(array(
            'posts_per_page' => '-1',
            'post_type' => 'team',
            'order' => 'ASC',
        ));
        ?>

        <div class="row">
            <?php while ($team->have_posts()) : $team->the_post(); ?>
                <?php $thumbnail = has_post_thumbnail() ? wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', true)[0] : get_template_directory_uri() . '/images/default.jpg'; ?>
                <div class="col-lg-3 col-sm-4">
                    <div class="team-member-inner">
                        <a href="" class="team-link" data-title="<?php the_title(); ?>" data-thumb="<?php echo $thumbnail; ?>" data-content="<?php the_content(); ?>">
                            <div class="team-member-img">
                                <img src=" <?php echo $thumbnail; ?>" alt="Team Member">
                            </div>
                        </a>
                        <div class="team-content-box">
                            <h3 class="team-member-title"><?php the_title(); ?></h3>
                            <p class="member-contact-link"><a href="mailto:<?php the_field('member_email'); ?>"><?php the_field('member_email'); ?></a></p>
                            <p class="member-contact-link"><a href="tel:<?php the_field('phone_number'); ?>"><?php the_field('phone_number'); ?></a></p>
                            <div class="team-btn-wrapper">
                                <a href="" class="team-link" data-title="<?php the_title(); ?>" data-thumb="<?php echo $thumbnail; ?>" data-content="<?php the_content(); ?>">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<div class="mfp-hide" id="team-info-popup">
    <div class="container">
        <div class="white-popup row">
            <div class="col-md-5">
                <div class="team-member-img">
                    <img src="" alt="Picture">
                </div>
            </div>
            <div class="col-md-7">
                <h2 class="team-title"></h2>
                <p class="team-content"></p>
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
            var content = jQuery(this).data('content');

            jQuery('#team-info-popup h2').text(title);
            jQuery('#team-info-popup .team-member-img img').attr('src', thumbnail);
            jQuery('#team-info-popup p').html(content);

            jQuery.magnificPopup.open({
                items: {
                    src: '#team-info-popup'
                },
                type: 'inline'
            });
        });
    });
</script>