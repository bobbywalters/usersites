<?php
if (false === is_user_logged_in()) {
	echo 'redirect to login page';
	wp_redirect(wp_login_url());
	die;
}
get_header();
$blogs = get_blogs_of_user(get_current_user_id());
if ($blogs) {
	$cbid = get_current_blog_id();
	echo '<div class="user-sites-list"><h1 class="user-sites-title">',
		__('Available Sites', 'usersites'),
		'</h1>';
	$super;
	if ($super = is_super_admin()) {
		echo '<div class="user-site network-site"><h2 class="user-site-title network-title"><a class="user-site-link network-link" href="',
			network_admin_url(),
			'">',
			__('Site Network', 'usersites'),
			'</a></h2><span class="user-site-description">',
			__('The global configuration for all sites within the network.', 'usersites'),
			'</span></div>';
	}
	foreach ($blogs as &$b) {
		switch_to_blog($b->userblog_id);
		echo '<div class="user-site';
		if ($cbid === $b->userblog_id) {
			echo ' user-site-current';
		}
		echo '"><h2 class="user-site-title"><a class="user-site-link" href="',
			$b->siteurl,
			'">',
			$b->blogname,
			'</a>';
		if ($cbid === $b->userblog_id) {
			echo '<span class="user-site-current-indicator" title="',
				esc_attr__('current site', 'usersites'),
				'">*</span>';
		}
		if (true === $super || current_user_can('manage_options')) {
			echo '<a class="user-site-link admin-link" href="',
				admin_url(),
				'">',
				__('Dashboard', 'usersites'),
				'</a>';
		}
		echo '</h2><span class="user-site-description">',
			get_option('blogdescription'),
			'</span></div>';
	}
	unset($b);
	switch_to_blog($cbid);
	echo '<div class="user-site-current-notice">',
		__('* Indicates the current site being viewed.', 'usersites'),
		'</div></div>';
}
get_footer();
