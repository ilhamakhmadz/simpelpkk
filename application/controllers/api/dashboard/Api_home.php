<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_home extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('desa/profil_model');
    }
    // public function index()
    // {
    //     $data = $this->kerjasama_model->datatables();
    //     echo $data;
    // }
    public function get_penduduk()
    {
        $data = $this->profil_model->get_all_penduduk();
        echo json_encode($data);
    }
    public function get_lp()
    {
        $data = $this->profil_model->get_lp();
        echo json_encode($data);
    }
}
