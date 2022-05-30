<?php

/*
  Plugin Name: Test Plugin
  Description: A truly amazing plugin.
  Version: 1.0
  Author: Sumit
  Author URI: https://www.sumitweb.dk
*/

add_filter('the_content', 'addToEndOfPost');

function addToEndOfPost($content) {
  if (is_page() && is_main_query()) {
    return $content . '<p>My name is Brad.</p>';
  }

  return $content;
}