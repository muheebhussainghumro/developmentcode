<?php 



function gardern_custom_post_type() {

	$labels = array(
		'name'               => __( 'Chumash Gardens', 'text-domain' ),
		'singular_name'      => __( 'Chumash Garden', 'text-domain' ),
		'add_new'            => _x( 'Add New Chumash Garden', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Chumash Garden', 'text-domain' ),
		'edit_item'          => __( 'Edit Chumash Garden', 'text-domain' ),
		'new_item'           => __( 'New Chumash Garden', 'text-domain' ),
		'view_item'          => __( 'View Chumash Garden', 'text-domain' ),
		'search_items'       => __( 'Search Chumash Gardens', 'text-domain' ),
		'not_found'          => __( 'No Chumash Gardens found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Chumash Gardens found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Chumash Garden:', 'text-domain' ),
		'menu_name'          => __( 'Chumash Gardens', 'text-domain' ),
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
		'menu_position'       => null,
		'menu_icon'           => null,
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

	register_post_type( 'garden', $args );
}

add_action( 'init', 'gardern_custom_post_type' );





// ==== chumash_gardens POST TYPE ====

function chumash_garden_custom_post_type() {

    // change all plural(plural form) and singular(singular form)
    $labels = array(
        'name'               => __( 'chumash_gardens', 'text-domain' ),
        'singular_name'      => __( 'chumash_garden', 'text-domain' ),
        'add_new'            => _x( 'Add New chumash_garden', 'text-domain', 'text-domain' ),
        'add_new_item'       => __( 'Add New chumash_garden', 'text-domain' ),
        'edit_item'          => __( 'Edit chumash_garden', 'text-domain' ),
        'new_item'           => __( 'New chumash_garden', 'text-domain' ),
        'view_item'          => __( 'View chumash_garden', 'text-domain' ),
        'search_items'       => __( 'Search chumash_gardens', 'text-domain' ),
        'not_found'          => __( 'No chumash_gardens found', 'text-domain' ),
        'not_found_in_trash' => __( 'No chumash_gardens found in Trash', 'text-domain' ),
        'parent_item_colon'  => __( 'Parent chumash_garden:', 'text-domain' ),
        'menu_name'          => __( 'chumash_gardens', 'text-domain' ),
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
        'menu_icon'           => 'dashicons-admin-multisite',
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
    register_post_type( 'chumash_gardens', $args );
}

// change this unique fucntion id i.e (home_listing_custom_post_type)
add_action( 'init', 'chumash_gardens_custom_post_type' );


?>