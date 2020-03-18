<?php
/**
* @package Turntabl-LearnDash-Plugin
*/
/*
Plugin Name: Turntabl-LearnDash Plugin
Plugin URI: https://github.com/francisbilla/turntabl-learnDash-Plugin
Description: This is a Plugin design by Turntabl Ghana to provide tool to build an affordable Learning Management System to our Clients.
Version: 1.0.0
Author: Francis Billa *PROPHET* & Samuel Owusu *Sam K*
Author URI: https://github.com/francisbilla
License: GPLv2 or later
Text Domain:  Turntabl-learndash-plugin
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automatic, Inc.
*/

if (! class_exists('TurntablLearndashPlugin')){
    class TurntablLearndashPlugin{
        /// CONSTANTS
        const VERSION = '1.0.0';
        const HELP_URL = 'https://github.com/francisbilla/Turntabl-learndash-plugin/issue';
        const CSS_FOLDER = 'TurntablLearndashPlugin-css';

        const SETTING_KEY_GENERAL = '_TurntablLearndashPlugin_setting_general';
        
        //CACHE 
        const CACHE_PERIOD = 86400;

        public static $PLUGIN_URI ='';
    }
}

if( file_exists( dirname(__FILE__) . '/vendor/autoload.php') ) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPages;

if ( !class_exists( 'TurntablLearndashPlugin') ){

class TurntablLearndashPlugin
{
    public $plugin;

    function __construct() {
        $this -> plugin = plugin_basename(__FILE__);
    }

    function register() {
       add_action('admin_enqueue_scripts', array( 'TurntablLearndashPlugin', 'enqueue')); 
    
       add_action('admin_menu', array($this, 'add_admin_pages') );

       add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link') );
    }

    public function settings_link( $links ) {
        $settings_link = '<a href="admin.php?page=turntablLearnDash_plugin">Setting</a>';
        array_push( $links, $settings_link );
        return $links;
    }

    public function add_admin_pages() {
        add_menu_page('TurntablLearnDash Plugin', 'TurntablLearnDash','manage_options','TurntablLearnDash_plugin', array($this,'
        admin_index'),'dashicons-desktop',110 );
    }

    public function admin_index() {
        require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
    }

    protected function create_post_type() {
        add_action( 'init',array( $this, 'custom_post_type'));
    }


    function custom_post_type() {
        register_post_type( 'objectives', ['public' => true, 'label' =>'OBJECTIVES']);
    }

    function enqueue() {
        //enqueue all script
        wp_enqueue_style( 'mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__ ));
        wp_enqueue_style( 'mypluginscript', plugins_url('/assets/myscript.js', __FILE__ ));
    }

    function activate() {
       Activate::activate();
    }   
}
    $turntablLearnDashPlugin = new TurntablLearnDashPlugin();
    $turntablLearnDashPlugin -> register();

//activation
register_activation_hook(__FILE__, array( $turntablLearnDashPlugin, 'activate') );

//deactivation
register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate') );

}
    
