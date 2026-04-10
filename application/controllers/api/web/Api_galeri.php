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
        $this->load->model('web/galeri_model');
    }
    public function index()
    {
        $data = $this->galeri_model->datatables();
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $data = $this->galeri_model->add(array(
                'nama' => $this->input->post('nama'),
                'id_galeri' => $this->input->post('galeri'),
                'file' => $this->input->post('file'),
                'created_id' => $this->session->userdata('id')
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->galeri_model->delete($id));

        redirect(site_url('web/galeri'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            if (!empty($this->input->post('file'))) {
                // 'old_img' => ,
                $filename =  realpath(base64_decode($this->input->post('file_remove')));
                unlink($filename);
                $data = $this->galeri_model->edit($id, array(
                    'nama' => $this->input->post('nama'),
                    'id_galeri' => $this->input->post('galeri'),
                    'file' => $this->input->post('file'),
                    'updated_id' => $this->session->userdata('id'),
                    'updated_date' => date('Y-m-d h:i:s')
                ));
            } else {
                $data = $this->galeri_model->edit($id, array(
                    'nama' => $this->input->post('nama'),
                    'id_galeri' => $this->input->post('galeri'),
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
