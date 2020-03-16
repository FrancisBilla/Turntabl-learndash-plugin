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

if (! class_exists('WP_UNINSTALL_Plugin')){
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

//Clear Database stored Data
// $objectives = get_posts( array('post_type' => 'objective', 'numberposts' => -1));

// foreach( $objectives as $objective ) {
//     wp_delete_post( $objective -> ID, true );
// }

//Access the Database via SQL
global $wpdb;
$wpdb -> query( "DELETE FROM wp_posts WHERE post_type = 'objective'");
$wpdb -> query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );
$wpdb -> query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" );