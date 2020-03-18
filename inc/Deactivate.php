<?php
/**
 * @package  Turntabl-LearnDash-Plugin
 */

namespace Inc;

class Deactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}