<?php
/**
 * Plugin Name:       GOGOPOWERRANGER
 * Plugin URI:        https://GOGOPOWERRANGER.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Rach Chen
 * Author URI:        https://author.GOGOPOWERRANGER.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       GOGOPOWERRANGER
 * Domain Path:       /languages
 */

// add_filter('the_content','add_space_for_chinese',11);

// function add_space_for_chinese($content){
//   $convmap = array(0x80,0xffff,0,0xffff);
//   $output = mb_encode_numericentity($content,$convmap,'UTF-8');
//   $output = preg_replace('/(\&\#[0-9]{5}\;)/','\\1'.' ',$output);
//   return $output;
// }
add_action( 'admin_menu', 'gogo_create_menu' );

function gogo_create_menu() {
  // 建立主選單
  add_menu_page( 'GoGopowerranger Settings Page', 'GoGopowerranger Setting',
      'manage_options', 'gogGopowerranger-options', 'GoGopowerranger_setting_page',
      'dashicons-smiley', 99 );
  //創造子選單
  add_submenu_page( 'gogGopowerranger-options', 'About ranger', 'About', 'manage_options',
        'ranger-about', 'ranger_about_page' );
  add_submenu_page( 'gogGopowerranger-options', 'Help ranger', 'Help', 'manage_options',
        'ranger-help', 'ranger_help_page' );
}

function GoGopowerranger_setting_page() {
?>
<h1> 走走力量遊俠阿斯批零</h1>
<?php
 }
 function ranger_about_page() {
  echo "About 遊俠";
}

function ranger_help_page() {
  echo "Help Ranger";
}
add_action( 'admin_menu', 'Ranger_add_settings_menu' );

function Ranger_add_settings_menu() {

    add_options_page( 'Ranger Plugin Settings', 'GOGO Settings', 'manage_options',
        'ranger_plugin', 'ranger_option_page' );

}
        
function ranger_option_page() {
    ?>
<div class="wrap">
  <h2>Ranger plugin</h2>
  <form action="options.php" method="post">
    <?php 
            settings_fields( 'gogopowerranger_plugin_options' );
            do_settings_sections( 'gogopowerranger_plugin' );
            submit_button( 'Save Changes', 'primary' );  
            ?>
  </form>
</div>
<?php
}
        
add_action('admin_init', 'gogopowerranger_plugin_admin_init');

function gogopowerranger_plugin_admin_init(){
    $args = array(
        'type'=> 'string', 
        'sanitize_callback' => 'gogopowerranger_plugin_validate_options',
        'default' => NULL
    );

    register_setting( 'gogopowerranger_options_group', 'gogopowerranger_options', $args );
    
    //add a settings section
    add_settings_section( 
        'gogopowerranger_plugin_main', 
        'gogopowerranger Plugin Settings',
        'gogopowerranger_plugin_section_text', 
        'gogopowerranger_plugin' 
    );
    
    //create our settings field for name
    add_settings_field( 
        'gogopowerranger_plugin_name', 
        'Your Name',
        'gogopowerranger_plugin_setting_name', 
        'gogopowerranger_plugin', 
        'gogopowerranger_plugin_main' 
    );

}

// 印出section的header
function gogopowerranger_plugin_section_text() {
    echo '<p>來往這裡來阿斯</p>';
}
        
// 印出所有的field
function gogopowerranger_plugin_setting_name() {

    // 從資料庫取回gogopowerranger_plugin_options
    $options = get_option( 'gogopowerranger_plugin_options' );
    $name = $options['name'];
    // $blabla = $options['blabla']; 你可以加進options中來取回

    // 把這個資料當預設值印出來
    echo "<input id='name' name='gogopowerranger_plugin_options[name]'
        type='text' value='" . esc_attr( $name ) . "' />";

}

// 在這裡驗證輸入的資料是否正確，你可能需要學過一點正規表達式，不過意思是只能有英文
function gogopowerranger_plugin_validate_options( $input ) {

    $valid = array();
    $valid['name'] = preg_replace(
        '/[^a-zA-Z\s]/',
        '',
        $input['name'] );

    return $valid;

}