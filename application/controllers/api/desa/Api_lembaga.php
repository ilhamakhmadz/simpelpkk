<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_lembaga extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('desa/lembaga_model');
    }
    public function index()
    {
        $data = $this->lembaga_model->datatables();
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $id_lembaga_desa = $this->lembaga_model->add(array(
                'kode_kecamatan' => $this->input->post('kd_kec'),
                'kode_desa' => $this->input->post('kd_desa'),
                'rt' => $this->input->post('rt'),
                'rt_aktif' => $this->input->post('rt_aktif'),
                'rw' => $this->input->post('rw'),
                'rw_aktif' => $this->input->post('rw_aktif'),
                'pkk' => $this->input->post('pkk'),
                'pkk_aktif' => $this->input->post('pkk_aktif'),
                'posyandu' => $this->input->post('posyandu'),
                'posyandu_aktif' => $this->input->post('posyandu_aktif'),
                'lpm' => $this->input->post('lpm'),
                'lpm_aktif' => $this->input->post('lpm_aktif'),
                'karang_taruna' => $this->input->post('karang_taruna'),
                'karang_taruna_aktif' => $this->input->post('karang_taruna_aktif'),
                'kampung_budaya' => $this->input->post('kampung_budaya'),
                'kampung_budaya_aktif' => $this->input->post('kampung_budaya_aktif'),
                'created_id' => $this->session->userdata('id'),
                'date_year' => date("Y")
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_lembaga_desa);
    }
    public function delete($id)
    {
        redirect(site_url('desa/lembaga'));

        echo json_encode($this->lembaga_model->delete($id));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            $id_lembaga_desa = $this->lembaga_model->edit($id, array(
                'kode_kecamatan' => $this->input->post('kd_kec'),
                'kode_desa' => $this->input->post('kd_desa'),
                'rt' => $this->input->post('rt'),
                'rt_aktif' => $this->input->post('rt_aktif'),
                'rw' => $this->input->post('rw'),
                'rw_aktif' => $this->input->post('rw_aktif'),
                'pkk' => $this->input->post('pkk'),
                'pkk_aktif' => $this->input->post('pkk_aktif'),
                'posyandu' => $this->input->post('posyandu'),
                'posyandu_aktif' => $this->input->post('posyandu_aktif'),
                'lpm' => $this->input->post('lpm'),
                'lpm_aktif' => $this->input->post('lpm_aktif'),
                'karang_taruna' => $this->input->post('karang_taruna'),
                'karang_taruna_aktif' => $this->input->post('karang_taruna_aktif'),
                'kampung_budaya' => $this->input->post('kampung_budaya'),
                'kampung_budaya_aktif' => $this->input->post('kampung_budaya_aktif'),
                'updated_id' => $this->session->userdata('id'),
                'updated_date' => date('Y-m-d h:i:s'),
                'date_year' => date("Y")
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_lembaga_desa);
    }
}
