<?php get_header(); ?>

	<div class="region region-arena page page-homepage">

	<?php if (have_posts()) : ?>
		
		<div class="teasers">
		<?php while (have_posts()) : the_post(); ?>
				
			<?php include("post-teaser-big.php"); 		?>
	
		<?php endwhile; ?>
		</div>
		<!-- /.teasers -->
		
		<div class="box-navigation clear">
			<p> <?php 
						next_posts_link('&#171; '.__('backwards', 'ada'));
			 			previous_posts_link(__('forwards', 'ada').' &#187;');
				?> 
			</p>
		</div>
						
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>
	
	
		<?php if (function_exists('dynamic_sidebar')){
		      	print "<ul class='dynamic-sidebar'>\n";
	          	dynamic_sidebar('homepage');
	          	print "</ul>\n";
	      }	?>
	</div>
	
		

<?php get_sidebar(); ?>

<?php get_footer(); ?>