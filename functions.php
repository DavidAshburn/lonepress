<?php

function lone_register_styles() {

	wp_enqueue_style('lone-tailwind', get_template_directory_uri() . './style.css', array(), '1.0', 'all');

}

add_action('wp_enqueue_scripts', 'lone_register_styles');


?>