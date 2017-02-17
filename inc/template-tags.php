<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ada
 */

if ( ! function_exists( 'ada_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function ada_posted_on() {
	$time_string = '<time class="entry-date published dt-published" datetime="%1$s">%2$s</time>';
	

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'ada' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'ada' ),
		'<span class="author vcard p-author"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	
	

	echo "\n\t".'<div class="entry-meta-item posted-on byline"> '.$posted_on.' ' . $byline . ' </div>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'ada_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function ada_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		
		ada_posted_on();
				
		/* translators: used between list items, there is a space after the comma */
		$categories = get_the_category();
		if ( $categories && ada_categorized_blog() ) {
			$separator = ' ';
			$output = '';
			if ( ! empty( $categories ) ) {
				$output .= '<div class="entry-meta-item cat-links clickme rainbow-warrior">'; 
			    foreach( $categories as $category ) {
			        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'ada' ), $category->name ) ) . '" class="p-category">' . esc_html( $category->name ) . '</a>' . $separator;
			    }
			    $output .= '</div>';
			    echo trim( $output, $separator );
			}
		}
		
		$tags = get_the_tags();
		if ( $tags ) {
			$separator = ' ';
			$output = '';
			if ( ! empty( $tags ) ) {
				$output .= '<div class="entry-meta-item tags-links clickme rainbow-warrior">'; 
			    foreach( $tags as $tag ) {
			        $output .= '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'ada' ), $category->name ) ) . '" class="p-category">' . esc_html( $tag->name ) . '</a>' . $separator;
			    }
			    $output .= '</div>';
			    echo trim( $output, $separator );
			}
		}
	}

	ada_entry_commentcount();

}
endif;


function ada_entry_commentcount(){
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<div class="entry-meta-item comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'ada' ), esc_html__( '1 Comment', 'ada' ), esc_html__( '% Comments', 'ada' ) );
		echo '</div>';
	}
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function ada_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'ada_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'ada_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so ada_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so ada_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in ada_categorized_blog.
 */
function ada_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'ada_categories' );
}
add_action( 'edit_category', 'ada_category_transient_flusher' );
add_action( 'save_post',     'ada_category_transient_flusher' );


function ada_teaser_text($content){
	
	if(strlen($content)>250 and !(strpos($content, "more-link"))){
		  $content = strip_tags($content);
		  $first_sentence = strpos($content, ". ");
		  $second_sentence = strpos($content, ". ", $first_sentence+1);
		  $content = substr($content, 0, $second_sentence+1);
		  $content = "<p>".$content." <a href='".get_permalink()."'>".__( '… read more &#187;', 'ada' )."</a></p>";
	}
	
	print $content;
	
}

function ada_add_random_variant($string){
	// First: Check wether theres's Markup inside the Title;
	if(strpos($string, "<")!== false){
		return $string;	
	}else{
		// Get random Letter
		$result1 = ada_get_random_letter($string);
		if(is_array($result1)){
			$string2 = $result1[2];
			$result2 = ada_get_random_letter($result1[2]);	
			if(is_array($result2)){	
				$string2 = $result2[0]."<span class='contrast'>".$result2[1]."</span>".$result2[2];
			}
			$return = $result1[0]."<span class='contrast'>".$result1[1]."</span>".$string2;
		}else{
			return $string;
		}
		return $return;
	}
	return $string;
}

function ada_get_random_letter($string){
	$in = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
	$in = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
	$result = array();
	$hit = false;
	foreach($in as $letter){
		if(strpos($string, $letter)>1){
			$hit = true;
			break;
		}
	}
	
	if($hit == false){
		return $string;
	}

	if(mb_strpos(" ", $string)>1){
		$words = explode(" ", $string);
		foreach($words as $word){
			$result = ada_get_random_letter($word);
			if(is_array($result)){
				return $result;
			}
		}
	}else{
		if(mb_strpos("&", $string)===false and mb_strpos("<", $string)===false){
			$randpos = rand(0, mb_strlen($string)-1);		
			$result[] = mb_substr($string, 0, $randpos);
			$result[] = mb_substr($string, $randpos, 1);
			$result[] = mb_substr($string, $randpos+1, mb_strlen($string)-1);
			if(in_array($result[1], $in)){
				return $result;
			}else{
				return ada_get_random_letter($string);
			}
		}else{
			return $string;
		}
	}		
}

