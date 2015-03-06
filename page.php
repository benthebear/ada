<?php 
  get_header(); 
  $teaserimage = get_post_meta(get_the_ID(), "teaserimage");
  if($teaserimage){$postclass = "with-teaserimage";}else{$postclass="without-teaserimage";}  
?>

	<div class="region region-arena page page-page">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" class="post post-full <?php print $postclass;?>">
		  <h2><?php the_title(); ?></h2>		
		  <?php if(has_post_thumbnail()){
				$thumbnail_tag = get_the_post_thumbnail(get_the_ID());
				$thumbnail_tag = str_replace("width=", "meta-width=", $thumbnail_tag);
				$thumbnail_tag = str_replace("height=", "meta-height=", $thumbnail_tag);
				print "<p class='teaserimage'>".$thumbnail_tag."</p>";
				}	?>
			<?php print get_the_content('<p class="serif">Lies den Rest dieser Seite &raquo;</p>'); ?>						
		</div>
	  <?php endwhile; endif; ?>
	  
	  <div id="footnotes">
  		<hr/>
  		<h2>Fussnoten</h2>
	    <?php edit_post_link('Bearbeite diese Seite.', '<p>', '</p>'); ?>
	  </div>
	  
     <?php comments_template(); ?>
	
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>