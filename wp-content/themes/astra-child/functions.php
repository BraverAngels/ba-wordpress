<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */



/**
 * Require all theme-related custom functions, shortcodes and overrides
 * These items live in the /inc directory
 */
$includes = glob(get_stylesheet_directory() . "/inc/*.php");

foreach($includes as $file){
  require $file;
}
