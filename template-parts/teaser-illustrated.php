<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ada
 */

?>


<!-- template: teaser-illustrated.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class("teaser teaser-illustrated h-entry"); ?>>
	<?php
			
			$readstatus = '';
			//$readstatus .= '<span class="read-status"><a href="'.get_permalink().'" title="'.__( 'Your Browser knows, that you have already visited this Post.', 'ada' ).'"><span class="dashicons dashicons-yes">&nbsp;</span></a></span>';
			if(has_post_thumbnail()){
				print "\n\n\t<figure class='thumbnail u-photo'>";
				print '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
				the_post_thumbnail('medium');
				print "</a>";
				print "</figure>\n";
			}
			
			print ada_add_constant_contrast(the_title( '<h2 class="entry-title p-name">'.$readstatus.'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="u-uid  u-url">', '</a></h2>', false ));
			
						
	
	
			//print "\n\t<div class='teaser-text p-summary'>\n\t\t";
			if(has_excerpt()){
				//the_excerpt();	
			}else{
				//ada_teaser_text(get_the_content());				
			}	
			//print "\n\t</div>\n";

			wp_link_pages( array(
				'before' => '\n\t<div class="page-links">\n' . esc_html__( 'Pages:', 'ada' ),
				'after'  => '\n\t</div>\n',
			) );
	
			ada_posted_on(); 
			
            ada_entry_commentcount();
		?>
		<hr title="illegitimi non carborundum"/>
</article><!-- #post-## -->
<!-- /template: teaser-big.php -->

