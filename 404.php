<?php get_header(); 
	$background_color =	'#F7F9F9';
	$background_image_position = 'center center';
	$h1_font_size = '180px';
	$pagenotfound_lineheight = '170px';
	$h1_letter_spacing = '0.3px';
	$h1_letter_color = '#002e5b';
	$h1_font_weight = '';
	$p_class_color = '#002e5b';
	$p_text_position = 'center';
	$margin = '100px 1px 100px 1px';
	$h2_subtitle_color = '#363d40';

$is_plugin_active = manual__plugin_active('ReduxFramework');
if( $is_plugin_active == false ){
	$h1_text = esc_html__( '404' , 'manual' ); 
	$p_text = esc_html__( 'The link BROKEN, or the page has been REMOVED. Try search our site.' , 'manual' ); 
	$h3_text = esc_html__( 'Oops! That page can\'t be found' , 'manual' );
	$display_404_page_search = $display_404_page_content = true;
} else {
	$h1_text = esc_html($theme_options['404-pagetitme']);
	$h1_letter_color = esc_html($theme_options['404-title-text-color']); 
	$h2_subtitle_color = esc_html($theme_options['404-subtitle-text-color']); 
	$p_text = esc_html($theme_options['404-contenttext']); 
	$h3_text = esc_html($theme_options['404-sustitle']);
	$display_404_page_content = esc_attr($theme_options['404-disable-page-contnet']);
	$display_404_page_search = esc_attr($theme_options['404-disable-page-search']);
	$p_class_color = esc_attr($theme_options['404-contenttext-color']);
}
?>
<!-- /start container -->
<?php 
if( isset( $theme_options['404-page-background-color'] ) && $theme_options['404-page-background-color'] != '' ) { 
	echo '<div style="background:'.esc_attr($theme_options['404-page-background-color']).'">';  
} 
?>
<div class="container content-wrapper body-content">
<div class="row">

<?php if( $display_404_page_content == true ){  ?>
<div class="col-md-12 col-sm-12 404page_open" style="padding:50px 0px;margin:<?php echo esc_attr($margin); ?>; text-align:<?php echo esc_attr($p_text_position); ?>;">
    <h1 class="title" style="font-size:<?php echo esc_attr($h1_font_size); ?>; line-height:<?php echo esc_attr($pagenotfound_lineheight); ?>; letter-spacing:<?php echo esc_attr($h1_letter_spacing); ?>; color:<?php echo esc_attr($h1_letter_color); ?>; font-weight:<?php echo esc_attr($h1_font_weight); ?>;"><?php echo esc_html($h1_text); ?></h1>	
    <?php if($h3_text!='') { ?><h3 style="color:<?php echo esc_attr($h2_subtitle_color); ?>;"><?php echo esc_html($h3_text); ?></h3><?php } ?>
    <p class="text" style="color:<?php echo esc_attr($p_class_color); ?>"><?php echo esc_html($p_text); ?></p>
    <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 page404search">
    <?php if( $display_404_page_search == true ) { echo manual__standard_search_form(); } ?>
    </div>
</div>
<?php } ?>

</div>
</div>
<?php 
if( isset( $theme_options['404-page-background-color'] ) && $theme_options['404-page-background-color'] != '' ) { echo '</div>';  } 
get_footer(); 
?>