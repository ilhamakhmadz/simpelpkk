<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * ACL Resource management controller.
 *
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class Resource extends Admin_Controller
{

	protected $controller = 'acl/resource';

	function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation'));
		$this->load->model(array('acl/resource_model'));
		$this->load->language('acl');

		$this->acl->build();
		$this->load->vars(array(
			'acl' => $this->acl,
			'resource_tree' => $this->resource_model->get_tree(),
		));
	}

	function index()
	{
		$this->load->vars(array(
			'page_title' => 'Data Modul Aplikasi',
			'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('acl/resource/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
			'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
			// 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('User/index') . '" class="text-muted text-hover-primary">Data User</a></li>',
			'url_page' => '<li class="breadcrumb-item text-dark">Modul Apps</li>',
		));
		$this->template->build('acl/resource-tree');
	}

	function add()
	{
		$this->load->vars(array(
			'page_title' => 'Data Modul Aplikasi',
			'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('acl/resource') . '"> <i class="fa fa-reply"></i> Back</a>',
			'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
			'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('acl/resource') . '" class="text-muted text-hover-primary">Modul Aplikasi</a></li>',
			'url_page' => '<li class="breadcrumb-item text-dark">Tambah Modul Aplikasi</li>',
		));
		$this->_updatedata();
	}

	function edit($resource_id)
	{
		$this->load->vars(array(
			'page_title' => 'Data Modul Aplikasi',
			'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('acl/resource') . '"> <i class="fa fa-reply"></i> Back</a>',
			'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
			'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('acl/resource') . '" class="text-muted text-hover-primary">Modul Aplikasi</a></li>',
			'url_page' => '<li class="breadcrumb-item text-dark">Ubah Modul Aplikasi</li>',
		));
		$this->_updatedata($resource_id);
	}

	function _updatedata($id = 0)
	{
		$post_id = $this->input->post("id");
		if (is_numeric($post_id) && $post_id > 0)
			$id = $post_id;

		// Setup form validation
		$this->load->library('form_validation');
		$validation_rules = $this->resource_model->validation_rules;

		if ($id > 0) {
			$resource = $this->resource_model->get_by_id($id);
			$this->form_validation->set_default($resource);

			$validation_rules['name']['rules'] .= '[' . $id . ']';
		}

		$this->form_validation->init($validation_rules);

		// Run form validation
		if ($this->form_validation->run()) {
			$values = $this->form_validation->get_values();

			if ($id > 0) {
				$this->resource_model->update($id, $values);   // Update resource
				$this->template->set_flashdata('success', lang('resource_updated'));
			} else {
				if (isset($values['parent']) && $values['parent'] == 0)
					$values['parent'] = NULL;
				$this->resource_model->insert($values);	   // Add resource
				$this->template->set_flashdata('success', lang('resource_added'));
			}
			redirect($this->controller);
		}

		// Load resource view
		// $this->load->vars(array(
		// 	'page_title' => 'Data Resource',
		// 	'page_icon' => '<a href="' . site_url('acl/resource/add') . '"> <i class="fa fa-plus"></i>' . lang('resource_add_title') . '</a><br>',
		// 	'ui_controller' => 'AclResource',
		// ));
		$this->template->set_title(lang('resource_page_name'))
			->build('acl/resource-tree', array('form' => $this->form_validation));
	}

	function delete($resource_id)
	{
		if (!is_numeric($resource_id) || $resource_id < 1)
			$this->_send_message_redirect('error', lang('resource_cannot_be_found'));

		$resource = $this->resource_model->get_by_id($resource_id);

		if ($resource) {
			$this->resource_model->delete($resource_id);
			$this->template->set_flashdata('info', lang('resource_deleted'));
			redirect($this->controller);
		} else
			$this->_send_message_redirect('error', lang('resource_cannot_be_found'));
	}

	/**
	 * Check if a resource name exist
	 *
	 * @access public
	 * @param string
	 * @return bool
	 */
	function resource_name_check($resource_name, $not_resource_id = 0)
	{
		if ($this->resource_model->get_by_name($resource_name, $not_resource_id)) {
			$this->form_validation->set_message('resource_name_check', lang('resource_name_taken'));
			return FALSE;
		} else
			return TRUE;
	}

	function _send_message_redirect($type, $message)
	{
		$this->template->set_flashdata($type, $message);
		redirect($this->controller);
	}
}
