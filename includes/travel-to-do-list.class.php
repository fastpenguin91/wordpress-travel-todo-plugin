<?php

class TravelToDoList {

  public $list = '';


  protected function show_heading() {
    $heading = '';
    if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) $heading = '<h3>'.esc_html__( 'Travel-To-Do Items', 'travel-to-do-list' ).'</h3>';

    return apply_filters( 'ttdl_heading', $heading );
  }

  public function display(){

    $this->list .= '<h2>'.apply_filters( 'ttdl_todo_list', esc_html__('Travel-To-Do List', 'travel-to-do-list' ) ).'</h2>';


    $this->show_heading();
  }

}