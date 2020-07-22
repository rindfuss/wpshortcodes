<?php
//*********************************************************************************
// These functions add the following shortcodes to WordPress
//      [taglist] - <ul> list of tags used in posts
//      [instructorlist] - <ul> list of posts with the category, "Instructor"
//      [topiclist] - <ul> list of posts with the category, "topic"
//      [tourlist] - <ul> list of posts with the category, "tour"
//*********************************************************************************

// hard-code the WordPress term IDs associated with the desired categories
// Find the term ID for the category by going to the WordPress administrative screen,
// click on Posts -> Categories, click the desired category, and look at the page URL
// to find the term ID for that category
if (!defined("TERM_ID_INSTRUCTOR")) {
	define("TERM_ID_INSTRUCTOR", 5);
}
if (!defined("TERM_ID_TOPIC")) {
	define("TERM_ID_TOPIC", 6);
}
if (!defined("TERM_ID_VIRTUALTOUR")) {
	define("TERM_ID_VIRTUALTOUR", 33);
}

function CalmSeas_tagList($atts) {
// Generates an unordered list of tags used by one or more posts
// styling of the list can be done by applying css rules to the CalmSeasTagList class
	$output = "";
	$tags = get_tags();
	$postCount = 0;
    foreach ($tags as $tag) {
    	if ($tag->count > 0) {
	    	$postCount++;
	    	$output .= "<li><a href=\"" . get_tag_link($tag->term_id) . "\">" . $tag->name . " (" . $tag->count . ")</a></li>";
	    }
    }

	if ($postCount === 0) {
		$output = "";
	}
	else {
		$output = '<div class="CalmSeasTagList"><ul>' . $output;
		$output .= '</ul></div>';
	}

	return $output;
}
add_shortcode('taglist','CalmSeas_tagList'); // shortcode, function name

function CalmSeas_categoryList($termID, $matchParent=true) {
	$output = "";
	$categories = get_categories();
	$totalCount = 0;

    foreach ($categories as $category) {
    	if ($category->count > 0 && ($matchParent ? $category->parent==$termID : $category->term_id==$termID)) {
	    	$totalCount++;
	    	$output .= "<li><a href=\"" . get_category_link($category->term_id) . "\">" . $category->name . " (" . $category->count . ")</a></li>";
	    }
    }

	if ($totalCount === 0) {
		$output = "";
	}
	else {
		$output = '<div class="CalmSeasCategoryList"><ul>' . $output;
		$output .= '</ul></div>';
	}
	return $output;
}

function CalmSeas_instructorList($atts) {
	return CalmSeas_categoryList(TERM_ID_INSTRUCTOR, true);
}
add_shortcode('instructorlist','CalmSeas_instructorList'); // shortcode, function name

function CalmSeas_topicList($atts) {
	return CalmSeas_categoryList(TERM_ID_TOPIC, true);
}
add_shortcode('topiclist','CalmSeas_topicList'); // shortcode, function name

function CalmSeas_tourList($atts) {
	return CalmSeas_categoryList(TERM_ID_VIRTUALTOUR, true);
}
add_shortcode('tourlist','CalmSeas_tourList'); // shortcode, function name

// odd, but docs say don't use a closing php tag
// apparently it's also important not to leave any whitespace at end of file