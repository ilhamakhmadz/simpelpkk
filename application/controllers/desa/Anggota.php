<?php

class Anggota extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('desa/anggota_model');
        $this->load->model('desa/aparatur_model');
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
            'page_title' => 'Data Buku Anggota PKK',
            // 'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/index') . '" class="text-muted text-hover-primary">Buku Anggota PKK</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Buku Anggota PKK</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/desa/anggota/index.js'))
            ->build('desa/anggota/index');
    }


    public function add($id)
    {
        $data['aparatur'] = $this->aparatur_model->get_by_id($id);
        if($data['aparatur']->level == 'kecamatan'){
            $this->load->vars(array(
                'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota/detail/') .$data['aparatur']->id. '"> <i class="fa fa-reply"></i> Back</a>',
                'page_title' => 'Tambah Buku Anggota PKK Kecamatan '.$data['aparatur']->Nama_Kecamatan ));
        }else if($data['aparatur']->level == 'desa'){
            $this->load->vars(array(
                'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota/detail/') .$data['aparatur']->id. '"> <i class="fa fa-reply"></i> Back</a>',
                'page_title' => 'Tambah Buku Anggota PKK Desa '.$data['aparatur']->Nama_Desa.' Kecamatan '.$data['aparatur']->Nama_Kecamatan ));
        }else if($data['aparatur']->level == 'dusun'){
            $this->load->vars(array(
                'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota/detail/') .$data['aparatur']->id. '"> <i class="fa fa-reply"></i> Back</a>',
                'page_title' => 'Tambah Buku Anggota PKK Dusun '.$data['aparatur']->nama_dusun .', '.$data['aparatur']->Nama_Desa.', '.$data['aparatur']->Nama_Kecamatan ));
        }else if($data['aparatur']->level == 'rw'){
            $this->load->vars(array(
                'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota/detail/') .$data['aparatur']->id. '"> <i class="fa fa-reply"></i> Back</a>',
                'page_title' => 'Tambah Buku Anggota PKK RW '.$data['aparatur']->rw .', '.$data['aparatur']->nama_dusun .', '.$data['aparatur']->Nama_Desa .', '.$data['aparatur']->Nama_Kecamatan ));
        }else if($data['aparatur']->level == 'rt'){
            $this->load->vars(array(
                'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota/detail/') .$data['aparatur']->id. '"> <i class="fa fa-reply"></i> Back</a>',
                'page_title' => 'Tambah Buku Anggota PKK RT '.$data['aparatur']->rt .', '.$data['aparatur']->rw .', '.$data['aparatur']->nama_dusun .', '.$data['aparatur']->Nama_Desa .', '.$data['aparatur']->Nama_Kecamatan ));
        }
        $this->load->vars(array(
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/anggota') . '" class="text-muted text-hover-primary">Buku Anggota PKK</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Buku Anggota PKK</li>',
        ));
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $data['pekerjaan'] = $this->user_model->get_pekerjaan();
        
        $this->template
            ->set_css(bower_url('summernote/dist/summernote.min'))
            ->set_js(bower_url('summernote/dist/summernote.min', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/desa/anggota/add.js'))
            ->build('desa/anggota/add', $data);
    }

    public function edit($id)
    {
        $data['anggota'] = $this->anggota_model->get_by_id($id);
        if($data['anggota']->level == 'kecamatan'){
            $aparatur = $this->aparatur_model->get_kode_kec($data['anggota']->date_year,$data['anggota']->kode_kecamatan);
        }else if($data['anggota']->level == 'desa'){
            $aparatur = $this->aparatur_model->get_kode_desa($data['anggota']->date_year,$data['anggota']->kode_kecamatan,$data['anggota']->kode_desa);
        }else if($data['anggota']->level == 'dusun'){
            $aparatur = $this->aparatur_model->get_kode_dusun($data['anggota']->date_year,$data['anggota']->kode_kecamatan,$data['anggota']->kode_desa,$data['anggota']->dusun);
        }else if($data['anggota']->level == 'rw'){
            $aparatur = $this->aparatur_model->get_kode_rw($data['anggota']->date_year,$data['anggota']->kode_kecamatan,$data['anggota']->kode_desa,$data['anggota']->dusun,$data['anggota']->rw);
        }else if($data['anggota']->level == 'rt'){
            $aparatur = $this->aparatur_model->get_kode_rt($data['anggota']->date_year,$data['anggota']->kode_kecamatan,$data['anggota']->kode_desa,$data['anggota']->dusun,$data['anggota']->rw,$data['anggota']->rt);
        }
        // var_dump($aparatur);
        // die;
        $data['aparatur'] = $aparatur->id;
        $this->load->vars(array(
            'page_title' => 'Ubah Buku Anggota PKK',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota/detail/') . $aparatur->id. '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/anggota') . '" class="text-muted text-hover-primary">Buku Anggota PKK</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Buku Anggota PKK</li>',
        ));
        $data['pekerjaan'] = $this->user_model->get_pekerjaan();
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            
            ->set_css(bower_url('summernote/dist/summernote.min'))
            ->set_js(bower_url('summernote/dist/summernote.min', true))
            ->set_js(assets_url('js/app/desa/anggota/edit.js'))
            ->build('desa/anggota/edit', $data);
    }
    public function view($id)
    {
        $this->load->vars(array(
            'page_title' => 'Lihat Buku Anggota PKK',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/anggota') . '" class="text-muted text-hover-primary">Buku Anggota PKK</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Lihat Buku Anggota PKK</li>',
        ));
        $data['anggota'] = $this->anggota_model->get_by_id($id);
        // var_dump($data['anggota']);
        // die;
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            // ->set_js(assets_url('js/app/desa/anggota/edit.js'))
            ->build('desa/anggota/view', $data);
    }

    public function detail($id)
    {
        $data['aparatur'] = $this->aparatur_model->get_by_id($id);
        if($data['aparatur']->level == 'kecamatan'){
            $data['anggota'] = $this->anggota_model->kec_anggota($data['aparatur']->kode_kecamatan);
            $this->load->vars(array(
                'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota') . '"> <i class="fa fa-reply"></i> Back</a>
                            <a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota/add/') . $id.'"> <i class="fa fa-plus"></i> Tambah Data</a>',
                'page_title' => 'Detail Buku Anggota PKK Kecamatan '.$data['aparatur']->Nama_Kecamatan ));
        }else if($data['aparatur']->level == 'desa'){
            $data['anggota'] = $this->anggota_model->desa_anggota($data['aparatur']->kode_kecamatan,$data['aparatur']->kode_desa);
            $this->load->vars(array(
                'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota') . '"> <i class="fa fa-reply"></i> Back</a>
                            <a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota/add/') . $id.'">  <i class="fa fa-plus"></i> Tambah Data</a>',
                'page_title' => 'Detail Buku Anggota PKK Desa '.$data['aparatur']->Nama_Desa.' Kecamatan '.$data['aparatur']->Nama_Kecamatan ));
        // var_dump($data['anggota']) or die;

        }else if($data['aparatur']->level == 'dusun'){
            $data['anggota'] = $this->anggota_model->dusun_anggota($data['aparatur']->kode_kecamatan,$data['aparatur']->kode_desa,$data['aparatur']->dusun);
            $this->load->vars(array(
                'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota') . '"> <i class="fa fa-reply"></i> Back</a>
                            <a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota/add/') . $id.'"> <i class="fa fa-plus"></i> Tambah Data</a>',
                'page_title' => 'Detail Buku Anggota PKK Dusun '.$data['aparatur']->nama_dusun .', '.$data['aparatur']->Nama_Desa.', '.$data['aparatur']->Nama_Kecamatan ));
        }else if($data['aparatur']->level == 'rw'){
            $data['anggota'] = $this->anggota_model->rw_anggota($data['aparatur']->kode_kecamatan,$data['aparatur']->kode_desa,$data['aparatur']->dusun,$data['aparatur']->rw);
            $this->load->vars(array(
                'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota') . '"> <i class="fa fa-reply"></i> Back</a>
                            <a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota/add/') . $id.'">  <i class="fa fa-plus"></i> Tambah Data</a>',
                'page_title' => 'Detail Buku Anggota PKK RW '.$data['aparatur']->rw .', '.$data['aparatur']->nama_dusun .', '.$data['aparatur']->Nama_Desa .', '.$data['aparatur']->Nama_Kecamatan ));
        }else if($data['aparatur']->level == 'rt'){
            $data['anggota'] = $this->anggota_model->rt_anggota($data['aparatur']->kode_kecamatan,$data['aparatur']->kode_desa,$data['aparatur']->dusun,$data['aparatur']->rw,$data['aparatur']->rt);
            $this->load->vars(array(
                'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota') . '"> <i class="fa fa-reply"></i> Back</a>
                            <a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/anggota/add/') . $id.'"> <i class="fa fa-plus"></i> Tambah Data</a>',
                'page_title' => 'Detail Buku Anggota PKK RT '.$data['aparatur']->rt .', '.$data['aparatur']->rw .', '.$data['aparatur']->nama_dusun .', '.$data['aparatur']->Nama_Desa .', '.$data['aparatur']->Nama_Kecamatan ));
        }

        $this->load->vars(array(
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/anggota') . '" class="text-muted text-hover-primary">Buku Anggota PKK</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Detail Buku Anggota PKK</li>',
        ));
        // $data['anggota'] = $this->anggota_model->get_anggota($kec,$desa);
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/desa/anggota/detail.js'))
            ->build('desa/anggota/detail', $data);
    }
}
