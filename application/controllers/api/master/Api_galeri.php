<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_galeri extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/galeri_model');
    }
    public function index()
    {
        $data = $this->galeri_model->datatables();
        echo $data;
    }
    public function add()
    {
        $data = $this->galeri_model->add(array(
            'nama_galeri' => $this->input->post('nama_galeri'),
        ));
        echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->galeri_model->delete($id));
        redirect(site_url('master/galeri'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->galeri_model->edit($id, array(
                'nama_galeri' => $this->input->post('nama_galeri')
            )));
        } else {
            throw new Exception('Method not Allowed');
        }
    }
}
