<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_catatan_keluarga extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dasawisma/keluarga_model');
    }
    public function kecamatan()
    {
        $data = $this->keluarga_model->datatables_kecamatan(1);
        echo $data;
    }
    public function desa()
    {
        $data = $this->keluarga_model->datatables_kecamatan(2);
        echo $data;
    }
    public function dusun()
    {
        $data = $this->keluarga_model->datatables_kecamatan(3);
        echo $data;
    }
    public function rw()
    {
        $data = $this->keluarga_model->datatables_kecamatan(4);
        echo $data;
    }
    public function rt()
    {
        $data = $this->keluarga_model->datatables_kecamatan(5);
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $id_profil_desa = $this->keluarga_model->add(array(
                'level' => $this->input->post('level'),
                'provinsi' => '32',
                'kabupaten' => '3204',
                'kecamatan' => $this->input->post('kd_kec'),
                'desa' => $this->input->post('kd_desa'),
                'dusun' => $this->input->post('dusun'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'nama_kepala_keluarga' => $this->input->post('nama_kepala_keluarga'),
                'dasawisma' => $this->input->post('dasawisma'),
                'jumlah_anggota_keluarga' => $this->input->post('jumlah_anggota_keluarga'),
                'jumlah_anggota_keluarga_laki' => $this->input->post('jumlah_anggota_keluarga_laki'),
                'jumlah_anggota_keluarga_perempuan' => $this->input->post('jumlah_anggota_keluarga_perempuan'),
                'jumlah_kk' => $this->input->post('jumlah_kk'),
                'jumlah_balita' => $this->input->post('jumlah_balita'),
                'jumlah_PUS' => $this->input->post('jumlah_PUS'),
                'jumlah_WUS' => $this->input->post('jumlah_WUS'),
                'jumlah_buta' => $this->input->post('jumlah_buta'),
                'jumlah_ibu_hamil' => $this->input->post('jumlah_ibu_hamil'),
                'jumlah_menyusui' => $this->input->post('jumlah_menyusui'),
                'jumlah_lansia' => $this->input->post('jumlah_lansia'),
                'makanan_pokok' => $this->input->post('makanan_pokok'),
                'jamban_keluarga' => $this->input->post('jamban_keluarga'),
                'sumber_air_keluarga' => $this->input->post('sumber_air_keluarga'),
                'pembuangan_sampah' => $this->input->post('pembuangan_sampah'),
                'saluran_air_limbah' => $this->input->post('saluran_air_limbah'),
                'stiker_p4k' => $this->input->post('stiker_p4k'),
                'kreteria_rumah' => $this->input->post('kreteria_rumah'),
                'aktivitas_up2k' => $this->input->post('aktivitas_up2k'),
                'aktivitas_kesehatan_lingkungan' => $this->input->post('aktivitas_kesehatan_lingkungan'),
                'created_id' => $this->session->userdata('id'),
                'date_year' => date("Y")
            ));



            // ADD BANTUAN
            $data = $this->input->post();
            foreach (json_decode($data['dataAnggota']) as $anggota) {
                $this->keluarga_model->add_anggota(array(
                    'id_data_keluarga' => $id_profil_desa,
                    'level' => $this->input->post('level'),
                    'provinsi' => '32',
                    'kabupaten' => '3204',
                    'kecamatan' => $this->input->post('kd_kec'),
                    'desa' => $this->input->post('kd_desa'),
                    'dusun' => $this->input->post('dusun'),
                    'rt' => $this->input->post('rt'),
                    'rw' => $this->input->post('rw'),
                    'dasawisma' => $this->input->post('dasawisma'),
                    'no_reg' => $anggota->ob_no_reg_tp_pkk,
                    'nama_anggota' => $anggota->ob_nama,
                    'jenis_kelamin' => $anggota->jenis_kelamin,
                    'tempat_lahir' => $anggota->tempat_lahir,
                    'tanggal_lahir' => $anggota->tanggal_lahir,
                    'pendidikan' => $anggota->pendidikan,
                    'pekerjaan' => $anggota->pekerjaan,
                    'status_dalam_keluarga' => $anggota->status,
                    'status_kawin' => $anggota->status_kawin,
                    'created_id' => $this->session->userdata('id'),
                    'date_year' => date("Y")
                ));
            }
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($data);
    }

    public function add_anggota()
    {
            $data = $this->keluarga_model->add_anggota(array(
                    'id_data_keluarga' => $this->input->post('id_data_keluarga'),
                    'level' => $this->input->post('level'),
                    'provinsi' => '32',
                    'kabupaten' => '3204',
                    'kecamatan' => $this->input->post('kd_kec'),
                    'desa' => $this->input->post('kd_desa'),
                    'dusun' => $this->input->post('dusun'),
                    'rt' => $this->input->post('rt'),
                    'rw' => $this->input->post('rw'),
                    'dasawisma' => $this->input->post('dasawisma'),
                    'no_reg' => $this->input->post('ob_no_reg_tp_pkk'),
                    'nama_anggota' => $this->input->post('ob_nama'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'pendidikan' => $this->input->post('pendidikan'),
                    'pekerjaan' => $this->input->post('pekerjaan'),
                    'status_dalam_keluarga' => $this->input->post('status'),
                    'status_kawin' => $this->input->post('status_kawin'),
                    'created_id' => $this->session->userdata('id'),
                    'date_year' => date("Y")
                ));
        echo json_encode($data);
    }

    public function edit_anggota($id_data_keluarga_anggota)
    {
            $data = $this->keluarga_model->edit_anggota($id_data_keluarga_anggota, array(
                    'no_reg' => $this->input->post('ob_no_reg_tp_pkk'),
                    'nama_anggota' => $this->input->post('ob_nama'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'pendidikan' => $this->input->post('pendidikan'),
                    'pekerjaan' => $this->input->post('pekerjaan'),
                    'status_dalam_keluarga' => $this->input->post('status'),
                    'status_kawin' => $this->input->post('status_kawin'),
                    'updated_id' => $this->session->userdata('id'),
                    'updated_date' => date('Y-m-d h:i:s'),
            ));
            echo json_encode($data);
    }

    public function delete($id)
    {
        $data = $this->keluarga_model->get_by_id($id);
        $data_anggota = $this->keluarga_model->get_anggota_year($data->kecamatan, $data->desa, $data->date_year);
        
        foreach ($data_anggota as $value_delete) {
            $this->keluarga_model->delete_anggota($value_delete->id_data_keluarga);
        }
        $this->keluarga_model->delete($id);
        echo json_encode($this->keluarga_model->delete($id));

        redirect(site_url('dasawisma/keluarga'));
    }

    public function deleteAnggota($id)
    {
        $data = $this->keluarga_model->get_by_anggota($id);
        $this->keluarga_model->delete_anggota($id);
        echo json_encode($data);

        redirect(site_url('dasawisma/keluarga/edit/'.$data->id_data_keluarga));
    }

    public function edit($id)
    {
            $data = $this->keluarga_model->edit($id, array(
                'nama_kepala_keluarga' => $this->input->post('nama_kepala_keluarga'),
                'dasawisma' => $this->input->post('dasawisma'),
                'jumlah_anggota_keluarga' => $this->input->post('jumlah_anggota_keluarga'),
                'jumlah_anggota_keluarga_laki' => $this->input->post('jumlah_anggota_keluarga_laki'),
                'jumlah_anggota_keluarga_perempuan' => $this->input->post('jumlah_anggota_keluarga_perempuan'),
                'jumlah_kk' => $this->input->post('jumlah_kk'),
                'jumlah_balita' => $this->input->post('jumlah_balita'),
                'jumlah_PUS' => $this->input->post('jumlah_PUS'),
                'jumlah_WUS' => $this->input->post('jumlah_WUS'),
                'jumlah_buta' => $this->input->post('jumlah_buta'),
                'jumlah_ibu_hamil' => $this->input->post('jumlah_ibu_hamil'),
                'jumlah_menyusui' => $this->input->post('jumlah_menyusui'),
                'jumlah_lansia' => $this->input->post('jumlah_lansia'),
                'makanan_pokok' => $this->input->post('makanan_pokok'),
                'jamban_keluarga' => $this->input->post('jamban_keluarga'),
                'sumber_air_keluarga' => $this->input->post('sumber_air_keluarga'),
                'pembuangan_sampah' => $this->input->post('pembuangan_sampah'),
                'saluran_air_limbah' => $this->input->post('saluran_air_limbah'),
                'stiker_p4k' => $this->input->post('stiker_p4k'),
                'kreteria_rumah' => $this->input->post('kreteria_rumah'),
                'aktivitas_up2k' => $this->input->post('aktivitas_up2k'),
                'aktivitas_kesehatan_lingkungan' => $this->input->post('aktivitas_kesehatan_lingkungan'),
                'updated_id' => $this->session->userdata('id'),
                'updated_date' => date('Y-m-d h:i:s'),
            ));

            
        echo json_encode($data);
    }

    public function check_kecamatan($year, $kec)
    {
        echo json_encode($this->keluarga_model->check_kecamatan($year, $kec));
    }
    public function check_desa($year, $desa)
    {
        echo json_encode($this->keluarga_model->check_desa($year, $desa));
    }
    public function check_dusun($year, $kecamatan,$desa,$dusun)
    {
        echo json_encode($this->keluarga_model->check_dusun($year,$kecamatan,$desa,$dusun));
    }
    public function check_rw($year, $kecamatan,$desa,$dusun,$rw)
    {
        echo json_encode($this->keluarga_model->check_rw($year,$kecamatan,$desa,$dusun,$rw));
    }
    public function check_rt($year, $kecamatan,$desa,$dusun,$rw,$rt)
    {
        echo json_encode($this->keluarga_model->check_rt($year,$kecamatan,$desa,$dusun,$rw,$rt));
    }
}
