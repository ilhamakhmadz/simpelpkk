<?php

class Kecamatan extends Admin_Controller
{

    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('master/rw_model');
        $this->load->model('master/rt_model');
        $this->load->model('master/dusun_model');
        $this->load->model('master/desa_model');
        $this->load->model('master/kecamatan_model');
        $this->load->model('master/kabupaten_model');
        $this->load->model('master/dasawisma_model');
        if ($this->input->post('cancel-button'))
            redirect('auth/user/index');

        $this->load->library('form_validation');
        $this->load->language('auth');
        $this->template
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'));
    }

    public function index()
    {
        if($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2){
        $this->load->vars(array(
            'page_title' => 'Master Data Kecamatan',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Master Data Kecamatan</li>',
        ));
        }else{
            $this->load->vars(array(
                'page_title' => 'Master Data Kecamatan',
                'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
                'url_page' => '<li class="breadcrumb-item text-dark">Master Data Kecamatan</li>',
            ));
        }
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', TRUE))
            ->set_js(assets_url('js/app/master/kecamatan/index.js'))
            ->build('master/kecamatan/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Data Kecamatan',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan') . '" class="text-muted text-hover-primary">Data Kecamatan</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Data Kecamatan</li>',
        ));
        $data['kabupaten'] = $this->kabupaten_model->get_data();
        $this->template
            ->set_js(assets_url('js/app/master/kecamatan/add.js'))
            ->build('master/kecamatan/add', $data);
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Ubah Data Kecamatan',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan') . '" class="text-muted text-hover-primary">Data Kecamatan</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Data Kecamatan</li>',
        ));
        $data['kecamatan'] = $this->kecamatan_model->get_by_id($id);
        $this->template
            ->set_js(assets_url('js/app/master/kecamatan/edit.js'))
            ->build('master/kecamatan/edit', $data);
    }
    public function detail($kode_kecamatan)
    {
        $data['desa'] = $this->kecamatan_model->get_by_desa($kode_kecamatan);
        $data['kec'] = $this->kecamatan_model->get_by_kec($kode_kecamatan);
            if($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2 || $this->session->userdata('level_id') == 3 ){
                $this->load->vars(array(
                    'page_title' => 'Detail Data Desa',
                    'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/add_desa/'.$kode_kecamatan) . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
                    'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
                    'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan') . '" class="text-muted text-hover-primary">Data Kecamatan</a></li>',
                    'url_page' => '<li class="breadcrumb-item text-dark">Kec '. $data['kec']->Nama_Kecamatan.'</li>',
                ));
            }else{
                $this->load->vars(array(
                    'page_title' => 'Detail Data Desa',
                    'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
                    'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan') . '" class="text-muted text-hover-primary">Data Kecamatan</a></li>',
                    'url_page' => '<li class="breadcrumb-item text-dark">Kec '. $data['kec']->Nama_Kecamatan.'</li>',
                ));
            }
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', TRUE))
            ->set_js(assets_url('js/app/master/kecamatan/detail.js'))
            ->build('master/kecamatan/detail', $data);
    }
    public function detail_dusun($kode_desa)
    {
        $data['desa'] = $this->desa_model->get_by_kode_desa($kode_desa);
        $data['rw'] = $this->rw_model->get_by_kode_desa($kode_desa);
        if($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2 || $this->session->userdata('level_id') == 3 
        || $this->session->userdata('level_id') == 4 ){
            $this->load->vars(array(
                'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/add_dusun/'.$kode_desa) . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            ));
        }

        $this->load->vars(array(
            'page_title' => 'Detail Data Dusun',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan') . '" class="text-muted text-hover-primary">Data Kecamatan</a></li>',
            'url_page' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan/detail/') .$data['desa']->Kd_Kec. '" class="text-muted text-hover-primary">Kec '. $data['desa']->Nama_Kecamatan.'</a></li>
                            <li class="breadcrumb-item text-dark">Desa '. $data['desa']->Nama_Desa.'</li>',
        ));
        $data['dusun'] = $this->kecamatan_model->get_by_dusun($kode_desa);
        // var_dump($data['dusun']) or die;
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', TRUE))
            ->set_js(assets_url('js/app/master/kecamatan/detail_dusun.js'))
            ->build('master/kecamatan/detail_dusun', $data);
    }

    public function detail_rw($kode_desa,$dusun)
    {
        $data['info'] = $this->dusun_model->get_by_kode($kode_desa,$dusun);
        $data['rw'] = $this->rw_model->get_by_kode_dusun($kode_desa,$dusun);
// var_dump($data['rw'])or die;
        if($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2 || $this->session->userdata('level_id') == 3 
        || $this->session->userdata('level_id') == 4 || $this->session->userdata('level_id') == 5 ){
            if(!empty($data['rw'])){
                $this->load->vars(array(
                    'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/add_rw/'.$kode_desa.'/'.$dusun) . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
                ));
            }else{
                $this->load->vars(array(
                    'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/add_rw/'.$kode_desa.'/'.$dusun) . '"> <i class="fa fa-plus"></i> Tambah Data</a>
                    <a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/generate_rw/'.$kode_desa.'/'.$dusun) . '"> <i class="fa fa-circle-notch"></i> Generate RW 001-020</a>',
                ));
            }
        }
        $this->load->vars(array(
            'page_title' => 'Detail Data RW',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan') . '" class="text-muted text-hover-primary">Data Kecamatan</a></li>',
            'url_page' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan/detail/') .$data['info']->Kd_Kec. '" class="text-muted text-hover-primary">Kec '. $data['info']->Nama_Kecamatan.'</a></li>
                            <a href="' . site_url('master/kecamatan/detail/') .$data['info']->Kd_Kec. '" class="text-muted text-hover-primary">
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_dusun/') .$data['info']->Kd_Desa. '" class="text-muted text-hover-primary">Desa '. $data['info']->Nama_Desa.'</li>
                            <li class="breadcrumb-item text-dark">'. $data['info']->dusun.'</li>',
        ));
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', TRUE))
            ->set_js(assets_url('js/app/master/kecamatan/detail_rw.js'))
            ->build('master/kecamatan/detail_rw', $data);
    }

    public function detail_rt($kode_desa,$dusun,$rw)
    {
        $data['info'] = $this->rw_model->get_by_kode($kode_desa,$dusun,$rw);
        $data['rt'] = $this->rt_model->get_by_kode_rw($kode_desa,$dusun,$rw);
        // var_dump($data['rt']) or die;
        if($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2 || $this->session->userdata('level_id') == 3 
        || $this->session->userdata('level_id') == 4 || $this->session->userdata('level_id') == 5 || $this->session->userdata('level_id') == 6){
            if(!empty($data['rt'])){
                $this->load->vars(array(
                    'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/add_rt/'.$kode_desa.'/'.$dusun.'/'.$rw) . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
                ));
            }else{
                $this->load->vars(array(
                    'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/add_rt/'.$kode_desa.'/'.$dusun.'/'.$rw) . '"> <i class="fa fa-plus"></i> Tambah Data</a>
                    <a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/generate_rt/'.$kode_desa.'/'.$dusun.'/'.$rw) . '"> <i class="fa fa-circle-notch"></i> Generate RT 001-020</a>',
                ));
            }
        }
        $this->load->vars(array(
            'page_title' => 'Detail Data RT',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan') . '" class="text-muted text-hover-primary">Data Kecamatan</a></li>',
            'url_page' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan/detail/') .$data['info']->Kd_Kec. '" class="text-muted text-hover-primary">Kec '. $data['info']->Nama_Kecamatan.'</a></li>
                            <a href="' . site_url('master/kecamatan/detail/') .$data['info']->Kd_Kec. '" class="text-muted text-hover-primary">
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_dusun/') .$data['info']->Kd_Desa. '" class="text-muted text-hover-primary">Desa '. $data['info']->Nama_Desa.'</li>
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_rw/') .$data['info']->Kd_Desa. '/'.$data['info']->Kd_Dusun. '" class="text-muted text-hover-primary">'. $data['info']->dusun.'</li>
                            <li class="breadcrumb-item text-dark">'. $data['info']->rw.'</li>',
        ));
        $data['desa'] = $this->kecamatan_model->get_by_desa($kode_desa);
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', TRUE))
            ->set_js(assets_url('js/app/master/kecamatan/detail_rt.js'))
            ->build('master/kecamatan/detail_rt', $data);
    }

    public function detail_dasawisma($kode_desa,$dusun,$rw,$rt)
    {
        $data['info'] = $this->rt_model->get_by_kode($kode_desa,$dusun,$rw,$rt);
        $data['dasawisma'] = $this->dasawisma_model->get_by_kode_rt($kode_desa,$dusun,$rw,$rt);

            $this->load->vars(array(
                'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/add_dasawisma/'.$kode_desa.'/'.$dusun.'/'.$rw.'/'.$rt) . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            ));
     

        $this->load->vars(array(
            'page_title' => 'Detail Data Dasawisma',
            // 'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan') . '" class="text-muted text-hover-primary">Data Kecamatan</a></li>',
            'url_page' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan/detail/') .$data['info']->Kd_Kec. '" class="text-muted text-hover-primary">Kec '. $data['info']->Nama_Kecamatan.'</a></li>
                            <a href="' . site_url('master/kecamatan/detail/') .$data['info']->Kd_Kec. '" class="text-muted text-hover-primary">
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_dusun/') .$data['info']->Kd_Desa. '" class="text-muted text-hover-primary">Desa '. $data['info']->Nama_Desa.'</li>
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_rw/') .$data['info']->Kd_Desa. '/'.$data['info']->Kd_Dusun. '" class="text-muted text-hover-primary">'. $data['info']->dusun.'</li>
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_rt/') .$data['info']->Kd_Desa. '/'.$data['info']->Kd_Dusun. '/'.$data['info']->rw. '" class="text-muted text-hover-primary">'. $data['info']->rw.'</li>
                            <li class="breadcrumb-item text-dark">'. $data['info']->rt.'</li>',
        ));
        $data['desa'] = $this->kecamatan_model->get_by_desa($kode_desa);
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', TRUE))
            ->set_js(assets_url('js/app/master/kecamatan/detail_dasawisma.js'))
            ->build('master/kecamatan/detail_dasawisma', $data);
    }

    public function generate_rt($kode_desa,$dusun,$rw)
    {
        $data = $this->rw_model->get_by_kode($kode_desa,$dusun,$rw);
        $kec = $data->Kd_Kec;
        $desa = $data->Kd_Desa;
        $dusun = $data->Kd_Dusun;
        $rw = $data->rw;
        for($i=1;$i<=20;$i++){
            $data = $this->rt_model->add(array(
                'Kd_Kec' => $kec,
                'Kd_Desa' => $desa,
                'Kd_Dusun' => $dusun,
                'rw' => $rw,
                'rt' => str_pad($i, 3, '0', STR_PAD_LEFT),
            ));
        }
        redirect(site_url('master/kecamatan/detail_rt/'.$desa.'/'.$dusun.'/'.$rw));
        
        
    }
    public function generate_rw($kode_desa,$dusun)
    {
        $info = $this->dusun_model->get_by_kode($kode_desa,$dusun);
        $data = $this->desa_model->get_by_kode_desa($kode_desa);
        $kec = $data->Kd_Kec;
        $desa = $data->Kd_Desa;
        // $infodusun = $info->dusun;
        // var_dump($dusun) or die;
        for($i=1;$i<=20;$i++){
            $data = $this->rw_model->add(array(
                'Kd_Kec' => $kec,
                'Kd_Desa' => $desa,
                'Kd_Dusun' => $dusun,
                'rw' => str_pad($i, 3, '0', STR_PAD_LEFT),
            ));
        }
        redirect(site_url('master/kecamatan/detail_rw/').$kode_desa.'/'.$dusun);
        
        
    }

    public function add_dusun($kode_desa)
    {
        $data['desa'] = $this->desa_model->get_by_kode_desa($kode_desa);
        // var_dump($data['desa']) or die;
        $this->load->vars(array(
            'page_title' => 'Tambah Data Dusun',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/detail_dusun/') .$data['desa']->Kd_Desa. '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan') . '" class="text-muted text-hover-primary">Data Kecamatan</a></li>',
            'url_page' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan/detail/') .$data['desa']->Kd_Kec. '" class="text-muted text-hover-primary">Kec '. $data['desa']->Nama_Kecamatan.'</a></li>
                            <li class="breadcrumb-item"><a href="' . site_url('master/kecamatan/detail_dusun/') .$data['desa']->Kd_Desa. '" class="text-muted text-hover-primary">Desa '. $data['desa']->Nama_Desa.'</a></li>
                            <li class="breadcrumb-item text-dark">Tambah Data Dusun</li>',
        ));
        $data['desa_value'] = $this->user_model->get_desa_kode($kode_desa);
        $this->template
            ->set_js(assets_url('js/app/master/desa/add_dusun.js'))
            ->build('master/dusun/add', $data);
    }

    public function add_desa($kode_kecamatan)
    {
        $data['kec'] = $this->kecamatan_model->get_by_kec($kode_kecamatan);
        $this->load->vars(array(
            'page_title' => 'Tambah Data Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/detail/') .$data['kec']->Kd_Kec. '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan') . '" class="text-muted text-hover-primary">Data Kecamatan</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Kec '. $data['kec']->Nama_Kecamatan.'</li><li class="breadcrumb-item text-dark">Tambah Data Desa</li>',
        ));
        $data['kecamatan'] = $this->user_model->get_kecamatan_id($data['kec']->Kd_Kec);

        $this->template
            ->set_js(assets_url('js/app/master/desa/add_desa.js'))
            ->build('master/desa/add', $data);
    }

    public function add_rw($kode_desa,$dusun)
    {
        $data['info'] = $this->dusun_model->get_by_kode($kode_desa,$dusun);
        // $data['desa'] = $this->desa_model->get_by_kode_desa($kode_desa);
        // var_dump($data['info']) or die;
        $this->load->vars(array(
            'page_title' => 'Tambah Data RW',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/detail_rw/') .$data['info']->Kd_Desa. '/'.$data['info']->id.'"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan') . '" class="text-muted text-hover-primary">Data Kecamatan</a></li>',
            'url_page' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan/detail/') .$data['info']->Kd_Kec. '" class="text-muted text-hover-primary">Kec '. $data['info']->Nama_Kecamatan.'</a></li>
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_dusun/') .$data['info']->Kd_Desa. '" class="text-muted text-hover-primary">Desa '. $data['info']->Nama_Desa.'</li>
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_rw/') .$data['info']->Kd_Desa. '/'.$data['info']->id.'" class="text-muted text-hover-primary">'. $data['info']->dusun.'</li>
                            <li class="breadcrumb-item text-dark">Tambah Data RW</li>',
        ));
        $data['kecamatan'] = $this->user_model->get_kecamatan_id($data['info']->Kd_Kec);

        $this->template
            ->set_js(assets_url('js/app/master/rw/add.js'))
            ->build('master/rw/add', $data);
    }

    public function add_rt($kode_desa,$dusun,$rw)
    {
        $data['info'] = $this->rw_model->get_by_kode($kode_desa,$dusun,$rw);

        // $data['desa'] = $this->desa_model->get_by_kode_desa($kode_desa);
        // var_dump($data['info']) or die;
        $this->load->vars(array(
            'page_title' => 'Tambah Data RW',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/detail_rt/') .$data['info']->Kd_Desa. '/'.$data['info']->Kd_Dusun.'/'.$data['info']->rw.'"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan') . '" class="text-muted text-hover-primary">Data Kecamatan</a></li>',
            'url_page' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan/detail/') .$data['info']->Kd_Kec. '" class="text-muted text-hover-primary">Kec '. $data['info']->Nama_Kecamatan.'</a></li>
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_dusun/') .$data['info']->Kd_Desa. '" class="text-muted text-hover-primary">Desa '. $data['info']->Nama_Desa.'</li>
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_rw/') .$data['info']->Kd_Desa. '/'.$data['info']->id.'" class="text-muted text-hover-primary">'. $data['info']->dusun.'</li>
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_rt/') .$data['info']->Kd_Desa. '/'.$data['info']->Kd_Dusun.'/'.$data['info']->rw.'" class="text-muted text-hover-primary">'. $data['info']->rw.'</li>
                            <li class="breadcrumb-item text-dark">Tambah Data RT</li>',
        ));
        $data['kecamatan'] = $this->user_model->get_kecamatan_id($data['info']->Kd_Kec);

        $this->template
            ->set_js(assets_url('js/app/master/rt/add.js'))
            ->build('master/rt/add', $data);
    }

    public function add_dasawisma($kode_desa,$dusun,$rw,$rt)
    {
        $data['info'] = $this->rt_model->get_by_kode($kode_desa,$dusun,$rw,$rt);

        // $data['desa'] = $this->desa_model->get_by_kode_desa($kode_desa);
        // var_dump($data['info']) or die;
        $this->load->vars(array(
            'page_title' => 'Tambah Data RW',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/detail_dasawisma/') .$data['info']->Kd_Desa. '/'.$data['info']->Kd_Dusun.'/'.$data['info']->rw.'/'.$data['info']->rt.'"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan') . '" class="text-muted text-hover-primary">Data Kecamatan</a></li>',
            'url_page' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan/detail/') .$data['info']->Kd_Kec. '" class="text-muted text-hover-primary">Kec '. $data['info']->Nama_Kecamatan.'</a></li>
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_dusun/') .$data['info']->Kd_Desa. '" class="text-muted text-hover-primary">Desa '. $data['info']->Nama_Desa.'</li>
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_rw/') .$data['info']->Kd_Desa. '/'.$data['info']->id.'" class="text-muted text-hover-primary">'. $data['info']->dusun.'</li>
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_rt/') .$data['info']->Kd_Desa. '/'.$data['info']->Kd_Dusun.'/'.$data['info']->rw.'" class="text-muted text-hover-primary">'. $data['info']->rw.'</li>
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_dasawisma/') .$data['info']->Kd_Desa. '/'.$data['info']->Kd_Dusun.'/'.$data['info']->rw.'/'.$data['info']->rt.'" class="text-muted text-hover-primary">'. $data['info']->rt.'</li>
                            <li class="breadcrumb-item text-dark">Tambah Data Dasawisma</li>',
        ));
        $data['kecamatan'] = $this->user_model->get_kecamatan_id($data['info']->Kd_Kec);

        $this->template
            ->set_js(assets_url('js/app/master/dasawisma/add.js'))
            ->build('master/dasawisma/add', $data);
    }
    
    public function edit_dasawisma($id)
    {
        $data['info'] = $this->dasawisma_model->get_by_id($id);
        $this->load->vars(array(
            'page_title' => 'Edit Data RW',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/detail_dasawisma/') .$data['info']->Kd_Desa. '/'.$data['info']->Kd_Dusun.'/'.$data['info']->rw.'/'.$data['info']->rt.'"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan') . '" class="text-muted text-hover-primary">Data Kecamatan</a></li>',
            'url_page' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan/detail/') .$data['info']->Kd_Kec. '" class="text-muted text-hover-primary">Kec '. $data['info']->Nama_Kecamatan.'</a></li>
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_dusun/') .$data['info']->Kd_Desa. '" class="text-muted text-hover-primary">Desa '. $data['info']->Nama_Desa.'</li>
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_rw/') .$data['info']->Kd_Desa. '/'.$data['info']->id.'" class="text-muted text-hover-primary">'. $data['info']->dusun.'</li>
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_rt/') .$data['info']->Kd_Desa. '/'.$data['info']->Kd_Dusun.'/'.$data['info']->rw.'" class="text-muted text-hover-primary">'. $data['info']->rw.'</li>
                            <li class="breadcrumb-item text"><a href="' . site_url('master/kecamatan/detail_dasawisma/') .$data['info']->Kd_Desa. '/'.$data['info']->Kd_Dusun.'/'.$data['info']->rw.'/'.$data['info']->rt.'" class="text-muted text-hover-primary">'. $data['info']->rt.'</li>
                            <li class="breadcrumb-item text-dark">Edit Data Dasawisma</li>',
        ));
        $this->template
            ->set_js(assets_url('js/app/master/dasawisma/edit.js'))
            ->build('master/dasawisma/edit', $data);
    }

    public function edit_desa($id)
    {
        $data['desa'] = $this->desa_model->get_by_id($id);

        $this->load->vars(array(
            'page_title' => 'Ubah Data Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('master/kecamatan/detail/') .$data['desa']->Kd_Kec. '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('master/kecamatan') . '" class="text-muted text-hover-primary">Data Kecamatan</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Kec '. $data['desa']->Nama_Kecamatan.'</li><li class="breadcrumb-item text-dark">Ubah Data Desa</li>',
        ));
        // $data['kecamatan'] = $this->user_model->get_kecamatan_id($data['desa']->Kd_Kec);
        $this->template
            ->set_js(assets_url('js/app/master/desa/edit_desa.js'))
            ->build('master/desa/edit', $data);
    }

    public function generate_user_kecamatan($id){
        $data['kecamatan'] = $this->kecamatan_model->get_by_id($id);
        // var_dump(strtolower($data['kecamatan']->Nama_Kecamatan)) or die;
        $insert = $this->user_model->generate_user(array(
                    'first_name' => 'User Kec',
                    'last_name' => $data['kecamatan']->Nama_Kecamatan,
                    'username' => 'kec_'.strtolower($data['kecamatan']->Nama_Kecamatan),
                    'email' => 'kec_'.strtolower($data['kecamatan']->Nama_Kecamatan).'@gmail.com',
                    'password' => $data['kecamatan']->Kd_Kec,
                    'registered' => date('Y-m-d h:i:s'),
                    'role_id' => 3,
                    'level_id' => 3,
                    'kec_id' => $data['kecamatan']->Kd_Kec,
                    'lang' => 'id',
                ));
        if($insert == false){
            $this->form_validation->set_message('unique_username', lang('already_taken'));
        }else{
            $this->template->set_flashdata('info', lang('user_added'));
        }
        if (isset($this->data['redirect'])) {
            redirect($this->data['redirect']);
        } else {
            redirect('master/kecamatan');
        }
    }

    public function generate_user_desa($id){
        $data['desa'] = $this->kecamatan_model->get_by_desa_generate($id);
        // var_dump($data['desa']) or die;
        $insert = $this->user_model->generate_user(array(
                    'first_name' => 'User Desa',
                    'last_name' => $data['desa']->Nama_Desa,
                    'username' => 'desa_'.strtolower($data['desa']->Nama_Desa).'_'.strtolower($data['desa']->Nama_Kecamatan),
                    'email' => 'desa_'.strtolower($data['desa']->Nama_Desa).'_'.strtolower($data['desa']->Nama_Kecamatan).'@gmail.com',
                    'password' => $data['desa']->Kd_Desa,
                    'registered' => date('Y-m-d h:i:s'),
                    'role_id' => 3,
                    'level_id' => 4,
                    'kec_id' => $data['desa']->Kd_Kec,
                    'desa_id' => $data['desa']->Kd_Desa,
                    'lang' => 'id',
                ));
        if($insert == false){
            $this->form_validation->set_message('unique_username', lang('already_taken'));
        }else{
            $this->template->set_flashdata('info', lang('user_added'));
        }
        if (isset($this->data['redirect'])) {
            redirect($this->data['redirect']);
        } else {
            redirect('master/kecamatan/detail/'.$data['desa']->Kd_Kec);
        }
    }

    public function generate_user_dusun($id){
        $data['dusun'] = $this->kecamatan_model->get_by_dusun_generate($id);
        $insert = $this->user_model->generate_user(array(
                    'first_name' => 'User Dusun',
                    'last_name' => $data['dusun']->dusun,
                    'username' => strtolower($data['dusun']->dusun).'_'.strtolower($data['dusun']->Nama_Desa).'_'.strtolower($data['dusun']->Nama_Kecamatan),
                    'email' => strtolower($data['dusun']->dusun).'_'.strtolower($data['dusun']->Nama_Desa).'_'.strtolower($data['dusun']->Nama_Kecamatan).'@gmail.com',
                    'password' => 'bandungbedas',
                    'registered' => date('Y-m-d h:i:s'),
                    'role_id' => 3,
                    'level_id' => 5,
                    'kec_id' => $data['dusun']->Kd_Kec,
                    'desa_id' => $data['dusun']->Kd_Desa,
                    'dusun' => $data['dusun']->id,
                    'lang' => 'id',
                ));
        if($insert == false){
            $this->form_validation->set_message('unique_username', lang('already_taken'));
        }else{
            $this->template->set_flashdata('info', lang('user_added'));
        }
        if (isset($this->data['redirect'])) {
            redirect($this->data['redirect']);
        } else {
            redirect('master/kecamatan/detail_dusun/'.$data['dusun']->Kd_Desa);
        }
    }


    public function generate_user_rw($desa,$dusun,$rw){
        $data['rw'] = $this->rw_model->get_by_kode($desa,$dusun,$rw);
        // var_dump($data['dusun']) or die;
        $insert = $this->user_model->generate_user(array(
                    'first_name' => 'User RW',
                    'last_name' => $data['rw']->rw,
                    'username' => 'rw'.strtolower($data['rw']->rw).'_'.strtolower($data['rw']->dusun).'_'.strtolower($data['rw']->Nama_Desa.'_'.strtolower($data['rw']->Nama_Kecamatan)),
                    'email' => 'rw'.strtolower($data['rw']->rw).'_'.strtolower($data['rw']->dusun).'_'.strtolower($data['rw']->Nama_Desa.'_'.strtolower($data['rw']->Nama_Kecamatan)).'@gmail.com',
                    'password' => 'bandungbedas',
                    'registered' => date('Y-m-d h:i:s'),
                    'role_id' => 3,
                    'level_id' => 6,
                    'kec_id' => $data['rw']->Kd_Kec,
                    'desa_id' => $data['rw']->Kd_Desa,
                    'dusun' => $data['rw']->Kd_Dusun,
                    'rw' => $data['rw']->rw,
                    'lang' => 'id',
                ));
        if($insert == false){
            $this->form_validation->set_message('unique_username', lang('already_taken'));
        }else{
            $this->template->set_flashdata('info', lang('user_added'));
        }
        if (isset($this->data['redirect'])) {
            redirect($this->data['redirect']);
        } else {
            redirect('master/kecamatan/detail_rw/'.$desa.'/'.$dusun);
        }
    }
    public function generate_user_rt($desa,$dusun,$rw,$rt){
        $data['rt'] = $this->rt_model->get_by_kode($desa,$dusun,$rw,$rt);
        $insert = $this->user_model->generate_user(array(
                    'first_name' => 'User RW'.$data['rt']->rw,
                    'last_name' => 'User RT '.$data['rt']->rt,
                    'username' => 'rt'.strtolower($data['rt']->rt).'_rw'.strtolower($data['rt']->rw).'_'.strtolower($data['rt']->dusun).'_'.strtolower($data['rt']->Nama_Desa).'_'.strtolower($data['rt']->Nama_Kecamatan),
                    'email' => 'rt'.strtolower($data['rt']->rt).'_rw'.strtolower($data['rt']->rw).'_'.strtolower($data['rt']->dusun).'_'.strtolower($data['rt']->Nama_Desa).'_'.strtolower($data['rt']->Nama_Kecamatan).'@gmail.com',
                    'password' => 'bandungbedas',
                    'registered' => date('Y-m-d h:i:s'),
                    'role_id' => 3,
                    'level_id' => 7,
                    'kec_id' => $data['rt']->Kd_Kec,
                    'desa_id' => $data['rt']->Kd_Desa,
                    'dusun' => $data['rt']->Kd_Dusun,
                    'rw' => $data['rt']->rw,
                    'rt' => $data['rt']->rt,
                    'lang' => 'id',
                ));
                $insert = $this->user_model->generate_user(array(
                    'first_name' => 'OPR DASAWISMA RW'.$data['rt']->rw,
                    'last_name' => 'User RT '.$data['rt']->rt,
                    'username' => 'opr_rt'.strtolower($data['rt']->rt).'_rw'.strtolower($data['rt']->rw).'_'.strtolower($data['rt']->dusun).'_'.strtolower($data['rt']->Nama_Desa).'_'.strtolower($data['rt']->Nama_Kecamatan),
                    'email' => 'opr_rt'.strtolower($data['rt']->rt).'_rw'.strtolower($data['rt']->rw).'_'.strtolower($data['rt']->dusun).'_'.strtolower($data['rt']->Nama_Desa).'_'.strtolower($data['rt']->Nama_Kecamatan).'@gmail.com',
                    'password' => 'bandungbedas',
                    'registered' => date('Y-m-d h:i:s'),
                    'role_id' => 8,
                    'level_id' => 7,
                    'kec_id' => $data['rt']->Kd_Kec,
                    'desa_id' => $data['rt']->Kd_Desa,
                    'dusun' => $data['rt']->Kd_Dusun,
                    'rw' => $data['rt']->rw,
                    'rt' => $data['rt']->rt,
                    'lang' => 'id',
                ));
        
        if($insert == false){
            $this->form_validation->set_message('unique_username', lang('already_taken'));
        }else{
            $this->template->set_flashdata('info', lang('user_added'));
        }
        if (isset($this->data['redirect'])) {
            redirect($this->data['redirect']);
        } else {
            redirect(site_url('/master/kecamatan/detail_rt/'.$desa.'/'.$dusun.'/'.$rw));
        }
    }
}
