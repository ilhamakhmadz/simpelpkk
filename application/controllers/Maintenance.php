<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Maintenance extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->language('welcome');
        $this->load->model("web/profil_model");
        $this->load->model("dashboard/home_model");
        $this->load->model("web/pegawai_model");
        $this->load->model("web/berita_model");
        $this->load->model("web/galeri_model");
        $this->load->model("web/dokumen_model");
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
        $data["title"] = "Aplikasi Ditutup Sementara";
        $data["desc"] = "Terimakasih yang telah menginput data pada SIMPEL PKK, mohon tunggu informasi selanjutnya";

        $this->template
            ->set_layout('front_maintenance', $data)
            ->build('frontend/maintenance', $data);
    }
}
