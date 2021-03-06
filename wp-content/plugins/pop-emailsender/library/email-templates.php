<?php

/**---------------------------------------------------------------------------------------------------------------
 *
 * Email functions
 *
 * ---------------------------------------------------------------------------------------------------------------*/

define ('GD_EMAIL_TEMPLATE_EMAIL', 'email.html');
define ('GD_EMAIL_TEMPLATE_EMAILBODY', 'emailbody.html');

class PoP_EmailSender_Templates {

	protected $template_folders, $email_frames;

	function __construct() {

		// Cache the already generated frames for other users
		$this->email_frames = array();

		// Set myself as the instance in the Factory
		PoP_EmailTemplates_Factory::set_instance($this);
	}

	function get_name() {

		return '';
	}

	function get_template_folders() {

		if (!$this->template_folders) {
			$this->template_folders = apply_filters('sendemail_to_users:template_folders', array());
		}
		return $this->template_folders;
	}

	function add_emailframe($title, $content, $emails = array(), $names = array(), $template_name = GD_EMAIL_TEMPLATE_EMAIL/*, $frame = null*/) {

		// If passing null, initialize it to the default value
		$template_name = $template_name ?? GD_EMAIL_TEMPLATE_EMAIL;
		// $frame = $frame ?? GD_EMAIL_FRAME_DEFAULT;

		// "add_emailframe" because if the template_folder is not set (eg: explicitly set to null, such as with PoP Mailer AWS) then it won't add anything
		$template = '';
		foreach ($this->get_template_folders() as $template_folder) {

			if (file_exists($template_folder . $template_name)) {
				$template = $template_folder . $template_name;
				break;
			}
		}

		if ($template) {

			// if (!isset($this->email_frames[$template])) {
			// 	$this->email_frames[$template] = array();
			// }

			// If the frame had been generated, then fetch it from the cache
			if (!isset($this->email_frames[$template]/*[$frame]*/)) {

				$url = trailingslashit(home_url());
				ob_start();
				include ($template);
				$this->email_frames[$template]/*[$frame]*/ = str_replace(
					'{{URL}}', 
					$url, 
					ob_get_clean()
				);
			}
			// Message
			$header = $this->get_emailframe_header(/*$frame, */$title, $emails, $names, $template_name);
			$beforefooter = $this->get_emailframe_beforefooter(/*$frame, */$title, $emails, $names, $template_name);
			$footer = $this->get_emailframe_footer(/*$frame, */$title, $emails, $names, $template_name);
			$msg = str_replace(
				array('{{TITLE}}', '{{HEADER}}', '{{CONTENT}}', '{{BEFOREFOOTER}}', '{{FOOTER}}'), 
				array($title, $header, $content, $beforefooter, $footer), 
				$this->email_frames[$template]/*[$frame]*/
			);
		}
		else {
			$msg = $content;
		}

		return $msg;
	}

	function get_emailframe_header(/*$frame, */$title, $emails, $names, $template_name) {

		return '';
	}

	function get_emailframe_footer(/*$frame, */$title, $emails, $names, $template_name) {
		
		return '';
	}

	function get_emailframe_beforefooter(/*$frame, */$title, $emails, $names, $template_name) {
		
		return '';
	}

	function get_userhtml($user_id) {

		return '';
	}

	function get_posthtml($post_id) {

		return '';
	}

	function get_commenthtml($comment) {

		return '';
	}

	function get_commentcontenthtml($comment) {

		return '';
	}

	function get_taghtml($tag_id) {

		return '';
	}

	function get_websitehtml() {

		return '';
	}

	function get_buttonhtml($title, $url) {

		return '';
	}
}
