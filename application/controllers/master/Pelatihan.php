<?php

class Pelatihan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->input->post('cancel-button')) {
            redirect('auth/user/index');
        }

        $this->load->library('form_validation');
        $this->load->language('auth');
        $this->load->model('master/pelatihan_model');
        $this->template
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'));
    }

    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Master Pelatihan',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/pelatihan/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('dokumen/index') . '" class="text-muted text-hover-primary">Pelatihan</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Master Pelatihan</li>',
        ));
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/master/pelatihan/index.js'))
            ->build('master/pelatihan/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Pelatihan',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/pelatihan') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('master/pelatihan') . '" class="text-muted text-hover-primary">Pelatihan</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Pelatihan</li>',
        ));
        // $data['kabupaten'] = $this->kabupaten_model->get_data();
        $this->template
            ->set_js(assets_url('js/app/master/pelatihan/add.js'))
            ->build('master/pelatihan/add');
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Ubah Pelatihan',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/pelatihan') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('master/pelatihan') . '" class="text-muted text-hover-primary">Pelatihan</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Pelatihan</li>',
        ));
        $data['dokumen'] = $this->dokumen_model->get_by_id($id);
        $this->template
            ->set_js(assets_url('js/app/master/pelatihan/edit.js'))
            ->build('master/pelatihan/edit', $data);
    }
}
