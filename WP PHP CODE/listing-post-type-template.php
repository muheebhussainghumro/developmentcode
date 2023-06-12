<?php
$mainarray = array(
    'post_type' => 'listing',
    'post_status' => array('publish'),
    'orderby' => 'date',
    'order' => 'ASC',
    'posts_per_page' => -1,
);

$team_general = new WP_Query($mainarray); ?>


<div class="row featured-listings">
    <?php while ($team_general->have_posts()) : $team_general->the_post(); ?>
        <div class="col-md-6 col-lg-4">
            <div class="listing-wrap">
                <a href="#" class="listing-thumbnail">
                    <img src="https://eseo.space/websites/seven6realty/wp-content/uploads/2023/03/image-7-min.jpg" />
                </a>
                <div class="listing-content">
                    <h4 class="title">
                        <a href="#"><?php the_field('listing_price'); ?></a>
                    </h4>
                    <p class="short-desc"><?php the_content(); ?></p>
                    <div class="row listing-meta-row">
                        <div class="col-auto">
                            <span class="listing-meta-item"> Beds: <strong><?php the_field('beds'); ?></strong> </span>
                        </div>
                        <div class="col-auto">
                            <span class="listing-meta-item"> Baths: <strong><?php the_field('baths'); ?></strong> </span>
                        </div>
                        <div class="col-auto">
                            <span class="listing-meta-item">
                                Sqft: <strong><?php the_field('sqft'); ?></strong>
                            </span>
                        </div>
                        <div class="col-auto">
                            <span class="listing-meta-item">
                                Acres: <strong><?php the_field('acres'); ?></strong>
                            </span>
                        </div>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="btn btn-style-link">View Listing</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>



<div class="col-md-6 col-lg-4">
    <div class="listing-wrap">
        <a href="#" class="listing-thumbnail">
            <img src="https://eseo.space/websites/seven6realty/wp-content/uploads/2023/03/image-6-min.jpg" />
        </a>
        <div class="listing-content">
            <h4 class="title">
                <a href="#">$325,000</a>
            </h4>
            <p class="short-desc">1718 Millbrae Road Clebourne, Texas</p>
            <div class="row listing-meta-row">
                <div class="col-auto">
                    <span class="listing-meta-item"> Beds: <strong>4</strong> </span>
                </div>
                <div class="col-auto">
                    <span class="listing-meta-item"> Baths: <strong>3</strong> </span>
                </div>
                <div class="col-auto">
                    <span class="listing-meta-item">
                        Sqft: <strong>2,586</strong>
                    </span>
                </div>
                <div class="col-auto">
                    <span class="listing-meta-item">
                        Acres: <strong>0.201</strong>
                    </span>
                </div>
            </div>
            <a href="#" class="btn btn-style-link">View Listing</a>
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-4">
    <div class="listing-wrap">
        <a href="#" class="listing-thumbnail">
            <img src="https://eseo.space/websites/seven6realty/wp-content/uploads/2023/03/image-5-min.jpg" />
        </a>
        <div class="listing-content">
            <h4 class="title">
                <a href="#">$317,500</a>
            </h4>
            <p class="short-desc">812 Quail Terrace Mansfield, Texas</p>
            <div class="row listing-meta-row">
                <div class="col-auto">
                    <span class="listing-meta-item"> Beds: <strong>4</strong> </span>
                </div>
                <div class="col-auto">
                    <span class="listing-meta-item"> Baths: <strong>3</strong> </span>
                </div>
                <div class="col-auto">
                    <span class="listing-meta-item">
                        Sqft: <strong>2,586</strong>
                    </span>
                </div>
                <div class="col-auto">
                    <span class="listing-meta-item">
                        Acres: <strong>0.201</strong>
                    </span>
                </div>
            </div>
            <a href="#" class="btn btn-style-link">View Listing</a>
        </div>
    </div>
</div>
</div>