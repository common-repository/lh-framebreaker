=== LH Framebreaker ===
Contributors:      shawfactor
Donate link: 	   https://lhero.org/portfolio/lh-framebreaker/
Tags:              frame, iframe, disable iframe, no frames, framebreaker, javascript, google image, unobtrusive, unobtrusive javavscript
Requires at least: 3.0
Tested up to:      4.9
Stable tag: 	   trunk
License:           GPLv2 or later
License URI:       http://www.gnu.org/licenses/gpl-2.0.html

This framebreaker will prevent your website being framed by another web site.

== Description ==

By installing this plugin you can prevent your website being framed by some other web site. This plugin is very simple but also standards compliant.

I wrote this plugin as other frame breaking solutions often have the following problems

* They print their javascript inline, this break unobtrusive javascript and can be a problem in apps. This plugin adds an external file unobtrusively.
* The try to break out of the wordpress customizer frame (rendering it useless). This plugins tests for that context and will not enqueue in that circumstance.
* They enqueue the script on the backend, where it is not required. This plugins tests for that context and will not enqueue in that circumstance.
* They enqueue it in the head of the html, thus slowing down page render on all pages. This plugin enqueues the file in the footer.
* They break out of all frames (including ones from your own domain). This plugin tests if the plugin is same domain and if it is won't break out.

== Frequently Asked Questions ==

= Can this plugin work without javascript? =

No, it requires javascript to run

= How is this better than the other no frames plugins? =

It detects when your site is in customizer mode (which uses frames) so it won't break that functionality, it uses unobtrusive javascript, and it loads the required script in the footer (and much more).

== Installation ==

1. Upload lh-framebreaker folder to the /wp-content/plugins/ directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. That is it


== Changelog ==

**1.00 November 03, 2016**  
Initial release.

**1.01 November 06, 2016**  
Additional documentation.

**1.02 May 24, 2017**  
Defer script.

**1.03 March 05, 2018**  
Many improvments.