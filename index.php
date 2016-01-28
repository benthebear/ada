<<<<<<< HEAD
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

			print '<div class="list-of-teasers">';
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
			print "</div>";

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
=======
<?php get_header(); ?>

	<div class="region region-arena page page-homepage">

	<?php if (have_posts()) : ?>
		
		<div class="teasers">
		<?php while (have_posts()) : the_post(); ?>
				
			<?php include("post-teaser-big.php"); 		?>
	
		<?php endwhile; ?>
		</div>
		<!-- /.teasers -->
		
		<div class="box-navigation clear">
			<p> <?php 
						next_posts_link('&#171; '.__('backwards', 'ada'));
			 			previous_posts_link(__('forwards', 'ada').' &#187;');
				?> 
			</p>
		</div>
						
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>
	
	
		<?php if (function_exists('dynamic_sidebar')){
		      	print "<ul class='dynamic-sidebar'>\n";
	          	dynamic_sidebar('homepage');
	          	print "</ul>\n";
	      }	?>
	</div>
	
		

<?php get_sidebar(); ?>

<?php get_footer(); ?>
>>>>>>> 90c65fffaeb1b02dd5d2526d1fb0a6c8ec93e557
