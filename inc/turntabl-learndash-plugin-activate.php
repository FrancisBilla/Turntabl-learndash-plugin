<?php
/**
 * @package  Turntabl-LearnDash-Plugin
 */

class TurntablLearndashPluginActivate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}