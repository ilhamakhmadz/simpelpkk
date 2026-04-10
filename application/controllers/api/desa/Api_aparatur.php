<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_aparatur extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('desa/aparatur_model');
    }
    public function kecamatan()
    {
        $data = $this->aparatur_model->datatables_kecamatan(1);
        echo $data;
    }
    public function desa()
    {
        $data = $this->aparatur_model->datatables_kecamatan(2);
        echo $data;
    }
    public function dusun()
    {
        $data = $this->aparatur_model->datatables_kecamatan(3);
        echo $data;
    }
    public function rw()
    {
        $data = $this->aparatur_model->datatables_kecamatan(4);
        echo $data;
    }
    public function rt()
    {
        $data = $this->aparatur_model->datatables_kecamatan(5);
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $id_aparatur_desa = $this->aparatur_model->add(array(
                'kode_kecamatan' => $this->input->post('kd_kec'),
                'kode_desa' => $this->input->post('kd_desa'),
                'level' => $this->input->post('level'),
                'kepala_desa' => $this->input->post('kepala_desa'),
                'sekertariat_desa' => $this->input->post('sekertariat_desa'),
                'kaur_tu' => $this->input->post('kaur_tu'),
                'kaur_perencanaan' => $this->input->post('kaur_perencanaan'),
                'kaur_keuangan' => $this->input->post('kaur_keuangan'),
                'seksi_pemerintahan' => $this->input->post('seksi_pemerintahan'),
                'seksi_kerjasama' => $this->input->post('seksi_kerjasama'),
                'seksi_pelayanan' => $this->input->post('seksi_pelayanan'),
                'staf_1' => $this->input->post('staf_1'),
                'staf_2' => $this->input->post('staf_2'),
                'staf_3' => $this->input->post('staf_3'),
                'created_id' => $this->session->userdata('id'),
                'date_year' => date("Y")
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_aparatur_desa);
    }
    public function delete($id)
    {
        json_encode($this->aparatur_model->delete($id));
        redirect(site_url('desa/aparatur'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            $id_aparatur_desa = $this->aparatur_model->edit($id, array(
                'kepala_desa' => $this->input->post('kepala_desa'),
                'sekertariat_desa' => $this->input->post('sekertariat_desa'),
                'kaur_tu' => $this->input->post('kaur_tu'),
                'kaur_perencanaan' => $this->input->post('kaur_perencanaan'),
                'kaur_keuangan' => $this->input->post('kaur_keuangan'),
                'seksi_pemerintahan' => $this->input->post('seksi_pemerintahan'),
                'seksi_kerjasama' => $this->input->post('seksi_kerjasama'),
                'seksi_pelayanan' => $this->input->post('seksi_pelayanan'),
                'staf_1' => $this->input->post('staf_1'),
                'staf_2' => $this->input->post('staf_2'),
                'staf_3' => $this->input->post('staf_3'),
                'updated_id' => $this->session->userdata('id'),
                'updated_date' => date('Y-m-d h:i:s'),
                'date_year' => date("Y")
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_aparatur_desa);
    }
    public function validKodeKec($kec)
    {
        $data = $this->aparatur_model->validKodeKec($kec);
        echo json_encode($data);
    }

    public function validKodeDesa($desa)
    {
        $data = $this->aparatur_model->validKodeDesa($desa);
        echo json_encode($data);
    }
}
