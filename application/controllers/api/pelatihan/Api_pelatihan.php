<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_pelatihan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelatihan/pelatihan_model');
    }
    public function index()
    {
        $data = $this->pelatihan_model->datatables();
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $data = $this->input->post();
            foreach (json_decode($data['pelatihan']) as $pelatihan) {
                $this->pelatihan_model->add(array(
                    'id_pelatihan' => $pelatihan->jenisPelatihan,
                    'nama' => $pelatihan->namaPelatihan,
                    'peserta' => $pelatihan->pesertaPelatihan,
                    'jumlah' => $pelatihan->jumlahPelatihan,
                    'desa' => $pelatihan->desaPelatihan,
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
        redirect(site_url('pelatihan/pelatihan/view/' . $kode_desa));
        echo json_encode($this->pelatihan_model->delete($id));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            $data = $this->pelatihan_model->edit($id, array(
                'id_pelatihan' => $this->input->post('id_pelatihan'),
                'nama' => $this->input->post('nama'),
                'peserta' => $this->input->post('peserta'),
                'jumlah' => $this->input->post('jumlah'),
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
