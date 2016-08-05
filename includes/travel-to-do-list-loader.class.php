<?php

class TTDL_Loader {

  public static function init() {
    global $TravelToDoList;
    include_once TTDL_PLUGIN_DIR.'includes/travel-to-do-list.class.php';
    self::setup_custom_post_type();
    add_action( 'admin_menu', array( __CLASS__, 'create_admin_menu' ) );

    $TravelToDoList = new TravelToDoList();
  }


  public static function setup_custom_post_type(){

    register_post_type( 'travel-todo',
      array(
        'labels'  => array(
          'name'          => __( 'Travel-To-Do', 'travel-to-do-list' ),
          'singular_name' => __( 'Travel-To-Do', 'travel-to-do-list' )
        ),
        'public'              => false,
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
        'show_ui'             => false, //set to false eventually?
        'hierarchical'        => false,
        'has_archive'         => false,
        'rewrite'             => false,
        'query_var'           => false,
        'can_export'          => true,
        'show_in_nav_menus'   => false,
      )
    );
  }

  public static function create_admin_menu(){
    global $travel_todo_page;

    add_menu_page(
      apply_filters( 'ttdl_todo_list', __( 'Travel-To-Do List', 'travel-to-do-list' ) ),
      apply_filters( 'ttdl_todo_list', __( 'Travel-To-Do List', 'travel-to-do-list' ) ),
      'manage_options',
      'travel-to-do-list',
      array( __CLASS__, 'plugin_page' )
    );
  }

  public static function plugin_page() {
    global $TravelToDoList;

    $TravelToDoList->display();
    echo $TravelToDoList->list;
  }


}
