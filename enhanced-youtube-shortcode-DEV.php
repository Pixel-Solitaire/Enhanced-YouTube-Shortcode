<?php
/*
Plugin Name: Enhanced YouTube Shortcode
Plugin URI: http://pixel-solitaire.com/telechargements/enhanced-youtube-shortcode/
Description: A simple <em>YouTube</em> shortcode with basic options & general improvement over the default coming with <em>Wordpress</em>. Activate then click "<strong>Settings=>Enhanced YouTube</strong>" in order to edit the player options & more infos. <strong>Usage sample:</strong> [youtube_video id="abxjy-emFvs"]
Version: 1.5
Author: le Pixel Solitaire
Author URI: http://pixel-solitaire.com/
License: GNU General Public License (v3). See details at http://pxsol.info/rohPSr
*/

// Pushing CSS in the Loop
// ///////////////////////
function pxsol_youtube_init() {
	$pxsol_youtube_css_link = WP_PLUGIN_URL . '/enhanced-youtube-shortcode/css/pxsol_youtube.css';
	$pxsol_youtube_css_file = WP_PLUGIN_DIR . '/enhanced-youtube-shortcode/css/pxsol_youtube.css';
	if ( file_exists($pxsol_youtube_css_file) ) {
		wp_register_style('pxsol-youtube', $pxsol_youtube_css_link, false, '1.5', 'all');
		wp_enqueue_style('pxsol-youtube');
	};
}

// Core function
// /////////////
function pxsol_youtube($atts) {
	//Data from the shortcode
	extract(shortcode_atts(array(
		'id' =>'', // the ID of the YouTube video * SHOULD STAY EMPTY HERE *
	), $atts)); 
	//Datas from recorded options
	$width = get_option('pxsol_youtube_width');
	$height = get_option('pxsol_youtube_height');
	$allowFullScreen = get_option('pxsol_youtube_fullScreen');
	$controls = get_option('pxsol_youtube_controls');
	$autohide = get_option('pxsol_youtube_autohide');
	//URL options creation
	$pxsolUrlSwitch = '';
	if ($allowFullScreen = 'true'){$pxsolUrlSwitch = $pxsolUrlSwitch.'&fs=1';} else {$pxsolUrlSwitch = $pxsolUrlSwitch.'&fs=0';};
	if ($controls = 'true'){$pxsolUrlSwitch = $pxsolUrlSwitch.'&controls=1';} else {$pxsolUrlSwitch = $pxsolUrlSwitch.'&controls=0';};
	if ($autohide = 'true'){$pxsolUrlSwitch = $pxsolUrlSwitch.'&autohide=1';} else {$pxsolUrlSwitch = $pxsolUrlSwitch.'&autohide=0';};
	//Code generation
	$generated_output = '<object style="height: '.$height.'px; width: '.$width.'px">
	<param name="movie" value="http://www.youtube.com/v/'.$id.'?version=3'.$pxsolUrlSwitch.'"></param>
	<param name="allowFullScreen" value="'.$allowFullScreen.'"></param>
	<param name="allowScriptAccess" value="always"></param>
	<embed src="http://www.youtube.com/v/'.$id.'?version=3'.$pxsolUrlSwitch.'" type="application/x-shockwave-flash"	allowfullscreen="'.$allowFullScreen.'" 
	allowScriptAccess="always" width="'.$width.'" height="'.$height.'"></embed>
	</object>';
	//Error catcher
	if (empty($id)) { 
		$generated_output = '<span class="error-pxsol_youtube">You must set the ID of the YouTube video.</span>';	
	}; 
	//Final output
	return $generated_output;
}

// Options => "clean" storage creation
// ///////////////////////////////////
function pxsol_youtube_set_options() {
	add_option('pxsol_youtube_width','640','The width of the YouTube player.');
	add_option('pxsol_youtube_height','390','The height of the YouTube player.');
	add_option('pxsol_youtube_fullScreen','true','Offer or not the full screen option.');
	add_option('pxsol_youtube_controls','true','Display or not the control buttons.');
	add_option('pxsol_youtube_autohide','true','Hide or not the controls after video start.');
}

// Plugin => menu creation
// ///////////////////////
function pxsol_youtube_menu() {
	add_options_page( 
		'WP Enhanced YouTube Shortcode', 
		'Enhanced YouTube', 
		'manage_options', 
		__FILE__, 
		'pxsol_youtube_options' 
	);
}

