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
    //methods
    function __construct() {
        add_action( 'init', array( $this, 'custom_post_type'));
    }

    //activation method
    function activate() {
       
    }

    //deactivation method
    function deactivate() {
        
    }
    //uninstall method
    function uninstall() {
        
    }

    function custom_post_type() {
        register_post_type( 'book', ['public' => true, 'label' =>'BOOKS']);
    }
}

if( class_exists( 'TurntablLearndashPluginClass')) {
    $turntablLearnDashPlugin = new TurntablLearndashPluginClass();
}


 //activation
 register_activation_hook(__FILE__,array($turntablLearnDashPlugin, 'activate') );

//deactivation
register_deactivation_hook(__FILE__,array($turntablLearnDashPlugin, 'deactivate') );

//uninstall