<?php

class Api_pokja4 extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/pokja4_model');
    }
    public function index()
    {
        $data = $this->pokja4_model->datatables_kecamatan(1);
        echo $data;
    }
}
