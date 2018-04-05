<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ada
 */

?>
<!-- template: content.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class("content-full h-entry"); ?>>
	<header class="entry-header">
		<?php
			
			print the_title( '<h2 class="entry-title p-name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="u-uid u-url">', '</a></h2>', true );
		
			if(has_post_thumbnail()){
				print "<p class='teaserimage'>";
				the_post_thumbnail('medium');
				print "</p>";
			}
				
		?>
	</header><!-- .entry-header -->

	<div class="entry-content e-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ada' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ada' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<hr/>

	<footer class="entry-footer">
		<?php ada_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
<!-- /template: content.php -->