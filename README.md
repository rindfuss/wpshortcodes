# WordPress Custom Short Codes

## Background
WordPress allows for "shortcodes" that insert content into posts by enclosing the shortcode in square brackets, i.e. [shortcodehere]. Behind the scenes, WordPress calls a function tied to the shortcode that returns HTML.

The code below demonstrates how to create a custom shortcode.

## Features
- [taglist] shortcode will generate an HTML unordered list (wrapped in a div) of every tag used at least once by any post in the WordPress database. The tag names in the list will link to a page showing all the posts that use that tag.
- CalmSeas_categoryList function that can be called by other custom shortcode functions to generate an HTML unordered list of categories and number of posts within the category. Unlike tags, WordPress categories are hierarchical with parent and children categories, so the function can list either a single category or all the child categories within a given parent category. Each category in the list links to a page listing all the posts in that category.
- [instructorlist], [topiclist], [tourlist] shortcodes that generate lists of child categories where the parent category is Instructor, Topic, or Tour. 

## Installation

 1. Add the code in functions.php to any of the following:
    - The functions.php file of a theme (will get overwritten with theme updates)
    - The functions.php file of a child theme
    - The *plugin-name*.php file of a plugin
2. Change the defines in the code to match the term_id(s) that correspond to the categories for which you want to generate category lists. See comments in code for how to look up a term_id for a category.

> Written with [StackEdit](https://stackedit.io/).