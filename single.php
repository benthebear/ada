<?php get_header();   ?>

  <div class="region region-arena page-post">
		
  	<div class="pagination">
  		<?php previous_post_link('<span class="meta-back">%link</span>', '«') ?>
  		<?php next_post_link('<span class="meta-forth">%link</span>', '»') ?>
  	</div>
  
  		
  	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
    <div class="text">
		  <h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		  <?php 
			if(has_post_thumbnail()){
				$thumbnail_tag = get_the_post_thumbnail(get_the_ID());
				$thumbnail_tag = str_replace("width=", "meta-width=", $thumbnail_tag);
				$thumbnail_tag = str_replace("height=", "meta-height=", $thumbnail_tag);
				print "<p class='apostille'>".$thumbnail_tag."</p>";
			}	?>
			
			<?php the_content( __( 'Continue reading &#187;', 'ada' ) ); ?>
	 </div>

		
	  <div>
		  <hr/>
		  <h2><?php echo _e('Footnotes', 'ada'); ?></h2>
		  <p class="meta-basics">~ <?php print _e('Post from the', 'ada')." ".ada_get_the_time(get_the_time("U")); ?></p>
		  <p class="meta-topics">~ <?php 
				$categories = get_the_category();
				$tags = get_the_tags();
				print _n( "Category", "Categories", count($categories), 'ada').": ";
				print the_category(", "); 
				the_tags( " "._n( "Tag", "Tags", count($tags), 'ada').": ", ", ");				
				?>	    
		  </p>
			<?php if(isset(get_post(get_post_thumbnail_id($post->ID))->post_excerpt)){
					if(get_post(get_post_thumbnail_id($post->ID))->post_excerpt !=""){
						print "<p class='meta-credits'>~ ".get_post(get_post_thumbnail_id($post->ID))->post_excerpt."</p>";
					}
				}?>
		  <?php previous_post_link('<p class="meta-back">~ '.__('Previous Post', 'ada').': %link </p>') ?>
		  <?php next_post_link('<p class="meta-forth">~ '.__('Next Post', 'ada').': %link </p>') ?>
		  <?php edit_post_link(__('Edit this Post', 'ada'),'<p class="meta-admin">~ ','</p>')?></p>
	  </div>	
	  <!-- end:#footnotes -->
		
	  <?php comments_template(); ?>
	
	  <?php endwhile; else: ?>
	
		<p>Sorry, no posts matched your criteria.</p>
	
  <?php endif; ?>
	
  </div>


<?php get_footer(); ?>
