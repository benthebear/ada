<?php

$text_domain = 'ada';

$months["01"] = "Januar";
$months["02"] = "Februar";
$months["03"] = "März";
$months["04"] = "April";
$months["05"] = "Mai";
$months["06"] = "Juni";
$months["07"] = "Juli";
$months["08"] = "August";
$months["09"] = "September";
$months["10"] = "Oktober";
$months["11"] = "November";
$months["12"] = "Dezember";


/*Ada delivers three Sidebars:
1. The Regular Sidebar, which, actually is no sidebar, sorry. 
	It's rendered below the main Content and above the Footer.
2. The Homepage, which is a dynamic Sidebar / Widget Area.
	It is only rendered on the Homepage, between the Main Content and the sidebar.
3. The Footer, which is a kind of free widgetable footer.
	It is rendered on all pages. Really, all.
*/
if ( function_exists('register_sidebar') ){
    register_sidebar( array(
        'id'          => 'sidebar',
        'name'        => __( 'Sidebar', $text_domain ),
        'description' => __( 'The Main Sidebar', $text_domain ),
    ) );
    register_sidebar( array(
        'id'          => 'homepage',
        'name'        => __( 'Homepage', $text_domain ),
        'description' => __( 'The lower Part of the Homepage', $text_domain ),
    ) );
    register_sidebar( array(
        'id'          => 'thefooter',
        'name'        => __( 'Footer', $text_domain ),
        'description' => __( 'The Footer of Site', $text_domain ),
    ) );
}


/* Thumbnails, we loves them. */
if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
}

function ada_get_the_time($date){
  global $months;
  
  $time = date('j.', $date); 
  $time .= " ";
  $time .= $months[date("m", $date)]; 
  $time .= " ";
  $time .= date('Y', $date);
  
  return $time;
}

function ada_get_page_by_slug($slug){
	global $wpdb;
	//print_r($slug);
	$content = $wpdb->get_results("SELECT post_content FROM $wpdb->posts WHERE post_name = '".$slug."' and post_type = 'page'", 'ARRAY_N');
	//print_r($content);
	return $content[0][0];
}

function ada_get_url(){
  return $_SERVER["SCRIPT_URL"];
}



function ada_get_permalink($post){
	if($post["post_type"]=='page'){
		$permalink = get_option('home')."/".$post["post_name"];
		return $permalink;
		
	}else{
	$permalink = get_option('permalink_structure');
	$rewritecode = array(
	'%year%',
	'%monthnum%',
	'%day%',
	'%hour%',
	'%minute%',
	'%second%',
	'%postname%',
	'%post_id%',
	'%category%',
	'%author%',
	'%pagename%'
	);
	$unixtime = strtotime($post["post_date"]);
	$date = explode(" ",date('Y m d H i s', $unixtime));
	$rewritereplace =
	array(
		$date[0],
		$date[1],
		$date[2],
		$date[3],
		$date[4],
		$date[5],
		$post['post_name'],
		$post->ID,
		$category,
		$author,
		$post['post_name'],
	);
	$permalink = get_option('home') . str_replace($rewritecode, $rewritereplace, $permalink);
	$permalink = user_trailingslashit($permalink, 'single');
	return $permalink;
	}	
}

function ada_clean_content($content){
	$result = $content;
	$result = str_replace('width="', 'data-width="', $result);
	$result = str_replace("width='", "data-width='", $result);
	$result = str_replace('height="', 'data-height="', $result);
	$result = str_replace("height='", "data-height='", $result);
	return $result;
}

add_filter('the_content', "ada_clean_content");

?>