<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_dusun extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/desa_model');
        $this->load->model('master/dusun_model');
        $this->load->model('master/rt_model');
        $this->load->model('master/rw_model');
    }
    public function index()
    {
        $data = $this->desa_model->datatables();
        echo $data;
    }
    public function add()
    {
        $data = $this->desa_model->add(array(
            'Kd_Kec' => $this->input->post('Kd_Kec'),
            'Kd_Desa' => $this->input->post('Kd_Desa'),
            'Nama_Desa' => $this->input->post('Nama_Desa'),
                ));
        echo json_encode($data);
    }
    public function add_dusun()
    {
        $data = $this->desa_model->add_dusun(array(
            'Kd_Kec' => $this->input->post('Kd_Kec'),
            'Kd_Desa' => $this->input->post('Kd_Desa'),
            'dusun' => strtoupper($this->input->post('dusun')),
                ));
        echo json_encode($data);
    }
    public function add_rt()
    {
        $data = $this->desa_model->add_rt(array(
            'Kd_Kec' => $this->input->post('Kd_Kec'),
            'Kd_Desa' => $this->input->post('Kd_Desa'),
            'rt' => str_pad($this->input->post('rt'), 3, '0', STR_PAD_LEFT),
                ));
        echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->desa_model->delete($id));

        redirect(site_url('master/desa'));
    }
    public function delete_list($id)
    {
        $kd_kec = $this->desa_model->delete($id);
        redirect(site_url('master/kecamatan/detail/'.$kd_kec->Kd_Kec));
    }

    public function delete_list_dusun($id,$kd)
    {
        $kd_kec = $this->dusun_model->delete($id);
        redirect(site_url('master/kecamatan/detail_dusun/'.$kd));
    }

    public function delete_rt($id,$kd)
    {
        $kd_desa = $this->rt_model->delete($id);
        // var_dump($kd_desa) or die;
        redirect(site_url('master/kecamatan/detail_rt/'.$kd));
    }

    public function delete_rw($id,$kd,$rt)
    {
        $kd_desa = $this->rw_model->delete($id);
        // var_dump($kd_desa) or die;
        redirect(site_url('master/kecamatan/detail_rw/'.$kd.'/'.str_pad($rt, 3, '0', STR_PAD_LEFT)));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->desa_model->edit($id, array(
                'Kd_Kec' => $this->input->post('Kd_Kec'),
                'Kd_Desa' => $this->input->post('Kd_Desa'),
                'Nama_Desa' => $this->input->post('Nama_Desa'),
         )));
        } else {
            throw new Exception('Method not Allowed');
        }
    }
}
