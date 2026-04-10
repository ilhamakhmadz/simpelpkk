<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_profil extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('desa/profil_model');
    }
    public function kecamatan()
    {
        $data = $this->profil_model->datatables_kecamatan(1);
        echo $data;
    }
    public function desa()
    {
        $data = $this->profil_model->datatables_kecamatan(2);
        echo $data;
    }
    public function dusun()
    {
        $data = $this->profil_model->datatables_kecamatan(3);
        echo $data;
    }
    public function rw()
    {
        $data = $this->profil_model->datatables_kecamatan(4);
        echo $data;
    }
    public function rt()
    {
        $data = $this->profil_model->datatables_kecamatan(5);
        echo $data;
    }
    
    public function add()
    {
        if ($this->input->method('post')) {
            $this->profil_model->add(array(
                'level' => $this->input->post('level'),
                'kode_kecamatan' => $this->input->post('kd_kec'),
                'kode_desa' => $this->input->post('kd_desa'),
                'dusun' => $this->input->post('kd_dusun'),
                'rw' => $this->input->post('kd_rw'),
                'rt' => $this->input->post('kd_rt'),
                'jml_kelompok_pkk_rw' => $this->input->post('jml_kelompok_pkk_rw'),
                'jml_kelompok_pkk_rt' => $this->input->post('jml_kelompok_pkk_rt'),
                'jml_kelompok_dasawisma' => $this->input->post('jml_kelompok_dasawisma'),
                'jml_krt' => $this->input->post('jml_krt'),
                'jml_kk' => $this->input->post('jml_kk'),
                'jml_laki' => $this->input->post('jml_laki'),
                'jml_perempuan' => $this->input->post('jml_perempuan'),
                'jml_penduduk' => $this->input->post('jml_perempuan') + $this->input->post('jml_laki'),
                'jml_anggota_tp_pkk_laki' => $this->input->post('jml_anggota_tp_pkk_laki'),
                'jml_anggota_tp_pkk_perempuan' => $this->input->post('jml_anggota_tp_pkk_perempuan'),
                'jml_kader_umum_laki' => $this->input->post('jml_kader_umum_laki'),
                'jml_kader_umum_perempuan' => $this->input->post('jml_kader_umum_perempuan'),
                'jml_kader_khusus_laki' => $this->input->post('jml_kader_khusus_laki'),
                'jml_kader_khusus_perempuan' => $this->input->post('jml_kader_khusus_perempuan'),
                'jml_tenaga_sek_honorer_laki' => $this->input->post('jml_tenaga_sek_honorer_laki'),
                'jml_tenaga_sek_honorer_perempuan' => $this->input->post('jml_tenaga_sek_honorer_perempuan'),
                'jml_tenaga_sek_bantuan_laki' => $this->input->post('jml_tenaga_sek_bantuan_laki'),
                'jml_tenaga_sek_bantuan_perempuan' => $this->input->post('jml_tenaga_sek_bantuan_perempuan'),
                'created_id' => $this->session->userdata('id'),
                'date_year' => date("Y")
            ));


            $data = $this->profil_model->add_aparatur(array(
                'level' => $this->input->post('level'),
                'kode_kecamatan' => $this->input->post('kd_kec'),
                'kode_desa' => $this->input->post('kd_desa'),
                'dusun' => $this->input->post('kd_dusun'),
                'rw' => $this->input->post('kd_rw'),
                'rt' => $this->input->post('kd_rt'),
                'kepala_desa' => $this->input->post('kepala_desa'),
                'sekertariat_desa' => $this->input->post('sekertariat_desa'),
                'kaur_tu' => $this->input->post('kaur_tu'),
                'kaur_perencanaan' => $this->input->post('kaur_perencanaan'),
                'kaur_keuangan' => $this->input->post('kaur_keuangan'),
                'seksi_pemerintahan' => $this->input->post('seksi_pemerintahan'),
                'seksi_kerjasama' => $this->input->post('seksi_kerjasama'),
                'seksi_pelayanan' => $this->input->post('seksi_pelayanan'),
                'staf_1' => $this->input->post('staf_1'),
                'staf_2' => $this->input->post('staf_2'),
                'staf_3' => $this->input->post('staf_3'),
                'created_id' => $this->session->userdata('id'),
                'date_year' => date("Y")
            ));
            // var_dump(json_encode($data)) or die;

            // ADD BANTUAN
            // $this->input->post();
            // foreach (json_decode($data['dataAnggota']) as $anggota) {
            //     $this->profil_model->add_anggota(array(
            //         'level' => $this->input->post('level'),
            //         'kode_kecamatan' => $this->input->post('kd_kec'),
            //         'kode_desa' => $this->input->post('kd_desa'),
            //         'dusun' => $this->input->post('kd_dusun'),
            //         'rw' => $this->input->post('kd_rw'),
            //         'rt' => $this->input->post('kd_rt'),
            //         'no_reg_tp_pkk' => $anggota->ob_no_reg_tp_pkk,
            //         'nama' => $anggota->ob_nama,
            //         'nik' => $anggota->ob_nik,
            //         'kk' => $anggota->ob_kk,
            //         'jenis_kelamin' => $anggota->jenis_kelamin,
            //         'tempat_lahir' => $anggota->tempat_lahir,
            //         'tanggal_lahir' => $anggota->tanggal_lahir,
            //         'jabatan' => $anggota->jabatan,
            //         'kedudukan_fungsi' => $anggota->kedudukan_fungsi,
            //         'status' => $anggota->status,
            //         'pendidikan' => $anggota->pendidikan,
            //         'pekerjaan' => $anggota->pekerjaan,
            //         'alamat' => $anggota->alamat,
            //         'keterangan' => $anggota->keterangan,
            //         'created_id' => $this->session->userdata('id'),
            //         'date_year' => date("Y")
            //         // 'nama_prasarana' => $anggota->namaPrasarana,
            //         // 'alamat_prasarana' => $prasarana->alamatPrasarana
            //     ));
            // }
        } else {
            throw new Exception('Method not Allowed');
        }
        $output_data = ["id"=>$data,"status" => "success", "message" => "Data berhasil disimpan"];
        echo json_encode($output_data);
    }
    public function delete($id)
    {
        $data = $this->profil_model->get_by_id($id);
        // var_dump($data) or die;
        if($data->level == 'rt'){
            $data_aparatur = $this->profil_model->get_aparatur_year($data->level,$data->date_year,$data->kode_kecamatan, $data->kode_desa, $data->dusun, $data->rw, $data->rt);
            $data_anggota = $this->profil_model->get_anggota_year($data->level,$data->date_year,$data->kode_kecamatan, $data->kode_desa, $data->dusun, $data->rw, $data->rt);
        }else if($data->level == 'rw'){
            $data_aparatur = $this->profil_model->get_aparatur_year($data->level,$data->date_year,$data->kode_kecamatan, $data->kode_desa, $data->dusun, $data->rw, null);
            $data_anggota = $this->profil_model->get_anggota_year($data->level,$data->date_year,$data->kode_kecamatan, $data->kode_desa, $data->dusun, $data->rw, null);
        }else if($data->level == 'dusun'){
            $data_aparatur = $this->profil_model->get_aparatur_year($data->level,$data->date_year,$data->kode_kecamatan, $data->kode_desa, $data->dusun, null, null);
            $data_anggota = $this->profil_model->get_anggota_year($data->level,$data->date_year,$data->kode_kecamatan, $data->kode_desa, $data->dusun, null, null);
        }else if($data->level == 'desa'){
            $data_aparatur = $this->profil_model->get_aparatur_year($data->level,$data->date_year,$data->kode_kecamatan, $data->kode_desa, null, null, null);
            $data_anggota = $this->profil_model->get_anggota_year($data->level,$data->date_year,$data->kode_kecamatan, $data->kode_desa, null, null, null);
        }else if($data->level == 'kecamatan'){
            $data_aparatur = $this->profil_model->get_aparatur_year($data->level,$data->date_year,$data->kode_kecamatan, null, null, null, null);
            $data_anggota = $this->profil_model->get_anggota_year($data->level,$data->date_year,$data->kode_kecamatan, null, null, null, null);
        }

        foreach ($data_anggota as $value_delete) {
            $this->profil_model->delete_anggota($value_delete->id);
        }

        $this->profil_model->delete_aparatur($data_aparatur->id);
        $this->profil_model->delete($id);

        redirect('desa/profil');
    }

    public function edit($profil, $aparatur)
    {
        if ($this->input->method('post')) {
            $id_profil_desa = $this->profil_model->edit($profil, array(
                'jml_kelompok_pkk_rw' => $this->input->post('jml_kelompok_pkk_rw'),
                'jml_kelompok_pkk_rt' => $this->input->post('jml_kelompok_pkk_rt'),
                'jml_kelompok_dasawisma' => $this->input->post('jml_kelompok_dasawisma'),
                'jml_krt' => $this->input->post('jml_krt'),
                'jml_kk' => $this->input->post('jml_kk'),
                'jml_laki' => $this->input->post('jml_laki'),
                'jml_perempuan' => $this->input->post('jml_perempuan'),
                'jml_penduduk' => $this->input->post('jml_perempuan') + $this->input->post('jml_laki'),
                'jml_anggota_tp_pkk_laki' => $this->input->post('jml_anggota_tp_pkk_laki'),
                'jml_anggota_tp_pkk_perempuan' => $this->input->post('jml_anggota_tp_pkk_perempuan'),
                'jml_kader_umum_laki' => $this->input->post('jml_kader_umum_laki'),
                'jml_kader_umum_perempuan' => $this->input->post('jml_kader_umum_perempuan'),
                'jml_kader_khusus_laki' => $this->input->post('jml_kader_khusus_laki'),
                'jml_kader_khusus_perempuan' => $this->input->post('jml_kader_khusus_perempuan'),
                'jml_tenaga_sek_honorer_laki' => $this->input->post('jml_tenaga_sek_honorer_laki'),
                'jml_tenaga_sek_honorer_perempuan' => $this->input->post('jml_tenaga_sek_honorer_perempuan'),
                'jml_tenaga_sek_bantuan_laki' => $this->input->post('jml_tenaga_sek_bantuan_laki'),
                'jml_tenaga_sek_bantuan_perempuan' => $this->input->post('jml_tenaga_sek_bantuan_perempuan'),
                'updated_id' => $this->session->userdata('id'),
                'updated_date' => date('Y-m-d h:i:s'),
            ));

            $data = $this->profil_model->edit_aparatur($aparatur, array(
                'kepala_desa' => $this->input->post('kepala_desa'),
                'sekertariat_desa' => $this->input->post('sekertariat_desa'),
                'kaur_tu' => $this->input->post('kaur_tu'),
                'kaur_perencanaan' => $this->input->post('kaur_perencanaan'),
                'kaur_keuangan' => $this->input->post('kaur_keuangan'),
                'seksi_pemerintahan' => $this->input->post('seksi_pemerintahan'),
                'seksi_kerjasama' => $this->input->post('seksi_kerjasama'),
                'seksi_pelayanan' => $this->input->post('seksi_pelayanan'),
                'staf_1' => $this->input->post('staf_1'),
                'staf_2' => $this->input->post('staf_2'),
                'staf_3' => $this->input->post('staf_3'),
                'updated_id' => $this->session->userdata('id'),
                'updated_date' => date('Y-m-d h:i:s'),
        ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_profil_desa);
    }

    public function check_kecamatan($year, $kec)
    {
        echo json_encode($this->profil_model->check_kecamatan($year, $kec));
    }

    public function get_kecamatan($year, $kec)
    {
        echo json_encode($this->profil_model->get_kecamatan($year, $kec));
    }

    public function check_desa($year, $kec, $desa)
    {
        echo json_encode($this->profil_model->check_desa($year, $kec, $desa));
    }
    public function get_desa($year, $kec)
    {
        echo json_encode($this->profil_model->get_desa($year, $kec));
    }
    public function check_dusun($year, $kecamatan,$desa,$dusun)
    {
        echo json_encode($this->profil_model->check_dusun($year,$kecamatan,$desa,$dusun));
    }
    public function get_dusun($year, $kec,$desa)
    {
        echo json_encode($this->profil_model->get_dusun($year,$kec,$desa));
    }
    public function check_rw($year, $kecamatan,$desa,$dusun,$rw)
    {
        echo json_encode($this->profil_model->check_rw($year,$kecamatan,$desa,$dusun,$rw));
    }
    public function get_rw($year,$kec,$desa,$dusun)
    {
        echo json_encode($this->profil_model->get_rw($year,$kec,$desa,$dusun));
    }
    public function check_rt($year, $kecamatan,$desa,$dusun,$rw,$rt)
    {
        echo json_encode($this->profil_model->check_rt($year,$kecamatan,$desa,$dusun,$rw,$rt));
    }
    public function get_rt($year, $kec,$desa,$dusun,$rw)
    {
        echo json_encode($this->profil_model->get_rt($year,$kec,$desa,$dusun,$rw));
    }
}
