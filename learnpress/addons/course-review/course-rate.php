<?php
if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$course_id       = get_the_ID();
$course_rate_res = learn_press_get_course_rate( $course_id, false );
$course_rate     = $course_rate_res['rated'];
$total           = $course_rate_res['total'];

?>
<div class="course-rating">
	<h3><?php esc_html_e( 'Reviews', 'manual' ); ?></h3>
    <div class="course-rating-content">
	<div class="average-rating" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
		<p class="rating-title"><?php esc_html_e( 'Average Rating', 'manual' ); ?></p>
		<div class="rating-box">
			<div class="average-value"
				 itemprop="ratingValue"><?php echo ( $course_rate ) ? esc_html( round( $course_rate, 1 ) ) : 0; ?></div>
			<div class="review-star">
				<?php Manual__IP_Course::instance()->learnpress__print_rating( $course_rate ); ?>
			</div>
			<div class="review-amount" itemprop="ratingCount">
				(<?php $total ? printf( _n( '%1$s rating', '%1$s ratings', $total, 'manual' ), number_format_i18n( $total ) ) : esc_html_e( '0 rating', 'manual' ); ?>)
			</div>
		</div>
	</div>
	<div class="detailed-rating">
		<p class="rating-title"><?php esc_html_e( 'Detailed Rating', 'manual' ); ?></p>
		<div class="rating-box">
			<?php
            if ( isset( $course_rate_res['items'] ) && !empty( $course_rate_res['items'] ) ):
                foreach ( $course_rate_res['items'] as $item ):
                    $percent = round( $item['percent'], 0 );
                    ?>
                    <div class="rating-rated-item">
                        <div class="rating-point">
                            <?php if ( $item['rated'] == '1' ) {
                                esc_html_e( $item['rated'] ); ?><?php echo esc_attr__( ' Star', 'manual' );
                            } else {
                                esc_html_e( $item['rated'] ); ?><?php echo esc_attr__( ' Stars', 'manual' );
                            } ?>
                        </div>
                        <div class="rating-progress">
                            <div class="single-progress-bar">
                                <div class="full_bar">
                                    <div class="progress-bar" style="width:<?php echo $percent; ?>% "></div>
                                </div>
                            </div>
                        </div>
                        <div class="rating-count"><?php echo esc_html( $percent ); ?>%</div>
                    </div>
                <?php
                endforeach;
            endif;
            ?>
		</div>
	</div>
    </div>
</div>