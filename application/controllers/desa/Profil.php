<?php

class Profil extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('desa/profil_model');
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
            'page_title' => 'Data Profil PKK',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/profil/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/index') . '" class="text-muted text-hover-primary">Profil PKK</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Profil PKK</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(assets_url('js/app/desa/profil/index.js'))
            ->build('desa/profil/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Profil PKK',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/profil') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/profil') . '" class="text-muted text-hover-primary">Profil PKK</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Profil PKK</li>',
        ));
        

        if ($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2) {
            $data['kecamatan'] = $this->user_model->get_kecamatan_user();
            $data['desa'] = null;
            $data['dusun'] = null;
            $data['rw'] = null;
            $data['rt'] = null;
        } elseif ($this->session->userdata('level_id') == 3 || $this->session->userdata('level_id') == 4) {
            $data['kecamatan'] = $this->user_model->get_kecamatan_user_id();
            $data['desa'] = $this->user_model->get_desa_select();
            $data['dusun'] = null;
            $data['rw'] = null;
            $data['rt'] = null;
        }elseif ($this->session->userdata('level_id') == 5) {
            $data['kecamatan'] = $this->user_model->get_kecamatan_user_id();
            $data['desa'] = $this->user_model->get_desa_select();
            $data['dusun'] = $this->user_model->get_dusun_select();
            $data['rw'] = null;
            $data['rt'] = null;
        }elseif ($this->session->userdata('level_id') == 6) {
            $data['kecamatan'] = $this->user_model->get_kecamatan_user_id();
            $data['desa'] = $this->user_model->get_desa_select();
            $data['dusun'] = $this->user_model->get_dusun_select();
            $data['rw'] = $this->user_model->get_rw_select();
            $data['rt'] = null;
        }elseif ($this->session->userdata('level_id') == 7) {
            $data['kecamatan'] = $this->user_model->get_kecamatan_user_id();
            $data['desa'] = $this->user_model->get_desa_select();
            $data['dusun'] = $this->user_model->get_dusun_select();
            $data['rw'] = $this->user_model->get_rw_select();
            $data['rt'] = null;
        }
        $data['pekerjaan'] = $this->user_model->get_pekerjaan();
        $data['user']   = $this->session->userdata;


        $this->template
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            ->set_css(bower_url('summernote/dist/summernote.min'))
            ->set_js(bower_url('summernote/dist/summernote.min', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/desa/profil/add.js'))
            ->set_js(assets_url('js/app/desa/profil/validation.js'))
            ->build('desa/profil/add', $data);
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Ubah Profil PKK',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/profil') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/profil') . '" class="text-muted text-hover-primary">Profil PKK</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Profil PKK</li>',
        ));
        $data['profil'] = $this->profil_model->get_by_id($id);


        if($data['profil']->level == 'kecamatan'){
            $data['aparatur'] = $this->profil_model->get_aparatur_kec($data['profil']->date_year, $data['profil']->kode_kecamatan, null,null,null,null);
            $data['anggota'] = $this->profil_model->get_anggota_kec($data['profil']->date_year, $data['profil']->kode_kecamatan, null,null,null,null);
        }else if($data['profil']->level == 'desa'){
            $data['aparatur'] = $this->profil_model->get_aparatur_desa($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa,null,null,null);
            $data['anggota'] = $this->profil_model->get_anggota_desa($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa,null,null,null);
        }else if($data['profil']->level == 'dusun'){
            $data['aparatur'] = $this->profil_model->get_aparatur_dusun($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun,null,null);
            $data['anggota'] = $this->profil_model->get_anggota_dusun($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun,null,null);
        }else if($data['profil']->level == 'rw'){
            $data['aparatur'] = $this->profil_model->get_aparatur_rw($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun, $data['profil']->rw,null);
            $data['anggota'] = $this->profil_model->get_anggota_rw($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun, $data['profil']->rw,null);
        }else if($data['profil']->level == 'rt'){
            $data['aparatur'] = $this->profil_model->get_aparatur_rt($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun, $data['profil']->rw,$data['profil']->rt);
            $data['anggota'] = $this->profil_model->get_anggota_rt($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun, $data['profil']->rw,$data['profil']->rt);
        }

        // var_dump($data['aparatur']) or die;
        $this->template
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            ->set_css(bower_url('summernote/dist/summernote.min'))
            ->set_js(bower_url('summernote/dist/summernote.min', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/desa/profil/validation.js'))
            ->set_js(assets_url('js/app/desa/profil/edit.js'))
            ->build('desa/profil/edit', $data);
    }

    public function view($id)
    {
        $this->load->vars(array(
            'page_title' => 'Lihat Profil PKK',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/profil') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/profil') . '" class="text-muted text-hover-primary">Profil PKK</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Lihat Profil PKK</li>',
        ));
        $data['profil'] = $this->profil_model->get_by_id($id);
        // var_dump($data['profil']);
        
        if($data['profil']->level == 'kecamatan'){
            $data['aparatur'] = $this->profil_model->get_aparatur_kec($data['profil']->date_year, $data['profil']->kode_kecamatan, null,null,null,null);
            $data['anggota'] = $this->profil_model->get_anggota_kec($data['profil']->date_year, $data['profil']->kode_kecamatan, null,null,null,null);
        }else if($data['profil']->level == 'desa'){
            $data['aparatur'] = $this->profil_model->get_aparatur_desa($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa,null,null,null);
            $data['anggota'] = $this->profil_model->get_anggota_desa($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa,null,null,null);
        }else if($data['profil']->level == 'dusun'){
            $data['aparatur'] = $this->profil_model->get_aparatur_dusun($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun,null,null);
            $data['anggota'] = $this->profil_model->get_anggota_dusun($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun,null,null);
        }else if($data['profil']->level == 'rw'){
            $data['aparatur'] = $this->profil_model->get_aparatur_rw($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun, $data['profil']->rw,null);
            $data['anggota'] = $this->profil_model->get_anggota_rw($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun, $data['profil']->rw,null);
        }else if($data['profil']->level == 'rt'){
            $data['aparatur'] = $this->profil_model->get_aparatur_rt($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun, $data['profil']->rw,$data['profil']->rt);
            $data['anggota'] = $this->profil_model->get_anggota_rt($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun, $data['profil']->rw,$data['profil']->rt);
        }


        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            // ->set_js(assets_url('admin_assets/assets/js/scripts.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->build('desa/profil/view', $data);
    }
}
