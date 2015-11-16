# Overview
Twenty Fifteen Child Theme, Display Shows Plugin, and All Page Link Shortcode

## Installation
1. Clone or extract the DTSS project into a local directory
2. Move the ***twentyfifteen-child-jared-walters*** child theme into your WordPress theme directory
  * Be sure that you also have the [Twenty Fifteen](https://wordpress.org/themes/twentyfifteen/) theme installed in the theme directory as well
  * Navigate to the child theme via the command line and run `npm install` to install the gulp dependencies
  * `gulp watch` will compile the scss files
1. Move ***display-shows*** folder into your WP plugin directory
  * Activate the plugin in your dashboard
1. Install the [WordPress Importer](https://wordpress.org/plugins/wordpress-importer/) plugin 
* follow instructions from the Tools -> Import screen to import the included XML file

### Twenty Fifteen Child Theme
* ***/templates/content-page-example.php*** will override the template for a page named ***example*** 
* ***/templates/content-single-example.php*** will override the template for post type ***example*** 
* The custom post type "Artists" will display shows for the artists posts that have been created assuming the shortcode is present and the artist argument has been provided

### All Page Links
[AllPageLinks] will print out page links to all pages of the site

###  Display Shows
The page `/shows` uses the `[DisplayShows]` shortcode provided by the plugin to display JSON feed from [Bands In Town](https://www.bandsintown.com/api/overview)
* The shortcode supports an `artist` argument that defines the artist to display shows from.  If no artist is defined then the plugin will default to Nathanial Rateliff as the artist
* A map of all show locations is displayed at the bottom of a page where the shortcode is included

### To Do
* list the pages that have been included (add contact-us)
* add Buy-link for tickets
