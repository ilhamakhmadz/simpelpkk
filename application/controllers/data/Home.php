<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
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
        $data["footer"] = $this->profil_model->get_data();
        // $data["sambutan"] = $this->pegawai_model->get_pegawai(1);
        // $data["news"] = $this->berita_model->news(3);
        // $data["jml_kec"] = $this->home_model->get_jml_kec();
        // $data["jml_desa"] = $this->home_model->get_jml_desa();
        // $data["jml_rw"] = $this->home_model->get_jml_rw();
        // $data["jml_rt"] = $this->home_model->get_jml_rt();
        // $data["jml_dasawisma"] = $this->home_model->get_jml_dasawisma();
        // $data["jml_krt"] = $this->home_model->get_jml_krt();
        // $data["jml_kk"] = $this->home_model->get_jml_kk();
        // $data["jml_penduduk"] = $this->home_model->get_jml_penduduk();
        // $data["jml_kader"] = $this->home_model->get_jml_kader();
        $this->template
            ->set_layout('layout_data', $data)
            ->build('data/list-data', $data);
    }

}
