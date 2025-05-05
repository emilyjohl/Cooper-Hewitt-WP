<?php
/**
 * Plugin Name: Api-Plugin
 * Description: Fetch request to API data to display via shortcode.
 * Version: 1.0
 * Author: Emily Johl
 */

if (!defined('ABSPATH')) exit;

add_shortcode("show_message", "sp_show_static_message");

function sp_show_static_message(){
  return "<p style='color:red;'>hello world, shortcode test</p>"; 
}

add_shortcode("show_input", "sp_show_input_fields");


function sp_show_input_fields(){
  ob_start();
  ?>
    <form id="my-custom-form">
        <input type="text" id="input1" name="input1" placeholder="Enter value 1" required />
        <input type="text" id="input2" name="input2" placeholder="Enter value 2" required />
        <button type="submit" onclick="displayFields()">Submit</button>
    </form>
    <script type="text/javascript">
      function displayFields(){
        event.preventDefault()
        console.log('hello world')
        const text1 = document.querySelector('#input1').value
        const text2 = document.querySelector('#input2').value
        console.log('text1', text1, 'text2', text2)
      }

    </script>
  <?php
  return ob_get_clean();
}
