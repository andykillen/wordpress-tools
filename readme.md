# Andy's Wordpress Tools

## A set of tools and functions that help with Wordpress

Within each directory holds a single solution, with below it an example directory with the solution implemented.  Inside the combined-code directory is a combined implementation of *everything* in one place. 

1. **[DNS Prefetch](https://github.com/andykillen/wordpress-tools/blob/master/dns-prefetch/code.php)** is about requesting external DNS resources earlier in the HTML script before the actual script request.

2. **[Remove WP Admin Bar](https://github.com/andykillen/wordpress-tools/blob/master/remove-wp-admin-bar/code.php)** removes the admin bar from the front end.  horrible thing!  So oftern screws up other code. 

3. **[Clean Header](https://github.com/andykillen/wordpress-tools/blob/master/clean-header/code.php)** removes items from the header that you don't need or don't want

4. **[Login CSS](https://github.com/andykillen/wordpress-tools/blob/master/login-css/code.php)** How to add a CSS file for the login page

5. **[Remove plugin update nag](https://github.com/andykillen/wordpress-tools/blob/master/remove-plugin-update-nag/code.php)** If your making your own plugins and don't want your users to ever update from the wordpress repositary, this is a simple method of stopping that.

6. **[Rename URL of multisite db](https://github.com/andykillen/wordpress-tools/blob/master/multisite-renamer/code.php)** Allows you to easily rename all occurrences of a url string in the db for another. Ideal for changing the URL's of a Multi-site install. Yes I know you can use WP-CLI (search-replace) to do this, but I have not always found that to be reliable.

OK, it's very light on the ground at the moment, but as and when I make more or strip them out of previous projects, I'll add them here. 

