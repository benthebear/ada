<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ada
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
				
				<?php 
					if(is_day() or is_month() or is_year()){
						$first_year = ada_get_first_year();
						$last_year = date("Y");  
						
						/* Mobile First */
						
						//print ada_get_navigation_yearly($first_year, $last_year, "select");
						
						//print ada_get_navigation_monthly("select");
						
						if(is_day() or is_month()){
							//print ada_get_navigation_daily("select");
						}
						
						/* Desktop Second */						
						
						print ada_get_navigation_yearly($first_year, $last_year);
						
						print ada_get_navigation_monthly();
						
						if(is_day() or is_month()){
							print ada_get_navigation_daily();
						}
						
					} // End of Chronological Navigation
						
				?>
				
				
				
				
			</header><!-- .page-header -->

			<div class="list-of-teasers rainbow-warrior h-feed">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/teaser-big', get_post_format() );

			endwhile;

			print "</div>";

			print "<div class='clickme'>";
			the_posts_navigation();
			print "  <div class='clear clearfix'></div>";
			print "</div>";

		else :

			get_template_part( 'template-parts/teaser-big', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
	<hr/>
	
	<aside class="widget-area widget-area-archive" role="complementary">
	<?php dynamic_sidebar( 'thearchives' ); ?>
	</aside>

<?php
get_sidebar();
get_footer();

