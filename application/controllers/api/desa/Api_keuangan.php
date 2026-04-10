<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_keuangan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('desa/keuangan_model');
    }
    public function index()
    {
        $data = $this->keuangan_model->datatables();
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $id_keuangan_desa = $this->keuangan_model->add(array(
                'kode_kecamatan' => $this->input->post('kd_kec'),
                'kode_desa' => $this->input->post('kd_desa'),
                'add' => $this->input->post('add'),
                'adpd' => $this->input->post('adpd'),
                'raksa_desa' => $this->input->post('raksa_desa'),
                'created_id' => $this->session->userdata('id'),
                'date_year' => date("Y")
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_keuangan_desa);
    }
    public function delete($id)
    {
        redirect(site_url('desa/keuangan'));

        echo json_encode($this->keuangan_model->delete($id));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            $id_keuangan_desa = $this->keuangan_model->edit($id, array(
                'kode_kecamatan' => $this->input->post('kd_kec'),
                'kode_desa' => $this->input->post('kd_desa'),
                'add' => $this->input->post('add'),
                'adpd' => $this->input->post('adpd'),
                'raksa_desa' => $this->input->post('raksa_desa'),
                'updated_id' => $this->session->userdata('id'),
                'updated_date' => date('Y-m-d h:i:s'),
                'date_year' => date("Y")
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_keuangan_desa);
    }
}
