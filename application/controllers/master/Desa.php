<?php

class Desa extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/desa_model');
        if ($this->input->post('cancel-button'))
            redirect('auth/user/index');

        $this->load->language('auth');
        $this->template
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'));
    }

    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Master Data Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/desa/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/index') . '" class="text-muted text-hover-primary">Data desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Master Data Desa</li>',
        ));
        
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', TRUE))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/master/desa/index.js'))
            ->build('master/desa/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Data Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/desa') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('master/desa') . '" class="text-muted text-hover-primary">Data Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Data Desa</li>',
        ));
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_js(assets_url('js/app/master/desa/add.js'))
            ->build('master/desa/add', $data);
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Ubah Data Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/desa') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('master/desa') . '" class="text-muted text-hover-primary">Data Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Data Desa</li>',
        ));
        $data['desa'] = $this->desa_model->get_by_id($id);
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_js(assets_url('js/app/master/desa/edit.js'))
            ->build('master/desa/edit', $data);
    }
}