function ada_add_constant_contrast($string){
	// Main Variables for our parser
	$opentags = 0;
	$inside_tag = false;
	$inside_entity = false;
	$in_numbers = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
	$in_letters_uppercase = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
	$in_letters_lowercase = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
	$letter_values =array(
	 "0" => 10, "1" => 1, "2" => 2, "3" => 3, "4" => 300, "5" => 5, "6" => 6, "7" => 7, "8" => 8, "9" => 9,
	 "A" =>  1, "B" =>  2,"C" =>  3,"D" =>  4,"E" =>  5,"F" => 6,"G" => 7,"H" => 8,"I" => 9,"J" => 10,
	 "K" => 11, "L" => 12,"M" => 13,"N" => 14,"O" => 15,"P" => 16,"Q" => 17,"R" => 18,"S" => 20,
	 "T" => 21, "U" => 22,"V" => 23,"W" => 24,"X" => 25,"Y" => 26, "Z" => 27, 
	 "a" => 31, "b" => 32,"c" => 33,"d" => 34,"e" => 35,"f" =>36,"g" =>37,"h" =>38,"i" =>39,"j" =>300,
	 "k" => 41, "l" => 42,"m" =>43,"n" =>44,"o" =>45,"p" =>300,"q" =>300,"r" =>48,"s" =>49,
	 "t" => 51, "u" => 52,"v" =>53,"w" =>54,"x" =>55, "y" =>300, "z"=>57);
	// When do we want to hit a character
	$hit_limit = 200;
	$hit_counter = 187;
	$hit_yet = false;
	$number_of_hits = 0;
	
	$starttag = "<span class='contrast'>";
	$endtag = "</span>";
	
	// First basic Calculations
	$length = mb_strlen($string);
	// How often do we want to contrast a Letter? 
	// About one contrast for every 10 Characters.
	$target = floor($length/10);
	
	for($position = 0; $position<$length; $position++){
				
		$this_letter = mb_substr($string, $position, 1);
		// Check wether we're inside Markup
		if($this_letter == "<"){
			$inside_tag = true;
		}
		if($this_letter == ">"){
			$inside_tag = false;
		}
		if($this_letter == "&"){
			$inside_entity = true;
		}
		if($this_letter == ";"){
			$inside_entity = false;
		}
		
		// If were not inside Markup and if our current character ist valid …
		if(!$inside_tag and !$inside_entity and 
			(  in_array($this_letter, $in_numbers) 
			or in_array($this_letter, $in_letters_uppercase) 
			or in_array($this_letter, $in_letters_lowercase))){
						
			// … then we increase the Counter
			if(isset($letter_values[$this_letter])){
				$hit_counter = $hit_counter + $letter_values[$this_letter];
			}else{
				$hit_counter = $hit_counter+10;
			}
		
			
			// Then Check wether we hit the Limit
			if($hit_counter > $hit_limit){	
									
				$string = ada_inject_code_into_string($string, $position, $starttag, $endtag);
				$position = $position +  mb_strlen($starttag) + mb_strlen($endtag) + 1;
				$length = $length + mb_strlen($starttag) + mb_strlen($endtag);
				$hit_counter = 0;
				$number_of_hits ++;
			}
			
			// Check wether we already have enough hits
			if($number_of_hits > $target){
				break;
			}
			
		}
		
		
	}
	
	
	return $string;
	
}

function ada_inject_code_into_string($string, $position, $starttag, $endtag){
	
	$result[] = mb_substr($string, 0, $position);
	$result[] = mb_substr($string, $position, 1);
	$result[] = mb_substr($string, $position+1, mb_strlen($string)-1);
	
	$return = $result[0].$starttag.$result[1].$endtag.$result[2];
	
	return $return;
	
}

