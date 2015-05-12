<?php
/*
Plugin Name: W3Responsive Tabs
Plugin URI: http://w3itinfo.com/plugins/w3responsivetab
Description: This plugin will add an expand collapse tab feature inside a post or page. You can embed w3responsivetab via shortcode in everywhere you want, Even theme files.
Author: W3itinfo
Author URI: http://w3itinfo.com/
Version: 1.0
*/
/*Some Set-up*/
define('W3_TAB_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
/* Latest jQuery from Wordpress */
function w3itinfo_tab_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'w3itinfo_tab_latest_jquery');
function w3itinfo_tab_plugin_main_js() {
/* Plugin javascript Main file */
wp_enqueue_script('w3itinfo-tab-plugin-main', W3_TAB_PLUGIN_PATH.'js/plugin.js', array('jquery'), 1.0, false);

/* Plugin custm CSS file */
wp_enqueue_style('w3itinfo-tab-plugin-style', W3_TAB_PLUGIN_PATH.'css/style.css');
}
add_action('wp_enqueue_scripts','w3itinfo_tab_plugin_main_js');

/***
***************************<<<<<<<<Generates Tab Short-code>>>>>>>*********************************
***/
function w3itinfo_tab_main($atts, $content = null) {
	extract(shortcode_atts(array(
        'tab_id'      => '',
        'position'      => ''
    ), $atts));
return ('<script type="text/javascript">
jQuery(document).ready(function (jQuery) {
         jQuery(".tab'.$tab_id.'").pwstabs({
			tabsPosition: "'.$position.'",		 
			horizontalPosition: "top",		 
			verticalPosition: "left",	 
			containerWidth: "600px",		 
			 responsive:true,		 
			defaultTab: 2		 
		 });
		   });
</script>
<div class="tab'.$tab_id.'">'.do_shortcode($content).'</div>');
}
add_shortcode ("w3itinfotab", "w3itinfo_tab_main");
function w3itinfo_tab_toggles($atts, $content = null) {
	extract(shortcode_atts(array(
        'tabname'      => '',
        'tabtitle'      => '',
    ), $atts));

	return ('<div data-pws-tab="'.$tabname.'" data-pws-tab-name="'.$tabtitle.'">'.$content.'</div>');
}
add_shortcode ("tabtoggle", "w3itinfo_tab_toggles");









?>