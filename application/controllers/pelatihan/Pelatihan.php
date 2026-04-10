<?php

class Pelatihan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelatihan/pelatihan_model');
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
            'page_title' => 'Data pelatihan Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('pelatihan/pelatihan/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/index') . '" class="text-muted text-hover-primary">pelatihan Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">pelatihan Desa</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/pelatihan/pelatihan/index.js'))
            ->build('pelatihan/pelatihan/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah pelatihan Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('pelatihan/pelatihan') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('pelatihan/pelatihan') . '" class="text-muted text-hover-primary">pelatihan Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah pelatihan Desa</li>',
        ));
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $data['pelatihan'] = $this->pelatihan_model->get_pelatihan();
        $this->template
            // ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            // ->set_js(assets_url('admin_assets/assets/js/scripts.bundle.js', true))
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/pelatihan/pelatihan/add.js'))
            ->build('pelatihan/pelatihan/add', $data);
    }

    public function edit($id, $id_pelatihan)
    {
        $data['pelatihan_kode'] = $this->pelatihan_model->get_by_kode($id_pelatihan);
        $data['pelatihan'] = $this->pelatihan_model->get_by_id($id);
        $data['jenis_pelatihan'] = $this->pelatihan_model->get_pelatihan();

        $this->load->vars(array(
            'page_title' => 'Ubah Pelatihan Desa',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('pelatihan/pelatihan/view/' . $data['pelatihan_kode']->nama_pelatihan) . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('pelatihan/pelatihan') . '" class="text-muted text-hover-primary">pelatihan Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah pelatihan Desa ' . $data['pelatihan_kode']->nama_pelatihan . '</li>',
        ));
        // $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $this->template
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            // ->set_js(assets_url('admin_assets/assets/js/scripts.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/pelatihan/pelatihan/edit.js'))
            ->build('pelatihan/pelatihan/edit', $data);
    }
    public function view($id_pelatihan)
    {
        $data['pelatihan_kode'] = $this->pelatihan_model->get_by_kode($id_pelatihan);

        // var_dump($data['pelatihan_kode']) or die;

        $this->load->vars(array(
            'page_title' => 'Data ' . $data['pelatihan_kode']->nama_pelatihan,
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('pelatihan/pelatihan') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('pelatihan/pelatihan') . '" class="text-muted text-hover-primary">Pelatihan Desa</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark"> ' . $data['pelatihan_kode']->nama_pelatihan . '</li>',
        ));
        $data['pelatihan'] = $this->pelatihan_model->get_by_id_pelatihan($id_pelatihan);
        // var_dump($data['pelatihan']) or die;


        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(bower_url('jquery/dist/jquery.min.js'))
            ->set_js(assets_url('js/app/pelatihan/pelatihan/view.js'))
            ->build('pelatihan/pelatihan/view', $data);
    }
}
