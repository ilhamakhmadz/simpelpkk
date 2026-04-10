<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * ACL Rule management controller
 *
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class Rule extends Admin_Controller
{

	protected $controller = 'acl/rule';

	/**
	 * Constructor
	 */
	function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation'));
		$this->load->model('acl/role_model');
		$this->load->model('acl/rule_model');
		$this->load->language('acl');

		$this->acl->build();
		$this->load->vars(array(
			'acl' => $this->acl,
			'role_tree' => $this->role_model->get_tree()
		));
	}

	function index()
	{
		$this->load->vars(array(
			'page_title' => 'Hak Akses User',
			// 'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('auth/user/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
			'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
			// 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('User/index') . '" class="text-muted text-hover-primary">Data User</a></li>',
			'url_page' => '<li class="breadcrumb-item text-dark">Hak Akses</li>',
		));
		$this->template->build('acl/rule-tree');
	}

	function edit($role_id)
	{
		$this->load->vars(array(
			'page_title' => 'Ubah Hak Akses',
			'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('acl/rule') . '"> <i class="fa fa-reply"></i> Back</a>',
			'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
			'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('acl/rule') . '" class="text-muted text-hover-primary">Hak Akses</a></li>',
			'url_page' => '<li class="breadcrumb-item text-dark">Ubah Hak Akses</li>',
		));
		$this->acl->build();
		$acl = $this->acl;
		$this->data['acl'] =  $acl;
		if (!is_numeric($role_id) || $role_id < 1)
			$this->_send_message_redirect('error', lang('role_cannot_be_found'));

		$this->load->model('acl/resource_model');
		$this->data['resources'] = $this->resource_model->get_tree();
		$this->data['role'] = $this->role_model->get_by_id($role_id);
		if ($this->data['role']) {
			if ($this->input->post('save-btn')) {
				// Get attributes from posts.
				$attributes = array();
				$fields = array(
					'id',
					'rule_resource'
				);
				foreach ($fields as $field) {
					if ($this->input->post($field))
						$attributes[$field] = $this->input->post($field);
				}

				if (isset($attributes['id'])) {
					$this->rule_model->update($attributes['id'], $attributes);			// Update rules
					$this->template->set_flashdata('success', lang('rule_updated'));
				}

				redirect($this->controller);
			}

			$rules = $this->rule_model->get_by_id($role_id);

			$this->load->library('Beam/Acl');
			$this->acl->build();
			$this->data['acl'] = $this->acl;

			$this->data['rules'] = array();
			foreach ($rules as $rule)
				$this->data['rules'][$rule->resource_id] = $rule;

			// Load view
			$this->template->set_title(lang('role_page_name'))
				->build('acl/rule-tree', $this->data);
		} else
			$this->_send_message_redirect('error', lang('role_cannot_be_found'));
	}

	function _send_message_redirect($type, $message)
	{
		$this->template->set_flashdata($type, $message);
		redirect('acl/rule');
	}
}
