<?php

class Pegawai extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('web/pegawai_model');
        $this->load->model('master/jabatan_model');
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
            'page_title' => 'Data Pegawai',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('web/pegawai/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/index') . '" class="text-muted text-hover-primary">pegawai</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Pegawai</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/web/pegawai/index.js'))
            ->build('web/pegawai/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Pegawai',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('web/pegawai') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('web/pegawai') . '" class="text-muted text-hover-primary">Pegawai</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Pegawai</li>',
        ));
        $data['jabatan'] = $this->jabatan_model->get_jabatan();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/web/pegawai/add.js'))
            ->build('web/pegawai/add', $data);
    }

    public function edit($id)
    {
        $data['pegawai'] = $this->pegawai_model->get_by_id($id);
        $data['jabatan'] = $this->jabatan_model->get_jabatan();
        // var_dump($data['profil']);
        // die;
        $this->load->vars(array(
            'page_title' => 'Ubah Pegawai',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('web/pegawai') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('web/pegawai') . '" class="text-muted text-hover-primary">Pegawai</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Pegawai</li>',
        ));
        $this->template
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            ->set_css(bower_url('summernote/dist/summernote.min'))
            ->set_js(bower_url('summernote/dist/summernote.min', true))
            ->set_js(assets_url('admin_assets/assets/js/scripts.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/web/pegawai/edit.js'))
            ->build('web/pegawai/edit', $data);
    }
    // public function view($kode_desa)
    // {
    //     $data['desa'] = $this->desa_model->get_by_kode_desa($kode_desa);

    //     $this->load->vars(array(
    //         'page_title' => 'Data pegawai ' . $data['desa']->Nama_Desa,
    //         'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('web/pegawai') . '"> <i class="fa fa-reply"></i> Back</a>',
    //         'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
    //         'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('web/pegawai') . '" class="text-muted text-hover-primary">Pegawai</a></li>',
    //         'url_page' => '<li class="breadcrumb-item text-dark">Pegawai ' . $data['desa']->Nama_Desa . '</li>',
    //     ));
    //     $data['profil'] = $this->pegawai_model->get_by_kd_desa($kode_desa);

    //     $this->template
    //         ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
    //         ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
    //         // ->set_js(bower_url('jquery/dist/jquery.min.js'))
    //         ->set_js(assets_url('js/app/web/pegawai/view.js'))
    //         ->build('web/pegawai/view', $data);
    // }
}
