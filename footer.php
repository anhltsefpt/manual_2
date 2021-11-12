<!-- SECTION FOOTER TOP-->
<?php 
manual_footer_controls(); 
//SECTION FOOTER -->
manual_footer_controls_lower();
// Layout
$global_website_presentation = manual__website_global_design_control();
if( isset($global_website_presentation) && $global_website_presentation != '' ) { 
	echo '</div>'; 
}
// HOOK -->
wp_footer(); 
?>
</body></html>