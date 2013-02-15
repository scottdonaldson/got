<?php

register_nav_menu('primary','Primary Menu'); 
add_theme_support('post-thumbnails');

// Create short excerpt and edit regular excerpt more
function short_excerpt($string, $wordsreturned) {
	$retval = $string;
	$array = explode(" ", $string);
	if (count($array)<=$wordsreturned) {
		$retval = $string;
	} else {
		array_splice($array, $wordsreturned);
		$retval = implode(" ", $array)."...";
	}
	echo $retval;
}
function new_excerpt_more( $more ) {
	return '... ';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Create short title
function short_title($title) {
	$retval = $title;
	$array = explode(' ', $title);
	if (count($array) <= 6) {
		$retval = $title;
	} else {
		array_splice($array, 6);
		$retval = implode(' ', $array).'...';
	}
	echo $retval;
}


// Admin footer
add_filter('admin_footer_text', 'left_admin_footer_text_output'); //left side
function left_admin_footer_text_output($text) {
    $text = 'Site developed by <a href="http://parsleyandsprouts.com" target="_blank">Parsley &amp Sprouts</a>.';
    return $text;
}
add_filter('update_footer', 'right_admin_footer_text_output', 11); //right side
function right_admin_footer_text_output($text) {
    $text = '&copy '.date('Y').'.';
    return $text;
}

?>