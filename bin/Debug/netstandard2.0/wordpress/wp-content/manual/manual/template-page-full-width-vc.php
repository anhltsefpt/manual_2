<?php
/**
 * Template Name: Page Builder (VC) Full Width
 */

get_header(); 

echo '<div class="content-wrapper">';
while ( have_posts() ) : the_post();
?>

    <div id="post-<?php esc_attr(the_ID()); ?>" <?php post_class(); ?>>
        <div class="clearfix">
           <?php the_content(); ?>
        </div>
    </div>

<?php
endwhile;
echo '</div>';

get_footer(); 
?>