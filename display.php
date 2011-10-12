			<div id="pxsol_youtube" class="wrap">
				<h2 title="Enhanced YouTube Shortcode for WordPress">Enhanced YouTube Shortcode <i>v1.9</i></h2>
				<div class="pxsol_options pxsol_top"><div class="pxsol_bottom"><div class="pxsol_main">
					<h3>Settings</h3>
					<?php
					// Settings => update the values
					if ($_REQUEST['submit']) {
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
						if ($_REQUEST['pxsol_youtube_autoplay']) { 
							update_option('pxsol_youtube_autoplay',$_REQUEST['pxsol_youtube_autoplay']); 
							$pxsol_check = true;
						}
						if ($_REQUEST['pxsol_youtube_hd']) { 
							update_option('pxsol_youtube_hd',$_REQUEST['pxsol_youtube_hd']); 
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
						if ($_REQUEST['pxsol_youtube_modestbranding']) { 
							update_option('pxsol_youtube_modestbranding',$_REQUEST['pxsol_youtube_modestbranding']); 
							$pxsol_check = true;
						}
						if ($_REQUEST['pxsol_youtube_theme']) { 
							update_option('pxsol_youtube_theme',$_REQUEST['pxsol_youtube_theme']); 
							$pxsol_check = true;
						}
						if ($_REQUEST['pxsol_youtube_showinfo']) { 
							update_option('pxsol_youtube_showinfo',$_REQUEST['pxsol_youtube_showinfo']); 
							$pxsol_check = true;
						}
						if ($pxsol_check) { ?>
							<div id="message" class="updated fade">
								<p>Settings saved! <strong>=)</strong></p>
							</div>
						<?php } else { ?>
							<div id="message" class="error fade">
								<p>Houston, we got a problem... <strong>:-(</strong></p>
							</div>
						<?php
						}
					}
					// Settings => display the values
					$default_youtube_width = get_option('pxsol_youtube_width');
					$default_youtube_height = get_option('pxsol_youtube_height');
					$default_youtube_fullscreen = get_option('pxsol_youtube_fullscreen');
					$default_youtube_autoplay = get_option('pxsol_youtube_autoplay');
					$default_youtube_hd = get_option('pxsol_youtube_hd');
					$default_youtube_controls = get_option('pxsol_youtube_controls');
					$default_youtube_autohide = get_option('pxsol_youtube_autohide');
					$default_youtube_modestbranding = get_option('pxsol_youtube_modestbranding');
					$default_youtube_theme = get_option('pxsol_youtube_theme');
					$default_youtube_showinfo = get_option('pxsol_youtube_showinfo'); ?>
					<form method="post">
						<ul>
							<li class="dimension"><label for="pxsol_youtube_width"><strong class="turquoise">Player width:</strong>: <input class="text" type="text" name="pxsol_youtube_width" value="<?=$default_youtube_width?>" /> pixels.</label></li>
							<li class="dimension dernier"><label for="pxsol_youtube_height"><strong class="turquoise">Player height:</strong>:	<input class="text" type="text" name="pxsol_youtube_height" value="<?=$default_youtube_height?>" /> pixels.</label></li>
							<div class="clear">&nbsp;</div>
							<li><label for="pxsol_youtube_fullscreen"><strong class="turquoise">Offer the full screen feature?</strong><br />
								<?php if ($default_youtube_fullscreen == 'true') { ?>
								<div><input class="radio" type="radio" name="pxsol_youtube_fullscreen" value="true" checked /> <strong>Yes</strong> (<i>saved</i>)</div>
								<div><input class="radio" type="radio" name="pxsol_youtube_fullscreen" value="false" /> No</div>
								<?php } else { ?>
								<div><input class="radio" type="radio" name="pxsol_youtube_fullScreen" value="true" /> Yes</div>
								<div><input class="radio" type="radio" name="pxsol_youtube_fullScreen" value="false" checked /> <strong>No</strong> (<i>saved</i>)</div>
								<?php }; ?>
							</label><div class="clear">&nbsp;</div></li>
							<li><label for="pxsol_youtube_autoplay"><strong class="turquoise">Start the video on page load?</strong><br />
								<?php if ($default_youtube_autoplay == 'true') { ?>
								<div><input class="radio" type="radio" name="pxsol_youtube_autoplay" value="true" checked /> <strong>Yes</strong> (<i>saved</i>)</div>
								<div><input class="radio" type="radio" name="pxsol_youtube_autoplay" value="false" /> No</div>
								<?php } else { ?>
								<div><input class="radio" type="radio" name="pxsol_youtube_autoplay" value="true" /> Yes</div>
								<div><input class="radio" type="radio" name="pxsol_youtube_autoplay" value="false" checked /> <strong>No</strong> (<i>saved</i>)</div>
								<?php }; ?>
							</label><div class="clear">&nbsp;</div></li>
							<li class="dernier"><label for="pxsol_youtube_hd"><strong class="turquoise">Force the HD streaming version?</strong>
								<?php if ($default_youtube_hd == 'true') { ?>
								<div><input class="radio" type="radio" name="pxsol_youtube_hd" value="true" checked /> <strong>Yes</strong> (<i>saved</i>)</div>
								<div><input class="radio" type="radio" name="pxsol_youtube_hd" value="false" /> No</div>
								<?php } else { ?>
								<div><input class="radio" type="radio" name="pxsol_youtube_hd" value="true" /> Yes</div>
								<div><input class="radio" type="radio" name="pxsol_youtube_hd" value="false" checked /> <strong>No</strong> (<i>saved</i>)</div>
								<?php }; ?>
							</label><div class="clear">&nbsp;</div></li>
							<div class="clear">&nbsp;</div>
							<li><label for="pxsol_youtube_controls"><strong class="turquoise">Display the control buttons?</strong><br />
								<?php if ($default_youtube_controls == 'true') { ?>
								<div><input class="radio" type="radio" name="pxsol_youtube_controls" value="true" checked /> <strong>Yes</strong> (<i>saved</i>)</div>
								<div><input class="radio" type="radio" name="pxsol_youtube_controls" value="false" /> No</div>
								<?php } else { ?>
								<div><input class="radio" type="radio" name="pxsol_youtube_controls" value="true" /> Yes</div>
								<div><input class="radio" type="radio" name="pxsol_youtube_controls" value="false" checked /> <strong>No</strong> (<i>saved</i>)</div>
								<?php }; ?>
							</label><div class="clear">&nbsp;</div></li>
							<li><label for="pxsol_youtube_autohide"><strong class="turquoise">Hide the controls after video started?</strong><br />
								<?php if ($default_youtube_autohide == 'true') { ?>
								<div><input class="radio" type="radio" name="pxsol_youtube_autohide" value="true" checked /> <strong>Yes</strong> (<i>saved</i>)</div>
								<div><input class="radio" type="radio" name="pxsol_youtube_autohide" value="false" /> No</div>
								<?php } else { ?>
								<div><input class="radio" type="radio" name="pxsol_youtube_autohide" value="true" /> Yes</div>
								<div><input class="radio" type="radio" name="pxsol_youtube_autohide" value="false" checked /> <strong>No</strong> (<i>saved</i>)</div>
								<?php }; ?>
							</label><div class="clear">&nbsp;</div></li>
							<li class="dernier"><label for="pxsol_youtube_modestbranding"><strong class="turquoise">Hide "YouTube" logo on the bottom bar?</strong><br />
								<?php if ($default_youtube_modestbranding == 'true') { ?>
								<div><input class="radio" type="radio" name="pxsol_youtube_modestbranding" value="true" checked /> <strong>Yes</strong> (<i>saved</i>)</div>
								<div><input class="radio" type="radio" name="pxsol_youtube_modestbranding" value="false" /> No</div>
								<?php } else { ?>
								<div><input class="radio" type="radio" name="pxsol_youtube_modestbranding" value="true" /> Yes</div>
								<div><input class="radio" type="radio" name="pxsol_youtube_modestbranding" value="false" checked /> <strong>No</strong> (<i>saved</i>)</div>
								<?php }; ?>
							</label><div class="clear">&nbsp;</div></li>
							<div class="clear">&nbsp;</div>
							<li><label for="pxsol_youtube_theme"><strong class="turquoise">Use the <i>dark</i> or <i>light</i> player's theme?</strong><br />
								<?php if ($default_youtube_theme == 'dark') { ?>
								<div><input class="radio" type="radio" name="pxsol_youtube_theme" value="dark" checked /> <strong>Dark</strong> (<i>saved</i>)</div>
								<div><input class="radio" type="radio" name="pxsol_youtube_theme" value="light" /> Light</div>
								<?php } else { ?>
								<div><input class="radio" type="radio" name="pxsol_youtube_theme" value="dark" /> Dark</div>
								<div><input class="radio" type="radio" name="pxsol_youtube_theme" value="light" checked /> <strong>Light</strong> (<i>saved</i>)</div>
								<?php }; ?>
							</label><div class="clear">&nbsp;</div></li>
							<li class="dernier"><label for="pxsol_youtube_showinfo"><strong class="turquoise">Display infos before the video starts?</strong><br />
								<?php if ($default_youtube_showinfo == 'true') { ?>
								<div><input class="radio" type="radio" name="pxsol_youtube_showinfo" value="true" checked /> <strong>Yes</strong> (<i>saved</i>)</div>
								<div><input class="radio" type="radio" name="pxsol_youtube_showinfo" value="false" /> No</div>
								<?php } else { ?>
								<div><input class="radio" type="radio" name="pxsol_youtube_showinfo" value="true" /> Yes</div>
								<div><input class="radio" type="radio" name="pxsol_youtube_showinfo" value="false" checked /> <strong>No</strong> (<i>saved</i>)</div>
								<?php }; ?>
							</label><div class="clear">&nbsp;</div></li>
						<ul>
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
					<p class="dernier"><strong>v1.9</strong> New "infos before playing" setting / Visual & core files dissociation<br />
					<strong>v1.8</strong> New "theme" setting / code generation refinement / v2.0 groundwork<br />
					<strong>v1.7</strong> Autoplay & HD settings / logic tweaks<br />
					<strong>v1.6</strong> Bugs repair / Hide YouTube logo / performance improvements<br />
					<strong>v1.5</strong> Initial public release.<br />
					<strong>v1.4</strong> Bugs repair / visual styles.<br />
					<strong>v1.3</strong> Possibility to modify the options.<br />
					<strong>v1.2</strong> Addition of a page to display the usage & settings.<br />
					<strong>v1.1</strong> Translation of the code in a plugin form.<br />
					<strong>v1.0</strong> The core is released as an inclusion for the <i>functions.php</i> file.</p>
				</div></div></div>
				<div class="pxsol_infos pxsol_top"><div class="pxsol_bottom"><div class="pxsol_main">
					<h3>Additionnal informations</h3>
					<p>Created & tested on a <i>Wordpress 3.2.1</i> installation.</p>
					<p>Many other features will be added very soon so keep in touch for updates!!!</p>
					<br />
					<p class="dernier">
						<form style="float:left;" action="https://www.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
							<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" title="PayPal - The safer, easier way to pay online!">
							<img alt="" border="0" src="https://www.paypalobjects.com/fr_CA/i/scr/pixel.gif" width="1" height="1">
						</form>&nbsp;&nbsp;&nbsp;<a target="_blank" href="http://pxsol.info/nbX83y" title="Protected under the the GNU General Public License." class="gnu-link"><img src="<?php echo WP_PLUGIN_URL ?>/enhanced-youtube-shortcode/images/gplv3-88x31.png" alt="GNU GPL3" title="Protected under the the GNU General Public License." width="88" height="31" /></a>&nbsp;&nbsp;&nbsp;<a target="_blank" href="http://pxsol.info/nrqCdW" title="Pixel-Solitaire/Enhanced-YouTube-Shortcode - GitHub" class="git-link"><img src="<?php echo WP_PLUGIN_URL ?>/enhanced-youtube-shortcode/images/github.png" alt="GitHub" title="Pixel-Solitaire/Enhanced-YouTube-Shortcode - GitHub" width="84" height="32" /></a>
					</p>
				</div></div></div>
			</div>
			<br />