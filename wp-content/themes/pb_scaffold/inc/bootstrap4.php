<?php

function add_style(){
  wp_enqueue_style('main_style',get_stylesheet_uri(),[],'test1.3');
  wp_enqueue_style('boostrap_min','https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"');

}
add_action('wp_enqueue_scripts','add_style');

function update_jquery_version(){
  wp_deregister_script('jquery');
  wp_register_script('jquery',get_template_directory_uri().'/assets/js/jquery-3.5.1.min.js',array(),
  'test3.5.1',true);

  wp_enqueue_script('jquery');
  wp_enqueue_script('popper_min','https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js',array('jquery'),'',true);
  wp_enqueue_script('boostrap_min','https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js',array('jquery','popper_min'),'',true);
}
add_action('wp_enqueue_scripts','update_jquery_version');
