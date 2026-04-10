<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Keluarga extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dasawisma/keluarga_model');
        $this->load->model('dasawisma/catatan_keluarga_model');
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
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/keluarga/add/') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'page_title' => 'Data Keluarga Dasawisma',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Data Keluarga Dasawisma</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(assets_url('js/app/dasawisma/keluarga/index.js'))
            ->build('dasawisma/keluarga/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Data Keluarga',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/keluarga/index/') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('dasawisma/keluarga') . '" class="text-muted text-hover-primary">Data Keluarga Dasawisma</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Data Keluarga</li>',
        ));

        $data['pekerjaan'] = $this->user_model->get_pekerjaan();
        $data['pancasila'] = $this->user_model->get_pancasila();
        $data['kebutuhan_khusus'] = $this->user_model->get_kebutuhan_khusus();
        $data['gotong_royong'] = $this->user_model->get_gotong_royong();
        $data['ketrampilan'] = $this->user_model->get_ketrampilan();
        $data['koperasi'] = $this->user_model->get_koperasi();
        $data['pangan'] = $this->user_model->get_pangan();
        $data['sandang'] = $this->user_model->get_sandang();
        $data['kesehatan'] = $this->user_model->get_kesehatan();
        $data['perencanaan_sehat']  = $this->user_model->get_perencanaan_sehat();
        $data['user']   = $this->session->userdata;


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
            $data['rt'] = $this->user_model->get_rt_select();
        }

        // var_dump($data['rw']) or die;
        $this->template
            ->set_css(bower_url('summernote/dist/summernote.min'))
            ->set_js(bower_url('summernote/dist/summernote.min', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/dasawisma/keluarga/add.js'))
            ->set_js(assets_url('js/app/dasawisma/keluarga/validation.js'));
        if ($this->session->userdata('level_id') == 7 && $this->session->userdata('role_id') == 8) {
            $this->template->build('dasawisma/keluarga/add_rt', $data);
        }else{
            $this->template->build('dasawisma/keluarga/add', $data);

        }

            
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Ubah Data Keluarga',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/keluarga') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('dasawisma/keluarga') . '" class="text-muted text-hover-primary">Data Keluarga Dasawisma</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah Data Keluarga</li>',
        ));
        $data['keluarga'] = $this->keluarga_model->get_by_id($id);
        $data['anggota'] = $this->keluarga_model->get_anggota_id($id);

        $data['dasawisma'] = $this->keluarga_model->get_dasawisma($data['keluarga']->desa,$data['keluarga']->dusun,$data['keluarga']->rw,$data['keluarga']->rt);
        // var_dump($data['dasawisma']) or die;
        
        $data['pekerjaan'] = $this->user_model->get_pekerjaan();
        $data['pancasila'] = $this->user_model->get_pancasila();
        $data['kebutuhan_khusus'] = $this->user_model->get_kebutuhan_khusus();
        $data['gotong_royong'] = $this->user_model->get_gotong_royong();
        $data['ketrampilan'] = $this->user_model->get_ketrampilan();
        $data['koperasi'] = $this->user_model->get_koperasi();
        $data['pangan'] = $this->user_model->get_pangan();
        $data['sandang'] = $this->user_model->get_sandang();
        $data['kesehatan'] = $this->user_model->get_kesehatan();
        $data['perencanaan_sehat'] = $this->user_model->get_perencanaan_sehat();

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
            ->set_js(assets_url('js/app/dasawisma/keluarga/edit.js'))
            ->set_js(assets_url('js/app/dasawisma/keluarga/validation.js'));

            if ($this->session->userdata('level_id') == 7 && $this->session->userdata('role_id') == 8) {
                $this->template->build('dasawisma/keluarga/edit_rt', $data);
            }else{
                $this->template->build('dasawisma/keluarga/edit', $data);
    
            }
    }


    public function view($id)
    {
        $this->load->vars(array(
            'page_title' => 'Lihat Data Catatan Keluarga',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/keluarga') . '"> <i class="fa fa-reply"></i> Back</a>
                            <a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/keluarga/export_excel/' . $id) . '" target="_blank"> <i class="fa fa-file-excel-o"></i> Export Excel</a>
                            <a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/keluarga/export_pdf/' . $id) . '" target="_blank"> <i class="fa fa-file-pdf-o"></i> Export PDF</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('dasawisma/keluarga') . '" class="text-muted text-hover-primary">Data Catatan Keluarga Dasawisma</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Lihat Data Catatan Keluarga</li>',
        ));
        $data['catatan_keluarga'] = $this->keluarga_model->get_by_id($id);

        $dasawisma = $data['catatan_keluarga']->dasawisma; 
        $rt = $data['catatan_keluarga']->rt; 
        $rw = $data['catatan_keluarga']->rw; 
        $dusun = $data['catatan_keluarga']->dusun; 
        $desa = $data['catatan_keluarga']->desa; 
        $kecamatan = $data['catatan_keluarga']->kecamatan; 
        $levelData = $data['catatan_keluarga']->level; 
        $data['level_data'] = $data['catatan_keluarga']->level; 
        $date_year = $data['catatan_keluarga']->date_year; 
        if($levelData == 'keluarga'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_byId($id);
        }elseif($levelData == 'dasawisma'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_dasawisma($date_year,$kecamatan,$desa,$dusun,$rw,$rt,$dasawisma);
        }elseif($levelData == 'rt'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_rt($date_year,$kecamatan,$desa,$dusun,$rw,$rt);
        }elseif($levelData == 'rw'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_rw($date_year,$kecamatan,$desa,$dusun,$rw);
        }elseif($levelData == 'dusun'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_dusun($date_year,$kecamatan,$desa,$dusun);
        }elseif($levelData == 'desa'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_desa($date_year,$kecamatan,$desa);
        }elseif($levelData == 'kecamatan'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_kecamatan($date_year,$kecamatan);
        }
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/dasawisma/keluarga/view.js'));
            if ($this->session->userdata('level_id') == 7 && $this->session->userdata('role_id') == 8) {
                $this->template->build('dasawisma/keluarga/view_rt', $data);
            }else{
                $this->template->build('dasawisma/keluarga/view', $data);
    
            }
    }

    public function detail($id)
    {
        $data['catatan_keluarga'] = $this->catatan_keluarga_model->get_by_id($id);
        $dasawisma = $data['catatan_keluarga']->dasawisma; 
        $rt = $data['catatan_keluarga']->rt; 
        $rw = $data['catatan_keluarga']->rw; 
        $dusun = $data['catatan_keluarga']->dusun; 
        $desa = $data['catatan_keluarga']->desa; 
        $kecamatan = $data['catatan_keluarga']->kecamatan; 
        $levelData = $data['catatan_keluarga']->level; 
        $data['level_data'] = $data['catatan_keluarga']->level; 
        $date_year = $data['catatan_keluarga']->date_year; 

        
        if($levelData == 'keluarga'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_byId($id);
        }elseif($levelData == 'dasawisma'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_dasawisma($date_year,$kecamatan,$desa,$dusun,$rw,$rt,$dasawisma);
        }elseif($levelData == 'rt'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_rt($date_year,$kecamatan,$desa,$dusun,$rw,$rt);
        }elseif($levelData == 'rw'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_rw($date_year,$kecamatan,$desa,$dusun,$rw);
        }elseif($levelData == 'dusun'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_dusun($date_year,$kecamatan,$desa,$dusun);
        }elseif($levelData == 'desa'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_desa($date_year,$kecamatan,$desa);
        }elseif($levelData == 'kecamatan'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_kecamatan($date_year,$kecamatan);
        }
        $data['id_keluarga'] = $id;
        $data['pekerjaan'] = $this->user_model->get_pekerjaan();
        $data['pancasila'] = $this->user_model->get_pancasila();
        $data['kebutuhan_khusus'] = $this->user_model->get_kebutuhan_khusus();
        $data['gotong_royong'] = $this->user_model->get_gotong_royong();
        $data['ketrampilan'] = $this->user_model->get_ketrampilan();
        $data['koperasi'] = $this->user_model->get_koperasi();
        $data['pangan'] = $this->user_model->get_pangan();
        $data['sandang'] = $this->user_model->get_sandang();
        $data['kesehatan'] = $this->user_model->get_kesehatan();
        $data['perencanaan_sehat'] = $this->user_model->get_perencanaan_sehat();
        if ($this->session->userdata('level_id') == 7 && $this->session->userdata('role_id') == 8) {
            $this->load->vars(array(
                'page_title' => 'Detail Data Anggota Keluarga '.$data['catatan_keluarga']->nama_kepala_keluarga,
                'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
                'url_page' => '<li class="breadcrumb-item text-dark">Detail Anggota Keluarga</li>',
                'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/keluarga') . '"> <i class="fa fa-reply"></i> Back</a>
                                <a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/keluarga/export_excel/' . $id) . '" target="_blank"> <i class="fa fa-file-excel-o"></i> Export Excel</a>
                                <a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/keluarga/export_pdf/' . $id) . '" target="_blank"> <i class="fa fa-file-pdf-o"></i> Export PDF</a>
                                <button class="btn btn-active-accent fw-bolder" data-bs-toggle="modal" data-bs-target="#kt_modal_1"> <i class="fa fa-plus"></i> Tambah Data</button>',
                'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('dasawisma/keluarga') . '" class="text-muted text-hover-primary">Data Anggota Keluarga</a></li>',
            
            ));
        }else{
            $this->load->vars(array(
                'page_title' => 'Detail Data Anggota Keluarga ',
                'url_home' => '<li class="breadcrumb-item"><a href="' . site_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
                'url_page' => '<li class="breadcrumb-item text-dark">Detail Anggota Keluarga</li>',
                'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/keluarga') . '"> <i class="fa fa-reply"></i> Back</a>
                                <a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/keluarga/export_excel/' . $id) . '" target="_blank"> <i class="fa fa-file-excel-o"></i> Export Excel</a>
                                <a class="btn btn-active-accent fw-bolder" href="' . site_url('dasawisma/keluarga/export_pdf/' . $id) . '" target="_blank"> <i class="fa fa-file-pdf-o"></i> Export PDF</a>',
                'url_children' => '<li class="breadcrumb-item"><a href="' . site_url('dasawisma/keluarga') . '" class="text-muted text-hover-primary">Data Anggota Keluarga</a></li>',
            
            ));
        }
        $this->template
            ->set_js(assets_url('admin_assets/assets/js/scripts.bundle.js'))
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/dasawisma/keluarga/detail.js'))
            ->build('dasawisma/keluarga/detail', $data);
    }

    public function export_excel($id)
    {

        
        // Load library PhpSpreadsheet dari composer
        require_once FCPATH . 'vendor/autoload.php';
        
        // Ambil data keluarga dan anggota
        $data['catatan_keluarga'] = $this->catatan_keluarga_model->get_by_id($id);
        $dasawisma = $data['catatan_keluarga']->dasawisma; 
        $rt = $data['catatan_keluarga']->rt; 
        $rw = $data['catatan_keluarga']->rw; 
        $dusun = $data['catatan_keluarga']->dusun; 
        $desa = $data['catatan_keluarga']->desa; 
        $kecamatan = $data['catatan_keluarga']->kecamatan; 
        $levelData = $data['catatan_keluarga']->level; 
        $date_year = $data['catatan_keluarga']->date_year;
        
        // Ambil data anggota keluarga
        if($levelData == 'keluarga'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_byId($id);
        }elseif($levelData == 'dasawisma'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_dasawisma($date_year,$kecamatan,$desa,$dusun,$rw,$rt,$dasawisma);
        }elseif($levelData == 'rt'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_rt($date_year,$kecamatan,$desa,$dusun,$rw,$rt);
        }elseif($levelData == 'rw'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_rw($date_year,$kecamatan,$desa,$dusun,$rw);
        }elseif($levelData == 'dusun'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_dusun($date_year,$kecamatan,$desa,$dusun);
        }elseif($levelData == 'desa'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_desa($date_year,$kecamatan,$desa);
        }elseif($levelData == 'kecamatan'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_kecamatan($date_year,$kecamatan);
        }

        // Ambil data master untuk mapping
        $data['master_cacat'] = $this->get_master_data('master_kebutuhan_khusus');
        $data['master_pancasila'] = $this->get_master_data('master_pancasila');
        $data['master_gotong_royong'] = $this->get_master_data('master_gotong_royong');
        $data['master_keterampilan'] = $this->get_master_data('master_ketrampilan');
        $data['master_koperasi'] = $this->get_master_data('master_koperasi');
        $data['master_pangan'] = $this->get_master_data('master_pangan');
        $data['master_sandang'] = $this->get_master_data('master_sandang');
        $data['master_kesehatan'] = $this->get_master_data('master_kesehatan');
        $data['master_perencanaan_sehat'] = $this->get_master_data('master_perencanaan_sehat');

        $data['dasawisma_name'] = $this->get_dasawisma_name($dasawisma);

        $this->load->view('dasawisma/keluarga/export_excel_js', $data);
    }

    public function export_pdf($id)
    {
        // Ambil data keluarga dan anggota
        $data['catatan_keluarga'] = $this->catatan_keluarga_model->get_by_id($id);
        $dasawisma = $data['catatan_keluarga']->dasawisma; 
        $rt = $data['catatan_keluarga']->rt; 
        $rw = $data['catatan_keluarga']->rw; 
        $dusun = $data['catatan_keluarga']->dusun; 
        $desa = $data['catatan_keluarga']->desa; 
        $kecamatan = $data['catatan_keluarga']->kecamatan; 
        $levelData = $data['catatan_keluarga']->level; 
        $date_year = $data['catatan_keluarga']->date_year;
        
        // Ambil data anggota keluarga
        if($levelData == 'keluarga'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_byId($id);
        }elseif($levelData == 'dasawisma'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_dasawisma($date_year,$kecamatan,$desa,$dusun,$rw,$rt,$dasawisma);
        }elseif($levelData == 'rt'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_rt($date_year,$kecamatan,$desa,$dusun,$rw,$rt);
        }elseif($levelData == 'rw'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_rw($date_year,$kecamatan,$desa,$dusun,$rw);
        }elseif($levelData == 'dusun'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_dusun($date_year,$kecamatan,$desa,$dusun);
        }elseif($levelData == 'desa'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_desa($date_year,$kecamatan,$desa);
        }elseif($levelData == 'kecamatan'){
            $data['anggota'] = $this->catatan_keluarga_model->get_anggota_kecamatan($date_year,$kecamatan);
        }

        // Ambil data master untuk mapping
        $data['master_cacat'] = $this->get_master_data('master_kebutuhan_khusus');
        $data['master_pancasila'] = $this->get_master_data('master_pancasila');
        $data['master_gotong_royong'] = $this->get_master_data('master_gotong_royong');
        $data['master_keterampilan'] = $this->get_master_data('master_ketrampilan');
        $data['master_koperasi'] = $this->get_master_data('master_koperasi');
        $data['master_pangan'] = $this->get_master_data('master_pangan');
        $data['master_sandang'] = $this->get_master_data('master_sandang');
        $data['master_kesehatan'] = $this->get_master_data('master_kesehatan');
        $data['master_perencanaan_sehat'] = $this->get_master_data('master_perencanaan_sehat');

        $data['dasawisma_name'] = $this->get_dasawisma_name($dasawisma);

        $this->load->view('dasawisma/keluarga/export_pdf', $data);
    }

    /**
     * Helper method untuk mengambil data master dari database
     */
    private function get_master_data($table_name)
    {
        $this->db->select('id, nama');
        $this->db->from($table_name);
        // $this->db->where('visible', 1);
        $query = $this->db->get();
        
        $result = array();
        foreach ($query->result() as $row) {
            $result[$row->id] = $row->nama;
        }
        
        return $result;
    }

    /**
     * Helper method untuk mendapatkan nama dari data master berdasarkan ID
     */
    private function get_master_name($master_data, $id)
    {
        if (isset($master_data[$id])) {
            return $master_data[$id];
        }
        return 'Tidak Ada';
    }

    /**
     * Helper method untuk mendapatkan nama dasawisma berdasarkan ID
     */
    private function get_dasawisma_name($dasawisma_id)
    {
        if (!$dasawisma_id) {
            return 'Tidak ada';
        }
        
        $this->db->select('dasawisma');
        $this->db->from('master_dasawisma');
        $this->db->where('id', $dasawisma_id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->dasawisma;
        }
        
        return 'Tidak ada';
    }
    

}
