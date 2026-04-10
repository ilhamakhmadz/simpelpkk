<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_jabatan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/jabatan_model');
    }
    public function index()
    {
        $data = $this->jabatan_model->datatables();
        echo $data;
    }
    public function add()
    {
        $data = $this->jabatan_model->add(array(
            'nama_jabatan' => $this->input->post('nama_jabatan'),
        ));
        echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->jabatan_model->delete($id));

        redirect(site_url('master/jabatan'));
    }


    public function edit($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->jabatan_model->edit($id, array(
                'nama_jabatan' => $this->input->post('nama_jabatan')
            )));
        } else {
            throw new Exception('Method not Allowed');
        }
    }
}
