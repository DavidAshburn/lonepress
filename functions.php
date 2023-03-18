<?php

//------------------------------------------------------------------------------------------------------------
// Enqueue style.css
//------------------------------------------------------------------------------------------------------------

function lone_enqueue_styles() {

	wp_enqueue_style('lone-tailwind', get_template_directory_uri() . './style.css', array(), '3.2.7', 'all');

}

add_action('wp_enqueue_scripts', 'lone_enqueue_styles');

//------------------------------------------------------------------------------------------------------------
// Custom Post Types ( Poets, Poems )
//------------------------------------------------------------------------------------------------------------

function lone_create_poet_type() {
	$poet_labels = array(
		'name' => _X('Poets', 'Post Type General Name', 'lone'),
		'singular_name' => _X('Poet', 'Post Type Singular Name', 'lone'),
		'menu_name' => __('Poets', 'lone'),
		'parent_item_colon' => __('Parent Poet', 'lone'),
		'all_items' => __('All Poets', 'lone'),
		'view_item' => __('View Poet', 'lone'),
		'add_new_item' => __('Add Poet', 'lone'),
		'add_new' => __('Add New', 'lone'),
		'edit_item' => __('Edit Poet', 'lone'),
		'update_item' => __('Update Poet', 'lone'),
		'search_items' => __('Search Poets', 'lone'),
		'not_found' => __('Not Found', 'lone'),
		'not_found_in_trash' => __('Not found in Trash', 'lone')
	);

	$poet_args = array(
		'label' => __('poets', 'lone'),
		'description' => __('LMLS Contributing Poets', 'lone'),
		'labels' => $poet_labels,

		//Post Editor features
		'supports' => array('title', 'excerpt', 'author', 'custom-fields'),

		//associating with taxonomy
		// 'taxonomies' => 

		'heirarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 1,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'show_in_rest' => true
	);

	register_post_type( 'poets', $poet_args);

}

function lone_create_poem_type() {

	register_post_type( 'poems', 
		array(
			'labels' => array(
				'name' => __('Poems'),
				'singular' => __('Poem')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'poems'),
			'show_in_rest' => true
		)
	);
}

add_action('init', 'lone_create_poet_type', 0);
add_action('init', 'lone_create_poem_type');

//------------------------------------------------------------------------------------------------------------

?>