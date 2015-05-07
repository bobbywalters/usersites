<?php
// Turn off the admin bar
show_admin_bar(false);

function usersites_enqueue_scripts() {
	// Main CSS stylesheet
	wp_enqueue_style('usersites-style', get_stylesheet_uri(), array(), null, 'all');
}
add_action('wp_enqueue_scripts', 'usersites_enqueue_scripts');
