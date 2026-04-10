<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_pokja4 extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pokja/pokja4_model');
    }
    public function kecamatan()
    {
        $data = $this->pokja4_model->datatables_kecamatan(1);
        echo $data;
    }
    public function desa()
    {
        $data = $this->pokja4_model->datatables_kecamatan(2);
        echo $data;
    }
    public function dusun()
    {
        $data = $this->pokja4_model->datatables_kecamatan(3);
        echo $data;
    }
    public function rw()
    {
        $data = $this->pokja4_model->datatables_kecamatan(4);
        echo $data;
    }
    public function rt()
    {
        $data = $this->pokja4_model->datatables_kecamatan(5);
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $id_pokja4 = $this->pokja4_model->add(array(
                'level' => $this->input->post('level'),
                'kode_kecamatan' => $this->input->post('kode_kecamatan'),
                'kode_desa' => $this->input->post('kode_desa'),
                'dusun' => $this->input->post('kd_dusun'),
                'rw' => $this->input->post('kd_rw'),
                'rt' => $this->input->post('kd_rt'),
                'kader_posyandu' => $this->input->post('kader_posyandu'),
                'kader_gizi' => $this->input->post('kader_gizi'),
                'kader_kesling' => $this->input->post('kader_kesling'),
                'kader_penyuluhan_narkoba' => $this->input->post('kader_penyuluhan_narkoba'),
                'kader_phbs' => $this->input->post('kader_phbs'),
                'kader_kb' => $this->input->post('kader_kb'),
                'kes_posyandu_jml' => $this->input->post('kes_posyandu_jml'),
                'kes_posyandu_terintegrasi' => $this->input->post('kes_posyandu_terintegrasi'),
                'kes_posyandu_klp' => $this->input->post('kes_posyandu_klp'),
                'kes_posyandu_lansia_anggota' => $this->input->post('kes_posyandu_lansia_anggota'),
                'kes_posyandu_lansia_kartu_gratis' => $this->input->post('kes_posyandu_lansia_kartu_gratis'),
                'rumah_jamban' => $this->input->post('rumah_jamban'),
                'rumah_spai' => $this->input->post('rumah_spai'),
                'rumah_pembuangan_sampah' => $this->input->post('rumah_pembuangan_sampah'),
                'jml_mck' => $this->input->post('jml_mck'),
                'krt_pdam' => $this->input->post('krt_pdam'),
                'krt_sumur' => $this->input->post('krt_sumur'),
                'krt_lainnya' => $this->input->post('krt_lainnya'),
                'jum_pus' => $this->input->post('jum_pus'),
                'jum_wus' => $this->input->post('jum_wus'),
                'akseptor_kb_l' => $this->input->post('akseptor_kb_l'),
                'akseptor_kb_p' => $this->input->post('akseptor_kb_p'),
                'pnya_tab_keluarga' => $this->input->post('pnya_tab_keluarga'),
                'keterangan' => $this->input->post('keterangan'),
                'created_id' => $this->session->userdata('id'),
                'date_year' => date("Y")
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_pokja4);
    }
    public function delete($id)
    {
        $data = $this->pokja4_model->delete($id);
        redirect(site_url('pokja/pokja4'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            $id_aparatur_desa = $this->pokja4_model->edit($id, array(
                'kader_posyandu' => $this->input->post('kader_posyandu'),
                'kader_gizi' => $this->input->post('kader_gizi'),
                'kader_kesling' => $this->input->post('kader_kesling'),
                'kader_penyuluhan_narkoba' => $this->input->post('kader_penyuluhan_narkoba'),
                'kader_phbs' => $this->input->post('kader_phbs'),
                'kader_kb' => $this->input->post('kader_kb'),
                'kes_posyandu_jml' => $this->input->post('kes_posyandu_jml'),
                'kes_posyandu_terintegrasi' => $this->input->post('kes_posyandu_terintegrasi'),
                'kes_posyandu_klp' => $this->input->post('kes_posyandu_klp'),
                'kes_posyandu_lansia_anggota' => $this->input->post('kes_posyandu_lansia_anggota'),
                'kes_posyandu_lansia_kartu_gratis' => $this->input->post('kes_posyandu_lansia_kartu_gratis'),
                'rumah_jamban' => $this->input->post('rumah_jamban'),
                'rumah_spai' => $this->input->post('rumah_spai'),
                'rumah_pembuangan_sampah' => $this->input->post('rumah_pembuangan_sampah'),
                'jml_mck' => $this->input->post('jml_mck'),
                'krt_pdam' => $this->input->post('krt_pdam'),
                'krt_sumur' => $this->input->post('krt_sumur'),
                'krt_lainnya' => $this->input->post('krt_lainnya'),
                'jum_pus' => $this->input->post('jum_pus'),
                'jum_wus' => $this->input->post('jum_wus'),
                'akseptor_kb_l' => $this->input->post('akseptor_kb_l'),
                'akseptor_kb_p' => $this->input->post('akseptor_kb_p'),
                'pnya_tab_keluarga' => $this->input->post('pnya_tab_keluarga'),
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
        echo json_encode($this->pokja4_model->check_kecamatan($year, $kec));
    }
    public function get_kecamatan($year, $kec)
    {
        echo json_encode($this->pokja4_model->get_kecamatan($year, $kec));
    }
    public function check_desa($year, $kec, $desa)
    {
        echo json_encode($this->pokja4_model->check_desa($year, $kec, $desa));
    }
    public function get_desa($year, $kec, $desa)
    {
        echo json_encode($this->pokja4_model->get_desa($year, $kec, $desa));
    }
    public function check_dusun($year, $kec,$desa,$dusun)
    {
        echo json_encode($this->pokja4_model->check_dusun($year,$kec,$desa,$dusun));
    }
    public function get_dusun($year, $kec,$desa,$dusun)
    {
        echo json_encode($this->pokja4_model->get_dusun($year,$kec,$desa,$dusun));
    }
    public function check_rw($year, $kec,$desa,$dusun,$rw)
    {
        echo json_encode($this->pokja4_model->check_rw($year,$kec,$desa,$dusun,$rw));
    }
    public function get_rw($year,$kec,$desa,$dusun,$rw)
    {
        echo json_encode($this->pokja4_model->get_rw($year,$kec,$desa,$dusun,$rw));
    }
    public function check_rt($year, $kec,$desa,$dusun,$rw,$rt)
    {
        echo json_encode($this->pokja4_model->check_rt($year,$kec,$desa,$dusun,$rw,$rt));
    }
    public function get_rt($year, $kec,$desa,$dusun,$rw,$rt)
    {
        echo json_encode($this->pokja4_model->get_rt($year,$kec,$desa,$dusun,$rw,$rt));
    }
}
