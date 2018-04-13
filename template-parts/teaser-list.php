<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ada
 */

?>
<!-- template: teaser-list.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
			if(has_post_thumbnail()){
				print "<p class='teaserimage'>";
				the_post_thumbnail('medium');
				print "</p>";
			}
			
			
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php ada_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

</article><!-- #post-## -->
<!-- /template: teaser-list.php -->