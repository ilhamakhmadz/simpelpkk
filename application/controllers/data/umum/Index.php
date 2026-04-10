<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Index extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("data/umum_model");
        // $this->template
        // ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
        // ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'));
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Data Profil PKK',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/profil/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Profil PKK</li>',
        ));

        $this->template
            ->set_css('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css')
            ->set_css('https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css')
            ->set_js('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js')
            ->set_js('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js')
            ->set_js('https://cdn.datatables.net/2.0.8/js/dataTables.js')
            ->set_js('https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js')
            ->set_js(assets_url('js/app/data/umum/index.js'))
            ->set_layout('layout_graph')
            ->build('data/umum/index');
    }

}
