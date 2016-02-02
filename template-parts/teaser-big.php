<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ada
 */

?>
<!-- template: teaser-big.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class("teaser teaser-big"); ?>>
	
		<?php
			
			$readstatus = '';
			$readstatus .= '<span class="read-status"><a href="'.get_permalink().'" title="'.__( 'Your Browser knows, that you have already visited this Post.', 'ada' ).'"><span class="dashicons dashicons-yes">&nbsp;</span></a></span>';
			the_title( '<h2 class="entry-title">'.$readstatus.'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			
			if(has_post_thumbnail()){
				print "<figure class='thumbnail'>";
				print '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
				the_post_thumbnail('thumbnail');
				print "</a>";
				print "</figure>";
			}			
	
	
			print "<div class='teaser-text'>";
			if(has_excerpt()){
				the_excerpt();	
			}else{
				ada_teaser_text(get_the_content());				
			}	
			print "</div>";

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ada' ),
				'after'  => '</div>',
			) );
	
			ada_posted_on(); 
			
            ada_entry_commentcount();
		?>
	
</article><!-- #post-## -->
<!-- /template: teaser-big.php -->