=== Plugin Name ===
Contributors: Elias de A. Rodrigues
Donate link: 
Tags: posts, thumb
Requires at least: 2.0
Tested up to: 2.7
Stable tag: 0.2


This plugin displays a thumbnail image of the first image used in the respective post.


== Description ==

For topics that contain custom loops it is recommended the use of this tag to display the plugin.

<?php if (function_exists('showThumb')) { showThumb($this); } ?>

If it is not the case simply activate the plugin and it will be ready.

Note: This plugin does not use custom fields.

I hope you enjoy that.


Feel free to contact me.


Elias de A. Rodriges aka "Maluco" or "Crazy" in english.
elias@binaryweb.com.br
maluco@blogdomaluco.com.br
http://meadiciona.com/eliasbh

== Installation ==

1. Upload the folder BinaryThumb to /wp-content/plugins/
2. Activate the pluging but if the theme does not enable this feature by default, you just need paste the code below between the title and content within the loop of posts
	&lt;?php if (function_exists('showThumb')) { showThumb($this); } ?&gt;


== Frequently Asked Questions ==

= What class can I use to style thumbs? =

Use 

a.binary-thumb{ }
a.binary-thumb img{ }


== Screenshots ==

1. Example

== Thanks ==

The creators of the class TimThumb <http://code.google.com/p/timthumb/>

== Changelog ==

v0.2:

* Fix a small bug.

v0.1:

* First version of plugin

== Upgrade Notice ==

= 0.2 =
This version fixes a url bug.  Upgrade immediately.