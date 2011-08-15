<?php
 /*
Plugin Name: Enhanced YouTube Shortcode
Plugin URI: http://pixel-solitaire.com/telechargements/enhanced-youtube-shortcode/
Description: A simple <em>YouTube</em> shortcode with basic options & general improvement over the default coming with <em>Wordpress</em>. Activate then click "<strong>Settings=>Enhanced YouTube</strong>" in order to edit the player options & more infos. <strong>Usage sample:</strong> [youtube_video id="abxjy-emFvs"]
Version: 1.7
Author: le Pixel Solitaire
Author URI: http://pixel-solitaire.com/
License: GNU General Public License (v3). See details at http://pxsol.info/rohPSr
*/
if(!class_exists('pxsol_youtube_plugin')) { class pxsol_youtube_plugin { function pxsol_youtube($atts) { extract(shortcode_atts(array( 'id' =>'', ), $atts)); $pxsol_youtube_autoplay = get_option('pxsol_youtube_autoplay'); $pxsol_youtube_hd = get_option('pxsol_youtube_hd'); $pxsol_youtube_width = get_option('pxsol_youtube_width'); $pxsol_youtube_height = get_option('pxsol_youtube_height'); $pxsol_youtube_fullScreen = get_option('pxsol_youtube_fullScreen'); $pxsol_youtube_controls = get_option('pxsol_youtube_controls'); $pxsol_youtube_autohide = get_option('pxsol_youtube_autohide'); $pxsol_youtube_modestbranding = get_option('pxsol_youtube_modestbranding'); $pxsol_switch_autoplay = ''; if ($pxsol_youtube_autoplay == 'true'){ $pxsol_switch_autoplay = '&autoplay=1'; } else { $pxsol_switch_autoplay = '&autoplay=0'; }; $pxsol_switch_hd = ''; if ($pxsol_youtube_hd == 'true'){ $pxsol_switch_hd = '&hd=1'; } else { $pxsol_switch_hd = '&hd=0'; }; $pxsol_switch_fullScreen = ''; if ($pxsol_youtube_fullScreen == 'true'){ $pxsol_switch_fullScreen = '&fs=1'; } else { $pxsol_switch_fullScreen = '&fs=0'; }; $pxsol_switch_controls = ''; if ($pxsol_youtube_controls == 'true'){ $pxsol_switch_controls = '&controls=1'; } else { $pxsol_switch_controls = '&controls=0'; }; $pxsol_switch_autohide = ''; if ($pxsol_youtube_autohide == 'true'){ $pxsol_switch_autohide = '&autohide=1'; } else { $pxsol_switch_autohide = '&autohide=0'; }; $pxsol_switch_modestbranding = ''; if ($pxsol_youtube_modestbranding == 'true'){ $pxsol_switch_modestbranding = '&modestbranding=1'; } else { $pxsol_switch_modestbranding = '&modestbranding=0'; }; $pxsol_youtube_switch = $pxsol_switch_fullScreen.$pxsol_switch_hd.$pxsol_switch_autoplay.$pxsol_switch_controls.$pxsol_switch_autohide.$pxsol_switch_modestbranding; $generated_output = '<object style="height: '.$pxsol_youtube_height.'px; width: '.$pxsol_youtube_width.'px">
			<param name="movie" value="http://www.youtube.com/v/'.$id.'?version=3'.$pxsol_youtube_switch.'"></param>
			<param name="allowFullScreen" value="'.$pxsol_youtube_fullScreen.'"></param>
			<param name="allowScriptAccess" value="always"></param>
			<embed src="http://www.youtube.com/v/'.$id.'?version=3'.$pxsol_youtube_switch.'" type="application/x-shockwave-flash"	allowfullscreen="'.$pxsol_youtube_fullScreen.'"
			allowScriptAccess="always" width="'.$pxsol_youtube_width.'" height="'.$pxsol_youtube_height.'"></embed>
			</object>'; if (empty($id)) { $generated_output = '<span class="error-pxsol_youtube">You must set the ID of the YouTube video.</span>'; }; return $generated_output; } function pxsol_youtube_set_options() { add_option('pxsol_youtube_width','425','The width of the YouTube player.'); add_option('pxsol_youtube_height','355','The height of the YouTube player.'); add_option('pxsol_youtube_fullScreen','true','Offer or not the full screen option.'); add_option('pxsol_youtube_controls','true','Display or not the control buttons.'); add_option('pxsol_youtube_autoplay','false','Start the video on page load?'); add_option('pxsol_youtube_hd','false','Force the HD streaming version? (if available)'); add_option('pxsol_youtube_autohide','true','Hide or not the controls after video start.'); add_option('pxsol_youtube_modestbranding','true','Hide or not the YouTube logo.'); } function pxsol_youtube_init() { $pxsol_youtube_css_link = WP_PLUGIN_URL . '/enhanced-youtube-shortcode/css/pxsol_youtube.css'; $pxsol_youtube_css_file = WP_PLUGIN_DIR . '/enhanced-youtube-shortcode/css/pxsol_youtube.css'; if ( file_exists($pxsol_youtube_css_file) ) { wp_register_style('pxsol-youtube', $pxsol_youtube_css_link, false, '1.5', 'all'); wp_enqueue_style('pxsol-youtube'); }; } function pxsol_youtube_desc_links($links, $file) { static $this_is_pxsol_youtube; if (!$this_is_pxsol_youtube) $this_is_pxsol_youtube = plugin_basename(__FILE__); if ($file == $this_is_pxsol_youtube){ $pxsol_settings_link = '<a href="/wp-admin/options-general.php?page=enhanced-youtube-shortcode/enhanced-youtube-shortcode.php">'.__("Settings", "pxsol-youtube").'</a>'; array_unshift($links, $pxsol_settings_link); }; return $links; } function pxsol_youtube_menu() { add_options_page( 'Enhanced YouTube Shortcode', 'Enhanced YouTube', 'manage_options', __FILE__, array($this,'pxsol_youtube_options') ); } function pxsol_youtube_options() { ?>
		<div id="pxsol_youtube" class="wrap">
			<h2 title="Enhanced YouTube Shortcode for WordPress">Enhanced YouTube Shortcode <i>v1.7</i></h2>
			<div class="pxsol_options pxsol_top"><div class="pxsol_bottom"><div class="pxsol_main">
				<h3>Settings</h3>
				<?php
 if ($_REQUEST['submit']) { $pxsol_check = false; if ($_REQUEST['pxsol_youtube_width']) { update_option('pxsol_youtube_width',$_REQUEST['pxsol_youtube_width']); $pxsol_check = true; } if ($_REQUEST['pxsol_youtube_height']) { update_option('pxsol_youtube_height',$_REQUEST['pxsol_youtube_height']); $pxsol_check = true; } if ($_REQUEST['pxsol_youtube_fullScreen']) { update_option('pxsol_youtube_fullScreen',$_REQUEST['pxsol_youtube_fullScreen']); $pxsol_check = true; } if ($_REQUEST['pxsol_youtube_autoplay']) { update_option('pxsol_youtube_autoplay',$_REQUEST['pxsol_youtube_autoplay']); $pxsol_check = true; } if ($_REQUEST['pxsol_youtube_hd']) { update_option('pxsol_youtube_hd',$_REQUEST['pxsol_youtube_hd']); $pxsol_check = true; } if ($_REQUEST['pxsol_youtube_controls']) { update_option('pxsol_youtube_controls',$_REQUEST['pxsol_youtube_controls']); $pxsol_check = true; } if ($_REQUEST['pxsol_youtube_autohide']) { update_option('pxsol_youtube_autohide',$_REQUEST['pxsol_youtube_autohide']); $pxsol_check = true; } if ($_REQUEST['pxsol_youtube_modestbranding']) { update_option('pxsol_youtube_modestbranding',$_REQUEST['pxsol_youtube_modestbranding']); $pxsol_check = true; } if ($pxsol_check) { ?>
						<div id="message" class="updated fade">
							<p>Settings saved! <strong>=)</strong></p>
						</div>
					<?php } else { ?>
						<div id="message" class="error fade">
							<p>Failed to save Settings <strong>:-(</strong></p>
						</div>
					<?php
 } } $default_youtube_width = get_option('pxsol_youtube_width'); $default_youtube_height = get_option('pxsol_youtube_height'); $default_youtube_fullscreen = get_option('pxsol_youtube_fullscreen'); $default_youtube_autoplay = get_option('pxsol_youtube_autoplay'); $default_youtube_hd = get_option('pxsol_youtube_hd'); $default_youtube_controls = get_option('pxsol_youtube_controls'); $default_youtube_autohide = get_option('pxsol_youtube_autohide'); $default_youtube_modestbranding = get_option('pxsol_youtube_modestbranding'); ?>
				<form method="post">
					<ul>
						<li class="dimension"><label for="pxsol_youtube_width"><strong class="turquoise">Player width:</strong>: <input class="text" type="text" name="pxsol_youtube_width" value="<?=$default_youtube_width?>" /> pixels.</label></li>
						<li class="dimension dernier"><label for="pxsol_youtube_height"><strong class="turquoise">Player height:</strong>:	<input class="text" type="text" name="pxsol_youtube_height" value="<?=$default_youtube_height?>" /> pixels.</label></li>
						<div class="clear">&nbsp;</div>
						<li><label for="pxsol_youtube_fullscreen"><strong class="turquoise">Offer the full screen feature?</strong><br />
							<?php if ($default_youtube_fullscreen == 'true') { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_fullscreen" value="true" checked /> <strong>Yes</strong> (<i>actual setting</i>)</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_fullscreen" value="false" /> No</div>
							<?php } else { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_fullScreen" value="true" /> Yes</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_fullScreen" value="false" checked /> <strong>No</strong> (<i>actual setting</i>)</div>
							<?php }; ?>
						</label><div class="clear">&nbsp;</div></li>
						<li><label for="pxsol_youtube_autoplay"><strong class="turquoise">Start the video on page load?</strong><br />
							<?php if ($default_youtube_autoplay == 'true') { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_autoplay" value="true" checked /> <strong>Yes</strong> (<i>actual setting</i>)</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_autoplay" value="false" /> No</div>
							<?php } else { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_autoplay" value="true" /> Yes</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_autoplay" value="false" checked /> <strong>No</strong> (<i>actual setting</i>)</div>
							<?php }; ?>
						</label><div class="clear">&nbsp;</div></li>
						<li class="dernier"><label for="pxsol_youtube_hd"><strong class="turquoise">Force the HD streaming version?</strong>
							<?php if ($default_youtube_hd == 'true') { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_hd" value="true" checked /> <strong>Yes</strong> (<i>actual setting</i>)</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_hd" value="false" /> No</div>
							<?php } else { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_hd" value="true" /> Yes</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_hd" value="false" checked /> <strong>No</strong> (<i>actual setting</i>)</div>
							<?php }; ?>
						</label><div class="clear">&nbsp;</div></li>
						<div class="clear">&nbsp;</div>
						<li><label for="pxsol_youtube_controls"><strong class="turquoise">Display the control buttons?</strong><br />
							<?php if ($default_youtube_controls == 'true') { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_controls" value="true" checked /> <strong>Yes</strong> (<i>actual setting</i>)</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_controls" value="false" /> No</div>
							<?php } else { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_controls" value="true" /> Yes</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_controls" value="false" checked /> <strong>No</strong> (<i>actual setting</i>)</div>
							<?php }; ?>
						</label><div class="clear">&nbsp;</div></li>
						<li><label for="pxsol_youtube_autohide"><strong class="turquoise">Hide the controls after video started?</strong><br />
							<?php if ($default_youtube_autohide == 'true') { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_autohide" value="true" checked /> <strong>Yes</strong> (<i>actual setting</i>)</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_autohide" value="false" /> No</div>
							<?php } else { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_autohide" value="true" /> Yes</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_autohide" value="false" checked /> <strong>No</strong> (<i>actual setting</i>)</div>
							<?php }; ?>
						</label><div class="clear">&nbsp;</div></li>
						<li class="dernier"><label for="pxsol_youtube_modestbranding"><strong class="turquoise">Hide "YouTube" logo on the bottom bar?</strong><br />
							<?php if ($default_youtube_modestbranding == 'true') { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_modestbranding" value="true" checked /> <strong>Yes</strong> (<i>actual setting</i>)</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_modestbranding" value="false" /> No</div>
							<?php } else { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_modestbranding" value="true" /> Yes</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_modestbranding" value="false" checked /> <strong>No</strong> (<i>actual setting</i>)</div>
							<?php }; ?>
						</label><div class="clear">&nbsp;</div></li>
					<ul>
					<br />
					<div class="clear">&nbsp;</div>
					<input type="submit" name="submit" id="submit" title="Submit new option values" value="Save Options" />
					<div class="clear">&nbsp;</div>
				</form>
			</div></div></div>
			<div class="pxsol_usage pxsol_top"><div class="pxsol_bottom"><div class="pxsol_main">
				<h3>Usage</h3>
				<p>Simply add this shortcode in your text to display a YouTube player.<br />
				<i>(...don't forget to replace the ID of the video with your choice!)</i></p>
				<blockquote class="dernier">[youtube_video id="abxjy-emFvs"]</blockquote>
			</div></div></div>
			<div class="pxsol_versions pxsol_top"><div class="pxsol_bottom"><div class="pxsol_main">
				<h3>Changelog</h3>
				<p class="dernier"><strong>v1.7</strong> Autoplay & HD settings / logic tweaks<br />
				<strong>v1.6</strong> Bugs repair / Hide YouTube logo / performance improvements<br />
				<strong>v1.5</strong> Initial public release.<br />
				<strong>v1.4</strong> Bugs repair / visual styles.<br />
				<strong>v1.3</strong> Possibility to modify the options.<br />
				<strong>v1.2</strong> Addition of a page to display the usage & settings.<br />
				<strong>v1.1</strong> Translation of the code in a plugin form.<br />
				<strong>v1.0</strong> The code is <a target="_blank" href="http://pxsol.info/p0wOuK" title="Custom YouTube in WordPress – revisited || Les nouvelles du Pixel Solitaire">released as an inclusion</a> in <i>functions.php</i>.</p>
			</div></div></div>
			<div class="pxsol_infos pxsol_top"><div class="pxsol_bottom"><div class="pxsol_main">
				<h3>Additionnal informations</h3>
				<p>Created & tested on a <i>Wordpress 3.2.1</i> installation.</p>
				<p>Many other features will be added very soon so keep in touch for updates!!!<br /><br />
				<strong>Official plugin homapge:</strong><br />
				<a target="_blank" href="http://pxsol.info/pIC0tG" title="Enhanced YouTube Shortcode || Les nouvelles du Pixel Solitaire">http://pxsol.info/pIC0tG</a>.</p>
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
 } function pxsol_youtube_unset_options() { delete_option('pxsol_youtube_width'); delete_option('pxsol_youtube_height'); delete_option('pxsol_youtube_autoplay'); delete_option('pxsol_youtube_hd'); delete_option('pxsol_youtube_fullScreen'); delete_option('pxsol_youtube_controls'); delete_option('pxsol_youtube_autohide'); delete_option('pxsol_youtube_modestbranding'); } function pxsol_admin_bar() { global $wp_admin_bar; $wp_admin_bar->add_menu( array( 'id' => 'pixel_zone', 'title' => __('Pixel Solitaire'), 'href' => 'http://pixel-solitaire.com', 'meta' => array( target => '_blank', title => 'Les nouvelles du Pixel Solitaire' ) )); $wp_admin_bar->add_menu( array( 'parent' => 'pixel_zone', 'title' => __('Enhanced YouTube | WebPage'), 'href' => 'http://pixel-solitaire.com/telechargements/enhanced-youtube-shortcode/', 'meta' => array( target => '_blank', title => 'Plugin official webpage' ) )); } } }; if(class_exists("pxsol_youtube_plugin")) { $enhanced_youtube_shortcode = new pxsol_youtube_plugin; } register_activation_hook(__FILE__, array($enhanced_youtube_shortcode,'pxsol_youtube_set_options')); add_shortcode('youtube_video', array($enhanced_youtube_shortcode,'pxsol_youtube'),1); add_filter('plugin_action_links', array($enhanced_youtube_shortcode,'pxsol_youtube_desc_links'), 10, 2 ); add_action( 'wp_before_admin_bar_render', array($enhanced_youtube_shortcode,'pxsol_admin_bar'),1); add_action( 'admin_init', array($enhanced_youtube_shortcode,'pxsol_youtube_init'),1); add_action('admin_menu', array($enhanced_youtube_shortcode,'pxsol_youtube_menu'),1); register_deactivation_hook(__FILE__, array($enhanced_youtube_shortcode,'pxsol_youtube_unset_options')); ?>