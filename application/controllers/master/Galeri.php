<?php

class Galeri extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->input->post('cancel-button')) {
            redirect('auth/user/index');
        }

        $this->load->library('form_validation');
        $this->load->language('auth');
        $this->load->model('master/galeri_model');
        $this->template
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'));
    }

    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Master Galeri',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/galeri/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('galeri/index') . '" class="text-muted text-hover-primary">Galeri</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Master Galeri</li>',
        ));
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/master/galeri/index.js'))
            ->build('master/galeri/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Galeri',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/galeri') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('master/galeri') . '" class="text-muted text-hover-primary">Galeri</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Galeri</li>',
        ));
        // $data['kabupaten'] = $this->kabupaten_model->get_data();
        $this->template
            ->set_js(assets_url('js/app/master/galeri/add.js'))
            ->build('master/galeri/add');
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Ubah Galeri',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/galeri') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('master/galeri') . '" class="text-muted text-hover-primary">Galeri</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Galeri</li>',
        ));
        $data['galeri'] = $this->galeri_model->get_by_id($id);
        $this->template
            ->set_js(assets_url('js/app/master/galeri/edit.js'))
            ->build('master/galeri/edit', $data);
    }
}
