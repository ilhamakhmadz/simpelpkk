<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_kerjasama extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('desa/kerjasama_model');
    }
    public function index()
    {
        $data = $this->kerjasama_model->datatables();
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $data = $this->input->post();
            foreach (json_decode($data['kerjasama']) as $kerjasama) {
                $this->kerjasama_model->add(array(
                    'kode_kecamatan' => $this->input->post('kd_kec'),
                    'kode_desa' => $this->input->post('kd_desa'),
                    'bentuk_kerjasama' => $kerjasama->bentukKerjasama,
                    'jenis_kerjasama' => $kerjasama->jenisKerjasama,
                    'nama_pihak' => $kerjasama->namaPihak,
                    'tmt_kerjasama' => $kerjasama->tmtKerjasama,
                    'lembaga_kerjasama' => $kerjasama->lembagaKerjasama,
                    'nomor_perdes' => $kerjasama->nomorPerdes,
                    'lembaga_bumdes' => $kerjasama->lembagaBumdes,
                    'nama_bumdes' => $kerjasama->namaBumdes,
                    'created_id' => $this->session->userdata('id'),
                    'date_year' => date("Y")
                ));
            }
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($data);
    }
    public function delete($id, $kode_desa)
    {
        redirect(site_url('desa/kerjasama/view/'.$kode_desa));

        echo json_encode($this->kerjasama_model->delete($id));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            $data = $this->kerjasama_model->edit($id, array(
                    'kode_kecamatan' => $this->input->post('kd_kec'),
                    'kode_desa' => $this->input->post('kd_desa'),
                    'bentuk_kerjasama' => $this->input->post('bentuk_kerjasama'),
                    'jenis_kerjasama' => $this->input->post('jenis_kerjasama'),
                    'nama_pihak' => $this->input->post('nama_pihak'),
                    'tmt_kerjasama' => $this->input->post('tmt_kerjasama'),
                    'lembaga_kerjasama' => $this->input->post('lembaga_kerjasama'),
                    'nomor_perdes' => $this->input->post('nomor_perdes'),
                    'lembaga_bumdes' => $this->input->post('lembaga_bumdes'),
                    'nama_bumdes' => $this->input->post('nama_bumdes'),
                    'updated_id' => $this->session->userdata('id'),
                    'updated_date' => date('Y-m-d h:i:s'),
                    'date_year' => date("Y")
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($data);
    }
}
