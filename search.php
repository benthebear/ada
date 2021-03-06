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
				<?php if(get_search_query()!=""){ ?>
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'ada' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php }else{?>
					<h1 class="page-title"><?php printf( esc_html__( 'Search the Site', 'ada' )); ?></h1>
				<?php } ?>
			</header><!-- .page-header -->

			<div class="search-head">
				<?php get_search_form(); ?>
				<?php if(get_search_query()=="") {
					print "<p>".__("You haven't searched something yet, so here are the last posts.")."</p>";
				}?>
				<hr/>
			</div>



			<div class="list-of-teasers rainbow-warrior h-feed">
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
			
			print "</div><!-- /.list-of-teasers-->\n\n";
	
			print "<div class='clickme'>";
			the_posts_navigation();
			print "<div class='clear clearfix'></div>";
			print "</div>";


		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();

