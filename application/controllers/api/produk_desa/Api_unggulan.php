<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_unggulan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_desa/unggulan_model');
    }
    public function index()
    {
        $data = $this->unggulan_model->datatables();
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $data = $this->input->post();
            foreach (json_decode($data['unggulan']) as $unggulan) {
                $this->unggulan_model->add(array(
                    'kode_kecamatan' => $this->input->post('kd_kec'),
                    'kode_desa' => $this->input->post('kd_desa'),
                    'nama_produk' => $unggulan->namaProduk,
                    'harga_produk' => $unggulan->hargaProduk,
                    'deskripsi_produk' => $unggulan->deskripsiProduk,
                    'gambar_produk' => $unggulan->gambarProduk,
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
        redirect(site_url('produk_desa/unggulan/view/' . $kode_desa));
        echo json_encode($this->unggulan_model->delete($id));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            if (!empty($this->input->post('gambar_produk'))) {
                // 'old_img' => ,
                $filename =  realpath(base64_decode($this->input->post('old_img')));
                unlink($filename);
                $data = $this->unggulan_model->edit($id, array(
                    'kode_kecamatan' => $this->input->post('kd_kec'),
                    'kode_desa' => $this->input->post('kd_desa'),
                    'nama_produk' => $this->input->post('nama_produk'),
                    'harga_produk' => $this->input->post('harga_produk'),
                    'deskripsi_produk' => $this->input->post('deskripsi_produk'),
                    'gambar_produk' => $this->input->post('gambar_produk'),
                    'updated_id' => $this->session->userdata('id'),
                    'updated_date' => date('Y-m-d h:i:s'),
                    'date_year' => date("Y")
                ));
            // echo "ada";
            } else {
                $data = $this->unggulan_model->edit($id, array(
                    'kode_kecamatan' => $this->input->post('kd_kec'),
                    'kode_desa' => $this->input->post('kd_desa'),
                    'nama_produk' => $this->input->post('nama_produk'),
                    'harga_produk' => $this->input->post('harga_produk'),
                    'deskripsi_produk' => $this->input->post('deskripsi_produk'),
                    'updated_id' => $this->session->userdata('id'),
                    'updated_date' => date('Y-m-d h:i:s'),
                    'date_year' => date("Y")
                ));
            }
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($data);
    }
}
