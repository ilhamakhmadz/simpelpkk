<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_desa extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/desa_model');
        $this->load->model('master/dusun_model');
        $this->load->model('master/rw_model');
        $this->load->model('master/rt_model');
        $this->load->model('master/dasawisma_model');
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
    public function add_rw()
    {
        $data = $this->desa_model->add_rw(array(
            'Kd_Kec' => $this->input->post('Kd_Kec'),
            'Kd_Desa' => $this->input->post('Kd_Desa'),
            'Kd_Dusun' => $this->input->post('Kd_Dusun'),
            'rw' => str_pad($this->input->post('rw'), 3, '0', STR_PAD_LEFT),
                ));
        echo json_encode($data);
    }

    public function add_rt()
    {
        $data = $this->desa_model->add_rt(array(
            'Kd_Kec' => $this->input->post('Kd_Kec'),
            'Kd_Desa' => $this->input->post('Kd_Desa'),
            'Kd_Dusun' => $this->input->post('Kd_Dusun'),
            'rw' => $this->input->post('rw'),
            'rt' => str_pad($this->input->post('rt'), 3, '0', STR_PAD_LEFT),
                ));
        echo json_encode($data);
    }
    public function add_dasawisma()
    {
        $data = $this->dasawisma_model->add(array(
            'Kd_Kec' => $this->input->post('Kd_Kec'),
            'Kd_Desa' => $this->input->post('Kd_Desa'),
            'Kd_Dusun' => $this->input->post('Kd_Dusun'),
            'rw' => $this->input->post('rw'),
            'rt' => $this->input->post('rt'),
            'dasawisma' => $this->input->post('dasawisma'),
                ));
        echo json_encode($data);
    }

    public function edit_dasawisma($id)
    {
        $data = $this->dasawisma_model->edit($id,array(
            'Kd_Kec' => $this->input->post('Kd_Kec'),
            'Kd_Desa' => $this->input->post('Kd_Desa'),
            'Kd_Dusun' => $this->input->post('Kd_Dusun'),
            'rw' => $this->input->post('rw'),
            'rt' => $this->input->post('rt'),
            'dasawisma' => $this->input->post('dasawisma'),
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

    public function delete_list_dusun($kd,$id)
    {
        $kd_kec = $this->dusun_model->delete($id);
        redirect(site_url('master/kecamatan/detail_dusun/'.$kd));
    }

    public function delete_rw($desa,$dusun,$rw)
    {
        $kd_desa = $this->rw_model->delete($rw);
        // var_dump($kd_desa) or die;
        redirect(site_url('master/kecamatan/detail_rw/'.$desa.'/'.$dusun));
    }

    public function delete_rt($id, $kd, $dusun, $rw)
    {
        $kd_desa = $this->rt_model->delete($id);
        // var_dump($kd_desa) or die;
        redirect(site_url('master/kecamatan/detail_rt/'.$kd.'/'.$dusun.'/'.str_pad($rw, 3, '0', STR_PAD_LEFT)));
    }
    public function delete_dasawisma($id, $kd, $dusun, $rw, $rt)
    {
        $kd_desa = $this->dasawisma_model->delete($id);
        redirect(site_url('master/kecamatan/detail_dasawisma/'.$kd.'/'.$dusun.'/'.str_pad($rw, 3, '0', STR_PAD_LEFT).'/'.str_pad($rt, 3, '0', STR_PAD_LEFT)));
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
