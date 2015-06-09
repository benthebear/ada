<?php
/**
 * Adas Header
 *
 * Displays all of the <head> section and everything up till <div class="region region-arena">.
 *
 * @package Ada
 * @since Ada 0.1
 */
?><!DOCTYPE html SYSTEM "about:legacy-compat">
<html <?php language_attributes(); ?>>
<head>

  	<!-- start:header-basics-->
  	<title><?php wp_title('|', 1, 'right'); ?></title>
  	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" /> 
  	<meta name="description" content="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>" />        
  	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->	
  	<meta http-equiv="content-language" content="<?php bloginfo('language'); ?>" />
  	<!-- end:header-basics-->
  
  	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" type="text/css" media="screen" />  
  	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory')?>/style-medi.css" media="screen and (max-width: 1137px)" />
  	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory')?>/style-mini.css" media="screen and (max-width: 601px)" />
  	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.6.2.min.js"> </script>
  	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-ui-1.8.16.custom.min.js"> </script>
  	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/sortable.js"> </script>
  	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/functions.js"> </script>
  	<link rel="alternate" type="application/rss+xml" title="<?php echo _e( 'Article Feed', 'ada' );?>" href="<?php bloginfo('atom_url'); ?>" />
  	<link rel="alternate" type="application/rss+xml" title="<?php echo _e( 'Comments Feed', 'ada' );?>" href="<?php bloginfo('comments_atom_url'); ?>" />
  	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  
  	<!-- start:navigation -->
  	<link rel="home" href="<?php echo home_url(); ?>" />
  	<link rel="index" href="" />
  	<link rel="glossary" href="" />
  	<link rel="copyright" href="" />
  	<link rel="author" href="" />
  	<link rel="made" href="" />  
  	<link rel="contents" href="" />  
  	<link rel="prev" href="" />
  	<link rel="next" href="" />
  	<!-- end:navigation -->
  
	<!-- start:wp_head -->
	<?php wp_head(); ?>
	<!-- end:wp_head -->
</head>
<?php
$classes= array();
if(is_single()) {
	$categories = get_the_category();
	foreach($categories as $category){
	  $classes[] = "page-category-".$category->slug;
	}
	
}
$class = implode(" ", $classes)
?>
<!-- start:body -->
<body <?php body_class($class); ?> onload="loader();">	
  
  <!-- start:header -->
  <header class="region region-header">
    <h1><a title="<?php echo _e( 'Home', 'ada' );?>" href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1> 
    <p><a title="<?php echo _e( 'Impress', 'ada' );?>" href="<?php echo get_option('home'); ?>/impressum" rel="impress">?</a></p> 
  </header>
  <!-- end:header -->