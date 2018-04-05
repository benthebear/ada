<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ada
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- wp_head -->
<?php wp_head(); ?>
<!-- /wp_head -->
</head>
<?php 
	$bodyclasses_string = "";
	$bodyclasses_array = array();
	if(is_singular()){
		$bodyclasses_array[] = "singular";
	}	
	
	if($_GET['grid']=="show"){
		$bodyclasses_array[] = "show-grid";
	}
	
	if(count($bodyclasses_array)>0){
		$bodyclasses_string = implode(" ", $bodyclasses_array);
	}
	
?>
<body <?php body_class($bodyclasses_string); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ada' ); ?></a>

	<header id="masthead" class="site-header region region-header" role="banner">
		
		<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
		</a>
		<?php endif; // End header image check. ?>
		
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			?>

			<span class="site-navigation">
						
			<?php

			if(is_single()){
				$navargs = array();
				$navargs['prev_text'] = "<span title='".__("Previous Post", "ada")."'>&#171;</span>";
				$navargs['next_text'] = "<span title='".__("Next Post", "ada")."'>&#187;</span>";
				the_post_navigation($navargs);
			}		

			?>
				<!-- <a class="search" href="<?php echo esc_url( home_url( '/' ) ); ?>?s=">&nbsp;</a> -->
				<a class="button button-menu button-menu-open" href="#show__menu"><span class="dashicons dashicons-menu"></span></a>
			</span>	

		</div><!-- .site-branding -->
		
		
		<aside id="show__menu" class="widget-area widget-area-menu" role="complementary">
			<div class="widget-area-menu-inner">
			<a class="button button-menu button-menu-close" href="#"><span class="dashicons dashicons-no"></span></a>
			<?php dynamic_sidebar( 'themenu' ); ?>
			</div>
		</aside>
		
		
	</header><!-- #masthead -->

	<div id="content" class="site-content region region-arena page">

