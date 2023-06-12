// <!--- TEAM POST TYPE --->
function team_post_type() {

$labels = array(
'name' => __( 'Teams', 'text-domain' ),
'singular_name' => __( 'Team', 'text-domain' ),
'add_new' => _x( 'Add New Team', 'text-domain', 'text-domain' ),
'add_new_item' => __( 'Add New Team', 'text-domain' ),
'edit_item' => __( 'Edit Team', 'text-domain' ),
'new_item' => __( 'New Team', 'text-domain' ),
'view_item' => __( 'View Team', 'text-domain' ),
'search_items' => __( 'Search Teams', 'text-domain' ),
'not_found' => __( 'No Teams found', 'text-domain' ),
'not_found_in_trash' => __( 'No Teams found in Trash', 'text-domain' ),
'parent_item_colon' => __( 'Parent Team:', 'text-domain' ),
'menu_name' => __( 'Teams', 'text-domain' ),
);

$args = array(
'labels' => $labels,
'hierarchical' => true,
'description' => 'description',
'taxonomies' => array(),
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'show_in_admin_bar' => true,
'menu_position' => 5,
'menu_icon' => 'dashicons-groups',
'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'rewrite' => true,
'capability_type' => 'post',
'supports' => array(
'title',
'editor',
'author',
'thumbnail',
'excerpt',
'page-attributes',
'custom-fields',
),
);

register_post_type( 'team', $args );
}

add_action( 'init', 'team_post_type' );


// <!--- TEAM POST TAXONOMY --->
function team_member_taxonomy() {

$labels = array(
'name' => _x( 'Roles', 'Taxonomy Roles', 'text-domain' ),
'singular_name' => _x( 'Role', 'Taxonomy Role', 'text-domain' ),
'search_items' => __( 'Search Roles', 'text-domain' ),
'popular_items' => __( 'Popular Roles', 'text-domain' ),
'all_items' => __( 'All Roles', 'text-domain' ),
'parent_item' => __( 'Parent Role', 'text-domain' ),
'parent_item_colon' => __( 'Parent Role', 'text-domain' ),
'edit_item' => __( 'Edit Role', 'text-domain' ),
'update_item' => __( 'Update Role', 'text-domain' ),
'add_new_item' => __( 'Add New Role', 'text-domain' ),
'new_item_name' => __( 'New Role Name', 'text-domain' ),
'add_or_remove_items' => __( 'Add or remove Roles', 'text-domain' ),
'choose_from_most_used' => __( 'Choose from most used Roles', 'text-domain' ),
'menu_name' => __( 'Role', 'text-domain' ),
);

$args = array(
'labels' => $labels,
'public' => true,
'show_in_nav_menus' => true,
'show_admin_column' => false,
'hierarchical' => true,
'show_tagcloud' => true,
'show_ui' => true,
'query_var' => true,
'rewrite' => true,
'query_var' => true,
'capabilities' => array(),
);

register_taxonomy( 'team-member-role', array( 'team' ), $args );
}

add_action( 'init', 'team_member_taxonomy' );


========= post type end ===========


<?php

$taxonomyName = "team-member-role";
$parent_terms = get_terms($taxonomyName, array('parent' => 0, 'hide_empty' => true));

// TEAM MEMBERS DESIGNATION LOOP

if ($parent_terms) :
    foreach ($parent_terms as $parent_termsvalue) : ?>

        <h2 class="team-heading-title" id="<?php echo $parent_termsvalue->slug . $parent_termsvalue->term_id; ?>">
            <?php echo $parent_termsvalue->name ?>
        </h2>
        <?php
        $mainarray = array(
            'post_type' => array('team'),
            'post_status' => array('publish'),
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomyName,
                    'field' => 'term_id',
                    'terms' => $parent_termsvalue->term_id,
                )
            ),
        );

        $q = new WP_Query($mainarray); ?>

        <!-- TEAM MEMBERS LOOP -->

        <div class="team-general-section" id="<?php echo $parent_termsvalue->slug . $parent_termsvalue->term_id; ?>">
            <div class="team-general-inner">
                <div class="row">
                    <?php while ($q->have_posts()) : $q->the_post(); ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="team-profile">
                                <div class="profile-name">
                                    <h3 class="profile-title"><?php the_title(); ?></h3>
                                </div>
                                <div class="profile-image">
                                    <?php if (has_post_thumbnail()) :
                                        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium', true);
                                    ?>
                                        <a href="#" class="open-profile"><img src="<?php echo $thumbnail[0]; ?>"></a>
                                    <?php else : ?>
                                        <img src="<?php echo site_url() . '//wp-content/uploads/2022/05/image-1-e1652461110820.jpg'; ?>">
                                    <?php endif ?>
                                </div>
                                <div class="profile-content">
                                    <p class="profile-designation"><a href="#" class="open-profile"><?php the_field('designation'); ?></a></p>
                                    <p class="profile-email"><a href="mailto:<?php the_field('email'); ?>" class="open-profile"><?php the_field('email'); ?></a></p>
                                    <div class="contentt" style="display:none;">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>


<?php
    endforeach;
endif;
?>

<div class="mfp-hide popup-team-info">
    <section class="mfp-with-anim woodmart-promo-popup custom-pad" style="background-color: #ffff;">

        <div class="popup-self">
            <div class="pop-head mt-minus">
                <div class="profile-image">
                    <img src="">
                </div>
                <div class="pop-designation">
                    <h3 class="profile-title"></h3>
                    <p class="profile-designation mb-0"></p>
                    <p class="profile-email mb-0"></p>
                </div>
            </div>
            <div class="pop-body">
                <p class="pop-text"></p>
            </div>
        </div>

    </section>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($) {

        jQuery(document).on('click', '.open-profile, .moreLink', function(event) {
            event.preventDefault();

            var avatar = jQuery(this).closest('.team-profile').find('.profile-image a img').attr('src');
            var title = jQuery(this).closest('.team-profile').find('.profile-title').text();
            var subtitle = jQuery(this).closest('.team-profile').find('.profile-designation').text();
            var content = jQuery(this).closest('.team-profile').find('.contentt').html();
            var mail = jQuery(this).closest('.team-profile').find('.profile-email').html();
            var theParent = jQuery(this).parent().parent().parent().parent().parent().parent().parent().attr('id');
            console.log(theParent);



            jQuery('.popup-team-info .profile-image img').attr('src', avatar);
            jQuery('.popup-team-info .profile-title').text(title);
            jQuery('.popup-team-info .profile-designation').text(subtitle);
            jQuery('.popup-team-info .pop-body').html(content);
            jQuery('.popup-team-info .profile-email').html(mail);
            jQuery('.popup-team-info').addClass(theParent);


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
                        jQuery('.popup-team-info').removeClass('advisors23')
                    }
                }
            }).magnificPopup('open');

        }); //click ends here	
    });
</script>