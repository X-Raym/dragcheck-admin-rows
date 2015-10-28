<?php

/**
 * @package Dragcheck Admin Rows
 * @version 1.0.0
 */

/*
Plugin Name: Dragcheck Admin Rows
Plugin URI: http://www.extremraym.com/
Description: A simple WordPress plugin that adds the possibility to click and drag to check checkboxes in common admin tables, such as in Plugins, Posts, and Users pages. It also add the possibility to add custom styles to these selected rows.
Version: 1.0.0
Author: X-Raym
Author URI: http://www.extremraym.com/
License: GPL2
*/

/*
Copyright 2015  Raymond Radet

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if( !class_exists('WP_Dragcheck_Admin_Rows') ) {

  class WP_Dragcheck_Admin_Rows {

			/**
       * Construct the plugin object
       */
      public function __construct() {

				// Define plugin constants
				$this->basename			 = plugin_basename( __FILE__ );
				$this->directory_path = plugin_dir_path( __FILE__ );
				$this->directory_url	= plugins_url( dirname( $this->basename ) );

				// Include our other plugin files
				add_action( 'init', array( $this, 'includes' ) );

			} // END public function __construct


			/**
			 * Include our plugin dependencies
			 */
			public function includes() {

				// Enqueue Scripts
				add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );

			}


			/**
			 * Add JS on admin page (only)
			 *
			 **/
			public function admin_scripts($hook) {

				if ( 'edit.php' != $hook && 'users.php' != $hook && 'plugins.php' != $hook && 'edit-comments.php' != $hook && 'upload.php' != $hook ) {
					return;
				}

				wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . 'js/dragcheck-admin-rows.js', array('jquery'), '1.0', true );
				wp_enqueue_script( 'dragcheck', plugin_dir_url( __FILE__ ) . 'js/dragcheck.js' );

			}

  } // END class WP_Plugin_Template

} // END if(!class_exists('WP_Plugin_Template'))


// Init Classes
if ( class_exists( 'WP_Dragcheck_Admin_Rows' ) ) {

	// instantiate the plugin class
	$wp_draggable_admin_checkboxes = new WP_Dragcheck_Admin_Rows();

}
