<?php
//an individual post category section
//this is the default template
//create custom templates for post categories like section-skills.php
?>
<section class="span-24 last interests">
<?php 
$cat_name = 'interests';
$my_query = new WP_Query('category_name='. $cat_name .'&posts_per_page=1');
while ($my_query->have_posts()) : $my_query->the_post(); ?>
<h2 class="entry-title span-4"><?php the_title(); ?></h2>
<div class="post_content span-20 last">
<?php the_content(); ?>
</div>
<?php endwhile; ?>
</section>