// Options => page creation
// ////////////////////////
function pxsol_youtube_options() { ?>
<div id="pxsol_youtube" class="wrap">
	<h2 title="Enhanced YouTube Shortcode for WordPress">Enhanced YouTube Shortcode <i>v1.5</i></h2>
	<div class="pxsol_options pxsol_top"><div class="pxsol_bottom"><div class="pxsol_main">
		<h3>Player options</h3>
		<?php if ($_REQUEST['submit']) {
			pxsol_youtube_update_options();
		}
		pxsol_youtube_form(); 
		?>
	</div></div></div>
	<div class="pxsol_usage pxsol_top"><div class="pxsol_bottom"><div class="pxsol_main">
		<h3>Usage</h3>
		<p>Simply add this shortcode in your text to display a YouTube player.<br />
		<i>(...don't forget to replace the ID of the video with your choice!)</i></p>
		<blockquote class="dernier">[youtube_video id="abxjy-emFvs"]</blockquote>
	</div></div></div>
	<div class="pxsol_versions pxsol_top"><div class="pxsol_bottom"><div class="pxsol_main">
		<h3>Changelog</h3>
		<p class="dernier"><strong>v1.5</strong> Initial public release.<br />
		<strong>v1.4</strong> Bugs repair / visual styles.<br />
		<strong>v1.3</strong> Possibility to modify the options.<br />
		<strong>v1.2</strong> Addition of a page to display the usage & settings.<br />
		<strong>v1.1</strong> Translation of the code in a plugin form.<br />
		<strong>v1.0</strong> The code is <a target="_blank" href="http://pixel-solitaire.com/2011/08/04/wp-pixel-youtube/" title="Custom YouTube in WordPress – revisited || Les nouvelles du Pixel Solitaire">released</a> as an inclusion in <i>functions.php</i>.</p>
	</div></div></div>
	<div class="pxsol_infos pxsol_top"><div class="pxsol_bottom"><div class="pxsol_main">
		<h3>Additionnal informations</h3>
		<p>Created & tested on a <i>Wordpress 3.2.1</i> installation.</p>
		<p>This is the initial release of the plugin: many other features will be added very soon so keep in touch for updates!!!<br /><br />
		<strong>Official plugin homapge:</strong><br />
		<a target="_blank" href="http://pixel-solitaire.com/telechargements/enhanced-youtube-shortcode/" title="Official Plugin Webpage">http://pixel-solitaire.com/telechargements/enhanced-youtube-shortcode/</a>.</p>
		<br />
		<p class="dernier">
			<form style="float:left;" action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" title="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/fr_CA/i/scr/pixel.gif" width="1" height="1">
		</form>&nbsp;&nbsp;&nbsp;<a target="_blank" href="<?php echo WP_PLUGIN_URL ?>/enhanced-youtube-shortcode/license/gnu_gpl.txt" title="Protected under the the GNU General Public License." class="gnu-link"><img src="<?php echo WP_PLUGIN_URL ?>/enhanced-youtube-shortcode/images/gplv3-88x31.png" alt="GNU GPL3" title="Protected under the the GNU General Public License." width="88" height="31" /></a>&nbsp;&nbsp;&nbsp;<a target="_blank" href="http://pxsol.info/nrqCdW" title="Pixel-Solitaire/Enhanced-YouTube-Shortcode - GitHub" class="git-link"><img src="<?php echo WP_PLUGIN_URL ?>/enhanced-youtube-shortcode/images/github.png" alt="GitHub" title="Pixel-Solitaire/Enhanced-YouTube-Shortcode - GitHub" width="84" height="32" /></a>
		</p>
	</div></div></div>
</div>
<br />
<?php
}

// Options => update values
// ////////////////////////
function pxsol_youtube_update_options() {
	$pxsol_check = false;
	if ($_REQUEST['pxsol_youtube_width']) {	
		update_option('pxsol_youtube_width',$_REQUEST['pxsol_youtube_width']);
		$pxsol_check = true;
	}
	if ($_REQUEST['pxsol_youtube_height']) { 
		update_option('pxsol_youtube_height',$_REQUEST['pxsol_youtube_height']); 
		$pxsol_check = true;
	}
	if ($_REQUEST['pxsol_youtube_fullScreen']) { 
		update_option('pxsol_youtube_fullScreen',$_REQUEST['pxsol_youtube_fullScreen']); 
		$pxsol_check = true;
	}
	if ($_REQUEST['pxsol_youtube_controls']) { 
		update_option('pxsol_youtube_controls',$_REQUEST['pxsol_youtube_controls']); 
		$pxsol_check = true;
	}
	if ($_REQUEST['pxsol_youtube_autohide']) { 
		update_option('pxsol_youtube_autohide',$_REQUEST['pxsol_youtube_autohide']); 
		$pxsol_check = true;
	}
	if ($pxsol_check) { ?>
		<div id="message" class="updated fade">
			<p>Options saved! <strong>=)</strong></p>
		</div>
	<?php } else { ?>
		<div id="message" class="error fade">
			<p>Failed to save options <strong>:-(</strong></p>
		</div>
	<?php
	}
}

// Options => form creation
// ////////////////////////
function pxsol_youtube_form() {
	$default_youtube_width = get_option('pxsol_youtube_width');
	$default_youtube_height = get_option('pxsol_youtube_height');
	$default_youtube_allowFullScreen = get_option('pxsol_youtube_fullScreen');
	$default_youtube_controls = get_option('pxsol_youtube_controls');
	$default_youtube_autohide = get_option('pxsol_youtube_autohide'); ?>
		<form method="post">
			<ul>
				<li><label for="pxsol_youtube_width"><strong class="turquoise">Width of the player</strong>: <input class="text" type="text" name="pxsol_youtube_width" value="<?=$default_youtube_width?>" /> pixels.</label></li>
				<li><label for="pxsol_youtube_height"><strong class="turquoise">Height of the player</strong>:	<input class="text" type="text" name="pxsol_youtube_height" value="<?=$default_youtube_height?>" /> pixels.</label></li>
				<li><label for="pxsol_youtube_fullScreen"><strong class="turquoise">Offer the full screen feature?</strong><br />
					<?php if ($default_youtube_allowFullScreen == 'true') { ?>
					<input class="radio" type="radio" name="pxsol_youtube_fullScreen" value="true" checked /> <strong>Yes</strong> (<i>actual setting</i>)<br />
					<input class="radio" type="radio" name="pxsol_youtube_fullScreen" value="false" /> No
					<?php } else { ?>
					<input class="radio" type="radio" name="pxsol_youtube_fullScreen" value="true" /> Yes<br />
					<input class="radio" type="radio" name="pxsol_youtube_fullScreen" value="false" checked /> <strong>No</strong> (<i>actual setting</i>)
					<?php }; ?>
				</label></li>
				<li><label for="pxsol_youtube_controls"><strong class="turquoise">Display the control buttons?</strong><br />
					<?php if ($default_youtube_controls == 'true') { ?>
					<input class="radio" type="radio" name="pxsol_youtube_controls" value="true" checked /> <strong>Yes</strong> (<i>actual setting</i>)<br />
					<input class="radio" type="radio" name="pxsol_youtube_controls" value="false" /> No
					<?php } else { ?>
					<input class="radio" type="radio" name="pxsol_youtube_controls" value="true" /> Yes<br />
					<input class="radio" type="radio" name="pxsol_youtube_controls" value="false" checked /> <strong>No</strong> (<i>actual setting</i>)
					<?php }; ?>
				</label></li>
				<li><label for="pxsol_youtube_autohide"><strong class="turquoise">Hide the controls after video has started?</strong><br />
					<?php if ($default_youtube_autohide == 'true') { ?>
					<input class="radio" type="radio" name="pxsol_youtube_autohide" value="true" checked /> <strong>Yes</strong> (<i>actual setting</i>)<br />
					<input class="radio" type="radio" name="pxsol_youtube_autohide" value="false" /> No
					<?php } else { ?>
					<input class="radio" type="radio" name="pxsol_youtube_autohide" value="true" /> Yes<br />
					<input class="radio" type="radio" name="pxsol_youtube_autohide" value="false" checked /> <strong>No</strong> (<i>actual setting</i>)
					<?php }; ?>
				</label></li>
			<ul>
			<br />
			<input type="submit" name="submit" id="submit" title="Submit new option values" value="Save Options" />
		</form>
		<?php
}

// Options => "clean" storage destruction
// //////////////////////////////////////
function pxsol_youtube_unset_options() {
	delete_option('pxsol_youtube_width');
	delete_option('pxsol_youtube_height');
	delete_option('pxsol_youtube_fullScreen');
	delete_option('pxsol_youtube_controls');
	delete_option('pxsol_youtube_autohide');
}

// Admin bar's buttons
// ///////////////////
if (is_admin()) {
	function wp_admin_bar_pixel() {
		global $wp_admin_bar;
		$wp_admin_bar->add_menu( array(
			'id' => 'pixel_zone', 'title' => __('Pixel Solitaire'),	'href' => 'http://pixel-solitaire.com',	'meta' => array( target => '_blank', title => 'Les nouvelles du Pixel Solitaire' )
		));
		$wp_admin_bar->add_menu( array(
			'parent' => 'pixel_zone', 'title' => __('Enhanced YouTube Shortcode'), 'href' => 'http://pixel-solitaire.com/telechargements/enhanced-youtube-shortcode/', 'meta' => array( target => '_blank', title => 'Plugin official webpage' )
		));
	}	
	add_action( 'wp_before_admin_bar_render', 'wp_admin_bar_pixel' );
};

// Hooks
// /////
add_action( 'admin_init', 'pxsol_youtube_init' );
register_activation_hook(__FILE__,'pxsol_youtube_set_options');
register_deactivation_hook(__FILE__,'pxsol_youtube_unset_options');
add_action('admin_menu', 'pxsol_youtube_menu');
add_shortcode('youtube_video', 'pxsol_youtube');
?>