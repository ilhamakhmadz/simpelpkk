<?php

class Kabupaten extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/kabupaten_model');
        if ($this->input->post('cancel-button'))
            redirect('auth/user/index');

        $this->load->language('auth');
    }

    public function index()
    {
        $data['kabupaten'] = $this->kabupaten_model->get_data();
        $this->load->vars(array(
            'page_title' => 'Master Data Kabupaten',
            'page_icon' => (empty($data['kabupaten']) ? '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kabupaten/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a><br>'
                : '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kabupaten/edit/') . $data['kabupaten']->id . '"> <i class="fa fa-edit"></i> Ubah Data</a><br>'),
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('kabupaten/index') . '" class="text-muted text-hover-primary">Data Kabupaten</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Master Data Kabupaten</li>',
        ));
        $this->template->build('master/kabupaten/index', $data);
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Master Data Kabupaten',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kabupaten') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('master/kabupaten') . '" class="text-muted text-hover-primary">Data Kabupaten</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Data Kabupaten</li>',
        ));
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/master/kabupaten/add.js'))
            ->build('master/kabupaten/add');
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Master Data Kabupaten',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kabupaten') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('master/kabupaten') . '" class="text-muted text-hover-primary">Data Kabupaten</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Data Kabupaten</li>',
        ));
        $data['kabupaten'] = $this->kabupaten_model->get_by_id($id);
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/master/kabupaten/edit.js'))
            ->build('master/kabupaten/edit', $data);
    }
}
