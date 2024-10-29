<?php
/**
* Plugin name: Beautiful Steps
* Plugin URL: https://www.facebook.com/LazyNerds-101871641896896
* Description: Generate beautiful steps for your page
* Domain Path: /languages
* Text Domain: beautiful-steps
* Version: 1.0
* Author: Andrew Phan - Lazy Nerds team
* Author URL: https://www.facebook.com/phanthe.anh.129/
*/

/*
Copyright (c) 2012-2019 Roman Pronskiy

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

    define("BEAUTIFUL_STEPS_PATH", plugin_dir_path( __FILE__ ));

    // Add css va js o header 
    function beautiful_steps_head() {
        if ( ! did_action( 'wp_enqueue_media' ) ) {
            wp_enqueue_media();
        }
        wp_enqueue_style( 'beautiful-steps-css', plugins_url( 'css/styles.css', __FILE__ ), array(), '1.0');
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script( 'beautiful-steps-script', plugins_url( 'js/script.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ));

    }
    add_action( 'admin_init', 'beautiful_steps_head' );

    function client_beautiful_steps_head() {
        wp_enqueue_style( 'beautiful-steps-css', plugins_url( 'css/styles.css', __FILE__ ), array(), '1.0');
    }
    add_action( 'wp_enqueue_scripts', 'client_beautiful_steps_head' );
    
    // khoi tao bang cai dat
    $beautiful_steps_options = get_option('beautiful_steps_settings');

    // trinh quan ly admin
    include( BEAUTIFUL_STEPS_PATH . 'inc/beautiful-steps-admin.php');
    include( BEAUTIFUL_STEPS_PATH . 'inc/beautiful-steps-content.php');

    add_action( 'plugins_loaded', 'bts_load_textdomain' );
    function bts_load_textdomain() {
        load_plugin_textdomain( 'beautiful-steps', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
    }
?>