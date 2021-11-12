<?php
$return = '';
$panel_list = $instance['panel'] ? $instance['panel'] : '';

$return = '<div class="loop-manual-elementor-help-blocks">';
if( isset($panel_list) && !empty($panel_list) ) {
	foreach ( $panel_list as $key => $panel ) {
	
	$target = $panel['link']['is_external'] ? ' target="_blank"' : '';
	$nofollow = $panel['link']['nofollow'] ? ' rel="nofollow"' : '';
		
	 $return .= '<a href="'.$panel['link']['url'].'" '.$target.' '.$nofollow.'>
	   <div class="vc-help-blocks counter-text hvr-float">
		  <div class="browse-help-desk" style="background:'.$panel['bg_color'].';"><div class="browse-help-desk-div"> ';
		  
			$image = $panel['image']['id'];
			if (is_numeric($image) && isset($image)) {
				$image_src = wp_get_attachment_image($image, 'full');
				$return .= $image_src;
			} else {
				$return .= '<i class="'.$panel['icon_name']['value'].' i-fa" style="color:'.$panel['icon_color'].';"></i>';
			}
			
			$return .= '</div>
			<div class="m-and-p">
			  <h5 style="color:'.$panel['text_color'].';">'.esc_html( $panel['title'] ).'</h5>
			  <p style="color:'.$panel['text_color'].';">'.ent2ncr( $panel['panel_body'] ).'</p>';
			
			 $return .= '<p class="padding" style="color:'.$panel['text_color'].';"><span class="custom-link hvr-icon-wobble-horizontal" style="color:'.$panel['link_color'].'!important;">'.esc_html( $panel['link_text'] ).'</span></p>';
			
			$return .= '</div>
		  </div>
		</div></a>';
	}
}
$return .= '</div>';
echo ent2ncr( $return );