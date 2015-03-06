<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie ?>				
				<p class="nocomments">This post is password protected. Enter the password to view comments.<p>				
				<?php
				return;
            }
        }
		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
 <div id="comments">
	<hr/>
	<h2>Kommentare</h2>
	 
	<?php 
	/* First the Comments only */
	$pingbacks = false;
	foreach ($comments as $comment) : ?>
	  <?php if($comment->comment_type !="pingback"){?>
		<div class="comment text" id="comment-<?php comment_ID() ?>">
			<hr/>
			<p class="comment-metadata"><?php comment_author_link() ?> am <a href="#comment-<?php comment_ID() ?>"><?php comment_date('d. m. Y');?></a><?php edit_comment_link('.','',''); ?><br/>
				<?php 
				  $id_or_email = get_comment_author_email();
				echo get_avatar( $id_or_email, "41", '', get_comment_author() ); ?></p>
			<?php comment_text() ?>
		</div>
		<!-- end:.comment -->
		<?php }else{
		  $pingbacks = true;
		} ?>
	<?php endforeach; /* end for each comment */ ?>
	
	
	
	<?php 
	/* Now the Pingbacks and Trackbacks */
	if($pingbacks){?>
	<h2>Reaktionen</h2>
	<?php foreach ($comments as $comment) : ?>
	  <?php if($comment->comment_type =="pingback"){?>
		<div class="comment text" id="comment-<?php comment_ID() ?>">
			<hr/>
			<p class="metadata"><?php comment_author_link() ?> <a href="#comment-<?php comment_ID() ?>" title=""># <?php edit_comment_link('e','',''); ?></a></p>
			<?php comment_text() ?>
		</div>
		<!-- end:.comment -->
		<?php } ?>
	<?php endforeach; /* end for each comment */ 
	} /*End Pingbacks*/?>
	
	
	</div>
  <!-- end:#comments-->
  
  
 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Kommentare sind geschlossen.</p>
		
	<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
<div id="comment-form">
	<hr/>
	<h2 id="respond">Schreibe einen Kommentar</h2>	
	
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>Du musst dich <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">einloggen</a>, um einen Kommentar hinterlassen zu dürfen.</p>
	<?php else : ?>

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

    <p id="comment-area" show="embed" href="<?php echo get_option('siteurl'); ?>/wp-content/themes/takeshi/comment-form.php">Kommentarformular kommt gleich (wenn Du Javascript aktiviert hast).</p>
      
	<?php if ( $user_ID ) : ?>

		<p>Eingelogt als <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

	<?php else : ?>

	  <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="35" tabindex="1" />
	    <label for="author">Name <?php if ($req) echo "(muss.)"; ?></label></p>

	  <p><input type="text" name="email" id="email" value="kommentar@anmutunddemut.de" size="35" tabindex="2" onclick="javascript:this.value=''" />
	    <label for="email">Mail (never published. never spamed. <?php if ($req) echo " aber muss."; ?>)</label></p>

	  <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="35" tabindex="3" />
	    <label for="url">Webseite (kann gerne.)</label></p>
    
	<?php endif; ?>

		<p><input name="submit" type="submit" id="submit" tabindex="5" value="Kommentar abschicken" />
		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
	  </p>
	  
		<?php do_action('comment_form', $post->ID); ?>

  </form>
</div> 
<!-- end:#comment-form  -->

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
