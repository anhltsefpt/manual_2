<?php 
/*-----------------------------------------------------------------------------------*/
/*	BBPRESS FORUM
/*-----------------------------------------------------------------------------------*/
function bind_bbp_list_forums( $args = '' ) {
	
	// Define used variables
	$output = $sub_forums = $topic_count = $reply_count = $counts = '';
	$i = 0;
	$count = array();
	
	// Defaults and arguments
	$defaults = array (
		'before'            => '<ul class="bbp-forums-list">',
		'after'             => '</ul>',
		'link_before'       => '<li class="bbp-forum clearfix">',
		'link_after'        => '</li>',
		'count_before'      => ' (',
		'count_after'       => ')',
		'count_sep'         => ', ',
		'separator'         => ', ',
		'forum_id'          => '',
		'show_topic_count'  => true,
		'show_reply_count'  => true,
		'show_freshness_link'  => true,
	);
	$r = bbp_parse_args( $args, $defaults, 'list_forums' );
	extract( $r, EXTR_SKIP );
	
	// Bail if there are no subforums
	if ( !bbp_get_forum_subforum_count( $forum_id ) )
		return;
	
	// Loop through forums and create a list
	$sub_forums = bbp_forum_get_subforums( $forum_id );
	if ( !empty( $sub_forums ) ) {
	
		// Total count (for separator)
		$total_subs = count( $sub_forums );
		foreach ( $sub_forums as $sub_forum ) {
			$i++; // Separator count
	
			// Get forum details
			$count       = array();
			$show_sep    = $total_subs > $i ? $separator : '';
			$permalink   = bbp_get_forum_permalink( $sub_forum->ID );
			$title       = bbp_get_forum_title( $sub_forum->ID );
			$description = bbp_get_forum_content( $sub_forum->ID );
	
			// Show topic count
			if ( !empty( $show_topic_count ) && !bbp_is_forum_category( $sub_forum->ID ) ) {
				$count['topic'] = bbp_get_forum_topic_count( $sub_forum->ID );
			}
	
			// Show reply count
			if ( !empty( $show_reply_count ) && !bbp_is_forum_category( $sub_forum->ID ) ) {
				$count['reply'] =  bbp_get_forum_post_count( $sub_forum->ID );
			}
	
			// Counts to show
			$counts_post = $counts_topics = '';
			if ( !empty( $count ) ) {
				//$counts = $count_before . implode( $count_sep, $count ) . $count_after;
				$counts_topics = '<div class="topic-reply-counts">' . $count['topic'] . '</div>';
				$counts_post = '<div class="topic-reply-counts">' . $count['reply'] . '</div>';
			}
			
			if ( !empty( $show_freshness_link ) ) {
	
				$forum_topic_count = bbp_get_forum_topic_count($sub_forum->ID);
				if ( $forum_topic_count == 0 ) {
					$freshness_link = "			
					<div class='freshness-forum-link'>
					<div class='bbp-update-author bbp-landing-forum-wrap'></div>
					<div class='landing-forum-wrap-content'>" . bind_get_last_poster_block( $sub_forum->ID ) . "</div>
					</div>
					";
				} else {
					$freshness_link = "			
					<div class='freshness-forum-link'>
					<div class='bbp-update-author bbp-landing-forum-wrap'>".do_action( 'bbp_theme_before_topic_author' )."
					<span class='bbp-topic-freshness-author'>".bbp_get_author_link( array( 'post_id' => bbp_get_forum_last_active_id(), 'size' => 50 ) )."</span>
					".do_action( 'bbp_theme_after_topic_author' )." </div>
					<div class='landing-forum-wrap-content'>" . bind_get_last_poster_block( $sub_forum->ID ) . "</div>
					</div>
					";
				}
			}
	
			// Build this sub forums link
			if ($i % 2) { $class = "odd-forum-row"; } else { $class = "even-forum-row"; }
			$output .= "<li class='{$class}'><ul>" . $link_before . '<div class="bbp-forum-title-container"><h5><a href="' . $permalink . '" class="bbp-forum-link">' . $title . '</a></h5><p class="bbp-forum-description">' . $description . '</p></div>' . $counts_topics . $counts_post . $freshness_link . $link_after . "</ul></li>";
		}
	
		// Output the list
		echo apply_filters( 'bbp_list_forums', $before . $output . $after, $args );
	}
}
	
	
/* Generate a list of topics a user has started, but with a limit argument */
function ht_bbp_get_user_topics_started( $user_id = 0, $limit = 3, $max_num_pages = 1 ) {
	
	// Validate user
	$user_id = bbp_get_user_id( $user_id );
	if ( empty( $user_id ) )
		return false;

	// Query defaults
	$default_query = array(
		'author'         => $user_id,
		'show_stickies'  => false,
		'order'          => 'DESC',
		'posts_per_page' => $limit,
		'max_num_pages' => $max_num_pages			
	);

	// Try to get the topics
	$query = bbp_has_topics( $default_query );
	if ( empty( $query ) )
		return false;

	return apply_filters( 'bbp_get_user_topics_started', $query, $user_id );
}

	
/** Last poster / freshness block for forums */
function ht_last_poster_block( $subforum_id = "" ) {
	echo bind_get_last_poster_block( $subforum_id = "" );
}
	
