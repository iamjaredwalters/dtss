<?php 
  /*
  Plugin Name: Display Shows
  Description: Display upcoming show via Bands In Town API
  Version: 1.0.0
  Author:  Jared Walters
  License: GPL2
  */
 
  defined('ABSPATH') or die("You will not pass");

  class DisplayShows {
    //  Constructor method called on each new created object
    public function __construct() {
      add_shortcode( 'DisplayShows', array($this, 'shortcode') );
      add_action('wp_enqueue_scripts', array($this, 'enqueueAssets'));
    }

    public function enqueueAssets() {
      wp_register_style( 'shows-styles', plugins_url( 'display-shows/assets/shows.css' ), array(), null );
      wp_enqueue_style( 'shows-styles' );

      wp_register_script( 'maps-api', plugins_url( 'display-shows/assets/googlemaps.js' ), array('jquery'), null, false );
      wp_enqueue_script( 'maps-api' );
    }

    public function shortcode($atts) {
      $a = shortcode_atts( array(
          'artist' => 'NathanielRateliffAndTheNightSweats'
      ), $atts );

      $response = wp_remote_get('http://api.bandsintown.com/artists/' . $a['artist'] . '/events.json?api_version=2.0&app_id=jww-child-theme');

      if( is_array($response) ) {
        $body = $response['body'];
        $json = json_decode($body, true);

        if(!empty($json)) {
          $name  = $json[0]['artists'][0]['name'];
          $thumb = $json[0]['artists'][0]['thumb_url'];
          $fb    = $json[0]['artists'][0]['facebook_tour_dates_url'];
          $shows = $json;

          // Artist general info
          echo '<div id="' . $a['artist'] . '" class="artist-desc">';
          echo '<img class="artist-img" src="' . $thumb . '">';
          echo '<div class="artist-info">';
          echo '<h1>' . $name . '</h1>';
          echo '<a href="' . $fb . '">' . $name . ' on Facebook</a>';
          echo '</div>';
          echo '</div>';

          // Put shows listings together
          echo '<div class="all-shows">';
          foreach ($shows as $show) {
            $title    = $show['title'];
            $date     = $show['formatted_datetime'];
            $location = $show['formatted_location'];

            echo '<ul class="show-info">';
            echo '<li>' . $title . '</li>';
            echo '<li>' . $date . '</li>';
            echo '<li>' . $location . '</li>';
            echo '</ul>';
          }
          echo '</div>';
          echo '<div id="map_wrapper"><div id="map_canvas" class="mapping"></div></div>';
        } else {
          echo 'Artist not found';
        }
      }
    }
  }

  $displayShows = new DisplayShows;
?>