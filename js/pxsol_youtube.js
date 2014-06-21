/*
Plugin Name: Enhanced YouTube Shortcode
Plugin URI: http://pixel-solitaire.com/telechargements/enhanced-youtube-shortcode/
Description: A simple <em>YouTube</em> shortcode with several options & general improvement over the default one of <em>Wordpress</em>. Activate then click "<strong>Settings=>Enhanced YouTube</strong>" in order to edit the player options & more infos. <strong>Usage sample:</strong> [youtube_video id="uAOLzRhKF9c"]
Version: 2.0
Author: le Pixel Solitaire
Author URI: http://pixel-solitaire.com/
License: GNU General Public License - http://pxsol.info/rohPSr
*/
jQuery(document).ready(function($){	$('ul#pxsol_form li div div a').click( function() {
	if (!$(this).hasClass('actif')) {
		$(this).addClass('actif').siblings('a').removeClass('actif');
		if ($(this).hasClass('vrai')) {
			$(this).siblings('input').attr('value', 'true').closest('div').removeClass('false').addClass('true');
		} else {
			$(this).siblings('input').attr('value', 'false').closest('div').removeClass('true').addClass('false');
		}
	}
	return false;
});});