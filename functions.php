<?php

//------------------------------------------------------------------------------------------------------------
// Clean the Admin Bar
//------------------------------------------------------------------------------------------------------------

function lone_remove_from_admin($wp_admin_bar) {
	if ( ! is_admin() ) {
		//front-end only removal
	}
	$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->remove_node('comments');
}

add_action('admin_bar_menu', 'lone_remove_from_admin', 999);

//------------------------------------------------------------------------------------------------------------
// Theme Support
//------------------------------------------------------------------------------------------------------------

function lone_theme_support() {

	//images in posts
	add_theme_support('post-thumbnails');

}

add_action('after_setup_theme', 'lone_theme_support');

//------------------------------------------------------------------------------------------------------------
// Navigation Menus
//------------------------------------------------------------------------------------------------------------

function lone_menus() {

	$locations = array(
		'primary' => 'Primary Navigation',
		'secondary' => 'Secondary Navigation',
		'footer' => 'Footer Menu Items'
	);

	register_nav_menus($locations);
}

add_action('init', 'lone_menus');

//------------------------------------------------------------------------------------------------------------
// Enqueue style.css
//------------------------------------------------------------------------------------------------------------

function lone_enqueue_styles() {

	wp_enqueue_style('lone-tailwind', get_template_directory_uri() . './style.css', array(), '3.2.7', 'all');

}

add_action('wp_enqueue_scripts', 'lone_enqueue_styles');


//------------------------------------------------------------------------------------------------------------
// Custom Taxonomies ( Poets, Artists )
//------------------------------------------------------------------------------------------------------------

function lone_create_poet_taxonomy() {

	$labels = array(
		'name' 							=> _x( 'Poets', 'taxonomy general name' ),
    'singular_name' 		=> _x( 'Poet', 'taxonomy singular name' ),
    'search_items' 			=> __( 'Search Poets' ),
    'all_items' 				=> __( 'All Poets' ),
    'parent_item' 			=> __( 'Parent Poet' ),
    'parent_item_colon' => __( 'Parent Poet:' ),
    'edit_item' 				=> __( 'Edit Poet' ), 
    'update_item' 			=> __( 'Update Poet' ),
    'add_new_item' 			=> __( 'Add New Poet' ),
    'new_item_name' 		=> __( 'New Poet Name' ),
    'menu_name' 				=> __( 'Poet' ),
	);

	$args = array(
		'hierarchical' 			=> true,
    'labels' 						=> $labels,
    'show_ui' 					=> true,
    'show_in_rest' 			=> true,
    'show_admin_column' => true,
    'query_var' 				=> true,
    'rewrite'						=> [ 'slug' => 'poet' ]
	);

	register_taxonomy('poet', [ 'poem' ], $args);
}

function lone_create_artist_taxonomy() {

	$labels = array(
		'name' 							=> _x( 'Artists', 'taxonomy general name' ),
    'singular_name' 		=> _x( 'Artist', 'taxonomy singular name' ),
    'search_items' 			=> __( 'Search Artists' ),
    'all_items' 				=> __( 'All Artists' ),
    'parent_item' 			=> __( 'Parent Artist' ),
    'parent_item_colon' => __( 'Parent Artist:' ),
    'edit_item' 				=> __( 'Edit Artist' ), 
    'update_item' 			=> __( 'Update Artist' ),
    'add_new_item' 			=> __( 'Add New Artist' ),
    'new_item_name' 		=> __( 'New Artist Name' ),
    'menu_name' 				=> __( 'Artist' ),
	);

	$args = array(
		'hierarchical' 			=> true,
    'labels' 						=> $labels,
    'show_ui' 					=> true,
    'show_in_rest' 			=> true,
    'show_admin_column' => true,
    'query_var' 				=> true,
    'rewrite'						=> [ 'slug' => 'artist' ]
	);

	register_taxonomy('artist', [ 'art_piece' ], $args);
}

add_action( 'init', 'lone_create_poet_taxonomy', 0);
add_action( 'init', 'lone_create_artist_taxonomy', 0);

//------------------------------------------------------------------------------------------------------------
// Custom Post Types ( Poems, Art, Issues )
//------------------------------------------------------------------------------------------------------------

