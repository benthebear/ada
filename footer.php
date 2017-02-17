<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ada
 */

?>

	</div><!-- #content -->
	
	<hr/>

	<footer id="colophon" class="site-footer region region-footer" role="contentinfo">
		<aside class="widget-area widget-area-footer" role="complementary">
		<?php dynamic_sidebar( 'thefooter' ); ?>
		</aside>
		
		<hr/>
		
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ada' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'ada' ), 'WordPress' ); ?></a>
			<?php echo __('since', 'ada');?>
			<a href="<?php echo get_bloginfo('home')."/".ada_get_first_date('year')."/".ada_get_first_date('month')."/".ada_get_first_date('day') ?>" title="<?php echo __('Visit the archive!', 'ada')?>"><?php echo ada_get_first_year();?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'ada' ), 'Ada', '<a href="http://birkenhake.org" rel="designer">Benjamin Birkenhake</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
