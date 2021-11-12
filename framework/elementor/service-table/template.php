<?php
$title        = $instance['title'];
$iconimage     = $instance['iconimage']['value'];
$description   = $instance['description'];
$link          = $instance['link'];
$background_color  = $instance['background_color'];
$box_border_color  = $instance['box_border_color'];
$link_text_color  = $instance['link_text_color'];
$box_font_color  = $instance['box_font_color'];
$icon_color  = $instance['icon_color'];
$description_text_color  = $instance['description_text_color'];
$panel_list  = $instance['panel'] ? $instance['panel'] : '';
$link_text  = $instance['link_text'];


$target = $link['is_external'] ? ' target="_blank"' : '';
$nofollow = $link['nofollow'] ? ' rel="nofollow"' : '';


if( isset($link_text) && $link_text != '' ) {
	$link_html = '<div> <a href="'.$link['url'].'" class="custom-link hvr-icon-wobble-horizontal" '.$target .' '.$nofollow.' style="color:'.$link_text_color.'!important;">'.$link_text.' &nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a> </div>';
} else {
	$link_html = '';
}

$return = '<div class="service_table_holder hvr-float">
  <ul class="service_table_inner" style="background:'.$background_color.';border-color:'.$box_border_color.';color:'.$box_font_color.';">
    <li class="service_table_title_holder">
      <h5 style="color:'.$box_font_color.'!important;">'.$title.'</h5>
      <i class="'.$iconimage.'" style="color:'.$icon_color.'"></i>
      <p class="info" style="color:'.$description_text_color.'">'.$description.'</p>
    </li>
    <li class="service_table_content"><ul>';
	if( isset($panel_list) && !empty($panel_list) ) {
		foreach ( $panel_list as $key => $panel ) {
			$return .= '<li>'.esc_html( $panel['item_text'] ).'</li>';
		}
	}
$return .= '</ul> '.$link_html.'</li>
  </ul>
</div>';


echo ent2ncr( $return );