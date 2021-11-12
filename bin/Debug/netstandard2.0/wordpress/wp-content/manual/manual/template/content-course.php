<?php
/**
 * The template used for displaying page content
 */
?>
<div class="blog uniquepage learnpress_manual" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <div class="entry-content clearfix">
  <?php the_content(); ?>
  </div>
</div>