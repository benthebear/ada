<?php get_header(); ?>

	<div class="region region-arena page page-archive">

		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php /* If this is a category archive */ if (is_category() or is_tag()) { ?>				
		<h2 class="pagetitle">Themenseite "<?php echo single_term_title(); ?>"</h2>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archiv des <?php the_time('d. F Y'); ?></h2>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archiv des Monats <?php the_time('F, Y'); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archiv des Jahres <?php the_time('Y'); ?></h2>
		
	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		<h2 class="pagetitle">Suchergebnisse</h2>
		
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Autoren-Archiv</h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog-Archiv</h2>

		<?php } ?>

    
    <?php if(is_day() or is_month() or is_year()){
      $firstyear = "2001";
      $lastyear = date("Y");
      
      
      
      ?>
      
      <p class="module-archive-navigation module-archive-navigation-yearly">
        <?php
        $links = array();
        for($i = $firstyear; $i<=$lastyear; $i++){
          if($i ==  get_the_time('Y')){
            $links[] = $i;
          }else{
            $links[] = '<a '.$class.' href="http://anmutunddemut.de/'.$i.'">'.$i.'</a>';
          }                    
        }
        $string = implode(" | ", $links);
        print $string;
        ?>        
      </p>
      
  
       
      <p class="module-archive-navigation module-archive-navigation-monthly">
  		  <?php
  		  $months['01'] = "Januar";
  		  $months['02'] = "Februar";
  		  $months['03'] = "März";
  		  $months['04'] = "April";
  		  $months['05'] = "Mai";
  		  $months['06'] = "Juni";
  		  $months['07'] = "Juli";
  		  $months['08'] = "August";
  		  $months['09'] = "September";
  		  $months['10'] = "Oktober";
  		  $months['11'] = "November";
  		  $months['12'] = "Dezember";
        $links = array();
        for($i = 1; $i<=12; $i++){
          if($i < 10 ){
            $number = "0".$i;
          }else{
            $number = $i;
          }
          if($i ==  get_the_time('m') and !is_year()){
            $links[] = $months[$number];
          }else{
            $links[] = '<a '.$class.' href="http://anmutunddemut.de/'.get_the_time('Y').'/'.$number.'">'.$months[$number].'</a>';
          }                    
        }
        $string = implode(" | ", $links);
        print $string;
        ?>
  		</p>
    <?php }?>
    
    
    <?php if(is_day() or is_month()){?>
      <p class="module-archive-navigation module-archive-navigation-daily">
        <?php
        $links = array();
        for($i = 1; $i<=31; $i++){
          if($i ==  get_the_time('d') and !(is_year() or is_month())){
            $links[] = $i;
          }else{
            $links[] = '<a '.$class.' href="http://anmutunddemut.de/'.get_the_time('Y').'/'.get_the_time('m').'/'.$i.'">'.$i.'</a>';
          }                    
        }
        $string = implode(" | ", $links);
        print $string;
        ?>
      </p>
      
      
    <?php }?>    
    
		<div class="box-navigation">
			<?php next_posts_link('&lt; rückwärts') ?>
			<?php previous_posts_link('vorwärts &gt;') ?>
		</div>
    
    <ul class="list-teasers">
		<?php while (have_posts()) : the_post(); ?>
		  <?php include("post-teaser-list.php") ?>	
		<?php endwhile; ?>
		</ul>

		<div class="box-navigation">
			<?php next_posts_link('&lt; rückwärts') ?>
			<?php previous_posts_link('vorwärts &gt;') ?>
		</div>
	
	<?php else : ?>

		<h2 class="center">Nichts Gefunden</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>