function lone_create_poem_type() {
	$poem_labels = array(
		'name' 								=> _X('Poems', 'Post Type General Name', 'lone'),
		'singular_name' 			=> _X('Poem', 'Post Type Singular Name', 'lone'),
		'menu_name' 					=> __('Poems', 'lone'),
		'parent_item_colon' 	=> __('Parent Poem:', 'lone'),
		'all_items' 					=> __('All Poems', 'lone'),
		'view_item' 					=> __('View Poem', 'lone'),
		'add_new_item' 				=> __('Add Poem', 'lone'),
		'add_new' 						=> __('Add New', 'lone'),
		'edit_item' 					=> __('Edit Poem', 'lone'),
		'update_item' 				=> __('Update Poem', 'lone'),
		'search_items' 				=> __('Search Poems', 'lone'),
		'not_found' 					=> __('Not Found', 'lone'),
		'not_found_in_trash'	=> __('Not found in Trash', 'lone')
	);

	$poem_args = array(
		'label' 							=> __('poems', 'lone'),
		'description' 				=> __('Poems', 'lone'),
		'labels' 							=> $poem_labels,

		//Post Editor features
		'supports' 						=> array('title', 'editor', 'excerpt', 'author', 'custom-fields'),

		//associating with taxonomy
		'taxonomies' 					=> array('poet'),

		'heirarchical' 				=> true,
		'public' 							=> true,
		'rewrite' 						=> array('slug' => 'poems'),
		'show_ui' 						=> true,
		'show_in_menu' 				=> true,
		'can_export' 					=> true,
		'has_archive' 				=> true,
		'exclude_from_search' => false,
		'publicly_queryable' 	=> true,
		'capability_type' 		=> 'post',
		'show_in_rest' 				=> true
	);
	register_post_type( 'poems', $poem_args);
}

function lone_create_art_piece_type() {
	$art_labels = array(
		'name' 								=> _X('Art', 'Post Type General Name', 'lone'),
		'singular_name' 			=> _X('Art', 'Post Type Singular Name', 'lone'),
		'menu_name' 					=> __('Art', 'lone'),
		'parent_item_colon' 	=> __('Art:', 'lone'),
		'all_items' 					=> __('All Art', 'lone'),
		'view_item' 					=> __('View Piece', 'lone'),
		'add_new_item' 				=> __('Add Piece', 'lone'),
		'add_new' 						=> __('Add New', 'lone'),
		'edit_item' 					=> __('Edit Piece', 'lone'),
		'update_item'					=> __('Update Piece', 'lone'),
		'search_items' 				=> __('Search Art', 'lone'),
		'not_found' 					=> __('Not Found', 'lone'),
		'not_found_in_trash' 	=> __('Not found in Trash', 'lone')
	);

	$art_args = array(
		'label' 							=> __('art', 'lone'),
		'description' 				=> __('Art Pieces', 'lone'),
		'labels' 							=> $art_labels,

		//Post Editor features
		'supports' 						=> array('title', 'thumbnail', 'custom-fields'),

		//associating with taxonomy
		'taxonomies' 					=> array('artist'),

		'heirarchical' 				=> true,
		'public' 							=> true,
		'rewrite' 						=> array('slug' => 'art'),
		'show_ui' 						=> true,
		'show_in_menu' 				=> true,
		'can_export' 					=> true,
		'has_archive' 				=> true,
		'exclude_from_search' => false,
		'publicly_queryable' 	=> true,
		'capability_type' 		=> 'post',
		'show_in_rest' 				=> true
	);
	register_post_type( 'art', $art_args);
}

function lone_create_issue_type() {
	$issue_labels = array(
		'name' 								=> _X('Issues', 'Post Type General Name', 'lone'),
		'singular_name' 			=> _X('Issue', 'Post Type Singular Name', 'lone'),
		'menu_name' 					=> __('Issues', 'lone'),
		'parent_item_colon' 	=> __('Parent Issue:', 'lone'),
		'all_items' 					=> __('All Issues', 'lone'),
		'view_item' 					=> __('View Issue', 'lone'),
		'add_new_item' 				=> __('Add Issue', 'lone'),
		'add_new' 						=> __('Add New', 'lone'),
		'edit_item' 					=> __('Edit Issue', 'lone'),
		'update_item' 				=> __('Update Issue', 'lone'),
		'search_items' 				=> __('Search Issues', 'lone'),
		'not_found' 					=> __('Not Found', 'lone'),
		'not_found_in_trash'	=> __('Not found in Trash', 'lone')
	);

	$issue_args = array(
		'label' 							=> __('issues', 'lone'),
		'description' 				=> __('Issues', 'lone'),
		'labels' 							=> $issue_labels,

		//Post Editor features
		'supports' 						=> array('title', 'editor', 'excerpt', 'attachment', 'custom-fields'),

		//associating with taxonomy
		'taxonomies' 					=> array(),

		'heirarchical' 				=> true,
		'public' 							=> true,
		'rewrite' 						=> array('slug' => 'issues'),
		'show_ui' 						=> true,
		'show_in_menu' 				=> true,
		'can_export' 					=> true,
		'has_archive' 				=> true,
		'exclude_from_search' => false,
		'publicly_queryable' 	=> true,
		'capability_type' 		=> 'post',
		'show_in_rest' 				=> true
	);
	register_post_type( 'issues', $issue_args);
}

add_action('init', 'lone_create_poem_type', 0);
add_action('init', 'lone_create_art_piece_type', 0);
add_action('init', 'lone_create_issue_type', 0);

