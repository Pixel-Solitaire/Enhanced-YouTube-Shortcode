<?php
/*
Plugin Name: Enhanced YouTube Shortcode
Plugin URI: http://pixel-solitaire.com/telechargements/enhanced-youtube-shortcode/
Description: A simple <em>YouTube</em> shortcode with basic options & general improvement over the default coming with <em>Wordpress</em>. Activate then click "<strong>Settings=>Enhanced YouTube</strong>" in order to edit the player options & more infos. <strong>Usage sample:</strong> [youtube_video id="abxjy-emFvs"]
Version: 1.9
Author: le Pixel Solitaire
Author URI: http://pixel-solitaire.com/
License: GNU General Public License (v3)
*/

// Class uniqueness?
if(!class_exists('pxsol_youtube_plugin')) {

	// Class definition
	class pxsol_youtube_plugin {

		// Core function
		// /////////////
		function pxsol_youtube($atts) {
			//Data from the shortcode
			extract(shortcode_atts(array(
				'id' =>'', // the ID of the YouTube video * SHOULD STAY EMPTY HERE *
			), $atts)); 
			//Datas from recorded options
			$pxsol_youtube_autoplay = get_option('pxsol_youtube_autoplay');
			$pxsol_youtube_hd = get_option('pxsol_youtube_hd');
			$pxsol_youtube_width = get_option('pxsol_youtube_width');
			$pxsol_youtube_height = get_option('pxsol_youtube_height');
			$pxsol_youtube_fullScreen = get_option('pxsol_youtube_fullScreen');
			$pxsol_youtube_controls = get_option('pxsol_youtube_controls');
			$pxsol_youtube_autohide = get_option('pxsol_youtube_autohide');
			$pxsol_youtube_modestbranding = get_option('pxsol_youtube_modestbranding');
			$pxsol_youtube_theme = get_option('pxsol_youtube_theme');
			$pxsol_youtube_showinfo = get_option('pxsol_youtube_showinfo');
			//URL options creation
			$pxsol_switch_autoplay = '';
			if ($pxsol_youtube_autoplay == 'true'){
				$pxsol_switch_autoplay = '&autoplay=1';
			};
			$pxsol_switch_hd = '';
			if ($pxsol_youtube_hd == 'true'){
				$pxsol_switch_hd = '&hd=1';
			};
			$pxsol_switch_fullScreen = '';
			if ($pxsol_youtube_fullScreen == 'true'){
				$pxsol_switch_fullScreen = '&fs=1';
			} else {
				$pxsol_switch_fullScreen = '&fs=0';
			};
			$pxsol_switch_controls = '';
			if ($pxsol_youtube_controls == 'false'){
				$pxsol_switch_controls = '&controls=0';
			};
			$pxsol_switch_autohide = '';
			if ($pxsol_youtube_autohide == 'true'){
				$pxsol_switch_autohide = '&autohide=1';
			} else {
				$pxsol_switch_autohide = '&autohide=0';
			};
			$pxsol_switch_modestbranding = '';
			if ($pxsol_youtube_modestbranding == 'true'){
				$pxsol_switch_modestbranding = '&modestbranding=1';
			};
			$pxsol_switch_theme = '';
			if ($pxsol_youtube_theme == 'light'){
				$pxsol_switch_theme = '&theme=light';
			};
			$pxsol_switch_showinfo = '';
			if ($pxsol_youtube_showinfo == 'false'){
				$pxsol_switch_showinfo = '&showinfo=0';
			};
			$pxsol_youtube_switch = $pxsol_switch_fullScreen.$pxsol_switch_hd.$pxsol_switch_autoplay.$pxsol_switch_controls.$pxsol_switch_autohide.$pxsol_switch_modestbranding.$pxsol_switch_theme.$pxsol_switch_showinfo;
			//Code generation
			$generated_output = '<object style="height: '.$pxsol_youtube_height.'px; width: '.$pxsol_youtube_width.'px">
			<param name="movie" value="http://www.youtube.com/v/'.$id.'?version=3'.$pxsol_youtube_switch.'"></param>
			<param name="allowFullScreen" value="'.$pxsol_youtube_fullScreen.'"></param>
			<param name="allowScriptAccess" value="always"></param>
			<embed src="http://www.youtube.com/v/'.$id.'?version=3'.$pxsol_youtube_switch.'" type="application/x-shockwave-flash"	allowfullscreen="'.$pxsol_youtube_fullScreen.'" 
			allowScriptAccess="always" width="'.$pxsol_youtube_width.'" height="'.$pxsol_youtube_height.'"></embed>
			</object>';
			//Little error catcher
			if (empty($id)) { 
				$generated_output = '<span class="error-pxsol_youtube">You must set the ID of the YouTube video.</span>';	
			}; 
			//Final output
			return $generated_output;
		}

		// "Clean" DB creation
		// //////////////////////////////
		function pxsol_youtube_set_options() {
			add_option('pxsol_youtube_width','425','The width of the YouTube player.');
			add_option('pxsol_youtube_height','355','The height of the YouTube player.');
			add_option('pxsol_youtube_fullScreen','true','Offer or not the full screen option.');
			add_option('pxsol_youtube_controls','true','Display or not the control buttons.');
			add_option('pxsol_youtube_autoplay','false','Start the video on page load?');
			add_option('pxsol_youtube_hd','false','Force the HD streaming version? (if available)');
			add_option('pxsol_youtube_autohide','true','Hide or not the controls after video start.');
			add_option('pxsol_youtube_modestbranding','true','Hide or not the YouTube logo.');
			add_option('pxsol_youtube_theme','dark','Choose a dark or light buttons style.');
			add_option('pxsol_youtube_showinfo','true','Display infos before the video starts playing');
		}

		// "Clean" DB destruction
		// //////////////////////////////////////
		function pxsol_youtube_unset_options() {
			delete_option('pxsol_youtube_width');
			delete_option('pxsol_youtube_height');
			delete_option('pxsol_youtube_autoplay');
			delete_option('pxsol_youtube_hd');
			delete_option('pxsol_youtube_fullScreen');
			delete_option('pxsol_youtube_controls');
			delete_option('pxsol_youtube_autohide');
			delete_option('pxsol_youtube_modestbranding');
			delete_option('pxsol_youtube_theme');
			delete_option('pxsol_youtube_showinfo');
		}

		// Settings page creation
		// ////////////////////////
		function pxsol_youtube_settings_page() {
			require_once(WP_PLUGIN_DIR . '/enhanced-youtube-shortcode/display.php');
		}

		// Admin bar's buttons
		// ///////////////////
		function pxsol_admin_bar() {
			global $wp_admin_bar;
			$wp_admin_bar->add_menu( array( // Pixel button
				'id' => 'pixel_zone', 'title' => __('Pixel Solitaire'),	'href' => 'http://pixel-solitaire.com',	'meta' => array( target => '_blank', title => 'Les nouvelles du Pixel Solitaire' )
			));
			$wp_admin_bar->add_menu( array( // Plugin sub-button
				'parent' => 'pixel_zone', 'title' => __('Enhanced YouTube | WebPage'), 'href' => 'http://pixel-solitaire.com/telechargements/enhanced-youtube-shortcode/', 'meta' => array( target => '_blank', title => 'Plugin official webpage' )
			));
		}	

		// Pushing CSS & JS in the Loop
		// ///////////////////////
		function pxsol_youtube_init() {
			$pxsol_youtube_css_file = WP_PLUGIN_DIR . '/enhanced-youtube-shortcode/css/pxsol_youtube.css';
			$pxsol_youtube_css_link = WP_PLUGIN_URL . '/enhanced-youtube-shortcode/css/pxsol_youtube.css';
			$pxsol_jquery_plugin_file = WP_PLUGIN_DIR . '/enhanced-youtube-shortcode/js/idtabs.2.2.min.js';
			$pxsol_jquery_plugin_link = WP_PLUGIN_URL . '/enhanced-youtube-shortcode/js/idtabs.2.2.min.js';
			$pxsol_youtube_scripts_file = WP_PLUGIN_DIR . '/enhanced-youtube-shortcode/js/pxsol_youtube.js';
			$pxsol_youtube_scripts_link = WP_PLUGIN_URL . '/enhanced-youtube-shortcode/js/pxsol_youtube.js';
			if ( file_exists($pxsol_youtube_css_file) ) {
				wp_register_style('pxsol-youtube', $pxsol_youtube_css_link, false, '1.5', 'all');
				wp_enqueue_style('pxsol-youtube');
			};
			if ( file_exists($pxsol_jquery_plugin_file) ) {
				wp_register_script( 'jquery-idTabs', $pxsol_jquery_plugin_link, array('jquery'), '2.2' );
				wp_enqueue_script( 'jquery-idTabs' );
			};
			if ( file_exists($pxsol_youtube_scripts_file) ) {
				wp_register_script( 'pxsol-youtube-scripts', $pxsol_youtube_scripts_link, array('jquery-idTabs'), '2.0' );
				wp_enqueue_script( 'pxsol-youtube-scripts' );
			};
		}

		// Dashboard menu creation
		// ///////////////////////
		function pxsol_youtube_menu() {
			add_options_page( 
				'Enhanced YouTube Shortcode', 
				'Enhanced YouTube', 
				'manage_options', 
				__FILE__, 
				array($this,'pxsol_youtube_settings_page')
			);
		}
		
		// Add Settings link to plugin description
		// ///////////////////////////////////////
		function pxsol_youtube_desc_links($links, $file) {
			static $this_is_pxsol_youtube;
			if (!$this_is_pxsol_youtube) $this_is_pxsol_youtube = plugin_basename(__FILE__);
			if ($file == $this_is_pxsol_youtube){
				$pxsol_settings_link = '<a href="/wp-admin/options-general.php?page=enhanced-youtube-shortcode/enhanced-youtube-shortcode.php">'.__("Settings", "pxsol-youtube").'</a>';
				array_push($links, $pxsol_settings_link);
			};
			return $links;
		}
	}
};

// Class creation
// //////////////
if(class_exists("pxsol_youtube_plugin")) {
	$enhanced_youtube_shortcode = new pxsol_youtube_plugin;
}

// Hooks
// /////
add_shortcode('youtube_video', array($enhanced_youtube_shortcode,'pxsol_youtube'),1);
register_activation_hook(__FILE__, array($enhanced_youtube_shortcode,'pxsol_youtube_set_options'));
register_deactivation_hook(__FILE__, array($enhanced_youtube_shortcode,'pxsol_youtube_unset_options'));
if (is_admin()) {
	add_action( 'wp_before_admin_bar_render', array($enhanced_youtube_shortcode,'pxsol_admin_bar'),1);
	add_action( 'admin_init', array($enhanced_youtube_shortcode,'pxsol_youtube_init'),1);
	add_action('admin_menu', array($enhanced_youtube_shortcode,'pxsol_youtube_menu'),1);
	add_filter('plugin_action_links', array($enhanced_youtube_shortcode,'pxsol_youtube_desc_links'), 10, 2 );
}
?>