<?php

  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' ); 
  add_theme_support( 'menus' ); 

  require_once( get_parent_theme_file_path('inc/bootstrap4.php') );

  function add_home_style(){
    wp_enqueue_style('main',get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style('notosanstc','//fonts.googleapis.com/earlyaccess/notosanstc.css');
    wp_enqueue_style('macondo','https://fonts.googleapis.com/css?family=Macondo');
  
  }
  add_action('wp_enqueue_scripts','add_home_style');
  /*
   * Enable support for Post Formats.
   *
   * See: https://wordpress.org/support/article/post-formats/
   */
  add_theme_support(
    'post-formats',
    array(
      'image',
      'link',
    )
  );
  // register custom post type 'my_custom_post_type'
  add_action( 'init', 'create_my_post_types' );
  function create_my_post_types() {
    register_post_type( 'product',
      array(
        'labels' => array( 'name' => __( 'Products' ) ),
        'public' => true,
        'supports' => array(
          'title',
          'editor',
          'thumbnail',
          'post-formats',
        )
      )
    );
    register_post_type( 'video',
      array(
        'labels' => array( 'name' => __( 'Videos' ) ),
        'public' => true,
        'supports' => array(
          'title',
          'editor',
          'custom-fields',
        )
      )
    );
    register_post_type( 'new',
      array(
        'labels' => array( 'name' => __( 'News' ) ),
        'public' => true,
        'supports' => array(
          'title',
          'editor',
          'thumbnail',
        )
      )
    );
  }
  function register_theme_menus(){
    //顯示地點
    register_nav_menus( array(
      'index_menu' => '上方導覽',
      'footer_menu' => '頁尾導覽',
      'index_slider' => '首頁輪播',
      ) 
    );
  }
  add_action('init','register_theme_menus');

  // function pb_menu_classes($classes, $item, $args) {
  //   if($args->menu == '上方導覽' || $args->theme_location=='上方導覽') {
  //     $classes[] = 'nav-list-item';
  //     // $classes = array('nav-list-item');
  //   }
  //   return $classes;
  // }
  // add_filter('nav_menu_css_class', 'pb_menu_classes', 1, 3);
  
  //add post-formats to post_type 'my_custom_post_type'
  // add_post_type_support( 'my_custom_post_type', 'post-formats' );