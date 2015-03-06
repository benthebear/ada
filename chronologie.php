<?php
/*
Template Name: Chronologie
*/
?>

<?php get_header(); ?>

<div id="content" class="widecolumn">

 <?php if (have_posts()) : while (have_posts()) : the_post();?>
 <div class="post">
  <h2 id="post-<?php the_ID(); ?>"><?php the_title();?></h2>
  <div class="entrytext">
   <?php the_content('<p class="serif">Lies den Rest der Seite &raquo;</p>'); ?>	
  </div>
 </div>
 <?php endwhile; endif; ?>
 <p>Alle das Wissen des Buddhabots:</p>
 <?php query_posts("posts_per_page=-1&order=asc"); ?>
<ol style="list-style-type:decimal-leading-zero;">  
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <li id="post-<?php the_ID(); ?>"><small><?php the_time('Y m d') ?></small> &#187;<a style="color:black;" href="<?php echo get_permalink() ?>"><?php the_title();?></a>&#171;</li>  
  <?php endwhile; endif; ?>
</ol>

 
 <?php edit_post_link('Bearbeite diese Seite.', '<p>', '</p>'); ?>

 
 <?php comments_template(); ?>
 
</div>
<div id="main">




</div>
<?php get_footer(); ?>