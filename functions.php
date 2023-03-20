<?php

//------------------------------------------------------------------------------------------------------------
// Enqueue style.css
//------------------------------------------------------------------------------------------------------------

function lone_enqueue_styles() {

	wp_enqueue_style('lone-tailwind', get_template_directory_uri() . './style.css', array(), '3.2.7', 'all');

}

add_action('wp_enqueue_scripts', 'lone_enqueue_styles');


//------------------------------------------------------------------------------------------------------------
// Custom Taxonomies ( Poets )
//------------------------------------------------------------------------------------------------------------

function lone_create_poet_taxonomy() {

	$labels = array(
		'name' 				=> _x( 'Poets', 'taxonomy general name' ),
    	'singular_name' 	=> _x( 'Poet', 'taxonomy singular name' ),
    	'search_items' 		=> __( 'Search Poets' ),
    	'all_items' 		=> __( 'All Poets' ),
    	'parent_item' 		=> __( 'Parent Poet' ),
    	'parent_item_colon' => __( 'Parent Poet:' ),
    	'edit_item' 		=> __( 'Edit Poet' ), 
    	'update_item' 		=> __( 'Update Poet' ),
    	'add_new_item' 		=> __( 'Add New Poet' ),
    	'new_item_name' 	=> __( 'New Poet Name' ),
    	'menu_name' 		=> __( 'Poet' ),
	);

	$args = array(
		'hierarchical' 		=> true,
    	'labels' 			=> $labels,
    	'show_ui' 			=> true,
    	'show_in_rest' 		=> true,
    	'show_admin_column' => true,
    	'query_var' 		=> true,
    	'rewrite'			=> [ 'slug' => 'poet' ]
	);

	register_taxonomy('poet', [ 'poem' ], $args);
}

add_action( 'init', 'lone_create_poet_taxonomy', 0);

//------------------------------------------------------------------------------------------------------------
// Custom Post Types ( Poems )
//------------------------------------------------------------------------------------------------------------

function lone_create_poem_type() {
	$poem_labels = array(
		'name' => _X('Poems', 'Post Type General Name', 'lone'),
		'singular_name' => _X('Poem', 'Post Type Singular Name', 'lone'),
		'menu_name' => __('Poems', 'lone'),
		'parent_item_colon' => __('Parent Poem', 'lone'),
		'all_items' => __('All Poems', 'lone'),
		'view_item' => __('View Poem', 'lone'),
		'add_new_item' => __('Add Poem', 'lone'),
		'add_new' => __('Add New', 'lone'),
		'edit_item' => __('Edit Poem', 'lone'),
		'update_item' => __('Update Poem', 'lone'),
		'search_items' => __('Search Poems', 'lone'),
		'not_found' => __('Not Found', 'lone'),
		'not_found_in_trash' => __('Not found in Trash', 'lone')
	);

	$poem_args = array(
		'label' => __('poems', 'lone'),
		'description' => __('Poems', 'lone'),
		'labels' => $poem_labels,

		//Post Editor features
		'supports' => array('title', 'editor', 'excerpt', 'author', 'custom-fields'),

		//associating with taxonomy
		'taxonomies' => array('poet'),

		'heirarchical' => true,
		'public' => true,
		'rewrite' => array('slug' => 'poems'),
		'show_ui' => true,
		'show_in_menu' => true,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'show_in_rest' => true
	);

	register_post_type( 'poems', $poem_args);

}

add_action('init', 'lone_create_poem_type', 0);

