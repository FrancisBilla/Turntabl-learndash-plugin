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

class TurntablLearndashPluginClass
{

    public static function register() {
       add_action('admin_enqueue_scripts', array( 'TurntablLearndashPluginClass', 'enqueue')); 
    
       add_action('admin_menu', array($this, 'add_admin_pages'));
    }

    public function add_admin_pages() {
        add_menu_page('TurntablLearnDash Plugin', 'TurntablLearnDash','TurntablLearnDash_plugin', array($this,'
        admin_index'),'dashicons-desktop',110 );
    }

    function create_post_type() {
        add_action( 'init',array( $this, 'custom_post_type'));
    }

    //uninstall method
    function uninstall() {
        
    }

    function custom_post_type() {
        register_post_type( 'objectives', ['public' => true, 'label' =>'OBJECTIVES']);
    }

    static function enqueue() {
        //enqueue all script
        wp_enqueue_style( 'mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__ ));
        wp_enqueue_style( 'mypluginscript', plugins_url('/assets/myscript.js', __FILE__ ));
    }

    function activate() {
        require_once plugin_dir_path( __FILE__ ) . 'inc/turntabl-learndash-plugin-activate.php';
        TurntablLearndashPluginActivate::activate();
    }

    function deactivate() {
        require_once plugin_dir_path( __FILE__ ) . 'inc/turntabl-learndash-plugin-deactivate.php';
        TurntablLearndashPluginDeactivate::deactivate();
    }
}


     $turntablLearnDashPlugin = new TurntablLearndashPluginClass();
     $turntablLearnDashPlugin -> register();
    
