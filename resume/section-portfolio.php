<?php
//an individual post category section
//this is the default template
//create custom templates for post categories like section-skills.php
?>
<section class="span-24 last portfolio">
<h2 class="span-4">Websites</h2>
<?php 
$cat_name = 'portfolio';
$my_query = new WP_Query('category_name='. $cat_name .'&posts_per_page=8&order=ASC');
$i=1;
while ($my_query->have_posts()) : $my_query->the_post(); 
$meta_data = get_resume_meta($post->ID);
?>
<div class="portfolio_entry span-20 last right">
<div class="span-6 <?php if ($i%2 != 0) {echo 'right';} ?>"><?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail('portfolio-thumb');
} ?> </div>

<div class="span-13 last <?php if ($i%2 != 0) {echo 'align-right';} ?> ">

<h3 class="entry-title"><?php the_title(); ?></h3>
<div class="post_content">
<?php the_content(); ?>
<span class="website"><?php echo $meta_data['website']; ?></span>
</div></div></div>
<span class="span-24 last"></span>
<?php
  $i++;
endwhile; ?>
</section>