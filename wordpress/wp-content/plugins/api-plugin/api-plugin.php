<?php
/**
 * Plugin Name: Api-Plugin
 * Description: Fetch request to API data to display via shortcode.
 * Version: 1.0
 * Author: Emily Johl
 */

if (!defined('ABSPATH')) exit;

function plugin_enqueue_scripts() {
  // Grab api key set in yaml file
  $api_key = getenv('API_KEY');

  // Connect to JS file
  wp_enqueue_script('api-plugin-js', plugin_dir_url(__FILE__) . 'js/api-plugin.js', array('jquery'), null, true);
  
  wp_localize_script('api-plugin-js', 'myApiPlugin', array(
      'api_key' => $api_key,
      'ajaxurl' => admin_url('admin-ajax.php')
  ));
}
add_action('wp_enqueue_scripts', 'plugin_enqueue_scripts');


function my_api_plugin_fetch_data() {
  // Display input querey boxes and the response container
  ob_start();
  ?>
  <div class="querey-container">
      <div class="flexbox-child" id="subheading-container">
        <h2 class="subheading">Search for an Item</h2>
        <p class="search-ideas">Search an Artist, Science Term, Object, or Article</p>
      </div>
      <div class="divider"></div>
      <form class="flexbox-child">
        <input type="text" id="search" name="search" placeholder="Ex. Andy Warhol" required />
        <button class="form-button" aria-haspopup="true" aria-expanded="false" id="sort-by-menu-button">Sort By</button>
          <ul id="sort-by" role="menu" hidden>
            <li role="menuitem" tabindex="0">Relevancy</li>
            <li role="menuitem" tabindex="0">Newest</li>
            <li role="menuitem" tabindex="0">Random</li>
          </ul>
        <button class="form-button" type="submit" id="fetch-data-button">Submit</button>
      </form>
    </div>
    </div>
    <div id="api-response-container">
        <div id="object-type-container"></div>
        <p>Submit a querey to load data</p>
    </div>
  <?php
  return ob_get_clean();
}

add_shortcode('my_api_plugin', 'my_api_plugin_fetch_data');
