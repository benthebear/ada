<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
  <?php
		
  if(has_post_thumbnail()){    
	 $thumbnail_tag = get_the_post_thumbnail(get_the_ID());
	 $thumbnail_tag = str_replace("width=", "meta-width=", $thumbnail_tag);
	 $thumbnail_tag = str_replace("height=", "meta-height=", $thumbnail_tag);
     print "<p class='teaserimage'><a href='".get_permalink()."'>".$thumbnail_tag."</a></p>";
  }
	?>
	<h2 class="teasertitle"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
	
	<div class="teasertext">			
		<?php $content = get_the_content('Weiterlesen&nbsp;&raquo;'); 
		if(strlen($content)>500 and !(strpos($content, "more-link"))){
		  $content = strip_tags($content);
		  $first_sentence = strpos($content, ". ");
		  $second_sentence = strpos($content, ". ", $first_sentence+1);
		  $content = substr($content, 0, $second_sentence+1);
		  $content = "<p>".$content." <a href='".get_permalink()."'>Weiterlesen&nbsp;&raquo;</a></p>";
		}
		print $content;
		
		?>
	</div>
	<p class="teasermeta">
		<span class="teaserdate"><?php print(ada_get_the_time(get_the_time("U"))); ?></span> &nbsp; &nbsp;
		<span class="teasercommentcount"><?php comments_popup_link('0 Kommentare', '1 Kommentar', '% Kommentare'); ?></span>		
	</p>
	<hr class="clear"/>
</div>