<?php

/**
 * Hide editor on specific pages.
 *
 */
add_action( 'admin_init', 'hide_editor' );

function hide_editor() {
  // Get the Post ID.
  $post_id = null;

  if ( array_key_exists('post', $_GET) ) { $post_id = $_GET['post']; }
  else if ( array_key_exists('post_ID', $_POST) ) { $post_id = $_POST['post_ID']; }

  if( !isset( $post_id ) ) return;

  // Hide the editor on the page titled 'Homepage'
  $homepgname = get_the_title($post_id);
  if($homepgname == 'Homepage'){ 
    remove_post_type_support('page', 'editor');
  }

  // Hide the editor on a page with a specific page template
  // Get the name of the Page Template file.
  $template_file = get_post_meta($post_id, '_wp_page_template', true);

  $templates_to_hide = array(
    'template-home.php',
    );

  if(in_array($template_file, $templates_to_hide)){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
}

/**
 * Remove post type support
 *
 */

add_action( "init", "tsm_remove_post_supports" );

function tsm_remove_post_supports() {
  remove_post_type_support( "post", "post-formats" );
}