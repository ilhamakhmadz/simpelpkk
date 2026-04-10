<?php

class Keuangan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('desa/keuangan_model');
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
            'page_title' => 'Data Keuangan Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/keuangan/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/index') . '" class="text-muted text-hover-primary">Keuangan Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Keuangan Desa</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(assets_url('js/numeral.min.js'))

            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/desa/keuangan/index.js'))
            ->build('desa/keuangan/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Keuangan Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/keuangan') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/keuangan') . '" class="text-muted text-hover-primary">Keuangan Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Keuangan Desa</li>',
        ));
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/desa/keuangan/add.js'))
            ->build('desa/keuangan/add', $data);
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Ubah Keuangan Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/keuangan') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/keuangan') . '" class="text-muted text-hover-primary">Keuangan Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Keuangan Desa</li>',
        ));
        $data['keuangan'] = $this->keuangan_model->get_by_id($id);
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/desa/keuangan/edit.js'))
            ->build('desa/keuangan/edit', $data);
    }
}
