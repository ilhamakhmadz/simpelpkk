<?php

class Unggulan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_desa/unggulan_model');
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
            'page_title' => 'Data Produk Unggulan Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('produk_desa/unggulan/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/index') . '" class="text-muted text-hover-primary">Produk Unggulan Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Produk Unggulan Desa</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/produk_desa/unggulan/index.js'))
            ->build('produk_desa/unggulan/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Produk Unggulan Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('produk_desa/unggulan') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('produk_desa/unggulan') . '" class="text-muted text-hover-primary">Produk Unggulan Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Produk Unggulan Desa</li>',
        ));
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            ->set_css(bower_url('summernote/dist/summernote.min'))
            ->set_js(bower_url('summernote/dist/summernote.min', true))
            ->set_js(assets_url('admin_assets/assets/js/scripts.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/produk_desa/unggulan/add.js'))
            ->build('produk_desa/unggulan/add', $data);
    }

    public function edit($id)
    {
        $data['unggulan'] = $this->unggulan_model->get_by_id($id);
        // var_dump($data['unggulan']);
        // die;
        $this->load->vars(array(
            'page_title' => 'Ubah Produk Unggulan Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('produk_desa/unggulan/view/'.$data['unggulan']->kode_desa) . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('produk_desa/unggulan') . '" class="text-muted text-hover-primary">Produk Unggulan Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Produk Unggulan Desa '.$data['unggulan']->Nama_Desa.'</li>',
        ));
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            ->set_css(bower_url('summernote/dist/summernote.min'))
            ->set_js(bower_url('summernote/dist/summernote.min', true))
            ->set_js(assets_url('admin_assets/assets/js/scripts.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/produk_desa/unggulan/edit.js'))
            ->build('produk_desa/unggulan/edit', $data);
    }
    public function view($kode_desa)
    {
        $data['desa'] = $this->desa_model->get_by_kode_desa($kode_desa);
        
        $this->load->vars(array(
            'page_title' => 'Data Produk Unggulan Desa '.$data['desa']->Nama_Desa,
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('produk_desa/unggulan') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('produk_desa/unggulan') . '" class="text-muted text-hover-primary">Produk Unggulan Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Produk Unggulan Desa '.$data['desa']->Nama_Desa.'</li>',
        ));
        $data['unggulan'] = $this->unggulan_model->get_by_kd_desa($kode_desa);
        
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/produk_desa/unggulan/view.js'))
            ->build('produk_desa/unggulan/view', $data);
    }
}
