<?php
//an individual post category section
//this is the default template
//create custom templates for post categories like section-skills.php
?>
<section class="span-24 last title">
<?php 
$cat_name = 'title';
$my_query = new WP_Query('category_name='. $cat_name .'&posts_per_page=1');
while ($my_query->have_posts()) : $my_query->the_post(); 
$meta_data = get_resume_meta($post->ID);
?>
<div class="span-5"><?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail('title-thumb');
} 
?> </div>
<div class="entry-content span-19 last">
<h1 class="entry-title span-12"><?php the_title(); ?></h1>
<div class="the_date span-7 last">
<strong>Last Updated: </strong><span class="updated">May 21st, 2017</span>
</div>
<div class="span-19">
<?php the_content(); ?>
</div>


</div>
<div class="contact_details span-19 last">
<span class="address"><?php echo $meta_data['address']; ?> </span> |  
<span class="city-state "> <?php echo $meta_data['city']; ?>, <?php echo $meta_data['state'] ?>  </span> |

<span class="phone"> <?php echo $meta_data['phone']; ?> </span> | 
<span class="email"> <?php echo $meta_data['email']; ?></span> |
<span class="social"> <a href="https://plus.google.com/100447117508046618740" rel="publisher">Social</a></span>
</div>	
<!--<span class="website span-9"><?php echo $meta_data['website']; ?></span>-->

<?php endwhile; ?>
</section>