<?php
/*
Plugin Name: test_plugins
Plugin URI: https://wordpress.org/plugins/disable-comments/
Description: It's testing plugin.
Version: 1.0.0
Author: test
Author URI: http://www.rayofsolaris.net/
License: GPL2
Text Domain: test_plugins
Domain Path: /languages/
*/


class Test_Plugins {
	private static $instance = null;

	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	function __construct() {
      $this->version_check();
      $this->get_all_options();
      if(is_admin()){
        $this->do_activities_in_admin_page();
      }else{
        $this->do_activities_in_normal_page();
  
      }
	}
  private function version_check(){
    
  }
  private function get_all_options(){

  }
  private function do_activities_in_admin_page(){
    add_action( 'admin_menu', array( $this, 'settings_menu' ) );
    
  }
  private function do_activities_in_normal_page(){
    
  }
  public function settings_menu() {
		$title = "test plugin title";
		add_submenu_page( 'options-general.php', $title, "menu title", 'manage_options', 'test_plugins', array( $this, 'settings_page' ) );
		// remove_submenu_page( 'options-general.php','test_plugins');
	}
  public function settings_page() {
    echo "<p>settings_page</p>";
	}
}

Test_Plugins::get_instance();

?>