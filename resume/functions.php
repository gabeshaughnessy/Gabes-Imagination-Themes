<?php

add_theme_support( 'post-thumbnails' ); 
add_image_size( 'reference-thumb', 75,75, true ); //the small thumbnails for references	
add_image_size( 'experience-thumb', 115,60, true );
add_image_size( 'portfolio-thumb', 180,150, true ); 
add_image_size( 'title-thumb', 180,180, true ); 

function get_resume_meta($post_id) {
$resume_meta = array(
"phone" => get_post_meta($post_id, 'phone', true),
"address" => get_post_meta($post_id, 'address', true),
"city" => get_post_meta($post_id, 'city', true),
"state" => get_post_meta($post_id, 'state', true),
"email" => get_post_meta($post_id, 'email', true),
"website" => get_post_meta($post_id, 'website', true),
"the_date" => get_post_meta($post_id, 'the_date', true),

);
return $resume_meta;
}
?>
<?php
/* Define the custom box */

add_action( 'add_meta_boxes', 'resume_add_custom_box' );

/* Adds a box to the main column on the Post and Page edit screens */
function resume_add_custom_box() {
    add_meta_box( 
        'resume_sectionid',
        __( 'Resume Custom Fields', 'resume_textdomain' ),
        'resume_inner_custom_box',
        'post' 
    );
}

/* Prints the box content */
function resume_inner_custom_box( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'resume_noncename' );

	// Get the location data if its already been entered
    $phone = get_post_meta($post->ID, 'phone', true);
    $address= get_post_meta($post->ID, 'address', true);
    $city = get_post_meta($post->ID, 'city', true);
    $state = get_post_meta($post->ID, 'state', true);
    $email = get_post_meta($post->ID, 'email', true);
    $website = get_post_meta($post->ID, 'website', true);
    $the_date = get_post_meta($post->ID, 'the_date', true);
 
  // The actual fields for data entry
  echo '<label for="phone">';
       _e("Phone Number", 'resume_textdomain' );
  echo '</label> ';
  echo '<input type="text" id="phone" name="phone" value="'.$phone.'" size="12" /> <br/>';
  
  echo '<label for="address">';
       _e("Address", 'resume_textdomain' );
  echo '</label> ';
  echo '<input type="text" id="address" name="address" value="'.$address.'" size="36" /> <br />';
  
  echo '<label for="city">';
       _e("City", 'resume_textdomain' );
  echo '</label> ';
  echo '<input type="text" id="city" name="city" value="'.$city.'" size="20" /> <br />';
  
  echo '<label for="state">';
       _e("State", 'resume_textdomain' );
  echo '</label> ';
  echo '<input type="text" id="state" name="state" value="'.$state.'" size="20" /> <br />';
  
  echo '<label for="email">';
       _e("Email Address", 'resume_textdomain' );
  echo '</label> ';
  echo '<input type="text" id="email" name="email" value="'.$email.'" size="20" /> <br />';
  
  echo '<label for="website">';
       _e("Website URL", 'resume_textdomain' );
  echo '</label> ';
  echo '<input type="text" id="website" name="website" value="'.$website.'" size="30" /> <br />';
  
  echo '<label for="the_date">';
       _e("Date", 'resume_textdomain' );
  echo '</label> ';
  echo '<input type="date" id="the_date" name="the_date" value="'.$the_date.'" size="30" /> <br />';
}

// Save the Metabox Data
 
function resume_save_meta($post_id, $post) {
 
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['resume_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }
 
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
 
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
 
    $resume_meta['phone'] = $_POST['phone'];
    $resume_meta['address'] = $_POST['address'];
    $resume_meta['city'] = $_POST['city'];
    $resume_meta['state'] = $_POST['state'];
    $resume_meta['email'] = $_POST['email'];
    $resume_meta['website'] = $_POST['website'];
    $resume_meta['the_date'] = $_POST['the_date'];
 
    // Add values of $resume_meta as custom fields
 
    foreach ($resume_meta as $key => $value) { // Cycle through the $resume_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
 
}
 
add_action('save_post', 'resume_save_meta', 1, 2); // save the custom fields
?>