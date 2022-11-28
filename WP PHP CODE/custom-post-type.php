<?php

/*  == start ==  */

// change this unique fucntion id i.e (home_listing_custom_post_type)
function our_projects_custom_post_type() {

    // change all plural(plural form) and singular(singular form)
    $labels = array(
        'name'               => __( 'events', 'text-domain' ),
        'singular_name'      => __( 'event', 'text-domain' ),
        'add_new'            => _x( 'Add New event', 'text-domain', 'text-domain' ),
        'add_new_item'       => __( 'Add New event', 'text-domain' ),
        'edit_item'          => __( 'Edit event', 'text-domain' ),
        'new_item'           => __( 'New event', 'text-domain' ),
        'view_item'          => __( 'View event', 'text-domain' ),
        'search_items'       => __( 'Search events', 'text-domain' ),
        'not_found'          => __( 'No events found', 'text-domain' ),
        'not_found_in_trash' => __( 'No events found in Trash', 'text-domain' ),
        'parent_item_colon'  => __( 'Parent event:', 'text-domain' ),
        'menu_name'          => __( 'events', 'text-domain' ),
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
        'menu_position'       => 3,
        'menu_icon'           => 'dashicons-beer',
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
    register_post_type( 'our_projects', $args );
}

// change this unique fucntion id i.e (home_listing_custom_post_type)
add_action( 'init', 'our_projects_custom_post_type' );

/*  == end ==  */





// ==== EVENTS POST TYPE ====


function events_custom_post_type() {

    $labels = array(
        'name'               => __( 'Events', 'text-domain' ),
        'singular_name'      => __( 'Event', 'text-domain' ),
        'add_new'            => _x( 'Add New Event', 'text-domain', 'text-domain' ),
        'add_new_item'       => __( 'Add New Event', 'text-domain' ),
        'edit_item'          => __( 'Edit Event', 'text-domain' ),
        'new_item'           => __( 'New Event', 'text-domain' ),
        'view_item'          => __( 'View Event', 'text-domain' ),
        'search_items'       => __( 'Search Events', 'text-domain' ),
        'not_found'          => __( 'No Events found', 'text-domain' ),
        'not_found_in_trash' => __( 'No Events found in Trash', 'text-domain' ),
        'parent_item_colon'  => __( 'Parent Event:', 'text-domain' ),
        'menu_name'          => __( 'Events', 'text-domain' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'description',
        'taxonomies'          => array(),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-site-alt3',
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

    register_post_type( 'events', $args );
}

add_action( 'init', 'Events_custom_post_type' );


