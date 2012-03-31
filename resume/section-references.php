<?php
//an individual post category section
//this is the default template
//create custom templates for post categories like section-skills.php
?>
<section class="span-24 last references">
<h2 class="span-4">References</h2>
<div class="span-20 right last">
<?php 
$cat_name = 'references';
$my_query = new WP_Query('category_name='. $cat_name .'&posts_per_page=6');
$i=1;
while ($my_query->have_posts()) : $my_query->the_post(); 
$meta_data = get_resume_meta($post->ID);
?>

<?php if ($i%2 != 0){ //if its an odd number it goes on the left ?>
<div class='span-10 reference'> <?php }
else { ?>
<div class='span-10 reference last'>
<?php } ?>
<div class="span-3"><?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail('reference-thumb');
} 
?> </div>
<div class="span-6 last">
<h3 class="entry-title"><?php the_title(); ?></h3>
<div class="post_content">
<?php the_content(); ?>
<div class="contact_details">
<!--<span class="phone span-6 last"><?php echo $meta_data['phone']; ?></span>-->
<span class="email span-6 last"><?php echo $meta_data['email']; ?></span>
<!--<span class="website span-6 last"><?php echo $meta_data['website']; ?></span>-->
</div>
</div></div></div>
<?php 
$i ++;
endwhile; ?></div>
</section>