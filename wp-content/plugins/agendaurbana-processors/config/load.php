<?php

/**---------------------------------------------------------------------------------------------------------------
 * Global Variables and Configuration
 * ---------------------------------------------------------------------------------------------------------------*/

// require_once 'config.php';

// High priority: allow the Theme and other plug-ins to set the values in advance.
add_action('init', 'agendaurbana_processors_init_constants', 50);
function agendaurbana_processors_init_constants() {
	
	require_once 'constants.php';
}