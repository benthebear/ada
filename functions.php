<?php

/**
 * ada functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ada
 */

if ( ! function_exists( 'ada_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ada_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ada, use a find and replace
	 * to change 'ada' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ada', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ada_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		'default-repeat' => 'no-repeat',
		'default-position-x' => 'top center',
		'default-attachment' => 'fixed',
		'default-size' => 'cover',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'ada_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ada_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ada_content_width', 529 );
}
add_action( 'after_setup_theme', 'ada_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ada_widgets_init() {
	register_sidebar( array(
        'id'          => 'themenu',
        'name'        => __( 'Menu', $text_domain ),
        'description' => __( 'The Menu of the Site - on every Page', 'ada' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'id'          => 'homepage',
        'name'        => __( 'Homepage', 'ada' ),
        'description' => __( 'The lower Part of the Homepage', 'ada' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'id'          => 'thefooter',
        'name'        => __( 'Footer', $text_domain ),
        'description' => __( 'The Footer of Site - on every Page', 'ada' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'id'          => 'thearticle',
        'name'        => __( 'Article', 'ada' ),
        'description' => __( 'The lower Part of Posts of all Types', 'ada' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'id'          => 'thearchives',
        'name'        => __( 'Archives', 'ada' ),
        'description' => __( 'The lower Part of Archices of all Types', 'ada' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
    
}
add_action( 'widgets_init', 'ada_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ada_enscripts() {
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'ada-style', get_stylesheet_uri() );
	//wp_enqueue_style( 'ada-rainbow-warrior', get_template_directory_uri() . '/style-rainbow-warrior.css');
	wp_enqueue_style( 'ada-nano', get_template_directory_uri() . '/style-1-nano.css');
	wp_enqueue_style( 'ada-micro', get_template_directory_uri() . '/style-2-micro.css', array(), false, "screen and (min-width: 375px)");
	wp_enqueue_style( 'ada-mili', get_template_directory_uri() . '/style-3-mili.css', array(), false, "screen and (min-width: 601px)");
	wp_enqueue_style( 'ada-centi', get_template_directory_uri() . '/style-4-centi.css', array(), false, "screen and (min-width: 778px)");
	wp_enqueue_style( 'ada-one', get_template_directory_uri() . '/style-6-one.css', array(), false, "screen and (min-width: 1137px)");
	// You see, theres some room left in the Naming-Convention for bigger Screens. Maybe we'll have that in the Future.
	

	wp_enqueue_script( 'ada-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'ada-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_dequeue_style( 'open-sans-web-font' );
	wp_deregister_style( 'open-sans-web-font' );
	
	
}
add_action( 'wp_enqueue_scripts', 'ada_enscripts' );




function ada_descripts(){
	wp_dequeue_style( 'open-sans-css' );
}
add_action( 'wp_dequeue_scripts', 'ada_descripts' );




function ada_excerpt_more( $more ) {
	return "–----";
	//return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( '… read more &#187;', 'ada' ) . '</a>';
}

add_filter( 'excerpt_more', 'ada_excerpt_more' );


function ada_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	
	<div class="comment-meta">
		<div class="comment-author vcard">
			<?php if ( $args['avatar_size'] != 0 ) echo "<div class='comment-author-gravatar'>".get_avatar( $comment, $args['avatar_size'] )."</div>"; ?>
			<?php printf( __( '<cite class="comment-author-name fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
		</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
		<br />
	<?php endif; ?>

		<div class="commentmetadata comment-author-date"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
			/* translators: 1: date, 2: time */
			printf( __('%1$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  | ', '' );
			?>
		</div>
	</div>
	<div class="comment-text">
	<?php comment_text(); ?>
	</div>
	<hr/>

	<div class="reply">
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
	<?php
}


function ada_get_first_year(){
	return ada_get_first_date("year");
}

function ada_get_first_date($scope){
	global $wpdb;
	global $first_year;
	global $first_month;
	global $first_day;
	
	if($scope == "year" and $first_year > 0){
		return $first_year;
	}
	
	if($scope == "month" and $first_month > 0){
		return $first_month;
	}
	
	if($scope == "day" and $first_day > 0){
		return $first_day;
	}
	
	$args = array();
	$args['posts_per_page'] = 1;
	$args['order'] = "ASC";
	
	$first_post = get_posts($args);

	wp_reset_postdata();
	
	if(isset($first_post[0]->post_date)){
		$first_year = date("Y", strtotime($first_post[0]->post_date));
		$first_month = date("m", strtotime($first_post[0]->post_date));		
		$first_day = date("d", strtotime($first_post[0]->post_date));
	}
	
	if($scope == "year" and $first_year > 0){
		return $first_year;
	}
	
	if($scope == "month" and $first_month > 0){
		return $first_month;
	}
	
	if($scope == "day" and $first_day > 0){
		return $first_day;
	}

}

function ada_get_navigation_yearly($first_year, $last_year, $style = "div"){
	$output = "";
	
	$output .= '<div class="module-archive-navigation module-archive-navigation-yearly">';
    if($style == "select"){
	   $output .= __('Year', 'ada').": <select>"; 
    }
    
    $links = array(); 
    $class = "year";
    
    // Do stuff to make the Navigation look good, if it cover more than two Decades
    
    if(mb_substr($first_year, 0, 3)!= mb_substr($last_year, 0, 3)){
	    $start_year = mb_substr($first_year, 0, 3)."0";
	    
    }else{
	    $start_year = $first_year;
	    
    }
    
    $prefix = array();
    
    for($i = $start_year; $i<=$last_year; $i++){
	    
	    $post_count = ada_get_postcount_by_year($i);	
	    
	    // First add empty years
	    if($i < $first_year){
		    $prefix[] = '<span class="'.$class.'">&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="visibility:hidden;">&nbsp;|&nbsp;</span>';
	    
	    }elseif($i ==  get_the_time('Y')){
		    if($style == "div"){
				$links[] = '<strong class="'.$class.'" title="'.$post_count.' '.__('posts this year.', 'ada').'">'.$i.'</strong>';
			}else{
				$links[] = '<option selected="selected">'.$i.'</option>';
			}
		}else{				
			if($style == "div"){	
				$links[] = '<a class="'.$class.'" title="'.$post_count.' '.__('posts this year.', 'ada').'" href="'.get_bloginfo('home')."/".$i.'/">'.$i.'</a>';
			}else{
				$links[] = '<option >'.$i.'</option>';
			}
		}                    
		
		if(mb_substr($i, 3, 1) == 9 and $style == "div"){
			$prefix_string = implode("", $prefix);			
			$link_string = implode(" | ", $links);
			$output .= '<div class="module-archive-navigation module-archive-navigation-yearly module-archive-navigation-yearly-decade">';
			$output .= $prefix_string;
			$output .= $link_string;
			$output .= '</div>';
			$links = array();
			$string = "";
		}
		
    }   
    
    
	if($style == "div"){
	    $string .= implode(" | ", $links);
		$output .= '<div class="module-archive-navigation module-archive-navigation-yearly module-archive-navigation-yearly-decade">';
		$output .= $string;
		$output .= '</div><!-- /.module-archive-navigation-yearly-decade -->';
	}

	if($style == "select"){
	   $string .= implode("\n", $links);
	   $output .= $string;
	   $output .= "</select>"; 
    }
              
    $output .= '</div><!-- /.module-archive-navigation-yearly -->';
   
	return $output;
}

function ada_get_navigation_monthly($style = "div"){
	$output = '';
	
	$the_year = get_the_time('Y');
	$the_month = get_the_time('m');
	
	$output .= '<div class="module-archive-navigation module-archive-navigation-monthly">';
  	if($style == "select"){
	   $output .= __('Month', 'ada').": <select>"; 
    }	  

	$links = array();
	for($i = 1; $i<=12; $i++){
			
		if($i < 10 ){
			$number = "0".$i;
		}else{
			$number = $i;
		}
		
		$month_name = __(date("F", strtotime($the_year."-".$number."-27")), 'ada');
		$post_count = ada_get_postcount_by_month($the_year, $number);

				
		if(($i == $the_month  and !is_year()) or (ada_get_postcount_by_month($the_year, $number)<1)){
			if($style=="div"){
				if($i == $the_month){
					$links[] = "<strong title='".$post_count.' '.__('post this month', 'ada')."'>".$month_name."</strong>";
				}else{
					$links[] = $month_name;
				}
			}elseif($style=="select" and $i == $the_month){
				$links[] = "<option selected='selected'>".$month_name."</option>";
			}else{
				$links[] = "<option>".$month_name."</option>";
			}
		}else{
			if($style=="div"){
				$links[] = '<a '.$class.' title="'.$post_count.' '.__('post this month', 'ada').'" href="'.get_bloginfo('home').'/'.$the_year.'/'.$number.'">'.$month_name.'</a>';
			}elseif($style=="select"){
				$links[] = "<option>".$month_name."</option>";
			}
		}                    
	}
	
	if($style == "div"){
		$string = implode(" | ", $links);
		$output .= $string;
	}
	
	if($style == "select"){
	   $string .= implode("\n", $links);
	   $output .= $string;
	   $output .= "</select>"; 
    }
	
	$output .= '</div>';
	
	return $output;
}

function ada_get_navigation_daily($style="div"){
	$output = '';
	
	$output .= '<div class="module-archive-navigation module-archive-navigation-daily">';
	
	if($style == "select"){
	   $output .= __('Day', 'ada').": <select>"; 
    }
	
	
	$the_year = get_the_time('Y');
	$the_month = get_the_time('m');
	
	$links = array();
	for($i = 1; $i<=31; $i++){
		
		if($i < 10 ){
			$number = "0".$i;
		}else{
			$number = $i;
		}
		
		$post_count = ada_get_postcount_by_day($the_year, $the_month, $number);
		
		
		if(($i ==  get_the_time('d') and !(is_year() or is_month())) or $post_count<1){
			if($style=="div"){
				if($i ==  get_the_time('d') and !(is_year() or is_month())){
					$links[] = "<strong title='".$post_count." ".__('post this day', 'ada')."'>".$i."</strong>";	
				}else{
					$links[] = $i;				
				}
			}elseif($style=="select" and $i ==  get_the_time('d') and !(is_year() or is_month())){
				$links[] = "<option selected='selected'>".$i."</option>";
			}else{
				$links[] = "<option>".$i."</option>";
			}
		}else{
			if($style=="div"){
				$links[] = '<a '.$class.' title="'.$post_count.' '.__('post this day', 'ada').'" href="'.get_bloginfo('home').'/'.$the_year.'/'.$the_month.'/'.$i.'">'.$i.'</a>';
			}else{
				$links[] = "<option>".$i."</option>";
			}
		}                    
	}
	
	if($style == "div"){
		$string = implode(" | ", $links);
		$output .= $string;
	}
	
	if($style == "select"){
	   $string .= implode("\n", $links);
	   $output .= $string;
	   $output .= "</select>"; 
    }
	
	
	$output .= '</div>';
	
	return $output;
}

function ada_get_postcount_by_year($year){
	global $wpdb;
	
	$sql = "SELECT count(ID) FROM ".$wpdb->posts." WHERE post_date > '".$year."-01-01 00:00:00' AND post_date < '".$year."-12-31 23:59:00' AND post_type = 'post' and post_status ='publish'";

	$count = $wpdb->get_var($sql);
	
	return $count;
}


function ada_get_postcount_by_month($year, $month){
	global $wpdb;
	
	$sql = "SELECT count(ID) FROM ".$wpdb->posts." WHERE post_date > '".$year."-".$month."-01 00:00:00' AND post_date < '".$year."-".$month."-31 23:59:00' AND post_type = 'post' and post_status ='publish'";

	$count = $wpdb->get_var($sql);
	
	return $count;
}

function ada_get_postcount_by_day($year, $month, $day){
	global $wpdb;
	
	$sql = "SELECT count(ID) FROM ".$wpdb->posts." WHERE post_date > '".$year."-".$month."-".$day." 00:00:00' AND post_date < '".$year."-".$month."-".$day." 23:59:00' AND post_type = 'post' and post_status ='publish'";

	$count = $wpdb->get_var($sql);
	
	return $count;
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';





