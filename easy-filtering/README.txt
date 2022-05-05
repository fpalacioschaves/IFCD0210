=== Easy Filtering===
Contributors: franciscopalacios, softmixt
Tags: frontend, filter, ajax filtering, search, category, categories, taxonomy, taxonomies, terms
Requires at least: 4.7
Tested up to: 5.2.4
Stable tag: 4.3
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Filter posts and custom posts by terms for a selected taxonomy

== Description ==

This plugin filters posts or custom posts by terms/categories of a selected taxonomy/category:


- Select post type, taxonomy, term.
- Chosse number to posts to show, show/hide empty terms, show/hide order selection.
- You can select if you want a search in your filter or not.
- You can choose the way to show the filter (tabs or selection).
- You can customize the filter page, filters and cards, moving the files to your theme.
- You can select no pagination, usual pagination, Load More or Load Infinite.
- You can select the way and the parameter to order your post list (id, title, date, author, random).
- You generate a shortcode that can be added easily in your page with a new button added in the Wp editor.
- Added a card generator to design the way we show every item in the list
- Filter by more than one taxonomy. For this reason, we have changed some db structure and you need to re-create the filters you made. Sorry for the inconvenience
- Now, you can use the plugin as a post list, without filtering, but using the other features.


== Installation ==


1. Upload the plugin files to the `/wp-content/plugins/easy-filtering` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Easy Filtering menu item in the Wp Administrator screen to configure the plugin and create the filters.
4. If you want to customize the filter page, the filtering and the card item, you need to move the files from public/views folder yo your_theme/templates folder


== Changelog ==
= 2.5.0 =
Card creator preview in admin
= 2.4.1 =
Fix pagination load more style
= 2.4.0 =
Remove masonry and using flexbox.
= 2.3.0 =
Fix filter creation. Now can select post type without taxonomy only for List Case
= 2.2.9 =
Fix public folder for cards
= 2.2.8 =
Fix public folder for cards
= 2.2.7 =
Fix prefix tables
= 2.2.6 =
Add prefix in tables creation
= 2.2.5 =
Changes in admin style (selects on/off)
= 2.2.4 =
Avoid post per page = 0
= 2.2.3 =
In List Mode without pagination shows a limited post number. If you want to show all, set post per page to -1
= 2.2.2 =
Hide Active filters string in List Mode
= 2.2.1 =
Added a simple Help page. In the uninstallation, we remove all the data (tables)
= 2.2 =
Now, you can use the plugin as a post list witout filtering.
= 2.1 =
Select different card files from plugin public/views/cards folder. Copy them to template/views/cards folder.
= 2.0 =
Big changes. Now, you can filter by more than one taxonomyt. For this reason, you need to re-create the filters that you have done. Sorry for the inconvenience
= 1.6 =
* Added card design. Fix issues in activation.
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






