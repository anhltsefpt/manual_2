<?php
$title        = $instance['title'];
$price        = $instance['price'];
$currency     = $instance['currency'];
$price_period = $instance['price_period'];
$link         = $instance['link'];
$active       = $instance['active'];
$background_color  = $instance['background_color'];
$box_border_color  = $instance['box_border_color'];
$text_color  = $instance['text_color'];
$title_tag  = $instance['title_tag'];
$standout_box_bg_color  = $instance['standout_box_bg_color'];
$panel_list  = $instance['panel'] ? $instance['panel'] : '';
$button_text  = $instance['button_text'];

$standout = $standout_bg_color = $link_html = $add_parm = '';
$target = $link['is_external'] ? ' target="_blank"' : '';
$nofollow = $link['nofollow'] ? ' rel="nofollow"' : '';

if( isset($button_text) && $button_text != '' ) {
	$link_html = '<div> <a href="'.$link['url'].'" '.$target.' '.$nofollow.' class="custom-botton">'.$button_text.'</a> </div>';
}

if( $active == 'yes' ) {
	$standout = 'standout';
	$standout_bg_color = 'background:'.$standout_box_bg_color.';';
}

if( isset($text_color) && $text_color != '' ) {
	$text_color = 'color:'.$text_color.'!important;';
}

$return = '<div class="service_table_holder pricing-table '.$standout.' hvr-float" style="'.$text_color.''.$standout_bg_color.'">
  <ul class="service_table_inner" style="background:'.$background_color.';border-color:'.$box_border_color.';">
    <li class="service_table_title_holder">
      <'.$title_tag.' style="color:'.$text_color.'!important;margin: 5px 0px 0px 0px;">'.$title.'</'.$title_tag.'>
	  <div class="price_in_table">
		  <sup class="value">'.$currency.'</sup>
		  <span class="price">'.$price.'</span>
		  <span class="mark">'.$price_period.'</span>
	  </div>
    </li>
    <li class="service_table_content"><ul>';
	if( isset($panel_list) && !empty($panel_list) ) {
		foreach ( $panel_list as $key => $panel ) {
			$return .= '<li style="border-bottom: 1px solid #F0F0F0;">'.esc_html( $panel['item_text'] ).'</li>';
		}
	}
$return .= '</ul> '.$link_html.'</li>
  </ul>
</div>';


echo ent2ncr( $return );