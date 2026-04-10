<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_dokumen extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/dokumen_model');
    }
    public function index()
    {
        $data = $this->dokumen_model->datatables();
        echo $data;
    }
    public function add()
    {
        $data = $this->dokumen_model->add(array(
            'nama_dokumen' => $this->input->post('nama_dokumen'),
        ));
        echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->dokumen_model->delete($id));

        redirect(site_url('master/dokumen'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->dokumen_model->edit($id, array(
                'nama_dokumen' => $this->input->post('nama_dokumen')
            )));
        } else {
            throw new Exception('Method not Allowed');
        }
    }
}
