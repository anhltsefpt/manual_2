<?php
$title      = $instance['title'];
$link       = $instance['link'];
$portfoio_image  = $instance['portfoio_image'];
$image_border_shadow  = $instance['image_border_shadow'];
$box_css_animation  = $instance['box_css_animation'];
$position  = $instance['position'];
$margin  = $instance['margin'];
$title_tag  = $instance['title_tag'];
$text_padding  = $instance['text_padding'];
			
if (is_numeric($portfoio_image) && isset($portfoio_image)) {
	$image_src = wp_get_attachment_url($portfoio_image);
} else {
	$image_src = trailingslashit( get_template_directory_uri() ). 'img/no-portfolio-img.jpg';
}

$target = $instance['link']['is_external'] ? ' target="_blank"' : '';
$nofollow = $instance['link']['nofollow'] ? ' rel="nofollow"' : '';

if( $image_border_shadow == true ) $shadow = "shadow";
else $shadow = '';

$return = '<div class="portfolio-item-wrap" style="text-align:'.$position.';margin:'.$margin.';"><div class="portfolio-item '.$shadow.' '.$box_css_animation.'">
			<a href="'.$instance['link']['url'].'" '.$target.' '.$nofollow.'> <div class="image-wrap"><img src="'.$image_src.'"></div> </a>';
$return .= '</div>';
if( isset($title) && $title != '' ) { $return .= '<'.$title_tag.' style="padding:'.$text_padding.' 0px;">'.$title.'</'.$title_tag.'>'; }
$return .= '</div>';
		
echo ent2ncr( $return );