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
        $data = $this->pokja3_model->datatables_kecamatan(1);
        echo $data;
    }
}
