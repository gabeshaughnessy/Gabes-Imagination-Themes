<?php
//an individual post category section
//this is the default template
//create custom templates for post categories like section-skills.php
?>
<section class="span-24 last experience">
<h2 class="span-4">Experience</h2>
<div class="span-20 last right">
<?php 
$cat_name = 'experience';
$my_query = new WP_Query('category_name='. $cat_name .'&posts_per_page=8&order=ASC');
$i=1;
while ($my_query->have_posts()) : $my_query->the_post(); 
$meta_data = get_resume_meta($post->ID);
?>
<div class='span-6 last left'>
<div class="span-3"><?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail('experience-thumb');
} ?> </div>
<div class="span-3 last ">
<h3 class="entry-title"><?php the_title(); ?></h3>
<div class="the_date">
<span>Date: </span>
<span class=""><?php echo $meta_data['the_date']; ?></span>
</div></div>
<div class="post_content span-5">
<?php the_content(); ?>
</div></div>
<?php 
if ($i%3 == 0){
?>
<span class="span-24 last"></span>
<?php
}
$i++;
endwhile; ?>
</div>
</section>