/*
Plugin Name: Enhanced YouTube Shortcode
Plugin URI: http://pixel-solitaire.com/telechargements/enhanced-youtube-shortcode/
Description: A simple <em>YouTube</em> shortcode with several options & general improvement over the default one of <em>Wordpress</em>. Activate then click "<strong>Settings=>Enhanced YouTube</strong>" in order to edit the player options & more infos. <strong>Usage sample:</strong> [youtube_video id="uAOLzRhKF9c"]
Version: 2.0.1
Author: le Pixel Solitaire
Author URI: http://pixel-solitaire.com/
License: GNU General Public License (v3) http://www.gnu.org/licenses/gpl-3.0.txt
*/
WebFontConfig = { google: { families: [ 'Comfortaa::latin' ] } }; (function() { var wf = document.createElement('script'); wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js'; wf.type = 'text/javascript'; wf.async = 'true'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wf, s);})();
jQuery(document).ready(function($){	
	$('ul#pxsol_form li div div').on('click','a', function(e) {
		e.preventDefault();
		if (!$(this).hasClass('actif')) {
			$(this).addClass('actif').siblings('a').removeClass('actif');
			if ($(this).hasClass('vrai')) {
				$(this).siblings('input').attr('value', 'true').closest('div').removeClass('false').addClass('true');
			} else {
				$(this).siblings('input').attr('value', 'false').closest('div').removeClass('true').addClass('false');
			};
		};
	});
});