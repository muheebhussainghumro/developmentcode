<?php

// change this unique fucntion id i.e (home_listing_custom_post_type)
function Careers_custom_post_type()
{

    // change all plural(plural form) and singular(singular form)
    $labels = array(
        'name'               => __('Careers', 'text-domain'),
        'singular_name'      => __('Career', 'text-domain'),
        'add_new'            => _x('Add New Career', 'text-domain', 'text-domain'),
        'add_new_item'       => __('Add New Career', 'text-domain'),
        'edit_item'          => __('Edit Career', 'text-domain'),
        'new_item'           => __('New Career', 'text-domain'),
        'view_item'          => __('View Career', 'text-domain'),
        'search_items'       => __('Search Careers', 'text-domain'),
        'not_found'          => __('No Careers found', 'text-domain'),
        'not_found_in_trash' => __('No Careers found in Trash', 'text-domain'),
        'parent_item_colon'  => __('Parent Career:', 'text-domain'),
        'menu_name'          => __('Careers', 'text-domain'),
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
        'menu_icon'           => 'dashicons-admin-post',
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
    register_post_type('Careers', $args);
}

// change this unique fucntion id i.e (home_listing_custom_post_type)
add_action('init', 'Careers_custom_post_type');


// ==== EVENTS POST TYPE ====


function events_custom_post_type()
{

    $labels = array(
        'name'               => __('Events', 'text-domain'),
        'singular_name'      => __('Event', 'text-domain'),
        'add_new'            => _x('Add New Event', 'text-domain', 'text-domain'),
        'add_new_item'       => __('Add New Event', 'text-domain'),
        'edit_item'          => __('Edit Event', 'text-domain'),
        'new_item'           => __('New Event', 'text-domain'),
        'view_item'          => __('View Event', 'text-domain'),
        'search_items'       => __('Search Events', 'text-domain'),
        'not_found'          => __('No Events found', 'text-domain'),
        'not_found_in_trash' => __('No Events found in Trash', 'text-domain'),
        'parent_item_colon'  => __('Parent Event:', 'text-domain'),
        'menu_name'          => __('Events', 'text-domain'),
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

    register_post_type('events', $args);
}

add_action('init', 'Events_custom_post_type');


// Team Post Type

function team_custom_post_type()
{

    // change all plural(plural form) and singular(singular form)
    $labels = array(
        'name'               => __('team', 'text-domain'),
        'singular_name'      => __('team', 'text-domain'),
        'add_new'            => _x('Add New team', 'text-domain', 'text-domain'),
        'add_new_item'       => __('Add New team', 'text-domain'),
        'edit_item'          => __('Edit team', 'text-domain'),
        'new_item'           => __('New team', 'text-domain'),
        'view_item'          => __('View team', 'text-domain'),
        'search_items'       => __('Search team', 'text-domain'),
        'not_found'          => __('No team found', 'text-domain'),
        'not_found_in_trash' => __('No team found in Trash', 'text-domain'),
        'parent_item_colon'  => __('Parent team:', 'text-domain'),
        'menu_name'          => __('team', 'text-domain'),
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
        'menu_position'       => 5,
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

    register_post_type('team', $args);
}

add_action('init', 'team_custom_post_type');


// Featured Listing 

function listings_custom_post_type()
{

    $labels = array(
        'name'               => __('listings', 'text-domain'),
        'singular_name'      => __('listing', 'text-domain'),
        'add_new'            => _x('Add New listing', 'text-domain', 'text-domain'),
        'add_new_item'       => __('Add New listing', 'text-domain'),
        'edit_item'          => __('Edit listing', 'text-domain'),
        'new_item'           => __('New listing', 'text-domain'),
        'view_item'          => __('View listing', 'text-domain'),
        'search_items'       => __('Search listings', 'text-domain'),
        'not_found'          => __('No listings found', 'text-domain'),
        'not_found_in_trash' => __('No listings found in Trash', 'text-domain'),
        'parent_item_colon'  => __('Parent listing:', 'text-domain'),
        'menu_name'          => __('listings', 'text-domain'),
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
        'menu_icon'           => 'dashicons-admin-home',
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

    register_post_type('listing', $args);
}

add_action('init', 'listings_custom_post_type');
