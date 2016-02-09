<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ada
 */

?>
<!-- template: content-page.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class("content-full h-entry"); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title p-name">', '</h1>' ); ?>
		<?php 
			if(has_post_thumbnail()){
				print "<p class='teaserimage u-photo'>";
				the_post_thumbnail('medium');
				print "</p>";
			}
		?>
	</header><!-- .entry-header -->

	<div class="entry-content e-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ada' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'ada' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
<!-- /template: content-page.php -->