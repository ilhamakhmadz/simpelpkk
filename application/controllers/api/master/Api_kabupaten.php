<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_kabupaten extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/kabupaten_model');
    }
    public function add()
    {
        $data = $this->kabupaten_model->add(array(
            'kd_kabupaten' => $this->input->post('kd_kabupaten'),
            'nama_kabupaten' => $this->input->post('nama_kabupaten'),
            'created_by' => $this->session->userdata('id')
                ));
        echo json_encode($data);
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->kabupaten_model->edit($id, array(
            'kd_kabupaten' => $this->input->post('kd_kabupaten'),
            'nama_kabupaten' => $this->input->post('nama_kabupaten'),
            'updated_by' => $this->session->userdata('id'),
            'updated_date' => date('Y-m-d h:i:s')
         )));
        } else {
            throw new Exception('Method not Allowed');
        }
    }



    public function delete($id)
    {
        redirect(site_url('perencanaan/renstra/visi'));

        echo json_encode($this->visi_model->delete($id));
    }
}
