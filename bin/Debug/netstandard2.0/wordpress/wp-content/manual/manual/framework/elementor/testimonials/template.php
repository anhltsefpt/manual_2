<?php
$return           = '';
$text_color              = $instance['text_color'];
$name_title_tag          = $instance['name_title_tag'];
$author_text_color       = $instance['author_text_color'];
$custom_font_size        = $instance['custom_font_size'];
$custom_line_height      = $instance['custom_line_height'];
$panel_list              = $instance['panel'] ? $instance['panel'] : '';

echo '<style>.vc_sc_testo .owl-page span{ background:'.$text_color.'!important;}</style>';
$return .= '<div class="home-testo-desk vc_sc_testo">'; 
	if( isset($panel_list) && !empty($panel_list) ) {
		foreach ( $panel_list as $key => $panel ) {
		$return .= '<div class="testimonial text-center"><div class="testimonial-text">
				<div class="testimonial-quote">
					<p class="textmsg" style="color:'.$text_color.';font-size:'.$custom_font_size.';line-height:'.$custom_line_height.';">
					'.ent2ncr( $panel['panel_body'] ).'
					</p>
				</div>
				<'.$name_title_tag.' style="color:'.$author_text_color.';">'.esc_html( $panel['panel_title'] ).'</'.$name_title_tag.'>
			 </div></div>';
		}
	}
$return .= '</div>';
echo ent2ncr( $return );