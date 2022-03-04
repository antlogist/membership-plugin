<?php

/**
 * Plugin Name: Membership Plugin
 * Description: WordPress plugin allows to manage membership.
 * Version: 1.0.0
 * Author: Anton Podlesnyy
 * Author URI: https://podlesnyy.ru
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if(!is_admin()) {
  return;
}

if ( ! defined( 'MEMBERSHIP_MANAGEMENT_DIRNAME' ) ) {
  define( 'MEMBERSHIP_MANAGEMENT_DIRNAME', plugin_basename( dirname( __FILE__ ) ) );
}

if ( ! defined( 'MEMBERSHIP_MANAGEMENT' ) ) {
  define('MEMBERSHIP_MANAGEMENT', '1.0.0');
}

if(! class_exists( 'MemebershipManagement' )) {

  require_once plugin_dir_path( __FILE__ ) . 'Classes/RenderMembershipTab.php';
  require_once plugin_dir_path( __FILE__ ) . 'Classes/RenderMembershipUsers.php';

  class MemebershipManagement {
    private $parentSlug = 'memebership_management';
    private $usersSubmenuSlug = 'memebership_management_submenu';

    function __construct() {
      add_action('admin_enqueue_scripts', array( $this, 'css_js' ));
      add_action( 'admin_menu', array( $this, 'addMenuPage' ) );
    }

    public function css_js() {
      wp_enqueue_style( 'memebership-css', plugin_dir_url( __FILE__ ) . '/dist/css/all.css', '', microtime());
      wp_enqueue_script('memebership-js', plugin_dir_url( __FILE__ ) . '/dist/js/all.js', '', microtime(), true);
    }


    public function addMenuPage() {
      add_menu_page(
        'Memebership',                  //page_title
        'Memebership',                  //menu_title
        'manage_options',               //capability
        $this->parentSlug ,             //menu_slug
        array( $this, 'parentMenuRender' ), //callback_function
        'dashicons-admin-users',        //icon
        10);                            //position

        add_submenu_page(
          $this->parentSlug ,                //parent_menu_slug
          'Users',                           //page_title
          'Users',                           //menu_title
          'manage_options',                  //capability
          $this->usersSubmenuSlug ,          //menu_slug
          array( $this, 'usersMenuRender' ), //callback_function
      );
    }

    public function parentMenuRender() {
      RenderMembershipTab::renderTab();
    }

    public function usersMenuRender() {
      RenderMembershipUsers::renderTab();
    }

  }

  new MemebershipManagement();

}
