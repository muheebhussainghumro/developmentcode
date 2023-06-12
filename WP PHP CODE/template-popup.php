wp_enqueue_style('magnific-css', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css', array(), '2.3.4', 'all' );
wp_enqueue_script('magnific-js', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array(), '2.3.4', true );




<style>
    /* CAREER PAGE */

    .job-popup {
        max-width: 800px;
        margin: auto;
        position: relative;
    }

    .job-popup .woodmart-promo-popup {
        background: #ffffff;
        border-radius: 20px;
        padding: 5%;
        max-width: 800px;
        margin: auto;
    }

    .career-main-row>.career-main-wrapper {
        border-bottom: 1px solid #9e9e9e;
        padding: 30px 20px 10px;
    }

    .career-content-wrapper,
    .career-content-wrapper p {
        font-weight: 300;
        font-size: 16px;
        line-height: 35px;
        color: #1e1e1e;
    }

    .career-title {
        font-weight: 700;
        font-size: 24px;
        color: #1e1e1e;
    }

    .job-popup-btn {
        background: #0f3875;
        border-radius: 10px;
        color: #fff !important;
        justify-content: center !important;
        min-width: 160px !important;
        padding: 20px;
        font-weight: 400 !important;
        text-transform: capitalize;
        font-size: 16px !important;
    }

    .career-form .attachment-field ::-webkit-file-upload-button {
        display: none;
    }

    .career-form .attachment-field input {
        border: 2px solid #0f3875;
        border-radius: 10px;
        width: 180px;
        padding: 20px 20px 20px 55px;
        font-size: 13px;
        color: #0f3875;
        transition: 0.2s ease-in-out;
        cursor: pointer;
    }

    .career-form .field {
        border: 1px solid #c3c3c3;
        height: 60px !important;
    }

    .career-form .attachment-field span.wpcf7-form-control-wrap {
        text-align: center !important;
    }

    .career-form .attachment-field input.resume-btn::-webkit-file-upload-button {
        display: none;
    }

    .career-form .attachment-field span.wpcf7-form-control-wrap:before {
        content: "";
        background: url(https://eseo.space/websites/hsigroupinc/wp-content/uploads/2023/06/resume.png);
        width: 23px;
        height: 23px;
        display: block;
        position: absolute;
        background-size: contain;
        background-repeat: no-repeat;
        top: 18px;
        left: 25px;
        pointer-events: none;
    }

    .career-form .attachment-field,
    .career-form .attachment-field span.wpcf7-form-control-wrap {
        position: relative;
        margin-right: 10px;
    }

    .form-title-wrapper {
        text-align: center;
    }

    .form-title-wrapper h4 {
        font-weight: 700;
        font-size: 44px;
        color: #1e1e1e;
    }

    .career-form .field-item.attachment-field {
        display: flex;
    }

    .career-form .attachment-field,
    .career-form .attachment-field>p {
        display: flex;
        align-items: center;
    }

    .career-form .attachment-field label {
        font-weight: 300;
        font-size: 18px;
        color: #1e1e1e;
        margin-right: 10px;
    }

    .career-form .submit-btn-wrapper {
        text-align: center;
        padding-top: 30px;
    }

    .career-form .submit-btn-wrapper input.submit-btn {
        min-width: 140px !important;
        text-align: center !important;
        font-size: 18px;
        display: inline-block !important;
    }

    @media (min-width:992px) {
        .career-btn-wrapper {
            text-align: right;
        }
    }

    @media (max-width:991px) {
        .career-btn-wrapper {
            margin-bottom: 20px;
        }
    }
</style>

<div class="col-md-3 career-btn-wrapper">
    <a class="btn job-popup-btn" data-job-title="<?php the_title(); ?>">Apply Now</a>
</div>


<div class="mfp-hide job-popup">
    <div class="mfp-with-anim woodmart-promo-popup" style="background-color: #ffff;">
        <div class="pop-job-details" id="jobHandler">
            <div class="career-form-wrapper">
                <?php echo do_shortcode('[contact-form-7 id="8" title="Career Form"]') ?>
            </div>
        </div>
    </div>
</div>


<script>
    jQuery(document).ready(function($) {
        jQuery(document).on('click', '.job-popup-btn', function(event) {
            event.preventDefault();

            var title = jQuery(this).attr("data-job-title");
            jQuery('#job-title').val(title);

            jQuery(this).magnificPopup({
                items: {
                    src: '.job-popup',
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
        });
    });
</script>