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
  <div id=quereyContainer>
    <form>
      <input type="text" id="search" name="search" placeholder="Search something" required />
      <!-- <div class="dropdownContainer" id='dropdownContainer'>
        <button id=sort className="dropdownButton">Select Sort Style</button>
        <div className="choiceContainer">
          <div class="choice">
            <p id="relevancy">Relevancy</p>
          </div>
          <div class="choice" onClick= >
            <p id="newest">Newest</p>
          </div>
          <div class="choice" onClick= >
            <p id="updated">Updated</p>
          </div>
        </div>
      </div> -->
      <button aria-haspopup="true" aria-expanded="false" id="sortByMenuButton">Sort By</button>
        <ul id="sortBy" role="menu" hidden>
          <li role="menuitem" tabindex="-1">Relevancy</li>
          <li role="menuitem" tabindex="-1">Newest</li>
          <li role="menuitem" tabindex="-1">Random</li>
        </ul>
      <button type="submit" id="fetchDataButton">Submit</button>
    </form>
    <div id="apiResponseContainer">
        <p>Click the button to load data.</p>
    </div>

  </div>
  <?php
  return ob_get_clean();
}

add_shortcode('my_api_plugin', 'my_api_plugin_fetch_data');
