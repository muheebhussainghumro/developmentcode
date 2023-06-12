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

// press release 
function press_release_custom_post_type() {

    // change all plural(plural form) and singular(singular form)
    $labels = array(
        'name'               => __( 'Press Release', 'text-domain' ),
        'singular_name'      => __( 'Press Release', 'text-domain' ),
        'add_new'            => _x( 'Add New Press Release', 'text-domain', 'text-domain' ),
        'add_new_item'       => __( 'Add New Press Release', 'text-domain' ),
        'edit_item'          => __( 'Edit Press Release', 'text-domain' ),
        'new_item'           => __( 'New Press Release', 'text-domain' ),
        'view_item'          => __( 'View Press Release', 'text-domain' ),
        'search_items'       => __( 'Search Press Release', 'text-domain' ),
        'not_found'          => __( 'No Press Release found', 'text-domain' ),
        'not_found_in_trash' => __( 'No Press Release found in Trash', 'text-domain' ),
        'parent_item_colon'  => __( 'Parent Press Release:', 'text-domain' ),
        'menu_name'          => __( 'Press Release', 'text-domain' ),
    );

    // add icon in menu_icon from dashicon
    // set position in menu_position i.e (5)
    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'description',
        'taxonomies'          => array(),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-admin-site-alt2',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
        'supports'            => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'custom-fields',
            'trackbacks',
            'comments',
            'revisions',
            'page-attributes',
            'post-formats',
        ),
    );

    // change slug i.e (team , home_listing)
    register_post_type( 'press_release', $args );
}

// change this unique fucntion id i.e (home_listing_custom_post_type)
add_action( 'init', 'press_release_custom_post_type' );

?>




<?php      
    $mainarray = array(
        'post_type' => array('press_release'),
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 2,
       
    );
    $q = new WP_Query($mainarray); 
?>

<div class="row press-release-main-row">
    <?php while ($q->have_posts()) : $q->the_post(); ?>
        <div class="col-md-4 col-sm-6 press-release-main-wrapper">
            <div class="press-release-inner">
            <div class="media-image">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()):
$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
?>
                    <img src="<?php echo $thumbnail[0]; ?>" alt="Picture" class="featured-image">
                    <?php else: ?>
                    <img src="<?php echo site_url('PATH'); ?>" alt="Picture" class="featured-image">
                    <?php endif; ?>
                </a>
            </div>
                <div class="row media-date-wrapper">
                    <div class="col-md-6">
                        <div class="media-title">
                            <p><?php the_field('press_label'); ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <p class="media-date">
                            <?php echo get_the_date('d m Y'); ?>
                        </p>
                    </div>
                </div>
                <div class="media-content-wrapper">
                    <p class="media-text">
                    <?php if(!empty(get_the_excerpt())){
                        echo strip_tags(substr(get_the_excerpt(), 0, 200));
                    }
                    else{
                        echo strip_tags(substr(get_the_content(), 0, 200));
                    } ?>
                    </p>
                </div>
            </div>    
        </div>
    <?php endwhile; wp_reset_postdata();?>
</div>


</body>
</html>