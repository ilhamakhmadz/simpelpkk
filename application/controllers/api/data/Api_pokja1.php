<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_pokja1 extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/pokja1_model');
    }
    public function index()
    {
        $data = $this->pokja1_model->datatables();
        echo $data;

    }
    
}