function bind_get_last_poster_block( $subforum_id = "" ) {
			
	if ( !empty( $subforum_id ) ) {
		// Main forum display with sub forums
		$ht_forum_topic_count_two = bbp_get_forum_topic_count( $subforum_id );
		
		
		if ( $ht_forum_topic_count_two == 0 ) {
		$output = "<div class='last-posted-topic-title no-topics'>";
		$output .= __( 'No Topics', 'manual');
		} else {
		$output = "<div class='last-posted-topic-title'>";
		
		// Get and crop title lenth if needed
		$ht_topic_last_reply_title = bbp_get_topic_last_reply_title( bbp_get_forum_last_active_id( $subforum_id ) );
		$ht_topic_last_reply_title_print = (strlen($ht_topic_last_reply_title) > 50) ? ht_mb_safe_substr($ht_topic_last_reply_title, 53).'&hellip;' : $ht_topic_last_reply_title;
		
		$output .= "<a href='". bbp_get_forum_last_topic_permalink( $subforum_id ) ."'>" . $ht_topic_last_reply_title_print . "</a>";
		$output .= "</div>";
		$output .= "<div class='last-posted-topic-time'>";
		$output .= bbp_get_forum_last_active_time( $subforum_id );
		}
		$output .= "</div>";
	} else {
		// forum category display (no sub forums list)
		$ht_forum_topic_count = bbp_get_forum_topic_count();
		
		if ( $st_forum_topic_count == 0 ) {
		$output = "<div class='last-posted-topic-title no-topics'>";
		$output .= _e('No Topics', 'manual');
		} else {
		$output = "<div class='last-posted-topic-title'>";

		// Get and crop title lenth if needed
		$ht_topic_last_reply_title = bbp_get_topic_last_reply_title( bbp_get_forum_last_active_id( $subforum_id ) );
		$ht_topic_last_reply_title_print = (strlen($ht_topic_last_reply_title) > 50) ? ht_mb_safe_substr($ht_topic_last_reply_title, 53).'&hellip;' : $ht_topic_last_reply_title;
		
		$output .= "<a href='". bbp_get_forum_last_topic_permalink() ."'>" . $ht_topic_last_reply_title_print . "</a>";
		$output .= "</div>";
		$output .= "<div class='last-posted-topic-time'>";
		$output .= bbp_get_forum_last_active_time();
		}
		$output .= "</div>";
		
	}
	
	return $output;

}

/* mb safe substring function */
function ht_mb_safe_substr($string, $length){
	if(function_exists('mb_substr') && function_exists('utf8_decode')){
		$str = mb_substr($string, 0, $length, 'UTF-8');
		return utf8_decode($str);
	} else {
		//default to substr
		return substr($string, 0, $length);
	}
	
}
	
/* Last poster / freshness block for topics */
function ht_last_poster_block_topics() {
	echo ht_get_last_poster_block_topics();
}

function ht_get_last_poster_block_topics() {

		$output .= "<div class='last-posted-topic-user'>";
		$output .= bbp_get_reply_author_link( array( 'post_id' => bbp_get_topic_last_active_id(), 'size' => '14' ) );
		$output .= "</div>";
		$output .= "<div class='last-posted-topic-time'>";
		$output .= bbp_get_topic_last_active_time( bbp_get_topic_last_active_id() );
		$output .= "</div>";
	
	return $output;

}
?>