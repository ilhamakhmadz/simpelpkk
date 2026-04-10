<?php

class Dokumen extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->input->post('cancel-button')) {
            redirect('auth/user/index');
        }

        $this->load->library('form_validation');
        $this->load->language('auth');
        $this->load->model('master/dokumen_model');
        $this->template
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'));
    }

    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Master Dokument',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/dokumen/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('dokumen/index') . '" class="text-muted text-hover-primary">Dokument</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Master Dokument</li>',
        ));
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/master/dokumen/index.js'))
            ->build('master/dokumen/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Dokument',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/dokumen') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('master/dokumen') . '" class="text-muted text-hover-primary">Dokument</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Dokument</li>',
        ));
        // $data['kabupaten'] = $this->kabupaten_model->get_data();
        $this->template
            ->set_js(assets_url('js/app/master/dokumen/add.js'))
            ->build('master/dokumen/add');
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Ubah Dokument',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/dokumen') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('master/dokumen') . '" class="text-muted text-hover-primary">Dokument</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Dokument</li>',
        ));
        $data['dokumen'] = $this->dokumen_model->get_by_id($id);
        $this->template
            ->set_js(assets_url('js/app/master/dokumen/edit.js'))
            ->build('master/dokumen/edit', $data);
    }
}
