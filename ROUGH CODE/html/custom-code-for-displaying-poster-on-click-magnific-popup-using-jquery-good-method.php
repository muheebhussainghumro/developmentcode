<style>
    .white-popup {
        background-color: #ffffff;
    }

    .white-popup {
        padding: 5% 2%;
        justify-content: center;
        align-items: center;
    }

    .no-space {
        padding: 0 !important;
    }

    .site-content {
        margin-bottom: 0px !important;
    }

    .white-popup h2 {
        text-transform: uppercase;
        font-weight: 500;
    }

    .white-popup p {
        color: #000 !important;
    }

    .white-popup {
        position: relative;
    }

    button.mfp-close {
        position: absolute;
        right: 20%;
    }

    button.mfp-close:after {
        color: #000 !important;
        font-weight: 900;
        position: absolute;
        top: 0;
    }

    button.mfp-close {
        transition: 0.3s ease-in-out;
    }

    button.mfp-close:hover {
        background: none;
        transform: scale(0.8)
    }

    @media(max-width:1024px) {
        button.mfp-close {
            right: 20px;
        }
    }

    @media(max-width:768px) {
        .podcast-img-popup {
            text-align: center;
        }

        .white-popup.row {
            row-gap: 20px;
        }

        .white-popup h2,
        .white-popup p {
            text-align: center;
        }

        .row.pod-link {
            text-align: center;
            row-gap: 10px;
        }
    }

    .search-wrapper {
        display: flex;
        justify-content: center;
        margin: 20px 0;
    }

    .search-input {
        text-align: center;
        padding: 10px;
        border-radius: 5px;
        width: 50%;
        max-width: 400px;
        font-size: 16px;
        outline: none;
    }

    .search-wrapper input {
        border: none;
        border-bottom: 2px solid #C2C2C2;
        color: #C2C2C2 !important;
    }

    .search-wrapper {
        max-width: 50%;
        margin-left: auto;
        margin-right: auto;
    }

    @media(max-width:767px) {}
</style>

<?php get_header(); ?>

<div id="primary" class="main-podcast-wrapper">
    <div id="main" class="container" style="margin: 0; max-width: 100%; padding: 0;display: inline;">
        <?php
        $podcasts = new WP_Query(array(
            'posts_per_page' => '-1',
            'post_type' => 'podcast',
            'order' => 'ASC',
        ));
        ?>

        <div class="row">
            <?php while ($podcasts->have_posts()) : $podcasts->the_post(); ?>
                <?php $thumbnail = has_post_thumbnail() ? wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', true)[0] : get_template_directory_uri() . '/images/default.jpg'; ?>
                <div class="col-md-4 no-space">
                    <a href="#" class="podcast-link" data-title="<?php the_title(); ?>" data-thumb="<?php echo $thumbnail; ?>" data-content="<?php the_content(); ?>" data-apple="<?php echo esc_url(get_field('apple_podcast_url')); ?>" data-spotify="<?php echo esc_url(get_field('spotify_podcast_url')); ?>" data-youtube="<?php echo esc_url(get_field('youtube_podcast_url')); ?>">
                        <div class="podcast-img" style="position: relative;">
                            <img src="<?php echo $thumbnail; ?>" alt="Picture" style="width: 100%; height: auto; display: block; max-width: 100%; max-height: 100%;">
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<div class="mfp-hide" id="podcast-popup">
    <div class="container">
        <div class="white-popup row">
            <div class="col-md-5">
                <div class="podcast-img-popup">
                    <img src="" alt="Picture">
                </div>
            </div>
            <div class="col-md-7">
                <h2></h2>
                <p></p>
                <div class="row pod-link">
                    <div class="col-md-4">
                        <a class="apple" href="" target="_blank"><img src="https://hoffstudios.com/wp-content/uploads/2021/11/apple.png"></a>
                    </div>
                    <div class="col-md-4">
                        <a class="spotify" href="" target="_blank"><img src="https://hoffstudios.com/wp-content/uploads/2021/11/spotify.png"></a>
                    </div>
                    <div class="col-md-4">
                        <a class="youtube" href="" target="_blank"><img src="https://hoffstudios.com/wp-content/uploads/2021/11/youtube.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function() {
        jQuery('.podcast-link').click(function() {
            var title = jQuery(this).data('title');
            var thumbnail = jQuery(this).data('thumb');
            var content = jQuery(this).data('content');
            var apple = jQuery(this).data('apple');
            var spotify = jQuery(this).data('spotify');
            var youtube = jQuery(this).data('youtube');

            jQuery('#podcast-popup h2').text(title);
            jQuery('#podcast-popup .podcast-img-popup img').attr('src', thumbnail);
            jQuery('#podcast-popup p').html(content);
            jQuery('#podcast-popup a.apple').attr('href', apple);
            jQuery('#podcast-popup a.spotify').attr('href', spotify);
            jQuery('#podcast-popup a.youtube').attr('href', youtube);

            jQuery.magnificPopup.open({
                items: {
                    src: '#podcast-popup'
                },
                type: 'inline'
            });
        });
    });
</script>
<?php get_footer(); ?>