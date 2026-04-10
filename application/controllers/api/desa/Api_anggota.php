<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_anggota extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('desa/anggota_model');
        $this->load->model('desa/aparatur_model');
    }
    public function kecamatan()
    {
        $data = $this->anggota_model->datatables_kecamatan(1);
        echo $data;
    }
    public function desa()
    {
        $data = $this->anggota_model->datatables_kecamatan(2);
        echo $data;
    }
    public function dusun()
    {
        $data = $this->anggota_model->datatables_kecamatan(3);
        echo $data;
    }
    public function rw()
    {
        $data = $this->anggota_model->datatables_kecamatan(4);
        echo $data;
    }
    public function rt()
    {
        $data = $this->anggota_model->datatables_kecamatan(5);
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $id_aparatur_desa = $this->anggota_model->add(array(
                'level' => $this->input->post('level'),
                'kode_kecamatan' => $this->input->post('kode_kecamatan'),
                'kode_desa' => $this->input->post('kode_desa'),
                'dusun' => $this->input->post('dusun'),
                'rw' => $this->input->post('rw'),
                'rt' => $this->input->post('rt'),
                'nik' => $this->input->post('nik'),
                'kk' => $this->input->post('kk'),
                'date_year' => $this->input->post('date_year'),
                'no_reg_tp_pkk' => $this->input->post('no_reg_tp_pkk'),
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'jabatan' => $this->input->post('jabatan'),
                'kedudukan_fungsi' => $this->input->post('kedudukan_fungsi'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'status' => $this->input->post('status'),
                'alamat' => $this->input->post('alamat'),
                'pendidikan' => $this->input->post('pendidikan'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'keterangan' => $this->input->post('keterangan'),
                'created_id' => $this->session->userdata('id'),
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_aparatur_desa);
        
    }
    public function delete($id)
    {
        $anggota = $this->anggota_model->delete($id);
        if($anggota->level == 'kecamatan'){
            $aparatur = $this->aparatur_model->get_kode_kec($anggota->date_year,$anggota->kode_kecamatan);
        }else if($anggota->level == 'desa'){
            $aparatur = $this->aparatur_model->get_kode_desa($anggota->date_year,$anggota->kode_kecamatan,$anggota->kode_desa);
        }else if($anggota->level == 'dusun'){
            $aparatur = $this->aparatur_model->get_kode_dusun($anggota->date_year,$anggota->kode_kecamatan,$anggota->kode_desa,$anggota->dusun);
        }else if($anggota->level == 'rw'){
            $aparatur = $this->aparatur_model->get_kode_rw($anggota->date_year,$anggota->kode_kecamatan,$anggota->kode_desa,$anggota->dusun,$anggota->rw);
        }else if($anggota->level == 'rt'){
            $aparatur = $this->aparatur_model->get_kode_rt($anggota->date_year,$anggota->kode_kecamatan,$anggota->kode_desa,$anggota->dusun,$anggota->rw,$anggota->rt);
        }
        redirect(site_url('desa/anggota/detail/'.$aparatur->id));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            $id_aparatur_desa = $this->anggota_model->edit($id, array(
                'nik' => $this->input->post('nik'),
                'kk' => $this->input->post('kk'),
                'no_reg_tp_pkk' => $this->input->post('no_reg_tp_pkk'),
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'jabatan' => $this->input->post('jabatan'),
                'kedudukan_fungsi' => $this->input->post('kedudukan_fungsi'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'status' => $this->input->post('status'),
                'alamat' => $this->input->post('alamat'),
                'pendidikan' => $this->input->post('pendidikan'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'keterangan' => $this->input->post('keterangan'),
                'updated_id' => $this->session->userdata('id'),
                'updated_date' => date('Y-m-d h:i:s')
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_aparatur_desa);
    }
}
