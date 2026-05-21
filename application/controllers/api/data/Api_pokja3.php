<?php

class Api_pokja3 extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/pokja3_model');
    }
    public function index()
    {
        $year = $this->input->get_post('year');
        $kec_id = $this->input->get_post('kec_id');
        $data = $this->pokja3_model->datatables_kecamatan(1, $year, $kec_id);
        echo $data;
    }
}
