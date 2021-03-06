<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ada
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			print '<div class="list-of-teasers rainbow-warrior h-feed">';
			/* Start the Loop */
			$counter = 0;
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				//if($counter == 0){
				//	get_template_part( 'template-parts/teaser-illustrated', get_post_format() );
				//}else{
					get_template_part( 'template-parts/teaser-big', get_post_format() );
				//}
				$counter ++;
			endwhile;

			print "</div><!-- /.list-of-teasers-->\n\n";

			print "<div class='clickme'>";
			the_posts_navigation();
			print "<div class='clear clearfix'></div>";
			print "</div>";

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
	<hr/>
	
	<aside class="widget-area widget-area-homepage" role="complementary">
	<?php dynamic_sidebar( 'homepage' ); ?>
	</aside>

<?php
get_sidebar();
get_footer();
