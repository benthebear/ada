<?php
/**
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
</html>
