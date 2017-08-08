<?php
class PoPEngine_Initialization {

	function initialize(){

		load_plugin_textdomain('pop-engine', false, dirname(plugin_basename(__FILE__)).'/languages');

		/**---------------------------------------------------------------------------------------------------------------
		 * Load the Server first, so we can access class PoP_ServerUtils
		 * ---------------------------------------------------------------------------------------------------------------*/
		require_once 'server/load.php';

		// Set the plugin namespace for the processors
		PoP_ServerUtils::set_namespace('a0');

		/**---------------------------------------------------------------------------------------------------------------
		 * Constants/Configuration for functionalities needed by the plug-in
		 * ---------------------------------------------------------------------------------------------------------------*/
		// require_once 'config/load.php';

		/**---------------------------------------------------------------------------------------------------------------
		 * WP Overrides
		 * ---------------------------------------------------------------------------------------------------------------*/
		// require_once 'wp-includes/load.php';

		/**---------------------------------------------------------------------------------------------------------------
		 * Load the Library first
		 * ---------------------------------------------------------------------------------------------------------------*/
		require_once 'library/load.php';

		/**---------------------------------------------------------------------------------------------------------------
		 * Load the Kernel
		 * ---------------------------------------------------------------------------------------------------------------*/
		require_once 'kernel/load.php';

		/**---------------------------------------------------------------------------------------------------------------
		 * Load the PoP Library
		 * ---------------------------------------------------------------------------------------------------------------*/
		require_once 'pop-library/load.php';
	}
}