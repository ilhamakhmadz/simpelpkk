<?php

class Lembaga extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('desa/lembaga_model');
        if ($this->input->post('cancel-button')) {
            redirect('auth/user/index');
        }

        $this->load->language('auth');
        $this->template
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'));
    }

    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Data Lembaga Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/lembaga/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/index') . '" class="text-muted text-hover-primary">lembaga Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Lembaga Desa</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/desa/lembaga/index.js'))
            ->build('desa/lembaga/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Lembaga Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/lembaga') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/lembaga') . '" class="text-muted text-hover-primary">Lembaga Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Lembaga Desa</li>',
        ));
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/desa/lembaga/add.js'))
            ->build('desa/lembaga/add', $data);
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Ubah Lembaga Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/lembaga') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/lembaga') . '" class="text-muted text-hover-primary">Lembaga Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Lembaga Desa</li>',
        ));
        $data['lembaga'] = $this->lembaga_model->get_by_id($id);
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/desa/lembaga/edit.js'))
            ->build('desa/lembaga/edit', $data);
    }
}
