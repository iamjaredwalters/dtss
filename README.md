# Overview
Twenty Fifteen Child Theme, Display Shows Plugin, and All Page Link Shortcode

### Instructions for use
1. Clone or extract the DTSS project into a local directory
2. Move the ***twentyfifteen-child-jared-walters*** child theme into your WordPress theme directory
  * Be sure that you also have the [Twenty Fifteen](https://wordpress.org/themes/twentyfifteen/) theme installed in the theme directory as well
  * Navigate to the child theme via the command line and run `npm install` to install the gulp dependencies
  * `gulp watch` will compile the scss files
1. Activate the child theme
1. Move ***display-shows*** folder into your WP plugin directory
  * Activate the plugin in your dashboard
1. Install the [WordPress Importer](https://wordpress.org/plugins/wordpress-importer/) plugin 
* Follow instructions from the Tools -> Import screen to import the included XML file.  Be sure you check "download and import file attachments"
1. In the WordPress dashboard navigate to Appearance -> Customize, choose Static Front Page and select Home from the dropdown then save

### Twenty Fifteen Child Theme
* `/about`, `/shows`, and `/home` use custom page templates, as well as the Artists custom post type
* ***/templates/content-page-example.php*** will override the template for a page named ***example*** 
* ***/templates/content-single-example.php*** will override the template for post type ***example*** 
* The custom post type "Artists" will display shows for the artists posts that have been created assuming the shortcode is present and the artist argument has been provided

### All Page Links
[AllPageLinks] will print out page links of all pages of the site and can be viewed on `Home` page

###  Display Shows
1. The page `/shows` uses the `[DisplayShows]` shortcode provided by the plugin to display JSON feed from [Bands In Town](https://www.bandsintown.com/api/overview)
* The shortcode supports an `artist` argument that defines the artist to display shows from.  If no artist is defined then the plugin will default to Nathanial Rateliff as the artist
* A map of all show locations is displayed at the bottom of a page where the shortcode is included
1. The custom post type `Artists` has been created and displays show information for each artist created via the `[DisplayShows]` shortcode

