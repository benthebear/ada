<<<<<<< HEAD
<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ada
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'ada' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<div class="list-of-teasers">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
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
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
=======
<?php get_header(); ?>

	<div class="region region-arena page page-search">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Suchergebnisse</h2>
		
		<div class="box-navigation">
			<?php next_posts_link('&lt; rückwärts') ?>
			<?php previous_posts_link('vorwärts &gt;') ?>
		</div>

    <ul class="list-teasers">
		<?php while (have_posts()) : the_post(); ?>
				<?php include("post-teaser-list.php");?>
		<?php endwhile; ?>
		</ul>

		<div class="box-navigation">
			<?php next_posts_link('&lt; rückwärts') ?>
			<?php previous_posts_link('vorwärts &gt;') ?>
		</div>
	
	<?php else : ?>

		<h2 class="center">Es wurden keine Beiträge gefunden.</h2>
		<p>Versuche eine andere Suche!</p>
		<form role="search" method="get" id="searchform" action="http://anmutunddemut.de/">    	
    	<input value="Baum" name="s" id="s" type="text">
    	<input id="searchsubmit" value="Search" type="submit">
    	</div>
    </form>

	<?php endif; ?>
		
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
>>>>>>> 90c65fffaeb1b02dd5d2526d1fb0a6c8ec93e557
