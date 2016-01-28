<<<<<<< HEAD
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ada
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
=======
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
>>>>>>> 90c65fffaeb1b02dd5d2526d1fb0a6c8ec93e557
