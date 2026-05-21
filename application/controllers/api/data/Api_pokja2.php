<?php

class Api_pokja2 extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/pokja2_model');
    }
    public function index()
    {
        $year = $this->input->get_post('year');
        $kec_id = $this->input->get_post('kec_id');
        $data = $this->pokja2_model->datatables_kecamatan(1, $year, $kec_id);
        echo $data;
    }
}
