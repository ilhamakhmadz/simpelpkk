<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Beam-Template Helpers
 *
 * @package Beam-Template
 * @category Helper
 * @author Ardi Soebrata
 */
/**
 * Beam-Template Helpers
 */
if (!function_exists('messages')) {
	/**
	 * Return formatted messages.
	 *
	 * @return string
	 */
	
	function messages()
	{
		if (FALSE === ($template = &_get_object('template')))
			return '';

		$content = null;
		$template_messages = $template->get_messages();

		if (FALSE !== ($form_validation = &_get_object('form_validation'))) {
			if ($form_validation->num_errors())
				$template_messages['error'][] = sprintf(lang('form_error'), $form_validation->num_errors());
		}

		foreach ($template_messages as $type => $messages) {
			if ($type == 'notify')
				continue;

			$type_class = $type;
			if ($type == 'error')
				$type_class = 'danger';

			$num_messages = count($messages);
			if ($num_messages) {
				$content .= '<div class="alert alert-dismissible bg-' . $type_class . ' d-flex align-items-center p-5 mb-10">
				<i class="bi bi-chat-square-dots-fill fs-2hx text-light me-4">
					<span class="path1"></span>
					<span class="path2"></span>
				</i>';
				$content .= '<div class="d-flex flex-column text-light pe-0 pe-sm-10">';
				// $content .= '<div class="alert alert-dismissible bg-' . $type_class . ' d-flex flex-column flex-sm-row w-100 p-5 mb-10">';
				// $content .= '<span class="svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0">
				// 				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				// 					<path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M5.69477 2.48932C4.00472 2.74648 2.66565 3.98488 2.37546 5.66957C2.17321 6.84372 2 8.33525 2 10C2 11.6647 2.17321 13.1563 2.37546 14.3304C2.62456 15.7766 3.64656 16.8939 5 17.344V20.7476C5 21.5219 5.84211 22.0024 6.50873 21.6085L12.6241 17.9949C14.8384 17.9586 16.8238 17.7361 18.3052 17.5107C19.9953 17.2535 21.3344 16.0151 21.6245 14.3304C21.8268 13.1563 22 11.6647 22 10C22 8.33525 21.8268 6.84372 21.6245 5.66957C21.3344 3.98488 19.9953 2.74648 18.3052 2.48932C16.6859 2.24293 14.4644 2 12 2C9.53559 2 7.31411 2.24293 5.69477 2.48932Z" fill="#191213"></path>
				// 					<path fill-rule="evenodd" clip-rule="evenodd" d="M7 7C6.44772 7 6 7.44772 6 8C6 8.55228 6.44772 9 7 9H17C17.5523 9 18 8.55228 18 8C18 7.44772 17.5523 7 17 7H7ZM7 11C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H11C11.5523 13 12 12.5523 12 12C12 11.4477 11.5523 11 11 11H7Z" fill="#121319"></path>
				// 				</svg>
				// 			</span>';
				// $content .= '<div class="d-flex flex-column text-light pe-0 pe-sm-10">';
				// $content .= '<h5 class="mb-1">' . lang($type) . '</h5>';
				$content .= '<h4 class="mb-2 text-light">' . lang($type) . '</h4>';
				if ($num_messages > 1) {
					foreach ($messages as $message) {
						$content .= '<span>' . $message . '</span>';
					}
				} else
					$content .= '<span>' . $messages[0] . '</span>';
				// $content .= '</div>
				// 			<button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
				// 				<span class="svg-icon svg-icon-2x svg-icon-light">
				// 					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
				// 						<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
				// 							<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
				// 							<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1"></rect>
				// 						</g>
				// 					</svg>
				// 				</span>
				// 			</button>
				// 		</div>';
				$content .= '</div>
				<button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
					<i class="bi bi-bookmark-x fs-1 text-light"><span class="path1"></span><span class="path2"></span></i>
				</button>
				</div>';
				
			}
		}
		return $content;
	}
}

if (!function_exists('_get_object')) {

	/**
	 * Get Object
	 *
	 * Determines what the class object was instantiated as, fetches
	 * the object and returns it.
	 *
	 * @param string $obj_name
	 * @return mixed
	 */
	function &_get_object($obj_name)
	{
		$CI = &get_instance();

		// We set this as a variable since we're returning by reference.
		$return = FALSE;

		if (FALSE !== ($object = $CI->load->is_loaded($obj_name))) {
			if (!isset($CI->$object) or !is_object($CI->$object)) {
				return $return;
			}

			return $CI->$object;
		}

		return $return;
	}
}
