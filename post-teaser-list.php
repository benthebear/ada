<li class="post post-list" id="post-<?php the_ID(); ?>">
  <?php 
	if(has_post_thumbnail()){
		$thumbnail_tag = get_the_post_thumbnail(get_the_ID());
		$thumbnail_tag = str_replace("width=", "meta-width=", $thumbnail_tag);
		$thumbnail_tag = str_replace("height=", "meta-height=", $thumbnail_tag);
		print "<p class='teaserimage'>".$thumbnail_tag."</p>";
		}	?>				
	<time><?php the_time('j. F Y') ?></time><br/>
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<p class="commentcount"><?php comments_popup_link('0 Kommentare', '1 Kommentar', '% Kommentare'); ?></p>			
</li>