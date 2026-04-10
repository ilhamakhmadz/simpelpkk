<?php

class Galeri extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('web/galeri_model');
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
            'page_title' => 'Data Galeri',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('web/galeri/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/index') . '" class="text-muted text-hover-primary">Galeri</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Galeri</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/web/galeri/index.js'))
            ->build('web/galeri/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah galeri',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('web/galeri') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('web/galeri') . '" class="text-muted text-hover-primary">Galeri</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah galeri</li>',
        ));
        $data['m_galeri'] = $this->galeri_model->get_galeri();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/web/galeri/add.js'))
            ->build('web/galeri/add', $data);
    }

    public function edit($id)
    {
        $data['galeri'] = $this->galeri_model->get_by_id($id);
        $data['m_galeri'] = $this->galeri_model->get_galeri();
        // var_dump($data['profil']);
        // die;
        $this->load->vars(array(
            'page_title' => 'Ubah galeri',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('web/galeri') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('web/galeri') . '" class="text-muted text-hover-primary">Galeri</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah galeri</li>',
        ));
        $this->template
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            ->set_js(assets_url('admin_assets/assets/js/scripts.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/web/galeri/edit.js'))
            ->build('web/galeri/edit', $data);
    }
    // public function view($kode_desa)
    // {
    //     $data['desa'] = $this->desa_model->get_by_kode_desa($kode_desa);

    //     $this->load->vars(array(
    //         'page_title' => 'Data Galeri ' . $data['desa']->Nama_Desa,
    //         'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('web/galeri') . '"> <i class="fa fa-reply"></i> Back</a>',
    //         'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
    //         'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('web/galeri') . '" class="text-muted text-hover-primary">Galeri</a></li>',
    //         'url_page' => '<li class="breadcrumb-item text-dark">galeri ' . $data['desa']->Nama_Desa . '</li>',
    //     ));
    //     $data['profil'] = $this->galeri_model->get_by_kd_desa($kode_desa);

    //     $this->template
    //         ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
    //         ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
    //         // ->set_js(bower_url('jquery/dist/jquery.min.js'))
    //         ->set_js(assets_url('js/app/web/galeri/view.js'))
    //         ->build('web/galeri/view', $data);
    // }
}
