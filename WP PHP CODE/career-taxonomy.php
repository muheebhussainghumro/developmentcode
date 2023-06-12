<?php
$terms = get_terms(array('taxonomy'   => 'career-taxonomy', 'hide_empty' => true, 'parent' => 0,));
if (!empty($terms) && is_array($terms)) :
?>
    <div class="career-tax-row">
        <div class="career-tax-owl owl-carousel">
            <?php foreach ($terms as $term) : ?>
                <div class="career-tax-col">
                    <div class="custom-career-tax-box">
                        <a href="#" class="cta-tax" data-id="<?php echo $term->term_id; ?>"></a>
                        <div class="career-tax-icon">
                            <?php
                            $image_id = get_term_meta($term->term_id, 'category_image', true);
                            echo wp_get_attachment_image($image_id);
                            ?>
                        </div>
                        <div class="career-tax-title">
                            <h4><?php echo $term->name; ?></h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<div class="job-wrapper" id="getJobs"></div>

<!-- Job Detail Popup -->
<div class="mfp-hide job-popup">
    <div class="mfp-with-anim woodmart-promo-popup" style="background-color: #ffff;">
        <div class="pop-job-details" id="jobHandler">
            <h3 class="pop-job-title"></h3>
            <div class="pop-job-content">
                <label class="pop-job-details-label">Job Description</label>
                <div class="pop-job-text"></div>
            </div>
            <div class="pop-job-action">
                <button class="job-apply-btn" id="jobApplyBtn" data-id="">Apply Now <svg width="30" height="12" viewBox="0 0 30 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 6.35365H27.5779L23.5962 10.4727L24.4909 11.3982L30 5.6991L24.4909 0L23.5962 0.925524L27.5779 5.04456H0V6.35365Z" fill="white" />
                    </svg></button>
            </div>
        </div>
    </div>
</div>