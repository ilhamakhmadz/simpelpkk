<?php

class Aparatur extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('desa/aparatur_model');
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
            'page_title' => 'Data Struktur Organisasi PKK',
            // 'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/aparatur/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/index') . '" class="text-muted text-hover-primary">Struktur Organisasi PKK</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Struktur Organisasi PKK</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/desa/aparatur/index.js'))
            ->build('desa/aparatur/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Struktur Organisasi PKK',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/aparatur') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/aparatur') . '" class="text-muted text-hover-primary">Struktur Organisasi PKK</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Struktur Organisasi PKK</li>',
        ));
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/desa/aparatur/add.js'))
            ->build('desa/aparatur/add', $data);
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Ubah Struktur Organisasi PKK',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/aparatur') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/aparatur') . '" class="text-muted text-hover-primary">Struktur Organisasi PKK</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Struktur Organisasi PKK</li>',
        ));
        $data['aparatur'] = $this->aparatur_model->get_by_id($id);
        // var_dump($data['aparatur']);
        // die;
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/desa/aparatur/edit.js'))
            ->build('desa/aparatur/edit', $data);
    }
    public function view($id)
    {
        $this->load->vars(array(
            'page_title' => 'Lihat Struktur Organisasi PKK',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/aparatur') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/aparatur') . '" class="text-muted text-hover-primary">Struktur Organisasi PKK</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Lihat Struktur Organisasi PKK</li>',
        ));
        $data['aparatur'] = $this->aparatur_model->get_by_id($id);
        // var_dump($data['aparatur']);
        // die;
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            // ->set_js(assets_url('js/app/desa/aparatur/edit.js'))
            ->build('desa/aparatur/view', $data);
    }
}
