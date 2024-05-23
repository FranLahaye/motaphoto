<?php
/*
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); /* get language setup from WP */ ?>> 
<head>
    <meta charset="<?php bloginfo( 'charset' ); /* UTF-8 by default */ ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php echo esc_html( get_bloginfo( 'name' )); /* get site name from WP */ ?></title>

    <?php wp_head();  /* load scripts and CSS styles */ ?>
</head>

<body <?php body_class(); ?>>
    
    <?php wp_body_open(); ?>

	<header>
		<div class="header_bar">

			<a href="<?php echo home_url( '/' ); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_Nathalie_Mota.png" alt="Logo" class="sitelogo">
			</a>

			<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
				<nav class="navigation_bar menu_desktop"> <!-- menu navbar for desktop -->
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'header-menu',
							'container' => false,
							'menu_class' => 'header_menu',
						)
					);
					?>
				</nav>
			<?php
			endif;?>

			<!-- burger icon -->
			<img class="burger_icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/burger.png" alt="burger logo">
			<img class="cross_icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/cross.png" alt="cross logo">

		</div> <!-- header_bar -->

		<div class="menu_mobile"> <!-- menu page for mobile -->
			<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
				<nav>
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'header-menu',
							'container' => false,
							'menu_class' => 'burger_menu',
						)
					);
					?>
				</nav>
			<?php
			endif;?>
		</div> <!-- "menu_burger -->

	</header>


	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
