<?php
/**
 * The template used for displaying page content
 */
$post_type = get_post_type(); 
?>

<div class="blog uniquepage" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <?php if( $post_type == 'page' ) manual_post_thumbnail(); ?>
   <div class="entry-content clearfix">
   <?php the_content(); ?>
  </div>
</div>