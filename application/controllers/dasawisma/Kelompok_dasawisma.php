<?php

class Kelompok_dasawisma extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dasawisma/Kelompok_dasawisma_model');
        // $this->load->model('dasawisma/aparatur_model');
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
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/Kelompok_dasawisma/add/') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'page_title' => 'Data Kelompok Dasawisma',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Data Kelompok Dasawisma</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(assets_url('js/app/dasawisma/kelompok_dasawisma/index.js'))
            ->build('dasawisma/kelompok_dasawisma/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/kelompok_dasawisma/index/') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('dasawisma/Kelompok_dasawisma') . '" class="text-muted text-hover-primary">Data Kelompok Dasawisma</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Data Kelompok</li>',
        ));

        $data['pekerjaan'] = $this->user_model->get_pekerjaan();

        if ($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2) {
            $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        } elseif ($this->session->userdata('level_id') == 3 || $this->session->userdata('level_id') == 4) {
            $data['kecamatan'] = $this->user_model->get_kecamatan_user_id();
            $data['desa'] = $this->user_model->get_desa_id();
        }

        $this->template
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            ->set_css(bower_url('summernote/dist/summernote.min'))
            ->set_js(bower_url('summernote/dist/summernote.min', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/dasawisma/kelompok_dasawisma/add.js'))
            ->build('dasawisma/kelompok_dasawisma/add', $data);
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Ubah Data Kelompok',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/Kelompok_dasawisma') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('dasawisma/Kelompok_dasawisma') . '" class="text-muted text-hover-primary">Data Kelompok Dasawisma</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Data Kelompok</li>',
        ));
        $data['kelompok_dasawisma'] = $this->Kelompok_dasawisma_model->get_by_id($id);
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $data['pekerjaan'] = $this->user_model->get_pekerjaan();

        $this->template
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            ->set_css(bower_url('summernote/dist/summernote.min'))
            ->set_js(bower_url('summernote/dist/summernote.min', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/dasawisma/kelompok_dasawisma/edit.js'))
            ->set_js(assets_url('js/app/dasawisma/kelompok_dasawisma/validation.js'))
            ->build('dasawisma/kelompok_dasawisma/edit', $data);
    }


    public function view($id)
    {
        $this->load->vars(array(
            'page_title' => 'Lihat Data Kelompok',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/Kelompok_dasawisma') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('dasawisma/Kelompok_dasawisma') . '" class="text-muted text-hover-primary">Data Kelompok Dasawisma</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Lihat Data Kelompok</li>',
        ));
        $data['Kelompok_dasawisma'] = $this->Kelompok_dasawisma_model->get_by_id($id);
        $data['anggota'] = $this->Kelompok_dasawisma_model->get_anggota_id($id);
        // var_dump($data['Kelompok_dasawisma']) or die;

        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->build('dasawisma/kelompok_dasawisma/view', $data);
    }

    public function detail($id)
    {
        $data['Kelompok_dasawisma'] = $this->Kelompok_dasawisma_model->get_by_id($id);
        $data['anggota'] = $this->Kelompok_dasawisma_model->get_anggota_id($id);
        // var_dump($data['anggota']) or die;
        $this->load->vars(array(
            'page_title' => 'Detail Data Anggota Keluarga '.$data['Kelompok_dasawisma']->nama_kepala_keluarga,
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/Kelompok_dasawisma') . '"> <i class="fa fa-reply"></i> Back</a>
                            <button class="btn btn-active-accent fw-bolder" data-bs-toggle="modal" data-bs-target="#kt_modal_1"> <i class="fa fa-plus"></i> Tambah Data</button>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('dasawisma/Kelompok_dasawisma') . '" class="text-muted text-hover-primary">Data Anggota Keluarga</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Detail Anggota Keluarga</li>',
        ));
        $this->template
            ->set_js(assets_url('admin_assets/assets/js/scripts.bundle.js'))
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/dasawisma/kelompok_dasawisma/detail.js'))
            ->build('dasawisma/kelompok_dasawisma/detail', $data);
    }
}
