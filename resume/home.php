<?php
//Include or "call" the other template files
//Include the WordPress Loop to gather information from the database (posts, pages, categories, etc.)
?>
<?php get_header(); ?>
<?php 
// use get_template_part( $slug, $name ); for sections.
get_template_part( 'section', 'title');
get_template_part( 'section', 'skills');
get_template_part( 'section', 'software');
get_template_part( 'section', 'experience');
//get_template_part( 'section', 'portfolio');
get_template_part( 'section', 'references');
get_template_part( 'section', 'education');
get_template_part( 'section', 'interests');
?>
<?php get_footer(); ?>