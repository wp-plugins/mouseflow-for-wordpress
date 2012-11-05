=== Mouseflow for Wordpress ===
Contributors: Mouseflow
Tags: mouseflow 
Requires at least: 2.0.0
Tested up to: 3.4.2
Stable tag: trunk

A plugin for easy installation of the Mouseflow recording script

== Description ==

A plugin for easy installation of the Mouseflow recording script

== Installation ==

Follow these steps to use the plugin:

1. Upload 'mouseflow-wp-plugin.php' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Paste your Mouseflow script code in the box under Settings | Mouseflow

== Frequently Asked Questions ==

= The code is not working =

1. Make sure you've inserted the script code in the settings page.
2. Check that you have the wp_footer() function in the blog template.
3. Check your blog's html source (Page / View source) and search for "mouseflow". In case the script found at the end of the <body> section, but still not working, you're probably running the site from a different domain than the one you entered on your mouseflow account. Make sure that the domains are matching.