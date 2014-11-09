<?php
/**
 * The header for the User Sites theme.
 *
 * Displays all of the <head> section and everything up until
 * <code>&lt;div id="main"&gt;</code>.
 *
 * @package usersites
 * @subpackage theme
 * @since usersites 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php bloginfo('blogname'); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="page" class="hfeed site">
			<?php if (get_header_image()) : ?>
			<div id="site-header">
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
				</a>
			</div>
			<?php endif; ?>
			<div id="main" class="site-main">
