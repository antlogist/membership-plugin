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

if ( ! defined( 'MEMBERSHIP_MANAGEMENT_DIRNAME' ) ) {
  define( 'MEMBERSHIP_MANAGEMENT_DIRNAME', plugin_basename( dirname( __FILE__ ) ) );
}

if ( ! defined( 'MEMBERSHIP_MANAGEMENT' ) ) {
  define('MEMBERSHIP_MANAGEMENT', '1.0.0');
}

if(! class_exists( 'MemebershipManagement' )) {

  require_once plugin_dir_path( __FILE__ ) . 'Classes/RenderMembershipTab.php';

  class MemebershipManagement {
    private $slug = 'memebership_management';

    function __construct() {
      add_action( 'admin_menu', array( $this, 'addMenuPage' ) );
    }


    public function addMenuPage() {
      add_menu_page(
        'Memebership',                  //page_title
        'Memebership',                  //menu_title
        'manage_options',               //capability
        $this->slug ,                   //menu_slug
        array( $this, 'pluginRender' ), //callback_function
        'dashicons-admin-users',        //icon
        10);                            //position
    }

    public function pluginRender() {
      RenderMembershipTab::tab();
    }

  }

  new MemebershipManagement();

}
