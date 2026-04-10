<?php

class Rekapitulasi_data extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dasawisma/Rakapitulasi_data_model');
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
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/rekapitulasi_data/add/') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'page_title' => 'Rekapitulasi Data Dasawisma',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Rekapitulasi Data Dasawisma</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(assets_url('js/app/dasawisma/rekapitulasi_data/index.js'))
            ->build('dasawisma/rekapitulasi_data/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/rekapitulasi_data/index/') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('dasawisma/rekapitulasi_data') . '" class="text-muted text-hover-primary">Rekapitulasi Data Dasawisma</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Rekapitulasi Data</li>',
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
            ->set_js(assets_url('js/app/dasawisma/rekapitulasi_data/add.js'))
            ->build('dasawisma/rekapitulasi_data/add', $data);
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Ubah Rekapitulasi Data',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/rekapitulasi_data') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('dasawisma/rekapitulasi_data') . '" class="text-muted text-hover-primary">Rekapitulasi Data Dasawisma</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Rekapitulasi Data</li>',
        ));
        $data['rekapitulasi_data'] = $this->Rakapitulasi_data_model->get_by_id($id);
        // var_dump($data['rekapitulasi_data']) or die;
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $data['pekerjaan'] = $this->user_model->get_pekerjaan();

        $this->template
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            ->set_css(bower_url('summernote/dist/summernote.min'))
            ->set_js(bower_url('summernote/dist/summernote.min', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/dasawisma/rekapitulasi_data/edit.js'))
            ->set_js(assets_url('js/app/dasawisma/rekapitulasi_data/validation.js'))
            ->build('dasawisma/rekapitulasi_data/edit', $data);
    }


    public function view($id)
    {
        $this->load->vars(array(
            'page_title' => 'Lihat Rekapitulasi Data',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/rekapitulasi_data') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('dasawisma/rekapitulasi_data') . '" class="text-muted text-hover-primary">Rekapitulasi Data Dasawisma</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Lihat Rekapitulasi Data</li>',
        ));
        $data['rekapitulasi_data'] = $this->Rakapitulasi_data_model->get_by_id($id);
        $data['anggota'] = $this->Rakapitulasi_data_model->get_anggota_id($id);
        // var_dump($data['rekapitulasi_data']) or die;

        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->build('dasawisma/rekapitulasi_data/view', $data);
    }

    public function detail($id)
    {
        $data['rekapitulasi_data'] = $this->Rakapitulasi_data_model->get_by_id($id);
        $data['anggota'] = $this->Rakapitulasi_data_model->get_anggota_id($id);
        // var_dump($data['anggota']) or die;
        $this->load->vars(array(
            'page_title' => 'Detail Data Anggota Keluarga '.$data['rekapitulasi_data']->nama_kepala_keluarga,
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/rekapitulasi_data') . '"> <i class="fa fa-reply"></i> Back</a>
                            <button class="btn btn-active-accent fw-bolder" data-bs-toggle="modal" data-bs-target="#kt_modal_1"> <i class="fa fa-plus"></i> Tambah Data</button>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('dasawisma/rekapitulasi_data') . '" class="text-muted text-hover-primary">Data Anggota Keluarga</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Detail Anggota Keluarga</li>',
        ));
        $this->template
            ->set_js(assets_url('admin_assets/assets/js/scripts.bundle.js'))
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/dasawisma/rekapitulasi_data/detail.js'))
            ->build('dasawisma/rekapitulasi_data/detail', $data);
    }
}
