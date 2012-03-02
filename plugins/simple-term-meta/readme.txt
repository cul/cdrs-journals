=== Simple Term Meta ===
Contributors: Jacob M Goldman (C. Murray Consulting)
Donate link: http://www.cmurrayconsulting.com/software/wordpress-simple-term-meta/
Tags: meta, meta data, terms, taxonomy, custom fields
Requires at least: 3.0
Tested up to: 3.0.1
Stable tag: 0.9.1

Adds support for taxonomy term meta data (custom fields); behaves just like the built in post / user / comment meta!

== Description ==

WordPress offers meta data support for posts, users, and comments out of the box. But it's missing meta support for taxonomy terms (a tag, category, or custom taxonomy terms)!

This plug-in adds full, efficient support for term meta based on the post meta framework built into WordPress. Adds a "postmeta" table, and post meta functions that should be familiar to anyone who has worked with WordPress post meta. 

New functions include `add_term_meta`, `delete_term_meta`, `get_term_meta`, `update_term_meta`, `get_term_custom`, `get_term_custom_keys`, `get_term_custom_values`, and more.

The functions work just like their post meta counter parts (add_post_meta, et al) – just substitute the post_id with the term_id. Should work with any taxonomy! Take a look inside `simple-term-meta.php` for more complete function documentation.

Check out `edit_category_custom_fields`, `(taxonomy-name)_edit_form` and other, similar action hooks built into WordPress to start adding your own custom fields to terms using this plug-in!

Because it’s difficult to test this plug-in with all types of custom taxonomies, I’m considering this a “beta” – in the Google sense – or pre-1.0 release.

== Installation ==

1. Install easily with the WordPress plugin control panel or manually download the plugin and upload the extracted
folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Start using term meta just like you would use post meta!