
<?php
/**
 * @package  Turntabl-LearnDash-Plugin
 */

class TurntablLearndashPluginDeactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}