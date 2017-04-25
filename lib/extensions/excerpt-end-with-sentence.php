<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

/**
 * Form excerpt during post save as 40 words ending as a full sentence.
 * read more at http://wordpress.stackexchange.com/questions/108826/how-to-end-the-excerpt-with-a-sentence-rather-than-a-word
 *
 */

function end_with_sentence_on_save($data, $postarr) {
	if ( ! empty( $data['post_content'] ) && $data['post_status'] != 'inherit' && $data['post_status'] != 'trash' ) {
		$text = strip_shortcodes( $data['post_content'] );
		$text = apply_filters('the_content', $text );
		$text = str_replace(']]>', ']]&gt;', $text );
		$excerpt_length = apply_filters('excerpt_length', 40);
		$data['post_excerpt'] = wp_trim_words($text, $excerpt_length, '');
	} else {
		return $data;
	}

	$data['post_excerpt'] = end_with_sentence($data['post_excerpt']);

	return $data;
}

add_filter('wp_insert_post_data', 'end_with_sentence_on_save', 20, 2);

function get_responsive_exceprt($sizes) {

	$excerpt = get_the_excerpt();
	$output = "<div class='responsive-excerpt'>";
	$ex_class = "";

	foreach ($sizes as $viewport => $length) {
		$ex_class = "";
		if ( next($sizes)==true ) {
			$hidden_key_up = key($sizes);
			$ex_class .= $ex_class === "" ? "" : " ";
			$ex_class .= "hidden-{$hidden_key_up}-up";
		}
		if ( isset($previous_viewport) && $previous_viewport !== $viewport ) {
			$hidden_key_down = $previous_viewport;
			$ex_class .= $ex_class === "" ? "" : " ";
			$ex_class .= "hidden-{$hidden_key_down}-down";
		}
		$responsive_excerpt = wp_trim_words($excerpt, $length);
		$output .= "<p class='{$ex_class}'>" . end_with_sentence($responsive_excerpt) . "</p>";		
		$previous_viewport = $viewport;
	}

	$output .= "</div>";
	return $output;
}

function end_with_sentence($data) {

	$allowed_end = array('.', '!', '?', '...');
	$exc = explode(' ', $data);
	$found = false;
	$last = '';

	while ( ! $found && ! empty($exc) ) {
		$last = array_pop($exc);
		$end = strrev( $last );
		if ($end) {
			$found = in_array( $end{0}, $allowed_end );
		}
	}

	if (! empty($exc)) $data = rtrim(implode(' ', $exc) . ' ' .$last);
	return $data; 

}

function get_custom_excerpt($length) {

	$excerpt = get_the_excerpt();
	$excerpt = wp_trim_words($excerpt, $length, '');
	return end_with_sentence($excerpt);

}

?>