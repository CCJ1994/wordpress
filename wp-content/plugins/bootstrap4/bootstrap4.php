<?php
/**
 * @package Progressbar_Bootstrap_4
 * @version 1.0
 */
/*
Plugin Name: Progressbar Bootstrap 4
Plugin URI: https://progressbar.tw/
Description: 進度條線上課程 Bootstrap 4 安裝外掛
Author: 縱裕
Version: 1.0
Author URI: https://progressbar.tw/
*/
define( 'BOOTSTRAP_4__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'BOOTSTRAP_4_VERSION', 1.0 );

function bootstrap_add_styles() {
  wp_enqueue_style( 'bootstrap_min', 
                   plugin_dir_url( __FILE__ ) . '_inc/css/bootstrap-4.0.0.min.css',
                   array(), 
                  BOOTSTRAP_4_VERSION 
                  );
}
add_action( 'wp_enqueue_scripts', 'bootstrap_add_styles' );

function bootstrap_update_jquery_version() {
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', 
                     plugin_dir_url( __FILE__ ) . '_inc/js/jquery-3.3.0.min.js',
                     array(), 
                     BOOTSTRAP_4_VERSION, 
                     true 
                    );
  wp_enqueue_script( 'jquery');
  
  wp_enqueue_script( 'popper_min',
                    plugin_dir_url( __FILE__ ) . '_inc/js/popper-1.12.9.min.js', 
                    array('jquery'), 
                    BOOTSTRAP_4_VERSION, 
                    true
                   );
  
  wp_enqueue_script( 'bootstrap_min', 
                    plugin_dir_url( __FILE__ ) . '_inc/js/bootstrap-4.0.0.min.js', 
                    array('popper_min', 'jquery'), 
                    BOOTSTRAP_4_VERSION, true);
}

add_action( 'wp_enqueue_scripts', 'bootstrap_update_jquery_version' );


require_once( BOOTSTRAP_4__PLUGIN_DIR . 'demo.php' );

?>