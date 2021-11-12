<?php
$title           = $instance['title'];
$link            = $instance['link'];
$portfoio_image  = $instance['portfoio_image'];
$title_tag       = $instance['title_tag'];
$bg_color       = $instance['bg_color'];
$text_color       = $instance['text_color'];
$text_hover_color  = $instance['text_hover_color'];

$time_start = microtime(true);
$time_start = explode(".", $time_start);
if( isset($text_color) && $text_color != '' ) {
	echo '<style>.monitor_frame_main_div .item_holder.slide_up .portfolio_title_holder .portfolio_title.elementor a.color_'.$time_start[1].' {color:'.$text_color.';}.monitor_frame_main_div .item_holder.slide_up .portfolio_title_holder .portfolio_title.elementor a.color_'.$time_start[1].':hover {color:'.$text_hover_color.';}</style>';
}

$style_call = '';
if( $bg_color ) $style_call = 'style="background:'.$bg_color.';"';

if (isset($portfoio_image['url'])) {
	$image_src = $portfoio_image['url'];
} else {
	$image_src = trailingslashit( get_template_directory_uri() ). 'img/no-portfolio-img.jpg';
}

$url = $instance['link']['url'] ? $instance['link']['url'] : '';
$target = $instance['link']['is_external'] ? ' target="_blank"' : '';
$nofollow = $instance['link']['nofollow'] ? ' rel="nofollow"' : '';
		
$return  = '<div class="monitor_frame_main_div mix hvr-bob">
			<img class="monitor_frame" alt="frame" src="'.trailingslashit( get_template_directory_uri() ).'/img/monitor_frame.png">';
			
$return  .= '<div class="item_holder slide_up">';
				
				if( $title != ''  ) {
				$return  .= '<div class="portfolio_title_holder elementor" '.$style_call.'>
								<'.$title_tag.' class="portfolio_title elementor"><a class="color_'.$time_start[1].'" href="'.$url.'" '.$target.' '.$nofollow.'>'.$title.'</a></'.$title_tag.'>
							</div>';
				}
				
				if( $url != '' ) {
				$return  .= '<a class="portfolio_link_class" href="'.$url.'" '.$target.' '.$nofollow.'></a>'; 
				}
				$return  .= '<div class="portfolio_shader"></div> <div class="image_holder">
					<span class="image"><img src="'.$image_src.'"></span>
				</div>';
			
$return  .= '</div></div>';

echo ent2ncr( $return );