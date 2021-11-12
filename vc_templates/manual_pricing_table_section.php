<?php
$args = array(
    "title"        => "",
    "price"        => "",
    "currency"     => "",
    "price_period" => "",
	"link"         => "",
	"active"       => "",
	"background_color"  => "",
	"box_border_color"  => "",
	"text_color"  => "",
	"title_tag"  => "h5",
	"standout_box_bg_color"  => "",
);
extract(shortcode_atts($args, $atts));

$standout = $standout_bg_color = $link_html = $add_parm = '';

$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
if( isset($link['target']) && $link['target'] != ''  ) { 
	$add_parm = 'target="_blank"';
} 

if( isset($link['title']) && $link['title'] != '' ) {
	$link_html = '<div> <a href="'.$link['url'].'" class="custom-botton" '.$add_parm .'>'.$link['title'].'</a> </div>';
}

if( $active == 'yes' ) {
	$standout = 'standout';
	$standout_bg_color = 'background:'.$standout_box_bg_color.';';
}

if( isset($text_color) && $text_color != '' ) {
	$text_color = 'color:'.$text_color.'!important;';
}

echo '<div class="service_table_holder pricing-table '.$standout.' hvr-float" style="'.$text_color.''.$standout_bg_color.'">
  <ul class="service_table_inner" style="background:'.$background_color.';border-color:'.$box_border_color.';">
    <li class="service_table_title_holder">
      <'.$title_tag.' style="color:'.$text_color.'!important;margin: 5px 0px 0px 0px;">'.$title.'</'.$title_tag.'>
	  <div class="price_in_table">
		  <sup class="value">'.$currency.'</sup>
		  <span class="price">'.$price.'</span>
		  <span class="mark">'.$price_period.'</span>
	  </div>
    </li>
    <li class="service_table_content">
      '.do_shortcode($content).'
      '.$link_html.'
    </li>
  </ul>
</div>';
?>