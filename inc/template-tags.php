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
	$time_string = '<time class="entry-meta-item entry-date published" datetime="%1$s">%2$s</time>';
	

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
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<div class="entry-meta-item posted-on byline">' . $posted_on . ' ' . $byline . '</div>'; // WPCS: XSS OK.

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
			        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'ada' ), $category->name ) ) . '"><span class="dashicons dashicons-category"></span>' . esc_html( $category->name ) . '</a>' . $separator;
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
			        $output .= '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'ada' ), $category->name ) ) . '"><span class="dashicons dashicons-tag"></span>' . esc_html( $tag->name ) . '</a>' . $separator;
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
		  $content = "<p>".$content." <a href='".get_permalink()."'>".__( 'Read More <span class="meta-nav">&#187;</span>', 'ada' )."</a></p>";
	}
	
	print $content;
	
}
