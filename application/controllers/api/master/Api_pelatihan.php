<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_pelatihan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/pelatihan_model');
    }
    public function index()
    {
        $data = $this->pelatihan_model->datatables();
        echo $data;
    }
    public function add()
    {
        $data = $this->pelatihan_model->add(array(
            'nama_pelatihan' => $this->input->post('nama_pelatihan'),
        ));
        echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->pelatihan_model->delete($id));

        redirect(site_url('master/pelatihan'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->pelatihan_model->edit($id, array(
                'nama_pelatihan' => $this->input->post('nama_pelatihan')
            )));
        } else {
            throw new Exception('Method not Allowed');
        }
    }
}
