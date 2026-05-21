<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Index extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // $this->load->model("data/pokja1_model");
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
        $list_kecamatan = $this->db->select('Kd_Kec, Nama_Kecamatan')->from('master_kecamatan')->where('visible', 1)->order_by('Nama_Kecamatan', 'ASC')->get()->result();
        $list_tahun = $this->db->select('DISTINCT(date_year) as tahun')->from('pkk')->where('date_year IS NOT NULL')->where('date_year !=', 0)->order_by('date_year', 'DESC')->get()->result();

        $this->load->vars(array(
            'page_title' => 'Data Profil PKK',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('desa/profil/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Profil PKK</li>',
            'list_kecamatan' => $list_kecamatan,
            'list_tahun' => $list_tahun,
        ));

        $this->template
            ->set_layout('layout_graph')
            ->build('data/pokja1/index');
    }

}
