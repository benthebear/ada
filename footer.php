<?php
/**
<<<<<<< HEAD
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

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ada' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'ada' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'ada' ), 'Ada', '<a href="http://birkenhake.org" rel="designer">Benjamin Birkenhake</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
=======
 * Adas Footer
 *
 * Displays all of the <footer> section and everything up till the end of our HTML document.
 *
 * @package Ada
 * @since Ada 0.1
 */
?>
  <footer class="region region-footer"> 
    <?php  	
  	    if (function_exists('dynamic_sidebar')){
  	        print "<ul class='dynamic-sidebar'>\n";
            dynamic_sidebar('thefooter');
            print "</ul>\n";
        } 	 
  	?>
    
    <hr/>
    <p class="mod-impress">
      <span>
        <a href="http://creativecommons.org/licenses/by-nc-sa/2.0/de/">cc</a> 2001 - <?php print date("Y");?>        
      </span>
      <span>Prouldy presented by Wordpress, Ada Theme by <a href="http://palasthotel.de">Palasthotel</a></span>
    </p> 
     
  </footer>
  
  <?php
  	/* Always have wp_footer() just before the closing </body>
  	 * tag of your theme, or you will break many plugins, which
  	 * generally use this hook to reference JavaScript files.
  	 */

  	wp_footer();

  ?>
>>>>>>> 90c65fffaeb1b02dd5d2526d1fb0a6c8ec93e557
</html>
