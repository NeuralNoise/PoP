<?php

/**---------------------------------------------------------------------------------------------------------------
 *
 * Filter
 *
 * ---------------------------------------------------------------------------------------------------------------*/

class GD_FilterMyPosts extends GD_Filter {

	protected function get_status_filtercomponent() {

		if (GD_CreateUpdate_Utils::moderate()) {
	
			global $gd_filtercomponent_moderatedstatus;
			return $gd_filtercomponent_moderatedstatus;
		}

		global $gd_filtercomponent_unmoderatedstatus;
		return $gd_filtercomponent_unmoderatedstatus;
	}

	function get_poststatus() {
	
		$status = parent::get_poststatus();

		// Add default value: if not status was provided, then also add the draft
		if (!$status) {

			$status = GD_CreateUpdate_Utils::moderate() ? array('publish', 'pending', 'draft') : array('publish', 'draft');
		}
		
		return $status;	
	}

	function get_wildcard_filter() {
	
		// global $gd_filter_wildcardmyposts;
		// return $gd_filter_wildcardmyposts;
		return GD_FILTER_WILDCARDMYPOSTS;
	}
}
