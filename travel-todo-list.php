<?php
/*
Plugin Name: Travel To Do List
*/

add_action( 'init', 'travel_todo_loader' );
include_once 'includes/travel-to-do-list-loader.class.php';

function travel_todo_loader(){

 // include_once 'includes/travel-to-do-list-loader.class.php';

  if ( ! defined( 'TTDL_PLUGIN_DIR' ) )  define( 'TTDL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

  TTDL_Loader::init();
}