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
        $data = $this->pokja2_model->datatables_kecamatan(1);
        echo $data;
    }
}
