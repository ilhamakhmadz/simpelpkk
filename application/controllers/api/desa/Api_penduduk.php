<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_penduduk extends Api_Controller
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
    public function penduduk() {
        $kec = $this->input->get('kec');
        $desa = $this->input->get('desa');
        
        $this->db->select('data_keluarga_anggota.*, master_dusun.dusun as nama_dusun, master_dasawisma.dasawisma as nama_dasawisma');
        $this->db->from('data_keluarga_anggota');
        $this->db->join('master_dusun', 'master_dusun.id = data_keluarga_anggota.dusun', 'left');
        $this->db->join('master_dasawisma', 'master_dasawisma.id = data_keluarga_anggota.dasawisma', 'left');
        $this->db->where('data_keluarga_anggota.kecamatan', $kec);
        $this->db->where('data_keluarga_anggota.desa', $desa);
        $query = $this->db->get()->result();
        echo json_encode($query);
    }

    public function keluarga() {
        $kec = $this->input->get('kec');
        $desa = $this->input->get('desa');
        
        $this->db->select('*');
        $this->db->from('data_keluarga');
        $this->db->where('kecamatan', $kec);
        $this->db->where('desa', $desa);
        $this->db->where('level', 'keluarga');
        $query = $this->db->get()->result();
        
        // Transformasi data sesuai logika yang diberikan
        $transformed_data = array();
        foreach ($query as $row) {
            $data = (array) $row;
            
            // Ambil daftar KK dari data_keluarga_anggota berdasarkan id_data_keluarga
            $this->db->select('kk');
            $this->db->from('data_keluarga_anggota');
            $this->db->where('id_data_keluarga', $data['id_data_keluarga']);
            $this->db->where('kk IS NOT NULL');
            $this->db->where('kk !=', '');
            $this->db->group_by('kk'); // Menghindari duplikasi KK
            $kk_query = $this->db->get()->result();
            
            // Buat array list KK
            $list_kk = array();
            foreach ($kk_query as $kk_row) {
                $list_kk[] = $kk_row->kk;
            }
            $data['list_kk'] = $list_kk;
            
            // Transformasi beras
            $data['beras_label'] = ($data['beras'] == '1') ? 'Beras' : 'Non Beras';
            
            // Transformasi rumah_memiliki_jamban
            $data['rumah_memiliki_jamban_label'] = ($data['rumah_memiliki_jamban'] == '1') ? 'Ada' : 'Tidak Ada';
            
            // Transformasi sumber_air
            $sumber_air = array();
            if ($data['sumur'] == '1') {
                $sumber_air[] = 'Sumur';
            }
            if ($data['pdam'] == '1') {
                $sumber_air[] = 'PDAM';
            }
            if ($data['sumber_air_lain'] == '1') {
                $sumber_air[] = 'Sumber Air Lainnya';
            }
            $data['sumber_air_label'] = implode(', ', $sumber_air);
            
            // Transformasi rumah_memiliki_tps
            $data['rumah_memiliki_tps_label'] = ($data['rumah_memiliki_tps'] == '1') ? 'Ada' : 'Tidak Ada';
            
            // Transformasi saluran_air_limbah (rumah_memiliki_spal)
            $data['saluran_air_limbah_label'] = ($data['rumah_memiliki_spal'] == '1') ? 'Ada' : 'Tidak Ada';
            
            // Transformasi rumah_menempel_sp4k
            $data['rumah_menempel_sp4k_label'] = ($data['rumah_menempel_sp4k'] == '1') ? 'Ada' : 'Tidak Ada';
            
            // Transformasi rumah_sehat_layak_huni
            $data['rumah_sehat_layak_huni_label'] = ($data['rumah_sehat_layak_huni'] == '1') ? 'Sehat Layak Huni' : 'Tidak Sehat Layak Huni';
            
            // Transformasi mengikuti_up2k
            $data['mengikuti_up2k_label'] = ($data['mengikuti_up2k'] == '1') ? 'Ya' : 'Tidak';
            
            // Transformasi pemanfaatan_tanah
            $data['pemanfaatan_tanah_label'] = ($data['pemanfaatan_tanah'] == '1') ? 'Ada' : 'Tidak Ada';
            
            // Transformasi industri_rumah_tangga
            $data['industri_rumah_tangga_label'] = ($data['industri_rumah_tangga'] == '1') ? 'Ada' : 'Tidak Ada';
            
            // Transformasi kerja_bhakti
            $data['kerja_bhakti_label'] = ($data['kerja_bhakti'] == '1') ? 'Ada' : 'Tidak Ada';
            
            $transformed_data[] = $data;
        }
        
        echo json_encode($transformed_data);
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
