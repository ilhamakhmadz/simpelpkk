<?php

class dokumen extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('web/dokumen_model');
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
            'page_title' => 'Data Dokumen',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('web/dokumen/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/index') . '" class="text-muted text-hover-primary">dokumen</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Dokumen</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/web/dokumen/index.js'))
            ->build('web/dokumen/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Dokumen',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('web/dokumen') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('web/dokumen') . '" class="text-muted text-hover-primary">Dokumen</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Dokumen</li>',
        ));
        $data['m_dokumen'] = $this->dokumen_model->get_dokumen();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/web/dokumen/add.js'))
            ->build('web/dokumen/add', $data);
    }

    public function edit($id)
    {
        $data['dokumen'] = $this->dokumen_model->get_by_id($id);
        $data['m_dokumen'] = $this->dokumen_model->get_dokumen();
        // var_dump($data['profil']);
        // die;
        $this->load->vars(array(
            'page_title' => 'Ubah Dokumen',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('web/dokumen') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('web/dokumen') . '" class="text-muted text-hover-primary">Dokumen</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Dokumen</li>',
        ));
        $this->template
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            ->set_js(assets_url('admin_assets/assets/js/scripts.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/web/dokumen/edit.js'))
            ->build('web/dokumen/edit', $data);
    }
    // public function view($kode_desa)
    // {
    //     $data['desa'] = $this->desa_model->get_by_kode_desa($kode_desa);

    //     $this->load->vars(array(
    //         'page_title' => 'Data Dokumen ' . $data['desa']->Nama_Desa,
    //         'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('web/dokumen') . '"> <i class="fa fa-reply"></i> Back</a>',
    //         'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
    //         'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('web/dokumen') . '" class="text-muted text-hover-primary">dokumen</a></li>',
    //         'url_page' => '<li class="breadcrumb-item text-dark">dokumen ' . $data['desa']->Nama_Desa . '</li>',
    //     ));
    //     $data['profil'] = $this->dokumen_model->get_by_kd_desa($kode_desa);

    //     $this->template
    //         ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
    //         ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
    //         // ->set_js(bower_url('jquery/dist/jquery.min.js'))
    //         ->set_js(assets_url('js/app/web/dokumen/view.js'))
    //         ->build('web/dokumen/view', $data);
    // }
}
