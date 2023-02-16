=== Easy Filtering===
Contributors: franciscopalacios, softmixt
Tags: frontend, filter, ajax filtering, search, category, categories, taxonomy, taxonomies, terms
Requires at least: 4.7
Tested up to: 4.9.5
Stable tag: 4.3
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Filter posts and custom posts by terms for a selected taxonomy

== Description ==

This plugin filters posts or custom posts by terms/categories of a selected taxonomy/category:


- Select post type, taxonomy, term.
- Chosse number to posts to show, show/hide empty terms, show/hide order selection.
- You can choose the way to show the filter (tabs or selection).
- You can customize the filter page, filters and cards, moving the files to your theme.
- You can select no pagination, usual pagination, Load More or Load Infinite.
- You can select the way and the parameter to order your post list (id, title, date, author, random).
- You generate a shortcode that can be added easily in your page with a new button added in the Wp editor.

== Installation ==


1. Upload the plugin files to the `/wp-content/plugins/easy-filtering` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Easy Filtering menu item in the Wp Administrator screen to configure the plugin and create the filters.
4. If you want to customize the filter page, the filtering and the card item, you need to move the files from public/views folder yo your_thrmr/templates folder


== Changelog ==
= 1.2 =
* Added option to show/hide posts count by term/category
* Changed the way to store data in database (fields stored in a json string). Please, if you have created some filters, create again to restore. Excuse me for bothering you
= 1.1 =
* Added option to show/hide Order and Order By selects in Frontview
= 1.0 =
* First version.

== Upgrade Notice ==
Changed the way to store data in database (fields stored in a json string). Please, if you have created some filters, create again to restore. Excuse me for bothering you


== Frequently Asked Questions ==
