<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_pokja3 extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pokja/pokja3_model');
    }
    public function kecamatan()
    {
        $data = $this->pokja3_model->datatables_kecamatan(1);
        echo $data;
    }
    public function desa()
    {
        $data = $this->pokja3_model->datatables_kecamatan(2);
        echo $data;
    }
    public function dusun()
    {
        $data = $this->pokja3_model->datatables_kecamatan(3);
        echo $data;
    }
    public function rw()
    {
        $data = $this->pokja3_model->datatables_kecamatan(4);
        echo $data;
    }
    public function rt()
    {
        $data = $this->pokja3_model->datatables_kecamatan(5);
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $id_pokja3 = $this->pokja3_model->add(array(
                'level' => $this->input->post('level'),
                'kode_kecamatan' => $this->input->post('kode_kecamatan'),
                'kode_desa' => $this->input->post('kode_desa'),
                'dusun' => $this->input->post('kd_dusun'),
                'rw' => $this->input->post('kd_rw'),
                'rt' => $this->input->post('kd_rt'),
                'kader_pangan' => $this->input->post('kader_pangan'),
                'kader_sandang' => $this->input->post('kader_sandang'),
                'kader_tatalaksana_rumahtangga' => $this->input->post('kader_tatalaksana_rumahtangga'),
                'pangan_beras' => $this->input->post('pangan_beras'),
                'pangan_nonberas' => $this->input->post('pangan_nonberas'),
                'pangan_peternakan' => $this->input->post('pangan_peternakan'),
                'pangan_perikanan' => $this->input->post('pangan_perikanan'),
                'pangan_warunghidup' => $this->input->post('pangan_warunghidup'),
                'pangan_lumbunghidup' => $this->input->post('pangan_lumbunghidup'),
                'pangan_toga' => $this->input->post('pangan_toga'),
                'pangan_tanaman_keras' => $this->input->post('pangan_tanaman_keras'),
                'industri_pangan' => $this->input->post('industri_pangan'),
                'insdustri_sandang' => $this->input->post('insdustri_sandang'),
                'industri_jasa' => $this->input->post('industri_jasa'),
                'rumah_sehat' => $this->input->post('rumah_sehat'),
                'rumah_tidaksehat' => $this->input->post('rumah_tidaksehat'),
                'keterangan' => $this->input->post('keterangan'),
                'created_id' => $this->session->userdata('id'),
                'date_year' => date("Y")
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_pokja3);
    }
    public function delete($id)
    {
        $data = $this->pokja3_model->delete($id);
        redirect(site_url('pokja/pokja3'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            $id_aparatur_desa = $this->pokja3_model->edit($id, array(
                'kader_pangan' => $this->input->post('kader_pangan'),
                'kader_sandang' => $this->input->post('kader_sandang'),
                'kader_tatalaksana_rumahtangga' => $this->input->post('kader_tatalaksana_rumahtangga'),
                'pangan_beras' => $this->input->post('pangan_beras'),
                'pangan_nonberas' => $this->input->post('pangan_nonberas'),
                'pangan_peternakan' => $this->input->post('pangan_peternakan'),
                'pangan_perikanan' => $this->input->post('pangan_perikanan'),
                'pangan_warunghidup' => $this->input->post('pangan_warunghidup'),
                'pangan_lumbunghidup' => $this->input->post('pangan_lumbunghidup'),
                'pangan_toga' => $this->input->post('pangan_toga'),
                'pangan_tanaman_keras' => $this->input->post('pangan_tanaman_keras'),
                'industri_pangan' => $this->input->post('industri_pangan'),
                'insdustri_sandang' => $this->input->post('insdustri_sandang'),
                'industri_jasa' => $this->input->post('industri_jasa'),
                'rumah_sehat' => $this->input->post('rumah_sehat'),
                'rumah_tidaksehat' => $this->input->post('rumah_tidaksehat'),
                'keterangan' => $this->input->post('keterangan'),
                'updated_id' => $this->session->userdata('id'),
                'updated_date' => date('Y-m-d h:i:s')
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_aparatur_desa);
    }
    public function check_kecamatan($year, $kec)
    {
        echo json_encode($this->pokja3_model->check_kecamatan($year, $kec));
    }
    public function get_kecamatan($year, $kec)
    {
        echo json_encode($this->pokja3_model->get_kecamatan($year, $kec));
    }
    public function check_desa($year, $kec, $desa)
    {
        echo json_encode($this->pokja3_model->check_desa($year, $kec, $desa));
    }
    public function get_desa($year, $kec, $desa)
    {
        echo json_encode($this->pokja3_model->get_desa($year, $kec, $desa));
    }
    public function check_dusun($year, $kec,$desa,$dusun)
    {
        echo json_encode($this->pokja3_model->check_dusun($year,$kec,$desa,$dusun));
    }
    public function get_dusun($year, $kec,$desa,$dusun)
    {
        echo json_encode($this->pokja3_model->get_dusun($year,$kec,$desa,$dusun));
    }
    public function check_rw($year, $kec,$desa,$dusun,$rw)
    {
        echo json_encode($this->pokja3_model->check_rw($year,$kec,$desa,$dusun,$rw));
    }
    public function get_rw($year,$kec,$desa,$dusun,$rw)
    {
        echo json_encode($this->pokja3_model->get_rw($year,$kec,$desa,$dusun,$rw));
    }
    public function check_rt($year, $kec,$desa,$dusun,$rw,$rt)
    {
        echo json_encode($this->pokja3_model->check_rt($year,$kec,$desa,$dusun,$rw,$rt));
    }
    public function get_rt($year, $kec,$desa,$dusun,$rw,$rt)
    {
        echo json_encode($this->pokja3_model->get_rt($year,$kec,$desa,$dusun,$rw,$rt));
    }
}
