<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_pegawai extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('web/pegawai_model');
    }
    public function index()
    {
        $data = $this->pegawai_model->datatables();
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $data = $this->pegawai_model->add(array(
                'nama' => $this->input->post('nama'),
                'nip' => $this->input->post('nip'),
                'id_jabatan' => $this->input->post('jabatan'),
                'gambar' => $this->input->post('gambar'),
                'created_id' => $this->session->userdata('id')
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->pegawai_model->delete($id));
        redirect(site_url('web/pegawai'));

    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            if (!empty($this->input->post('gambar'))) {
                // 'old_img' => ,
                $filename =  realpath(base64_decode($this->input->post('gambar_remove')));
                unlink($filename);
                $data = $this->pegawai_model->edit($id, array(
                    'nama' => $this->input->post('nama'),
                    'nip' => $this->input->post('nip'),
                    'id_jabatan' => $this->input->post('jabatan'),
                    'gambar' => $this->input->post('gambar'),
                   
                    'updated_id' => $this->session->userdata('id'),
                    'updated_date' => date('Y-m-d h:i:s')
                ));
            } else {
                $data = $this->pegawai_model->edit($id, array(
                    'nama' => $this->input->post('nama'),
                    'nip' => $this->input->post('nip'),
                    'id_jabatan' => $this->input->post('jabatan'),
                    'updated_id' => $this->session->userdata('id'),
                    'updated_date' => date('Y-m-d h:i:s')
                ));
            }
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($data);
    }
}
