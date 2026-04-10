<?php

class Jabatan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->input->post('cancel-button')) {
            redirect('auth/user/index');
        }

        $this->load->library('form_validation');
        $this->load->language('auth');
        $this->load->model('master/jabatan_model');
        $this->template
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'));
    }

    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Master Jabatan Pegawai',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/jabatan/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('jabatan/index') . '" class="text-muted text-hover-primary">Jabatan Pegawai</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Master Jabatan Pegawai</li>',
        ));
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/master/jabatan/index.js'))
            ->build('master/jabatan/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Jabatan Pegawai',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/jabatan') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('master/jabatan') . '" class="text-muted text-hover-primary">Jabatan Pegawai</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Jabatan Pegawai</li>',
        ));
        // $data['kabupaten'] = $this->kabupaten_model->get_data();
        $this->template
            ->set_js(assets_url('js/app/master/jabatan/add.js'))
            ->build('master/jabatan/add');
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Ubah Jabatan Pegawai',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/jabatan') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('master/jabatan') . '" class="text-muted text-hover-primary">Jabatan Pegawai</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Jabatan Pegawai</li>',
        ));
        $data['jabatan'] = $this->jabatan_model->get_by_id($id);
        $this->template
            ->set_js(assets_url('js/app/master/jabatan/edit.js'))
            ->build('master/jabatan/edit', $data);
    }
}
