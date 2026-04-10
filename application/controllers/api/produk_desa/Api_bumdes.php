<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_bumdes extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_desa/bumdes_model');
    }
    public function index()
    {
        $data = $this->bumdes_model->datatables();
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $id_bumdes = $this->bumdes_model->add(array(
                'kode_kecamatan' => $this->input->post('kd_kec'),
                'kode_desa' => $this->input->post('kd_desa'),
                'nama' => $this->input->post('nama'),
                'status' => $this->input->post('status'),
                'alamat' => $this->input->post('alamat'),
                'jenis_usaha' => $this->input->post('jenis_usaha'),
                'omset' => $this->input->post('omset'),
                'profit' => $this->input->post('profit'),
                'kontribusi_pad' => $this->input->post('kontribusi_pad'),
                'created_id' => $this->session->userdata('id'),
                'date_year' => date("Y")
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_bumdes);
    }
    public function delete($id)
    {
        redirect(site_url('produk_desa/bumdes'));
        echo json_encode($this->bumdes_model->delete($id));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            $id_bumdes = $this->bumdes_model->edit($id, array(
                'kode_kecamatan' => $this->input->post('kd_kec'),
                'kode_desa' => $this->input->post('kd_desa'),
                'nama' => $this->input->post('nama'),
                'status' => $this->input->post('status'),
                'alamat' => $this->input->post('alamat'),
                'jenis_usaha' => $this->input->post('jenis_usaha'),
                'omset' => $this->input->post('omset'),
                'profit' => $this->input->post('profit'),
                'kontribusi_pad' => $this->input->post('kontribusi_pad'),
                'updated_id' => $this->session->userdata('id'),
                'updated_date' => date('Y-m-d h:i:s'),
                'date_year' => date("Y")
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_bumdes);
    }
}
