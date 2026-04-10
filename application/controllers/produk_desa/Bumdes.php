<?php

class Bumdes extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_desa/bumdes_model');
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
            'page_title' => 'Data Bumdes Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('produk_desa/bumdes/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/index') . '" class="text-muted text-hover-primary">Bumdes Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Bumdes Desa</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/produk_desa/bumdes/index.js'))
            ->build('produk_desa/bumdes/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Bumdes Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('produk_desa/bumdes') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('produk_desa/bumdes') . '" class="text-muted text-hover-primary">Bumdes Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Bumdes Desa</li>',
        ));
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/produk_desa/bumdes/add.js'))
            ->build('produk_desa/bumdes/add', $data);
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Ubah Bumdes Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('produk_desa/bumdes') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('produk_desa/bumdes') . '" class="text-muted text-hover-primary">Bumdes Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Bumdes Desa</li>',
        ));
        $data['bumdes'] = $this->bumdes_model->get_by_id($id);
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/produk_desa/bumdes/edit.js'))
            ->build('produk_desa/bumdes/edit', $data);
    }
}
