<?php
$return           = '';
$team_image       = $instance['team_image'];
$image_hover_effect = $instance['image_hover_effect'];
$team_name        = $instance['team_name'];
$name_title_tag   = $instance['name_title_tag'];
$name_color       = $instance['name_color'];
$team_position    = $instance['team_position'];
$position_color   = $instance['position_color'];
$show_separator   = $instance['show_separator'];
$separator_color  = $instance['separator_color'];
$icons_color      = $instance['icons_color'];
$icons_color_hover  = $instance['icons_color_hover'];
// social - 1
$team_social_icon_1         = $instance['team_social_icon_1']['value'];
$team_social_icon_1_link    = $instance['team_social_icon_1_link'];
$team_social_icon_1_target  = $instance['team_social_icon_1_target'];
// social - 2
$team_social_icon_2         = $instance['team_social_icon_2']['value'];
$team_social_icon_2_link    = $instance['team_social_icon_2_link'];
$team_social_icon_2_target  = $instance['team_social_icon_2_target'];
// social - 3
$team_social_icon_3         = $instance['team_social_icon_3']['value'];
$team_social_icon_3_link    = $instance['team_social_icon_3_link'];
$team_social_icon_3_target  = $instance['team_social_icon_3_target'];
// social - 4
$team_social_icon_4         = $instance['team_social_icon_4']['value'];
$team_social_icon_4_link    = $instance['team_social_icon_4_link'];
$team_social_icon_4_target  = $instance['team_social_icon_4_target'];

$time_start = microtime(true);
$time_start = explode(".", $time_start);
if( isset($icons_color) && $icons_color != '' ) {
	echo '<style>.manual_team .team_social_holder.normal_social i.simple_social.color_'.$time_start[1].' {color:'.$icons_color.';}.manual_team .team_social_holder.normal_social i.simple_social.color_'.$time_start[1].':hover {color:'.$icons_color_hover.';}</style>';
}


if (is_numeric($team_image) && isset($team_image)) {
	$image_src = wp_get_attachment_image($team_image, 'full');
} else {
	$image_src = '<img src="'.trailingslashit( get_template_directory_uri() ). 'img/team-blank.png">';
}

if( $show_separator == 'yes' ) {
	$seprator = '<div class="separator" style="background-color:'.$separator_color.'"></div>';
} else {
	$seprator = '<div class="no-separator"></div>';
}
		
$return .= '<div class="manual_team">
		  <div class="manual_team_inner">
			<div class="manual_team_image '.$image_hover_effect.'">'.$image_src.'</div>
			<div class="manual_team_text" style="padding-top:0px;">
				<div class="manual_team_title_holder">
				<'.$name_title_tag.' class="manual_team_name" style="color:'.$name_color.'!important;">'.$team_name.'</'.$name_title_tag.'>
				<span style="color:'.$position_color.';">'.$team_position.'</span> '.$seprator.'';

if( (isset($team_social_icon_1) && $team_social_icon_1 != '') ||
	(isset($team_social_icon_2) && $team_social_icon_2 != '') ||
	(isset($team_social_icon_3) && $team_social_icon_3 != '') ||
	(isset($team_social_icon_4) && $team_social_icon_4 != '') ) {
	
$return .= '<div class="team_social_holder">
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_1_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_1.' simple_social color_'.$time_start[1].' " ></i></a></span>
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_2_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_2.' simple_social  color_'.$time_start[1].' " ></i></a></span>
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_3_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_3.' simple_social  color_'.$time_start[1].' " ></i></a></span>
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_4_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_4.' simple_social  color_'.$time_start[1].' " ></i></a></span>
					</div>';
 } 		
$return .= '</div>
			</div>
		  </div>
		</div>';
		
echo ent2ncr( $return );