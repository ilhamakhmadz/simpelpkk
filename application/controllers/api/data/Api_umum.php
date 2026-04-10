<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_umum extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/umum_model');
    }
    public function index()
    {
        $data = $this->umum_model->datatables();
        echo $data;

    }
    
}
