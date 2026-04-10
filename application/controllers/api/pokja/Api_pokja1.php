<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_pokja1 extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pokja/pokja1_model');
    }
    public function kecamatan()
    {
        $data = $this->pokja1_model->datatables_kecamatan(1);
        echo $data;
    }
    public function desa()
    {
        $data = $this->pokja1_model->datatables_kecamatan(2);
        echo $data;
    }
    public function dusun()
    {
        $data = $this->pokja1_model->datatables_kecamatan(3);
        echo $data;
    }
    public function rw()
    {
        $data = $this->pokja1_model->datatables_kecamatan(4);
        echo $data;
    }
    public function rt()
    {
        $data = $this->pokja1_model->datatables_kecamatan(5);
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $id_pokja1 = $this->pokja1_model->add(array(
                'level' => $this->input->post('level'),
                'kode_kecamatan' => $this->input->post('kode_kecamatan'),
                'kode_desa' => $this->input->post('kode_desa'),
                'dusun' => $this->input->post('kd_dusun'),
                'rw' => $this->input->post('kd_rw'),
                'rt' => $this->input->post('kd_rt'),
                'kader_pkdrt' => $this->input->post('kader_pkdrt'),
                'kader_pkbn' => $this->input->post('kader_pkbn'),
                'kader_polaasuh' => $this->input->post('kader_polaasuh'),
                'pkbn_klpsimulasi' => $this->input->post('pkbn_klpsimulasi'),
                'pkbn_angg' => $this->input->post('pkbn_angg'),
                'pkdrt_klpsimulasi' => $this->input->post('pkdrt_klpsimulasi'),
                'pkdrt_angg' => $this->input->post('pkdrt_angg'),
                'polaasuh_klp' => $this->input->post('polaasuh_klp'),
                'polaasuh_anggota' => $this->input->post('polaasuh_anggota'),
                'lansia_klp' => $this->input->post('lansia_klp'),
                'lansia_angg' => $this->input->post('lansia_angg'),
                'kelompok_kerjabakti' => $this->input->post('kelompok_kerjabakti'),
                'kelompok_kematian' => $this->input->post('kelompok_kematian'),
                'kelompok_keagamaan' => $this->input->post('kelompok_keagamaan'),
                'kelompok_jimpitan' => $this->input->post('kelompok_jimpitan'),
                'kelompok_arisan' => $this->input->post('kelompok_arisan'),
                'keterangan' => $this->input->post('keterangan'),
                'created_id' => $this->session->userdata('id'),
                'date_year' => date("Y")
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_pokja1);
    }
    public function delete($id)
    {
        $data = $this->pokja1_model->delete($id);
        redirect(site_url('pokja/pokja1'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            $id_aparatur_desa = $this->pokja1_model->edit($id, array(
                'kader_pkdrt' => $this->input->post('kader_pkdrt'),
                'kader_pkbn' => $this->input->post('kader_pkbn'),
                'kader_polaasuh' => $this->input->post('kader_polaasuh'),
                'pkbn_klpsimulasi' => $this->input->post('pkbn_klpsimulasi'),
                'pkbn_angg' => $this->input->post('pkbn_angg'),
                'pkdrt_klpsimulasi' => $this->input->post('pkdrt_klpsimulasi'),
                'pkdrt_angg' => $this->input->post('pkdrt_angg'),
                'polaasuh_klp' => $this->input->post('polaasuh_klp'),
                'polaasuh_anggota' => $this->input->post('polaasuh_anggota'),
                'lansia_klp' => $this->input->post('lansia_klp'),
                'lansia_angg' => $this->input->post('lansia_angg'),
                'kelompok_kerjabakti' => $this->input->post('kelompok_kerjabakti'),
                'kelompok_kematian' => $this->input->post('kelompok_kematian'),
                'kelompok_keagamaan' => $this->input->post('kelompok_keagamaan'),
                'kelompok_jimpitan' => $this->input->post('kelompok_jimpitan'),
                'kelompok_arisan' => $this->input->post('kelompok_arisan'),
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
        echo json_encode($this->pokja1_model->check_kecamatan($year, $kec));
    }
    public function get_kecamatan($year, $kec)
    {
        echo json_encode($this->pokja1_model->get_kecamatan($year, $kec));
    }
    public function check_desa($year, $kec, $desa)
    {
        echo json_encode($this->pokja1_model->check_desa($year, $kec, $desa));
    }
    public function get_desa($year, $kec, $desa)
    {
        echo json_encode($this->pokja1_model->get_desa($year, $kec, $desa));
    }
    public function check_dusun($year, $kec,$desa,$dusun)
    {
        echo json_encode($this->pokja1_model->check_dusun($year,$kec,$desa,$dusun));
    }
    public function get_dusun($year, $kec,$desa,$dusun)
    {
        echo json_encode($this->pokja1_model->get_dusun($year,$kec,$desa,$dusun));
    }
    public function check_rw($year, $kec,$desa,$dusun,$rw)
    {
        echo json_encode($this->pokja1_model->check_rw($year,$kec,$desa,$dusun,$rw));
    }
    public function get_rw($year,$kec,$desa,$dusun,$rw)
    {
        echo json_encode($this->pokja1_model->get_rw($year,$kec,$desa,$dusun,$rw));
    }
    public function check_rt($year, $kec,$desa,$dusun,$rw,$rt)
    {
        echo json_encode($this->pokja1_model->check_rt($year,$kec,$desa,$dusun,$rw,$rt));
    }
    public function get_rt($year, $kec,$desa,$dusun,$rw,$rt)
    {
        echo json_encode($this->pokja1_model->get_rt($year,$kec,$desa,$dusun,$rw,$rt));
    }
}
