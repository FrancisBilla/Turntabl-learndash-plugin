<?php
/**
 * @package  Turntabl-LearnDash-Plugin
 */

namespace Inc;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}