<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aquaAr
 */

?>
<!doctype html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-F5RNPW736Z"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-F5RNPW736Z');
	</script>

	<?php wp_head(); ?>



</head>

<body <?php body_class(); ?>>

<!-- cursor effect -->
<div id="cursor"></div>
<div id="cursor-border"></div>

<div class="site">

<div class="overlay">
	<span class="loader"></span>
</div>

<!--
<nav class="main-nav">

		<div class="site-header__menu-icon-wrapper">
			<div class="site-header__menu-icon">
				<div class="site-header__menu-icon__middle"></div>
			</div>
		</div>
		<nav id="site-navigation" class="main-navigation nav-toggle">
				<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav>

</nav>-->
