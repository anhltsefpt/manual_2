<?php
/**
 * Template for displaying content of archive courses page.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */
 
defined( 'ABSPATH' ) || exit();

get_header();

global $post, $wp_query, $lp_tax_query;
?>

<div class="container content-wrapper body-content">
  <div class="row margin-top-btm-50 page-default">
    <div class="col-md-12 col-sm-12 clearfix">
      <?php
	/**
	 * @since 3.0.0
	 */
	do_action( 'learn-press/archive-description' );
	
	if ( have_posts() ) :

	/**
	 * @since 3.0.0
	 */
	do_action( 'learn-press/before-courses-loop' );
	
	// ADDING NEW DESIGN
	$result_count = $wp_query->found_posts; 
	echo '<div class="records_and_filter_wrap clearfix">';
		echo '<div class="col-md-6 col-sm-12 manual_courses result-count padding-fix">';
			printf( _n( 'We found %s course available for you', 'We found %s courses available for you', $result_count, 'manual' ), '<span class="count">' . $result_count . '</span>' );
		echo '</div>';
	?>
      <div class="col-md-6 col-sm-12 padding-fix manual_course_filter">
        <form id="course-archive-filtering" class="course-filtering" method="get">
          <?php
				$options         = Manual__IP_Course::instance()->manual__get_ordering_options();
				$selected        = Manual__IP_Course::instance()->manual__get_ordering_selected_option();
				$select_settings = [
					'fieldLabel' => esc_html__( 'Sort by:', 'manual' ),
				];
				?>
          <select class="manual-select orderby" name="orderby">
            <?php foreach ( $options as $value => $text ) : ?>
            <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $selected, $value ); ?> > <?php echo esc_html( $text ); ?> </option>
            <?php endforeach; ?>
          </select>
          <input type="hidden" name="paged" value="1">
        </form>
      </div>
      <?php  
	
	echo '</div>';
	// EOF ADDING NEW DESIGN
	
	LP()->template( 'course' )->begin_courses_loop();
	
	echo '<div class="masonry-grid">';
		while ( have_posts() ) :
			the_post();
			learn_press_get_template_part( 'content', 'course' );
		endwhile;
	echo '</div>';

	LP()->template( 'course' )->end_courses_loop();

	/**
	 * @since 3.0.0
	 */ 
	do_action( 'learn-press/after-courses-loop' );
	wp_reset_postdata();

else:
	learn_press_display_message( __( 'No course found.', 'manual' ), 'error' );
endif;
?>
    </div>
  </div>
</div>
<?php
get_footer();