<?php get_header(); ?>

	<div class="region region-arena page page-search">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Suchergebnisse</h2>
		
		<div class="box-navigation">
			<?php next_posts_link('&lt; rückwärts') ?>
			<?php previous_posts_link('vorwärts &gt;') ?>
		</div>

    <ul class="list-teasers">
		<?php while (have_posts()) : the_post(); ?>
				<?php include("post-teaser-list.php");?>
		<?php endwhile; ?>
		</ul>

		<div class="box-navigation">
			<?php next_posts_link('&lt; rückwärts') ?>
			<?php previous_posts_link('vorwärts &gt;') ?>
		</div>
	
	<?php else : ?>

		<h2 class="center">Es wurden keine Beiträge gefunden.</h2>
		<p>Versuche eine andere Suche!</p>
		<form role="search" method="get" id="searchform" action="http://anmutunddemut.de/">    	
    	<input value="Baum" name="s" id="s" type="text">
    	<input id="searchsubmit" value="Search" type="submit">
    	</div>
    </form>

	<?php endif; ?>
		
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>