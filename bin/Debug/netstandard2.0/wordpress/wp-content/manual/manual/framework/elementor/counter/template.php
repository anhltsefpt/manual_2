<?php
$return           = '';
$position         = $instance['position'];
$digit            = $instance['digit'];
$font_weight      = $instance['font_weight'];
$font_color       = $instance['font_color'];
$text             = $instance['text'];
$text_transform   = $instance['text_transform'];
$text_color       = $instance['text_color'];
$text_font_weight = $instance['text_font_weight'];
$separator        = $instance['separator'];
$separator_color  = $instance['separator_color'];
$text_tag         = $instance['text_tag'];

//Position
if( isset($position) && $position != '' ) { 
	$position = 'text-align:'.$position.';';
} else { $position = ''; }
// Countdown Color
if( isset($font_color) && $font_color != '' ) { $font_color = 'color:'.$font_color.';';  
} else { $font_color = ''; }
// Countdown Font Weight
if( isset($font_weight) && $font_weight != '' ) { $font_weight = 'font-weight:'.$font_weight.';'; 
} else { $font_weight = ''; }
// Text Color
if( isset($text_color) && $text_color != '' ) { $text_color =  $text_color = 'color:'.$text_color.';';  
} else { $text_color = ''; }
// Text Font Weight
if( isset($text_font_weight) && $text_font_weight != '' ) { $text_font_weight = 'font-weight:'.$text_font_weight.';'; 
} else { $text_font_weight = ''; }
// Separator Color
if( isset($separator_color) && $separator_color != '' ) { $separator_color = $separator_color;
} else { $separator_color = ''; }
// Text Transform 
if( isset($text_transform) && $text_transform != '' ) { $text_transform = 'text-transform:'.$text_transform.';'; 
} else { $text_transform = ''; }
// Separator yes/no
if( $separator === 'yes' ) { 
	$separator_html = '<div class="separator small elem-fix" style="background:'.$separator_color.'"></div>';
	$count_down_value_height = '';
} else { 
	$separator_html = '';
	$count_down_value_height = 'height: 75px;'; 
}

$return  = '<div class="funact-main-div text-white" style="'.$position.'">
  <div class="timer counter-select-number" data-to="'.$digit.'" data-speed="10000" style="'.$font_color.''.$count_down_value_height.''.$font_weight.''.$position.'">'.$digit.'</div>
 '.$separator_html.'
  <'.$text_tag.' class="counter-sc-text" style="'.$text_color.''.$text_font_weight.''.$text_transform.'">'.$text.'</'.$text_tag.'>
</div>';

echo ent2ncr( $return );