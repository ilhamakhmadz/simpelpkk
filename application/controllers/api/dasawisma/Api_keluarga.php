<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_keluarga extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dasawisma/catatan_keluarga_model');
    }
    public function kecamatan()
    {
        session_write_close();
        $data = $this->catatan_keluarga_model->datatables_kecamatan(1);
        echo $data;
    }
    public function desa()
    {
        session_write_close();
        $data = $this->catatan_keluarga_model->datatables_kecamatan(2);
        echo $data;
    }
    public function dusun()
    {
        session_write_close();
        $data = $this->catatan_keluarga_model->datatables_kecamatan(3);
        echo $data;
    }
    public function rw()
    {
        session_write_close();
        $data = $this->catatan_keluarga_model->datatables_kecamatan(4);
        echo $data;
    }
    public function rt()
    {
        session_write_close();
        $data = $this->catatan_keluarga_model->datatables_kecamatan(5);
        echo $data;
    }
    public function dasawisma()
    {
        session_write_close();
        $data = $this->catatan_keluarga_model->datatables_kecamatan(6);
        echo $data;
    }
    public function keluarga()
    {
        session_write_close();
        $data = $this->catatan_keluarga_model->datatables_kecamatan(7);
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $id_profil_desa = $this->catatan_keluarga_model->add(array(
                'level' => $this->input->post('level'),
                'provinsi' => '32',
                'kabupaten' => '3204',
                'kecamatan' => $this->input->post('kd_kec'),
                'desa' => $this->input->post('kd_desa'),
                'dusun' => $this->input->post('dusun'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'dasawisma' => $this->input->post('dasawisma'),
                'nama_kepala_keluarga' => $this->input->post('nama_kepala_keluarga'),
                'id_data_keluarga' => $this->input->post('id_data_keluarga'),
                'dasawisma' => $this->input->post('dasawisma'),
                'jumlah_kk' => $this->input->post('jumlah_kk'),
                'jumlah_PUS' => $this->input->post('jumlah_PUS'),
                'jumlah_WUS' => $this->input->post('jumlah_WUS'),
                'jumlah_buta' => $this->input->post('jumlah_buta'),
                'jumlah_ibu_hamil' => $this->input->post('jumlah_ibu_hamil'),
                'jumlah_menyusui' => $this->input->post('jumlah_menyusui'),
                'jumlah_lansia' => $this->input->post('jumlah_lansia'),
                'total_laki' => $this->input->post('total_laki'),
                'total_perempuan' => $this->input->post('total_perempuan'),
                'balita_laki' => $this->input->post('balita_laki'),
                'balita_perempuan' => $this->input->post('balita_perempuan'),
                'berkebutuhan_khusus' => $this->input->post('berkebutuhan_khusus'),
                'rumah_sehat_layak_huni' => $this->input->post('rumah_sehat_layak_huni'),
                'rumah_tidak_sehat_layak_huni' => $this->input->post('rumah_tidak_sehat_layak_huni'),
                'rumah_memiliki_tps' => $this->input->post('rumah_memiliki_tps'),
                'rumah_memiliki_spal' => $this->input->post('rumah_memiliki_spal'),
                'rumah_memiliki_jamban' => $this->input->post('rumah_memiliki_jamban'),
                'rumah_menempel_sp4k' => $this->input->post('rumah_menempel_sp4k'),
                'pdam' => $this->input->post('pdam'),
                'sumur' => $this->input->post('sumur'),
                'sumber_air_lain' => $this->input->post('sumber_air_lain'),
                'beras' => $this->input->post('beras'),
                'non_beras' => $this->input->post('non_beras'),
                'mengikuti_up2k' => $this->input->post('mengikuti_up2k'),
                'pemanfaatan_tanah' => $this->input->post('pemanfaatan_tanah'),
                'industri_rumah_tangga' => $this->input->post('industri_rumah_tangga'),
                'kerja_bhakti' => $this->input->post('kerja_bhakti'),
                'ket' => $this->input->post('ket'),
                'created_id' => $this->session->userdata('id'),
                'date_year' => date("Y")
            ));

        } else {
            throw new Exception('Method not Allowed');
        }
        $output_data = ["id"=>$id_profil_desa,"status" => "success", "message" => "Data berhasil disimpan"];
        echo json_encode($output_data);
    }

    public function add_anggota()
    {
            $data = $this->catatan_keluarga_model->add_anggota(array(
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
                'nama_anggota' => $this->input->post('addnama'),
                'jenis_kelamin' => $this->input->post('addjenis_kelamin'),
                'tempat_lahir' => $this->input->post('addtempat_lahir'),
                'tanggal_lahir' => $this->input->post('addtanggal_lahir'),
                'pendidikan' => $this->input->post('addpendidikan'),
                'pekerjaan' => $this->input->post('addpekerjaan'),
                'status_dalam_keluarga' => $this->input->post('addstatus_dalam_keluarga'),
                'status_kawin' => $this->input->post('addstatus_kawin'),
                'cacat' => $this->input->post('addcacat'), 
                'pancasila' => $this->input->post('addpancasila'), 
                'gotong_royong' => $this->input->post('addgotong_royong'), 
                'keterampilan' => $this->input->post('addketrampilan'), 
                'koperasi' => $this->input->post('addkoperasi'), 
                'pangan' => $this->input->post('addpangan'), 
                'sandang' => $this->input->post('addsandang'), 
                'kesehatan' => $this->input->post('addkesehatan'), 
                'perencanaan_sehat' => $this->input->post('addperencanaan_sehat'), 
                'agama' => $this->input->post('addagama'), 
                'nik' => $this->input->post('addnik'), 
                'kk' => $this->input->post('addkk'), 
                'keterangan' => $this->input->post('addketerangan'), 
                'created_id' => $this->session->userdata('id'),
                'date_year' => $this->input->post('adddate') 
                ));
        echo json_encode($data);
    }

    public function edit_anggota_keluarga($id_data_catatan_keluarga_anggota)
    {
            $data = $this->catatan_keluarga_model->edit_anggota($id_data_catatan_keluarga_anggota, array(
                    'cacat' => $this->input->post('editcacat'),
                    'pancasila' => $this->input->post('editpancasila'),
                    'gotong_royong' => $this->input->post('editgotong_royong'),
                    'keterampilan' => $this->input->post('editketerampilan'),
                    'koperasi' => $this->input->post('editkoperasi'),
                    'sandang' => $this->input->post('editsandang'),
                    'pangan' => $this->input->post('editpangan'),
                    'kesehatan' => $this->input->post('editkesehatan'),
                    'perencanaan_sehat' => $this->input->post('editperencanaan_sehat'),
                    'ket' => $this->input->post('editket'),
                    'updated_id' => $this->session->userdata('id'),
                    'updated_date' => date('Y-m-d h:i:s'),
            ));
            echo json_encode($data);
    }

    public function edit_anggota($id_data_catatan_keluarga_anggota)
    {
            $data = $this->catatan_keluarga_model->edit_anggota($id_data_catatan_keluarga_anggota, array(
                    'nama_anggota' => $this->input->post('editnama'),
                    'jenis_kelamin' => $this->input->post('editjenis_kelamin'),
                    'tempat_lahir' => $this->input->post('edittempat_lahir'),
                    'tanggal_lahir' => $this->input->post('edittanggal_lahir'),
                    'pendidikan' => $this->input->post('editpendidikan'),
                    'pekerjaan' => $this->input->post('editpekerjaan'),
                    'status_dalam_keluarga' => $this->input->post('editstatus_dalam_keluarga'),
                    'status_kawin' => $this->input->post('editstatus_kawin'),
                    'cacat' => $this->input->post('editcacat'), 
                    'pancasila' => $this->input->post('editpancasila'), 
                    'gotong_royong' => $this->input->post('editgotong_royong'), 
                    'keterampilan' => $this->input->post('editketrampilan'), 
                    'koperasi' => $this->input->post('editkoperasi'), 
                    'pangan' => $this->input->post('editpangan'), 
                    'sandang' => $this->input->post('editsandang'), 
                    'kesehatan' => $this->input->post('editkesehatan'), 
                    'perencanaan_sehat' => $this->input->post('editperencanaan_sehat'), 
                    'agama' => $this->input->post('editagama'), 
                    'nik' => $this->input->post('editnik'), 
                    'kk' => $this->input->post('editkk'), 
                    'keterangan' => $this->input->post('editketerangan'),
                    'updated_id' => $this->session->userdata('id'),
                    'updated_date' => date('Y-m-d h:i:s'),
            ));
            echo json_encode($data);
    }

    public function delete($id)
    {
        $data = $this->catatan_keluarga_model->get_by_id($id);
        $data_anggota = $this->catatan_keluarga_model->get_anggota_year($data->id_data_keluarga);
        
        foreach ($data_anggota as $value_delete) {
            $this->catatan_keluarga_model->delete_anggota($value_delete->id_data_keluarga_anggota);
        }
        $delete = $this->catatan_keluarga_model->delete($id);
        // echo json_encode($delete);

        redirect(site_url('dasawisma/keluarga'));
    }

    public function deleteAnggota($id)
    {
        $data = $this->catatan_keluarga_model->get_by_anggota($id);
        $this->catatan_keluarga_model->delete_anggota($id);
        // echo json_encode($data);

        redirect(site_url('dasawisma/keluarga/edit/'.$data->id_data_keluarga));
    }
    public function deleteAnggotaKeluarga($id)
    {
        $data = $this->catatan_keluarga_model->get_by_anggota($id);
        $this->catatan_keluarga_model->delete_anggota($id);
        // echo json_encode($data);

        redirect(site_url('dasawisma/keluarga/detail/'.$data->id_data_keluarga));
    }

    public function edit($id)
    {
            $data = $this->catatan_keluarga_model->edit($id, array(
                'nama_kepala_keluarga' => $this->input->post('nama_kepala_keluarga'),
                'dasawisma' => $this->input->post('dasawisma'),
                'jumlah_kk' => $this->input->post('jumlah_kk'),
                'jumlah_PUS' => $this->input->post('jumlah_PUS'),
                'jumlah_WUS' => $this->input->post('jumlah_WUS'),
                'jumlah_buta' => $this->input->post('jumlah_buta'),
                'jumlah_ibu_hamil' => $this->input->post('jumlah_ibu_hamil'),
                'jumlah_menyusui' => $this->input->post('jumlah_menyusui'),
                'jumlah_lansia' => $this->input->post('jumlah_lansia'),
                'total_laki' => $this->input->post('total_laki'),
                'total_perempuan' => $this->input->post('total_perempuan'),
                'balita_laki' => $this->input->post('balita_laki'),
                'balita_perempuan' => $this->input->post('balita_perempuan'),
                'berkebutuhan_khusus' => $this->input->post('berkebutuhan_khusus'),
                'rumah_sehat_layak_huni' => $this->input->post('rumah_sehat_layak_huni'),
                'rumah_tidak_sehat_layak_huni' => $this->input->post('rumah_tidak_sehat_layak_huni'),
                'rumah_memiliki_tps' => $this->input->post('rumah_memiliki_tps'),
                'rumah_memiliki_spal' => $this->input->post('rumah_memiliki_spal'),
                'rumah_memiliki_jamban' => $this->input->post('rumah_memiliki_jamban'),
                'rumah_menempel_sp4k' => $this->input->post('rumah_menempel_sp4k'),
                'pdam' => $this->input->post('pdam'),
                'sumur' => $this->input->post('sumur'),
                'sumber_air_lain' => $this->input->post('sumber_air_lain'),
                'beras' => $this->input->post('beras'),
                'non_beras' => $this->input->post('non_beras'),
                'mengikuti_up2k' => $this->input->post('mengikuti_up2k'),
                'pemanfaatan_tanah' => $this->input->post('pemanfaatan_tanah'),
                'industri_rumah_tangga' => $this->input->post('industri_rumah_tangga'),
                'kerja_bhakti' => $this->input->post('kerja_bhakti'),
                'ket' => $this->input->post('ket'),
                'updated_id' => $this->session->userdata('id'),
                'updated_date' => date('Y-m-d h:i:s'),
            ));
        echo json_encode($data);
    }
    
    
    public function check_kecamatan($year, $kec)
    {
        echo json_encode($this->catatan_keluarga_model->check_kecamatan($year, $kec));
    }
    public function get_kecamatan($year, $kec)
    {
        echo json_encode($this->catatan_keluarga_model->get_kecamatan($year, $kec));
    }
    public function check_desa($year, $kec, $desa)
    {
        echo json_encode($this->catatan_keluarga_model->check_desa($year, $kec, $desa));
    }
    public function get_desa($year, $kec, $desa)
    {
        echo json_encode($this->catatan_keluarga_model->get_desa($year, $kec, $desa));
    }
    public function check_dusun($year, $kec,$desa,$dusun)
    {
        echo json_encode($this->catatan_keluarga_model->check_dusun($year,$kec,$desa,$dusun));
    }
    public function get_dusun($year, $kec,$desa,$dusun)
    {
        echo json_encode($this->catatan_keluarga_model->get_dusun($year,$kec,$desa,$dusun));
    }
    public function check_rw($year, $kec,$desa,$dusun,$rw)
    {
        echo json_encode($this->catatan_keluarga_model->check_rw($year,$kec,$desa,$dusun,$rw));
    }
    public function get_rw($year,$kec,$desa,$dusun,$rw)
    {
        echo json_encode($this->catatan_keluarga_model->get_rw($year,$kec,$desa,$dusun,$rw));
    }
    public function check_rt($year, $kec,$desa,$dusun,$rw,$rt)
    {
        echo json_encode($this->catatan_keluarga_model->check_rt($year,$kec,$desa,$dusun,$rw,$rt));
    }
    public function get_rt($year, $kec,$desa,$dusun,$rw,$rt)
    {
        echo json_encode($this->catatan_keluarga_model->get_rt($year,$kec,$desa,$dusun,$rw,$rt));
    }
    public function check_dasawisma($year, $kec,$desa,$dusun,$rw,$rt,$dasawisma)
    {
        echo json_encode($this->catatan_keluarga_model->check_dasawisma($year,$kec,$desa,$dusun,$rw,$rt,$dasawisma));
    }
    public function get_dasawisma($kec,$desa,$dusun,$rw,$rt,$dasawisma)
    {
        echo json_encode($this->catatan_keluarga_model->get_dasawisma($kec,$desa,$dusun,$rw,$rt,$dasawisma));
    }
}
