<?php
$title_text_replace_color = $short_message_text_replace_color = $title_text_replace_weight  = $short_message_text_replace_weight = $title_text_replace_font_size = $short_message_replace_text_font_size = $button_text_replace_color = $button_bg_replace_color = $message_box_border_replace_color = $button_replace_margin_top = $margin_right =$message_box_background_replace_color = '';
$message_box_border    = $instance['message_box_border'];
$message_box_background_color    = $instance['message_box_background_color'];
$message_box_border_color    = $instance['message_box_border_color'];
$title_text    = $instance['title_text'];
$title_text_color  = $instance['title_text_color'];
$title_text_weight = $instance['title_text_weight'];
$title_text_font_size = $instance['title_text_font_size'];
$short_message_text  = $instance['short_message_text'];
$short_message_text_color  = $instance['short_message_text_color'];
$short_message_text_weight  = $instance['short_message_text_weight'];
$short_message_text_font_size  = $instance['short_message_text_font_size'];
$link = $instance['link'];
$button_text_color = $instance['button_text_color'];
$button_bg_color = $instance['button_bg_color'];
$button_margin_top = $instance['button_margin_top'];
$title_tag = $instance['title_tag'];
$button_text = $instance['button_text'];

$url = $link['url'] ? $link['url'] : '';
$target = $link['is_external'] ? ' target="_blank"' : '';
$nofollow = $link['nofollow'] ? ' rel="nofollow"' : '';


$time_start = microtime(true);
$time_start = explode(".", $time_start);

if( !empty($message_box_border) && $message_box_border == 'yes' ) {
	$border_status = '';
	$border_padding = '';
	if( !empty($message_box_border_color) ) $message_box_border_replace_color = 'border:1px solid'.$message_box_border_color.'!important;';
} else {
	$border_status = 'border:none;';
	$border_padding = 'padding:0px;';
}

if( !empty($message_box_background_color) ) $message_box_background_replace_color = 'background:'.$message_box_background_color.';';
if( !empty($title_text_font_size) ) $title_text_replace_font_size = 'font-size:'.$title_text_font_size.'!important;';
if( !empty($title_text_weight) ) $title_text_replace_weight = 'font-weight:'.$title_text_weight.'!important;';
if( !empty($title_text_color) ) $title_text_replace_color = 'color:'.$title_text_color.'!important;';
if( !empty($short_message_text_color) ) $short_message_text_replace_color = 'color:'.$short_message_text_color.'!important;';
if( !empty($short_message_text_weight) ) $short_message_text_replace_weight = 'font-weight:'.$short_message_text_weight.'!important;';
if( !empty($short_message_text_font_size) ) $short_message_replace_text_font_size = 'font-size:'.$short_message_text_font_size.'!important;';
if( !empty($button_text_color) ) $button_text_replace_color = 'color:'.$button_text_color.'!important;';
if( !empty($button_bg_color) ) $button_bg_replace_color = 'background-color:'.$button_bg_color.'!important;';
if( !empty($button_margin_top) ) $button_replace_margin_top = 'margin-top:'.$button_margin_top.'!important;';

$return =  '<div class="promo" style="'.$border_status.' '.$message_box_border_replace_color.' '.$border_padding.' '.$message_box_background_replace_color.'">';

if( !empty($title_text) ) {	
if( empty($link['title']) ) $margin_right = 'margin-right:0px!important;';
$return .= '<'.$title_tag.' style="'.$title_text_replace_color.' '.$title_text_replace_weight.' '.$title_text_replace_font_size.' '.$margin_right.' ">'.$title_text.'</'.$title_tag.'>';
}

if( !empty($short_message_text) ) {			
$return .= '<p style="'.$short_message_text_replace_color.' '.$short_message_text_replace_weight.' '.$short_message_replace_text_font_size.'">'.$short_message_text.'</p>';
} 

if( !empty($button_text) ) {

echo '<style>.vc_btm_color_'.$time_start[1].' { '.$button_bg_replace_color.' }</style>';	
$return .= '<a href="'.$url.'" '.$target.' '.$nofollow.' class="custom-botton vc_btm_color_'.$time_start[1].'" style="'.$button_text_replace_color.' '.$button_replace_margin_top.'">'.$button_text.'</a>';
}

$return .= '</div>';
echo ent2ncr( $return );