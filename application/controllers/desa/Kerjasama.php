<?php

class Kerjasama extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('desa/kerjasama_model');
        $this->load->model('master/desa_model');
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
            'page_title' => 'Data Kerjasama Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/kerjasama/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/index') . '" class="text-muted text-hover-primary">kerjasama Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Kerjasama Desa</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/desa/kerjasama/index.js'))
            ->build('desa/kerjasama/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Kerjasama Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/kerjasama') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/kerjasama') . '" class="text-muted text-hover-primary">Kerjasama Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Kerjasama Desa</li>',
        ));
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            // ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            // ->set_js(assets_url('admin_assets/assets/js/scripts.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/desa/kerjasama/add.js'))
            ->build('desa/kerjasama/add', $data);
    }

    public function edit($id)
    {
        $data['kerjasama'] = $this->kerjasama_model->get_by_id($id);
        // var_dump($data['kerjasama']);
        // die;
        $this->load->vars(array(
            'page_title' => 'Ubah Kerjasama Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/kerjasama/view/'.$data['kerjasama']->kode_desa) . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/kerjasama') . '" class="text-muted text-hover-primary">Kerjasama Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Kerjasama Desa '.$data['kerjasama']->Nama_Desa.'</li>',
        ));
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            // ->set_js(assets_url('admin_assets/assets/js/scripts.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/desa/kerjasama/edit.js'))
            ->build('desa/kerjasama/edit', $data);
    }
    public function view($kode_desa)
    {
        $data['desa'] = $this->desa_model->get_by_kode_desa($kode_desa);
        
        $this->load->vars(array(
            'page_title' => 'Data Kerjasama Desa '.$data['desa']->Nama_Desa,
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/kerjasama') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/kerjasama') . '" class="text-muted text-hover-primary">Kerjasama Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Kerjasama Desa '.$data['desa']->Nama_Desa.'</li>',
        ));
        $data['kerjasama'] = $this->kerjasama_model->get_by_kd_desa($kode_desa);
        
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/desa/kerjasama/view.js'))
            ->build('desa/kerjasama/view', $data);
    }
}
