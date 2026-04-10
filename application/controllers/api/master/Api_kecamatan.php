<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_kecamatan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/kecamatan_model');
    }
    public function index()
    {
        $data = $this->kecamatan_model->datatables();
        echo $data;
    }
    public function add()
    {
        $data = $this->kecamatan_model->add(array(
            'Kd_Kec' => $this->input->post('Kd_Kec'),
            'Kd_Kabupaten' => $this->input->post('Kd_Kabupaten'),
            'Nama_Kecamatan' => $this->input->post('Nama_Kecamatan'),
        ));
        echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->kecamatan_model->delete($id));

        redirect(site_url('master/kecamatan'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->kecamatan_model->edit($id, array(
                'Kd_Kec' => $this->input->post('Kd_Kec'),
                'Kd_Kabupaten' => $this->input->post('Kd_Kabupaten'),
                'Nama_Kecamatan' => $this->input->post('Nama_Kecamatan')
            )));
        } else {
            throw new Exception('Method not Allowed');
        }
    }
}
