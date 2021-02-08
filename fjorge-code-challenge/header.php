<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fjorge_code_challenge
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<script>
		jQuery( document ).ready(function() {
			el = document.getElementsByClassName("rss-banner-url")[0].innerHTML = "<a href='http://fjorgedigital.com'>LEARN MORE&emsp;&emsp;❯</a>";
		});
	</script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'fjorge-code-challenge' ); ?></a>

	<header id="masthead" class="site-header">
		<div id="header-bar">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$fjorge_code_challenge_description = get_bloginfo( 'description', 'display' );
				if ( $fjorge_code_challenge_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $fjorge_code_challenge_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'fjorge-code-challenge' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
			<button id="nav-icon" aria-label="Open Navigation Menu" onclick="mobileToggle()">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/menu-burger.png" alt="" />		
			</button><!-- #nav-icon -->
			<button id="close-icon" aria-label="Close Navigation Menu" onclick="mobileToggle()">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/menu-close.png" alt="" />		
			</button><!-- #close-icon -->
			<div id="menu-mobile-container">
				<ul class="menu">
					<li id="menu-item-21" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-21"><a href="http://avalynncirce.com/fjorge/work/">Work</a></li>
					<li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16"><a href="http://avalynncirce.com/fjorge/about/">About</a></li>
					<li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17"><a href="http://avalynncirce.com/fjorge/blog/">Blog</a></li>
					<li id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-18"><a href="http://avalynncirce.com/fjorge/contact-us/">Contact Us</a></li>
				</ul>
			</div><!-- #menu-mobile-container -->
		</div>
		<?php get_template_part( 'template-parts/common/slider'); ?>
	</header><!-- #masthead -->


