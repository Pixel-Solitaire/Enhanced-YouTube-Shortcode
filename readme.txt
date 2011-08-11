=== Enhanced YouTube Shortcode ===
Contributors: Le-Pixel-Solitaire
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=erick%40pixel%2dsolitaire%2ecom&lc=CA&item_name=Le%20Pixel%20Solitaire&currency_code=CAD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted
Tags: youtube, shortcode, video, player
Requires at least: 3.1
Tested up to: 3.2.1
Stable tag: 1.6

A simple YouTube shortcode with basic options & general improvement over the default coming with Wordpress.


== Description ==

The "**Enhanced YouTube Shortcode**" plugin provides a quick & easy way to use a custom *YouTube&copy;* player in posts and/or pages without having to get your hands dirty in the source codes! The main advantage over the way *Wordpress* is working this out is the possibility of changing the display of all players in one single spot instead of having to do it manually at every places it has been set. But most importantly: it's fun and good for you!

The code that is generated always allows scripting access and forces the use of the *ActionScript 3* engine (*to be sure everybody has the same settings*). There are 5 basic parameters available through a configuration page (*reach it from the Settings Menu*). It has been initially created (*& tested*) on a *Wordpress 3.2.1* live installation according to the specifications of the official *YouTube API*: see the [YouTube Embedded Player Parameters](http://pxsol.info/naqwb2 "YouTube Embedded Player Parameters - YouTube APIs and Tools - Google Code") page for quick references.

There are many things on the **To Do** list (*see **Other Notes***) so you can expect updates soon!


== Installation ==

1.  Extract the **/enhanced-youtube-shortcode/** folder from the downloaded file.

2.  Upload this extracted folder & its content in your *Wordpress* plugin directory.

3.  Go to "**Plugins=>Enhanced YouTube Shortcode**" & activate the plugin.

4.  To modify the player display options go to "**Settings=>Enhanced YouTube**".

5.  You can now use  this kind of shortcode: 
    **[youtube_video id="abxjy-emFvs"]**


== Frequently Asked Questions ==

= Trying to read and/or edit your codes is far from a "user friendly" experience. =

Pretty normal: I don't work with this stuff ;-) For the sake of file size I've removed most PHP comments & HTML bits indentation, not to mention the minified CSS. Please go to the official [«Enhanced YouTube Shortcode» GitHub Public Repositories](http://pxsol.info/nrqCdW "Pixel-Solitaire/Enhanced-YouTube-Shortcode - GitHub") in order to obtain a clean & commented version of the source codes.

= I'm using *Internet Explorer 6* and the settings page just looks awful... =

Oh, I'm soooo sorry for you. Really. Maybe it's time for you to give up, don't you think?

= You're a french speaking bloke, right? So where is the translation? =

It's quite simple: I just have to learn how to do it properly... You can bet the french language will be added soon in a next release.

= I got an indecent proposal idea & doesn't see anything related to this here... What could I do? =

Your best chance for anything in relation with this plugin is to leave a detailed message on [the plugin announcement blog post](http://pxsol.info/qHCl7L "Les nouvelles du Pixel Solitaire » Enhanced YouTube Shortcode").

= I think you're a genius & I want you to be the father of my children. =

*Well*... If you're actually a sexy blond woman with lot of money and a big car I believe we can form a real complete couple: I offer quite the opposite ...


== Screenshots ==

1. **Plugin admin page** with the options panel (*top*) & the reminder about how to use the shortcode (*bottom*).


 == Upgrade Notice ==
 
= 1.6 =
NEW FEATURE => YouTube logo hiding; BUG FIXES => Options variables output (*all except* height *&* width) + Overall performance tweaks; Please UPGRADE IMMEDIATELY.

== Changelog ==

= 1.6 =
* New Feature

** YouTube logo hiding (*on the bottom bar*)

* Technical Stuff

** Plugin's class encapsulation

** New Settings link in the description (*general* Plugins *page*)

** New options switchs manipulation

** Better logic operations

= 1.5 =
* Initial public release.

= 1.4 =
* Bugs repair / visual modifications.

= 1.3 =
* Possibility to modify and save new player options.

= 1.2 =
* Addition of a page to display the settings & how to.

= 1.1 =
* Translation of the manual code into a plugin form.

= 1.0 =
* The initial code is released as a snippet for manual inclusion into the "*functions.php*" page, in this post:

[http://pixel-solitaire.com/2011/08/04/wp-pixel-youtube/](http://pxsol.info/p0wOuK "Custom YouTube In WordPress – Revisited || Les nouvelles du Pixel Solitaire")


 == TO DO ==
 
*  Translate the plugin in *french*.

*  Include the *HTML 5* code.

*  Even more option switchs.

*  Take over the world. 

Not necessarily in that order ;-)


== License ==

This plugin (*and all its related files*) falls under the [GNU GENERAL PUBLIC LICENSE](http://pxsol.info/rohPSr "GNU GENERAL PUBLIC LICENSE || Les nouvelles du Pixel Solitaire") *v3*. 