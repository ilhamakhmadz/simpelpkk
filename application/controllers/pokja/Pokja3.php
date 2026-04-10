<?php

class Pokja3 extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pokja/pokja3_model');
        // $this->load->model('pokja/aparatur_model');
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
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('pokja/pokja3/add/') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'page_title' => 'Data Kegiatan Pokja III',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Kegiatan Pokja III</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(assets_url('js/app/pokja/pokja3/index.js'))
            ->build('pokja/pokja3/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Data Pokja III',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('pokja/pokja3/index/') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('pokja/pokja3') . '" class="text-muted text-hover-primary">Kegiatan Pokja III</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Kegiatan Pokja III</li>',
        ));

        if ($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2) {
            $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        } elseif ($this->session->userdata('level_id') == 3 || $this->session->userdata('level_id') == 4) {
            $data['kecamatan'] = $this->user_model->get_kecamatan_user_id();
            $data['desa'] = $this->user_model->get_desa_id();
        }elseif ($this->session->userdata('level_id') == 5) {
            $data['kecamatan'] = $this->user_model->get_kecamatan_user_id();
            $data['desa'] = $this->user_model->get_desa_id();
            $data['dusun'] = $this->user_model->get_dusun_id();
        }elseif ($this->session->userdata('level_id') == 6) {
            $data['kecamatan'] = $this->user_model->get_kecamatan_user_id();
            $data['desa'] = $this->user_model->get_desa_id();
            $data['dusun'] = $this->user_model->get_dusun_id();
            $data['rw'] = $this->user_model->get_rw_id();
        }elseif ($this->session->userdata('level_id') == 7) {
            $data['kecamatan'] = $this->user_model->get_kecamatan_user_id();
            $data['desa'] = $this->user_model->get_desa_id();
            $data['dusun'] = $this->user_model->get_dusun_id();
            $data['rw'] = $this->user_model->get_rw_id();
            $data['rt'] = $this->user_model->get_rt_id();
        }

        $this->template
            ->set_css(bower_url('summernote/dist/summernote.min'))
            ->set_js(bower_url('summernote/dist/summernote.min', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/pokja/pokja3/add.js'))
            ->build('pokja/pokja3/add', $data);
    }

    public function edit($id)
    {
        $data['pokja3'] = $this->pokja3_model->get_by_id($id);
        $this->load->vars(array(
            'page_title' => 'Ubah Kegiatan Pokja III',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('pokja/pokja3/'). '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('pokja/pokja3') . '" class="text-muted text-hover-primary">Kegiatan Pokja III</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Kegiatan Pokja III</li>',
        ));
        $data['pekerjaan'] = $this->user_model->get_pekerjaan();
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))

            ->set_css(bower_url('summernote/dist/summernote.min'))
            ->set_js(bower_url('summernote/dist/summernote.min', true))
            ->set_js(assets_url('js/app/pokja/pokja3/edit.js'))
            ->build('pokja/pokja3/edit', $data);
    }
    public function view($id)
    {
        $this->load->vars(array(
            'page_title' => 'Ubah Kegiatan Pokja III',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('pokja/pokja3') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('pokja/pokja3') . '" class="text-muted text-hover-primary">Kegiatan Pokja III</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Kegiatan Pokja III</li>',
        ));
        $data['pokja3'] = $this->pokja3_model->get_by_id($id);
        // var_dump($data['pokja3']);
        // die;
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            // ->set_js(assets_url('js/app/pokja/pokja3/edit.js'))
            ->build('pokja/pokja3/view', $data);
    }

    public function detail($kec, $desa)
    {
        $data['pokja3'] = $this->pokja3_model->get_pokja3($kec, $desa);
        $data['aparatur'] = $this->aparatur_model->get_by_kode($kec, $desa);
        if ($data['aparatur']->level == 'kecamatan') {
            $this->load->vars(array(
                'page_title' => 'Detail Kegiatan Pokja III Kecamatan '.$data['aparatur']->Nama_Kecamatan ));
        } else {
            $this->load->vars(array(
                'page_title' => 'Detail Kegiatan Pokja III Desa '.$data['aparatur']->Nama_Desa ));
        }
        $this->load->vars(array(
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('pokja/pokja3') . '"> <i class="fa fa-reply"></i> Back</a>
                            <a class="btn btn-active-accent fw-bolder" href="' . site_url('pokja/pokja3/add/') . $kec.'/'.$desa.'"> <i class="fa fa-plus"></i> Tambah Data</a>',

            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('pokja/pokja3') . '" class="text-muted text-hover-primary">Kegiatan Pokja III</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Detail Kegiatan Pokja III</li>',
        ));
        // $data['pokja3'] = $this->pokja3_model->get_pokja3($kec,$desa);
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/pokja/pokja3/detail.js'))
            ->build('pokja/pokja3/detail', $data);
    }
}
