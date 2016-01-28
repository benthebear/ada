<<<<<<< HEAD
<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ada
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
=======
<div class="region region-sidebar">
	<ul class="dynamic-sidebar">		  
    <?php if ( !function_exists('dynamic_sidebar')
            || !dynamic_sidebar('Sidebar') ) : ?>     
    <?php endif; ?>
	</ul>
</div>

>>>>>>> 90c65fffaeb1b02dd5d2526d1fb0a6c8ec93e557
