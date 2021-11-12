<?php 
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Manual__IP_Course' ) ) {
	class Manual__IP_Course {
		protected static $instance = null;
		
		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
		
		public function initialize() {
			if ( ! $this->is_plugin_activated('LearnPress') ) {
				return;
			}
			
			/*-------------------------------------
			#. Remove Ads
			---------------------------------------*/
			add_filter( 'lp/template/archive-course/enable_lazyload', '__return_false' ); // remove footer rating text

			// Connect.
			add_filter( 'learn-press/override-templates', '__return_true', 9999 );  
			add_filter( 'learn-press/enable-cart', '__return_true', 9999 );
			
			add_action( 'wp_enqueue_scripts', [ $this, 'manual_learnpress__css_components' ] );
			add_action( 'admin_enqueue_scripts', [ $this, 'manual_learnpress__admin_css_components' ] );
			
			$this->change_learnpress__archive_components();
			$this->change_learnpress__single_components();
			$this->change_learnpress__become_a_teacher();
			
			add_filter( 'lp/course/meta-box/fields/general', [ $this, 'add_extra_fields_to_learnpress' ] );
			//Remove adv from leanpress.
			remove_action( 'admin_footer', 'learn_press_footer_advertisement', -10 );
			//Add Fields - User Profile
			add_filter( 'user_contactmethods', [ $this, 'manual__extra_userinfo_add' ] );
			//Profile
			$this->change_learnpress__user_profile_components();
			//Filter
			add_action( 'save_post_'.'lp_course', [ $this, 'save_post' ], 9999, 1 );
			add_filter( 'pre_get_posts', [ $this, 'manual__change_main_loop_courses_query' ] );
			// Change button back to class style.
			remove_action( 'learn-press/after-checkout-form', 'learn_press_back_to_class_button' );
			remove_action( 'learn-press/after-empty-cart-message', 'learn_press_back_to_class_button' );
			add_action( 'learn-press/after-checkout-form', [ $this, 'manual__back_to_button' ] );
			add_action( 'learn-press/after-empty-cart-message', [ $this, 'manual__back_to_button' ] );
			//fix
			add_action( 'current_screen', [ $this, 'manual__fix_learnpress_js' ] );
		}
		
		
		 public function manual__fix_learnpress_js(){
			$current_screen = get_current_screen();
			if ( ('toplevel_page_Manual' == $current_screen->id ) || ( 'toplevel_page_ManualChildTheme' == $current_screen->id  ) ) { 
				add_action( 'wp_print_scripts', [ $this, 'manual__fix_lowversion_dequeue_script' ], 10 );
			}
		 }
		 
		 public function manual__fix_lowversion_dequeue_script() {
			wp_dequeue_script( 'lp-admin' );
		 }
		
		 public function manual__back_to_button() {
			$courses_link = learn_press_get_page_link( 'courses' );
			if ( ! $courses_link ) {
				return;
			}

			$this->manual__render_button( [
				'link'          => [
					'url' => esc_url( $courses_link ),
				],
				'text'          => esc_html__( 'Back to class', 'manual' ),
				'icon'          => 'fas fa-chevron-left',
				'wrapper_class' => 'btn-back-to-class',
			] );
			
		}
		
		/**
		* Check LearnPress plugin activated.
		* @return boolean true if plugin activated
		*/
		public function is_plugin_activated( $plugin_class_name ) {
			if ( class_exists( $plugin_class_name ) ) {
				return true;
			}
			return false;
		}
		
		public function manual_learnpress__admin_css_components() {
			wp_enqueue_style('manual-admin-learnpress', trailingslashit(get_template_directory_uri()) . 'css/learnpress/admin.css', array(), '' );
		}
		
		public function manual_learnpress__css_components() {
			wp_enqueue_style( "manual-learnpress" , trailingslashit(get_template_directory_uri()) . "css/learnpress/learnpress.min.css");
			wp_enqueue_script( "manual-learnpress-js" , trailingslashit(get_template_directory_uri()) . "js/learnpress/learnpress-tab-panel.js");
		}
		
		/*******************************************
		* ADD EXTRA FIELD TO LEARNPRESS META FIELD *
		********************************************/
		public function add_extra_fields_to_learnpress( $fields ) {
			$custom_fields = array(
				'manual_course_language' => new LP_Meta_Box_Text_Field(
					esc_html__( 'Language', 'manual' ),
					'',
					'',
					array()
				),
				'manual_course_time'     => new LP_Meta_Box_Text_Field(
					esc_html__( 'Time', 'manual' ),
					'',
					'',
					array()
				),
			);
			$fields = array_merge( $fields, $custom_fields );
			return $fields;
		}
		
		
		/***********************************
		* COURSE IP_COURSE ARCHIVE SECTION *
		************************************/
		public function change_learnpress__archive_components() {
			/**
			 * @action learn-press/after-courses-loop-item
			 *
			 * @hooked
			 * @see    learn_press_courses_loop_item_begin_meta - 10
			 * @see    learn_press_courses_loop_item_price - 20
			 * @see    learn_press_courses_loop_item_title - 21
			 * @see    learn_press_courses_loop_item_instructor - 25
			 * @see    learn_press_courses_loop_item_end_meta - 30
			 * @see    learn_press_course_loop_item_buttons - 35
			 * @see    learn_press_course_loop_item_user_progress - 40
			 */
			
			/**
			 * Remove all hooks from Plugin.
			 */
			LP()->template( 'course' )->remove( 'learn-press/before-courses-loop-item', '*' );
			LP()->template( 'course' )->remove( 'learn-press/courses-loop-item-title', '*' );
			LP()->template( 'course' )->remove( 'learn-press/after-courses-loop-item', '*' );
			
			/**
			 * Re-add components
			 */
			add_action( 'learn-press/before-courses-loop-item', LP()->template( 'course' )->callback( 'loop/course/thumbnail.php' ), 10 );
			add_action( 'learn-press/after-courses-loop-item', LP()->template( 'course' )->callback( 'loop/course/info-begin.php' ), 0 );
			add_action( 'learn-press/after-courses-loop-item', LP()->template( 'course' )->callback( 'loop/course/categories.php' ), 10 );
			add_action( 'learn-press/after-courses-loop-item', LP()->template( 'course' )->callback( 'loop/course/title.php' ), 10 );
			add_action( 'learn-press/after-courses-loop-item', LP()->template( 'course' )->callback( 'loop/course/meta-begin.php' ), 10 );
			add_action( 'learn-press/after-courses-loop-item', LP()->template( 'course' )->callback( 'loop/course/meta-lessons.php' ), 10 );
			add_action( 'learn-press/after-courses-loop-item', LP()->template( 'course' )->func( 'courses_loop_item_price' ), 10 );
			add_action( 'learn-press/after-courses-loop-item', LP()->template( 'course' )->callback( 'loop/course/meta-end.php' ), 10 );
			add_action( 'learn-press/after-courses-loop-item', LP()->template( 'course' )->callback( 'loop/course/info-end.php' ), 10 );
			
			LP()->template( 'course' )->remove( 'learn-press/before-courses-loop', 'courses_top_bar', 10 );
		}
		
		public function manual_fetch_loop_course_meta_lesson() {
			$course      = LP_Global::course();
			$count_items = $course->count_items();
			$count_items = intval( $count_items );
			return $count_items;
		}
		
		/********************************
		* IP_COURSE SINGLE PAGE SECTION *
		*********************************/
		public function change_learnpress__single_components() {
			
			LP()->template( 'course' )->remove( 'learn-press/course-content-summary', '*' );
			
			add_action( 'learn-press/course-content-summary',
				LP()->template( 'course' )->func( 'user_progress' ),
				10
			);
			
			add_action( 'learn-press/course-content-summary', LP()->template( 'course' )->func( 'course_extra_boxes' ), 40 );
			
			add_action( 'learn-press/course-content-summary',
				LP()->template( 'course' )->callback( 'single-course/tabs/tabs' ),
				60
			);
			
			// INIT
			add_action( 'init', function () {
						//Wishlist plugin fix		  
						if ( $this->is_plugin_activated('LP_Addon_Wishlist') && is_user_logged_in() ) {
							$instance_addon = LP_Addon_Wishlist::instance();
							remove_action( 'learn-press/after-course-buttons', array( $instance_addon, 'wishlist_button' ), 100 );
							add_action( 'manual__course_single_pg_wishlist', array( $instance_addon, 'wishlist_button' ), 10 );
						}	
		    }, 99 );
			
			/*For the Top Section :: Single Page Title Bar*/
			add_action( 'manual__single_course_meta', 'learn_press_course_instructor', 5 );
			add_action( 'manual__single_course_meta', LP()->template( 'course' )->callback( 'single-course/categories.php' ), 15 );
			add_action( 'manual__single_course_meta', [ $this,'learnpress__course_ratings' ], 25 );
			add_action( 'manual__single_course_meta', [ $this, 'learnpress__single_course_buttons' ], 90 );
			add_action( 'manual__course_payment', 'learn_press_course_price', 5 );
			
			// Thumbnail
			add_action( 'learn-press/before-single-course-description', [ $this,'learnpress__course_thumbnail_item' ], 5 );
			
			// ADD - Course Short Info
			add_action( 'manual__learnpress_course_shortinfo', [ $this,'learnpress__course_shortinfo_lectures' ], 5 );
			add_action( 'manual__learnpress_course_shortinfo', [ $this, 'learnpress__course_shortinfo_quizzes' ], 10 );
			add_action( 'manual__learnpress_course_shortinfo', 'learn_press_course_students', 15 );
			add_action( 'manual__learnpress_course_shortinfo', [ $this, 'learnpress__course_shortinfo_assessments' ], 20 );
			add_action( 'manual__learnpress_course_shortinfo', [ $this,'learnpress__course_shortinfo_duration' ], 25 );
			add_action( 'manual__learnpress_course_shortinfo', [ $this, 'learnpress__course_shortinfo_language' ], 30 );
			add_action( 'manual__learnpress_course_shortinfo', [ $this, 'learnpress__course_shortinfo_time' ], 35 );
			
			// Lession 
			add_action( 'manual__learnpress_before_title', [ $this, 'learnpress__lession_display_format' ], 10, 1 );
		}
		
		public function learnpress__single_course_buttons() {
			LP()->template( 'course' )->course_buttons();
		}
		
		public function learnpress__course_ratings() {
			if ( ! $this->is_plugin_activated('LP_Addon_Course_Review_Preload') ) {
				return;
			}
			$course_id   = get_the_ID();
			$course_rate = learn_press_get_course_rate( $course_id );
			$ratings     = learn_press_get_course_rate_total( $course_id );
			?>
			<div class="course-review">
            	<div class="pull-left"><i class="fas fa-star icon"></i></div>
                <div class="pull-right">
                    <label><?php esc_html_e( 'Review', 'manual' ); ?></label>
                    <div class="value">
						<?php $this->learnpress__print_rating( $course_rate ); ?>
                        <span><?php $ratings ? printf( _n( '(%1$s)', '(%1$s)', $ratings, 'manual' ), number_format_i18n( $ratings ) ) : esc_html_e( '(0)', 'manual' ); ?></span>
                    </div>
                </div>
			</div>
			<?php
	   }
	   
	   public function learnpress__print_rating( $rate ) {
			?>
			<div class="review-stars-rated">
				<ul class="review-stars">
					<li><span class="far fa-star"></span></li>
					<li><span class="far fa-star"></span></li>
					<li><span class="far fa-star"></span></li>
					<li><span class="far fa-star"></span></li>
					<li><span class="far fa-star"></span></li>
				</ul>
				<ul class="review-stars filled"
					style=" <?php echo esc_attr( 'width: calc(' . ( $rate * 20 ) . '% - 2px)' ) ?> ">
					<li><span class="fa fa-star"></span></li>
					<li><span class="fa fa-star"></span></li>
					<li><span class="fa fa-star"></span></li>
					<li><span class="fa fa-star"></span></li>
					<li><span class="fa fa-star"></span></li>
				</ul>
			</div>
			<?php
		}
		
		public function learnpress__course_shortinfo_lectures() {
			$course      = LP_Global::course();
			$count_items = $course->count_items();
			//if ( empty( $count_items ) ) { return; }
			?>
            <li class="meta-lectures">
                <i class="icon_document_alt"></i>
                <span class="label"><?php esc_html_e( 'Lessons', 'manual' ); ?></span>
                <span class="value"><?php echo $count_items ? ent2ncr( $count_items ) : 0; ?></span>
            </li>
			<?php
		}
		
		public function learnpress__course_shortinfo_duration() {
			$course   = LP_Global::course();
			$duration = $course->get_data( 'duration' );
			if ( empty( $duration ) ) {
				return;
			}

			$duration_string = $duration;

			$duration_arr = explode( ' ', $duration );
			if ( count( $duration_arr ) === 2 ) {
				$duration_number = intval( $duration_arr[0] );
				$duration_time   = $duration_arr[1];

				switch ( $duration_time ) {
					case 'week' :
						$duration_string = sprintf( _n( '%s week', '%s weeks', $duration_number, 'manual' ), number_format_i18n( $duration_number ) );
						break;
					case 'day' :
						$duration_string = sprintf( _n( '%s day', '%s days', $duration_number, 'manual' ), number_format_i18n( $duration_number ) );
						break;
					case 'hour' :
						$duration_string = sprintf( _n( '%s hour', '%s hours', $duration_number, 'manual' ), number_format_i18n( $duration_number ) );
						break;
					case 'minute' :
						$duration_string = sprintf( _n( '%s minute', '%s minutes', $duration_number, 'manual' ), number_format_i18n( $duration_number ) );
						break;
				}
			}
			?>
            <li class="meta-duration">
                <i class="icon_clock_alt"></i>
                <span class="label"><?php esc_html_e( 'Duration', 'manual' ); ?></span>
                <span class="value"><?php echo ent2ncr( $duration_string ); ?></span>
            </li>
			<?php
		}
		
		public function learnpress__course_shortinfo_language() {
			$course_language = get_post_meta( get_the_ID(), 'manual_course_language', true );
			if ( empty( $course_language ) ) {
				return;
			}
			?>
            <li class="meta-language">
                <i class="icon_globe"></i>
                <span class="label"><?php esc_html_e( 'Language', 'manual' ); ?></span>
                <span class="value"><?php echo ent2ncr( $course_language ); ?></span>
            </li>
			<?php
		}
		
		public function learnpress__course_shortinfo_time() {
			$course_time = get_post_meta( get_the_ID(), 'manual_course_time', true );
			if ( empty( $course_time ) ) {
				return;
			}
			?>
            <li class="meta-deadline">
                <i class="icon_calendar"></i>
                <span class="label"><?php esc_html_e( 'Deadline', 'manual' ); ?></span>
                <span class="value"><?php echo ent2ncr( $course_time ); ?></span>
            </li>
			<?php
		}
		
		public function learnpress__course_shortinfo_quizzes() {
			$course   = LP_Global::course();
			$count_quizzes = count( $course->get_curriculum_items( 'lp_quiz' ) );
			if ( empty( $count_quizzes ) ) { return; }
		?>
            <li class="meta-puzzle">
                <i class="icon_puzzle"></i>
                <span class="label"><?php esc_html_e( 'Quizzes', 'manual' ); ?></span>
                <span class="value"><?php echo $course->get_curriculum_items( 'lp_quiz' ) ? count( $course->get_curriculum_items( 'lp_quiz' ) ) : 0; ?></span>
            </li>
        <?php
        }
        
        public function learnpress__course_shortinfo_assessments() {
			$course  = LP_Global::course();
			$course_id = get_the_ID();
		?>
            <li class="meta-assessments">
                <i class="icon_puzzle"></i>
                <span class="label"><?php esc_html_e( 'Assessments', 'manual' ); ?></span>
                <span class="value"><?php echo ( get_post_meta( $course_id, '_lp_course_result', true ) == 'evaluate_lesson' ) ? esc_html__( 'Yes', 'manual' ) : esc_html__( 'Self', 'manual' ); ?></span>
            </li>
		<?php
		}
		
		function learnpress__course_thumbnail_item() {
			$theme_options = manual__theme_global_var();
			if( $theme_options['learnpress_display_feature_image'] == true ) {
				learn_press_get_template( 'single-course/thumbnail.php' );
			}
		}
		
		public function learnpress__lession_display_format($item) {
			echo $format = get_post_format( $item->get_id() );
		}
		
		public function learnpress_entry_sharing() {
			if ( ! is_singular( 'lp_course' ) ) {
				return;
			}

			?>
			<div class="entry-course-share">
				<?php manual_social_share(get_permalink()); ?>
			</div>
			<?php
		}
		
		
		public function manual__learnpress_related_courses(){
			$theme_options = manual__theme_global_var();
			if( $theme_options['learnpress_related_post_course_column'] == 3 ) {
				$no_of_related_post_to_display = 4;
			} else {
				$no_of_related_post_to_display = 3;
			}
			
			$related_courses    = $this->manual__learnpress_get_related_courses($no_of_related_post_to_display);
			
			if ( $related_courses ) {
				echo '<h4 class="related-title">'.esc_html__( 'Related Courses', 'manual' ).'</h4>';
				
				echo '<div class="manual-course-wrapper"><div class="">';
				foreach ( $related_courses as $course_item ) {
					$course = learn_press_get_course( $course_item->ID );
					  echo '<div class="col-md-'.$theme_options['learnpress_related_post_course_column'].' col-sm-6 col-md-6 col-xs-12 learnpress_related_course course-wrapper hvr-float lp_course">
						<div class="course-box">';
						
					  if( has_post_thumbnail() ) {
						  $image_title   = get_the_title( get_post_thumbnail_id() ) ? esc_attr( get_the_title( get_post_thumbnail_id() ) ) : '';	 
						  $image = get_the_post_thumbnail( $course_item->ID, 'full', array( 'title' => $image_title, 'alt'   => $image_title ) );	 
						  echo '<div class="course-thumbnail wrap-image"> 
								<a class="course-permalink" href="'.get_the_permalink( $course_item->ID ).'">
									'.apply_filters( 'learn_press_single_course_image_html', sprintf( '%s', $image ), $course_item->ID ).'
								</a> 
							  </div>';
					 }
					 
					 echo '<div class="course-info">';
					 $term_list = strip_tags (get_the_term_list(  $course_item->ID, 'course_category', '', ', ', '' ));
					 echo '<div class="course-categories">';
					 printf( '<p class="cat-links">%s</p>', $term_list );
					 echo '</div>';
					 echo '<'.$theme_options['learnpress_related_post_course_titletag'].' class="course-title"><a href="'.get_the_permalink( $course_item->ID ).'" class="course-permalink">'.esc_html( $course_item->post_title ).'</a></'.$theme_options['learnpress_related_post_course_titletag'].'>';
					 echo '<div class="course-related-meta">';
					
					 echo '<div class="course-lesson">
							<span class="meta-icon far fa-file-alt"></span>
							<span class="meta-value">';
					 printf( _n( '%s Lesson', '%s Lessons', $course_item->lession, 'manual' ), number_format_i18n( $course_item->lession ) );		
					 echo '</span>
						</div>';
					
					 if ( $price = $course->get_price_html() ) {
						$origin_price = $course->get_origin_price_html();
						$sale_price   = $course->get_sale_price();
						$sale_price   = isset( $sale_price ) ? $sale_price : '';
						echo '<div class="course-price '.$theme_options['learnpress_related_post_course_price_titletag'].'">';
						if ( $sale_price ) { echo '<span class="origin-price">' . $origin_price . '</span>'; }
						echo '<span class="price">'.$price.'</span>'; 
						echo '</div>';
					 }
					 echo '</div>
						  </div>
						</div>
					  </div>';
				}
				echo '</div></div>';
			}
		}
		
		public function manual__learnpress_get_related_courses( $limit ) {
			if ( !$limit ) {
				$limit = 3;
			}
			$course_id = get_the_ID();
	
			$tag_ids = array();
			$tags    = get_the_terms( $course_id, 'course_tag' );
	
			if ( $tags ) {
				foreach ( $tags as $individual_tag ) {
					$tag_ids[] = $individual_tag->term_id;
				}
			}
	
			$args = array(
				'posts_per_page'      => $limit,
				'paged'               => 1,
				'ignore_sticky_posts' => 1,
				'post__not_in'        => array( $course_id ),
				'post_type'           => 'lp_course'
			);
	
			if ( $tag_ids ) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'course_tag',
						'field'    => 'term_id',
						'terms'    => $tag_ids
					)
				);
			}
			$related = array();
			if ( $posts = new WP_Query( $args ) ) {
				global $post;
				while ( $posts->have_posts() ) {
					$posts->the_post();
					//lession - insert
					$post->lession = $this->manual_fetch_loop_course_meta_lesson();
					$related[] = $post;
				}
			}
			wp_reset_query();
	
			return $related;
		}
		
		
		/*******************
		* BECOME A TEACHER *
		********************/
		public function change_learnpress__become_a_teacher(){
			remove_action( 'learn-press/before-become-teacher-form', 'learn_press_become_teacher_heading', 10 );
			remove_action( 'learn-press/become-teacher-form', 'learn_press_become_teacher_form_fields', 5 );
			remove_action( 'learn-press/after-become-teacher-form', 'learn_press_become_teacher_button', 10 );
			add_action( 'learn-press/become-teacher-form', [ $this, 'manual__become_teacher_form' ], 5 );
			add_action( 'learn-press/after-become-teacher-form', [ $this, 'manual__become_teacher_button' ], 10 );
		}
		public function manual__become_teacher_form() {
			learn_press_get_template( 'global/become-teacher-form/form-fields.php', array( 'fields' => learn_press_get_become_a_teacher_form_fields() ) );
		}
		public function manual__become_teacher_button() {
			learn_press_get_template( 'global/become-teacher-form/button.php' );
		}

		/***********************
		* USER PROFILE SECTION *
		************************/
		public function change_learnpress__user_profile_components() {
			remove_action( 'learn-press/profile/dashboard-summary', 'learn_press_profile_dashboard_user_bio', 10 );
			remove_action(
				'learn-press/profile/dashboard-summary',
				LP()->template( 'profile' )->func( 'dashboard_featured_courses' ),
				20
			);
			remove_action(
				'learn-press/profile/dashboard-summary',
				LP()->template( 'profile' )->func( 'dashboard_latest_courses' ),
				30
			);
			add_action( 'learn-press/profile/dashboard-summary', [ $this, 'learn_press_user_profile_dashboard', ], 10 );
		}
		
		public function learn_press_user_profile_dashboard() {
			$profile = learn_press_get_profile();

			$completed_courses   = 0;
			$in_progress_courses = 0;
			$completed_quizzes   = 0;
			$in_progress_quizzes = 0;

			$courses_query = $profile->query_courses( 'purchased' );

			if ( ! empty( $courses_query['items'] ) ) {
				foreach ( $courses_query['items'] as $user_course ) {
					$course_status = $user_course->get_results( 'status' );

					switch ( $course_status ) {
						case 'in-progress' :
							$in_progress_courses++;
							break;
						case 'passed' :
							$completed_courses++;
							break;
					}
				}
			}

			$quizzes_query = $profile->query_quizzes();

			if ( ! empty( $quizzes_query['items'] ) ) {
				foreach ( $quizzes_query['items'] as $user_quiz ) {
					$quiz_status = $user_quiz->get_results( 'status' );

					switch ( $quiz_status ) {
						case 'started' :
							$in_progress_quizzes++;
							break;
						case 'completed' :
							$completed_quizzes++;
							break;
					}
				}
			}

			$completed_courses_number   = str_pad( $completed_courses, 2, '0', STR_PAD_LEFT );
			$in_progress_courses_number = str_pad( $in_progress_courses, 2, '0', STR_PAD_LEFT );
			$completed_quizzes_number   = str_pad( $completed_quizzes, 2, '0', STR_PAD_LEFT );
			$in_progress_quizzes_number = str_pad( $in_progress_quizzes, 2, '0', STR_PAD_LEFT );
			?>

			<div class="profile-progress-status">
				<div class="row">
					<div class="col-md-3 col-sm-6">
						<div class="userdash-box-wrap success courses-completed">
							<h3><?php echo esc_html( $completed_courses_number ); ?><h3>
							<h5><?php esc_html_e( 'Courses Completed', 'manual' ); ?></h5>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="userdash-box-wrap  warning courses-in-progress">
							<h3><?php echo esc_html( $in_progress_courses_number ); ?></h3>
							<h5><?php esc_html_e( 'Courses In Progress', 'manual' ); ?></h5>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="userdash-box-wrap  info quizzes-completed">
							<h3><?php echo esc_html( $completed_quizzes_number ); ?></h3>
							<h5><?php esc_html_e( 'Quizzes Completed', 'manual' ); ?></h5>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="userdash-box-wrap error courses-completed">
							<h3><?php echo esc_html( $in_progress_quizzes_number ); ?></h3>
							<h5><?php esc_html_e( 'Quizzes  In Progress', 'manual' ); ?></h5>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		
		/**********************
		* ADD EXTRA USER INFO *
		***********************/
		public function manual__extra_userinfo_add( $fields ) {
			$new_fields = array(
				array(
					'name'  => 'phone_number',
					'label' => esc_html__( 'Phone Number', 'manual' ),
				),
				array(
					'name'  => 'career',
					'label' => esc_html__( 'Career', 'manual' ),
				),
				array(
					'name'  => 'email_address',
					'label' => esc_html__( 'Email Address', 'manual' ),
				),
				array(
					'name'  => 'facebook',
					'label' => esc_html__( 'Facebook', 'manual' ),
				),
				array(
					'name'  => 'twitter',
					'label' => esc_html__( 'Twitter', 'manual' ),
				),
				array(
					'name'  => 'instagram',
					'label' => esc_html__( 'Instagram', 'manual' ),
				),
				array(
					'name'  => 'linkedin',
					'label' => esc_html__( 'Linkedin', 'manual' ),
				),
				array(
					'name'  => 'pinterest',
					'label' => esc_html__( 'Pinterest', 'manual' ),
				),
				array(
					'name'  => 'youtube',
					'label' => esc_html__( 'Youtube', 'manual' ),
				),
			);

			foreach ( $new_fields as $new_field ) {
				if ( ! isset( $fields[ $new_field['name'] ] ) ) {
					$fields[ $new_field['name'] ] = $new_field['label'];
				}
			}

			return $fields;
		}
		
		public static function get__extra_userinfo_career( $user_id = false ) {
			$career = get_the_author_meta( 'career', $user_id );
	
			if ( empty( $career ) ) {
				return;
			}
			?>
			<div class="author-career">
				<?php echo esc_html( $career ); ?>
			</div>
			<?php
		}
		
		public static function get__extra_userinfo_socials( $user_id = false ) {
		$email_address = get_the_author_meta( 'email_address', $user_id );
		$facebook      = get_the_author_meta( 'facebook', $user_id );
		$twitter       = get_the_author_meta( 'twitter', $user_id );
		$instagram     = get_the_author_meta( 'instagram', $user_id );
		$linkedin      = get_the_author_meta( 'linkedin', $user_id );
		$pinterest     = get_the_author_meta( 'pinterest', $user_id );
		$youtube       = get_the_author_meta( 'youtube', $user_id );
		?>
		<?php if ( $facebook || $twitter || $instagram || $linkedin || $email_address ) : ?>
			<div class="author-social-networks">
				<div class="inner">
					<?php if ( $twitter ) : ?>
						<a href="<?php echo esc_url( $twitter ); ?>" target="_blank">
							<i class="fab fa-twitter"></i>
						</a>
					<?php endif; ?>

					<?php if ( $facebook ) : ?>
						<a href="<?php echo esc_url( $facebook ); ?>" target="_blank">
							<i class="fab fa-facebook-f"></i>
						</a>
					<?php endif; ?>

					<?php if ( $instagram ) : ?>
						<a href="<?php echo esc_url( $instagram ); ?>" target="_blank">
							<i class="fab fa-instagram"></i>
						</a>
					<?php endif; ?>

					<?php if ( $linkedin ) : ?>
						<a href="<?php echo esc_url( $linkedin ); ?>" target="_blank">
							<i class="fab fa-linkedin"></i>
						</a>
					<?php endif; ?>

					<?php if ( $pinterest ) : ?>
						<a href="<?php echo esc_url( $pinterest ); ?>" target="_blank">
							<i class="fab fa-pinterest"></i>
						</a>
					<?php endif; ?>

					<?php if ( $youtube ) : ?>
						<a href="<?php echo esc_url( $youtube ); ?>" target="_blank">
							<i class="fab fa-youtube"></i>
						</a>
					<?php endif; ?>

					<?php if ( $email_address ) : ?>
						<a href="mailto:<?php echo esc_url( $email_address ); ?>" target="_blank">
							<i class="fas fa-envelope"></i>
						</a>
					<?php endif; ?>
				</div>
			</div>
		<?php endif;
	}
	
	
	public function get_addon__membership_level_price( $level ) {
		if ( pmpro_isLevelFree( $level ) ): ?>
			<?php esc_html_e( 'Free', 'manual' ); ?>
		<?php else: ?>
			<?php
			global $pmpro_currency, $pmpro_currency_symbol, $pmpro_currencies;

			$price = $level->initial_payment;
			//start with the price formatted with two decimals
			$formatted = number_format( (double) $price, 0 );

			//settings stored in array?
			if ( ! empty( $pmpro_currencies[ $pmpro_currency ] ) && is_array( $pmpro_currencies[ $pmpro_currency ] ) ) {
				//format number do decimals, with decimal_separator and thousands_separator
				$formatted = number_format( $price,
					( isset( $pmpro_currencies[ $pmpro_currency ]['decimals'] ) ? (int) $pmpro_currencies[ $pmpro_currency ]['decimals'] : 2 ),
					( isset( $pmpro_currencies[ $pmpro_currency ]['decimal_separator'] ) ? $pmpro_currencies[ $pmpro_currency ]['decimal_separator'] : '.' ),
					( isset( $pmpro_currencies[ $pmpro_currency ]['thousands_separator'] ) ? $pmpro_currencies[ $pmpro_currency ]['thousands_separator'] : ',' )
				);

				//which side is the symbol on?
				if ( ! empty( $pmpro_currencies[ $pmpro_currency ]['position'] ) && $pmpro_currencies[ $pmpro_currency ]['position'] == 'left' ) {
					$formatted = $pmpro_currency_symbol . $formatted;
				} else {
					$formatted = $formatted . $pmpro_currency_symbol;
				}
			} else {
				$formatted = $pmpro_currency_symbol . $formatted;
			}    //default to symbol on the left

			//filter
			$cost_text = apply_filters( 'pmpro_format_price', $formatted, $price, $pmpro_currency, $pmpro_currency_symbol );

			echo ent2ncr( $cost_text ); ?>
		<?php endif;
	}
	
	
	 public function manual__get_membership_level_price( $level ) {
			if ( pmpro_isLevelFree( $level ) ): ?>
				<?php esc_html_e( 'Free', 'manual' ); ?>
			<?php else: ?>
				<?php
				global $pmpro_currency, $pmpro_currency_symbol, $pmpro_currencies;

				$price = $level->initial_payment;
				//start with the price formatted with two decimals
				$formatted = number_format( (double) $price, 0 );

				//settings stored in array?
				if ( ! empty( $pmpro_currencies[ $pmpro_currency ] ) && is_array( $pmpro_currencies[ $pmpro_currency ] ) ) {
					//format number do decimals, with decimal_separator and thousands_separator
					$formatted = number_format( $price,
						( isset( $pmpro_currencies[ $pmpro_currency ]['decimals'] ) ? (int) $pmpro_currencies[ $pmpro_currency ]['decimals'] : 2 ),
						( isset( $pmpro_currencies[ $pmpro_currency ]['decimal_separator'] ) ? $pmpro_currencies[ $pmpro_currency ]['decimal_separator'] : '.' ),
						( isset( $pmpro_currencies[ $pmpro_currency ]['thousands_separator'] ) ? $pmpro_currencies[ $pmpro_currency ]['thousands_separator'] : ',' )
					);

					//which side is the symbol on?
					if ( ! empty( $pmpro_currencies[ $pmpro_currency ]['position'] ) && $pmpro_currencies[ $pmpro_currency ]['position'] == 'left' ) {
						$formatted = $pmpro_currency_symbol . $formatted;
					} else {
						$formatted = $formatted . $pmpro_currency_symbol;
					}
				} else {
					$formatted = $pmpro_currency_symbol . $formatted;
				}    //default to symbol on the left

				//filter
				$cost_text = apply_filters( 'pmpro_format_price', $formatted, $price, $pmpro_currency, $pmpro_currency_symbol );

				echo ent2ncr( $cost_text ); ?>
			<?php endif;
		}
		
		
		/**********************
		* CUSTOM ORDER        *
		***********************/
		function is_archive() {
			return $this->is_taxonomy() || is_post_type_archive( 'lp_course' );
		}
		function is_taxonomy() {
			return is_tax( get_object_taxonomies( 'lp_course' ) );
		}
		
		public function manual__get_ordering_options() {
			return [
				'popularity' => esc_html__( 'Popularity', 'manual' ),
				'date'       => esc_html__( 'Latest', 'manual' ),
				'price'      => esc_html__( 'Price: low to high', 'manual' ),
				'price-desc' => esc_html__( 'Price: high to low', 'manual' ),
			];
		}

		public function manual__get_ordering_selected_option() {
			$order_by = ! empty( $_GET['orderby'] ) ? $_GET['orderby'] : 'date';
			return $order_by;
		}
		
		public function manual__change_main_loop_courses_query( $query ) {
			if ( !$query->is_main_query() || !$this->is_archive() || is_admin() ) {
				return;
			}

			$orderby = isset( $_GET['orderby'] ) ? $_GET['orderby'] : false;
			if ( ! empty( $orderby ) ) {
				switch ( $orderby ) {
					case 'popularity':
						$query->set( 'meta_key', '_lp_students' );
						$query->set( 'orderby', 'meta_value' );
						$query->set( 'order', 'DESC' );
						break;
					case 'date':
						$query->set( 'orderby', 'date' );
						break;
					case 'price':
						$query->set( 'meta_key', '_lp_price' );
						$query->set( 'orderby', 'meta_value title' );
						$query->set( 'order', 'ASC' );
						break;
					case 'price-desc':
						$query->set( 'meta_key', '_lp_price' );
						$query->set( 'orderby', 'meta_value title' );
						$query->set( 'order', 'DESC' );
						break;
				}
			}
		}
		
		public function save_post( $post_ID ) {
			$sort_price = 0;
			$sale_price = get_post_meta( $post_ID, '_lp_sale_price', true );

			if ( '' !== $sale_price ) {
				$sort_price = $sale_price;
			} else {
				$price = get_post_meta( $post_ID, '_lp_price', true );
				if ( '' !== $price ) {
					$sort_price = $price;
				}
			}
			update_post_meta( $post_ID, '_lp_sort_price', $sort_price );
		}
		
		public function manual__render_button( $args ) {
		$defaults = [
			'text'          => '',
			'link'          => [
				'url'         => '',
				'is_external' => false,
				'nofollow'    => false,
			],
			'style'         => 'flat',
			'size'          => 'nm',
			'icon'          => '',
			'icon_align'    => 'left',
			'extra_class'   => '',
			'class'         => 'tm-button',
			'id'            => '',
			'wrapper_class' => '',
		];

		$args = wp_parse_args( $args, $defaults );
		extract( $args );

		$button_attrs = [];

		$button_classes   = [ $class ];
		$button_classes[] = 'style-' . $style;
		$button_classes[] = 'tm-button-' . $size;

		if ( ! empty( $extra_class ) ) {
			$button_classes[] = $extra_class;
		}

		if ( ! empty( $icon ) ) {
			$button_classes[] = 'icon-' . $icon_align;
		}

		$button_attrs['class'] = implode( ' ', $button_classes );

		if ( ! empty( $id ) ) {
			$button_attrs['id'] = $id;
		}

		$button_tag = 'div';

		if ( ! empty( $link['url'] ) ) {
			$button_tag = 'a';

			$button_attrs['href'] = $link['url'];

			if ( ! empty( $link['is_external'] ) ) {
				$button_attrs['target'] = '_blank';
			}

			if ( ! empty( $link['nofollow'] ) ) {
				$button_attrs['rel'] = 'nofollow';
			}
		}

		$attributes_str = '';

		if ( ! empty( $button_attrs ) ) {
			foreach ( $button_attrs as $attribute => $value ) {
				$attributes_str .= ' ' . $attribute . '="' . esc_attr( $value ) . '"';
			}
		}

		$wrapper_classes = 'tm-button-wrapper';
		if ( ! empty( $wrapper_class ) ) {
			$wrapper_classes .= " $wrapper_class";
		}
		?>
		<div class="<?php echo esc_attr( $wrapper_classes ); ?>">
			<?php printf( '<%1$s %2$s>', $button_tag, $attributes_str ); ?>
			<div class="button-content-wrapper">
				<?php if ( ! empty( $text ) ): ?>
					<span class="custom-botton">
						<?php if( 'left' === $icon_align ) { ?> <i class="<?php echo esc_attr( $icon ); ?>"></i> <?php } ?>
						&nbsp;&nbsp;<?php echo esc_html( $text ); ?>&nbsp;&nbsp;
						<?php if( 'right' === $icon_align ) { ?> <i class="<?php echo esc_attr( $icon ); ?>"></i> <?php } ?>
                    </span>
				<?php endif; ?>
			</div>
			<?php printf( '</%1$s>', $button_tag ); ?>
		</div>
		<?php
	}
		
		
	}
	Manual__IP_Course::instance()->initialize();
}

function manual__get_course_categories( $cats = false ) {
	global $wpdb;
	$query = $wpdb->get_results( $wpdb->prepare(
		"
				  SELECT      t1.term_id, t2.name
				  FROM        $wpdb->term_taxonomy AS t1
				  INNER JOIN $wpdb->terms AS t2 ON t1.term_id = t2.term_id
				  WHERE t1.taxonomy = %s
				  AND t1.count > %d
				  ",
		'course_category', 0
	) );

	if ( ! $cats ) {
		$cats = array();
	}
	if ( ! empty( $query ) ) {
		foreach ( $query as $key => $value ) {
			$cats[ $value->name ] = $value->term_id;
		}
	}

	return $cats;
}
?>