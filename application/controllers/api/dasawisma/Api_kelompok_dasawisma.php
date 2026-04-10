<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_kelompok_dasawisma extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dasawisma/kelompok_dasawisma_model');
    }

    public function level()
    {
        header('Content-type: application/json');
        $parent_id = $_GET['levelId'];

        $this->db->select('id_data_keluarga, nama_kepala_keluarga as text');
        $this->db->from('data_keluarga');
        if($parent_id == 'kecamatan'){
            if ($this->session->userdata('level_id') == 3){
                $this->db->where($this->table . '.kecamatan', $this->session->userdata('kec_id'));
            }elseif ($this->session->userdata('level_id') == 2 || $this->session->userdata('level_id') == 1 ) {
            }
            $this->db->where('level','kecamatan');
        }elseif($parent_id == 'desa'){
            if ($this->session->userdata('level_id') == 4) {
                    $this->db->where($this->table . '.kecamatan', $this->session->userdata('kec_id'));
                    $this->db->where($this->table . '.desa', $this->session->userdata('desa_id'));
            } 
            $this->db->where('level','desa');
        }elseif($parent_id == 'dusun'){
            if ($this->session->userdata('level_id') == 5) {
                $this->db->where($this->table . '.kecamatan', $this->session->userdata('kec_id'));
                $this->db->where($this->table . '.desa', $this->session->userdata('desa_id'));
                $this->db->where($this->table . '.dusun', $this->session->userdata('dusun_id'));
            } 
            $this->db->where('level','dusun');
        }elseif($parent_id == 'rw'){
            if ($this->session->userdata('level_id') == 6) {
                $this->db->where($this->table . '.kecamatan', $this->session->userdata('kec_id'));
                $this->db->where($this->table . '.desa', $this->session->userdata('desa_id'));
                $this->db->where($this->table . '.dusun', $this->session->userdata('dusun_id'));
                $this->db->where($this->table . '.rw', $this->session->userdata('rw'));
            }
            $this->db->where('level','rw');
        }elseif($parent_id == 'rt'){
            if ($this->session->userdata('level_id') == 7) {
                $this->db->where($this->table . '.kecamatan', $this->session->userdata('kec_id'));
                $this->db->where($this->table . '.desa', $this->session->userdata('desa_id'));
                $this->db->where($this->table . '.dusun', $this->session->userdata('dusun_id'));
                $this->db->where($this->table . '.rw', $this->session->userdata('rw'));
                $this->db->where($this->table . '.rt', $this->session->userdata('rt'));
            }
            $this->db->where('level','rt');
        }
        if ($this->input->get('q')) {
            $this->db->where("nama_kepala_keluarga LIKE '%" . $this->input->get('q') . "%'");
        }
        $data = $this->db->order_by('nama_kepala_keluarga', 'asc');
        echo json_encode($data->get()->result());
    }
    public function get_nama($id)
    {
        $data = $this->kelompok_dasawisma_model->get_nama($id);
        echo json_encode($data);
    }
    public function kecamatan()
    {
        $data = $this->kelompok_dasawisma_model->datatables_kecamatan(1);
        echo $data;
    }
    public function desa()
    {
        $data = $this->kelompok_dasawisma_model->datatables_kecamatan(2);
        echo $data;
    }
    public function dusun()
    {
        $data = $this->kelompok_dasawisma_model->datatables_kecamatan(3);
        echo $data;
    }
    public function rw()
    {
        $data = $this->kelompok_dasawisma_model->datatables_kecamatan(4);
        echo $data;
    }
    public function rt()
    {
        $data = $this->kelompok_dasawisma_model->datatables_kecamatan(5);
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $id_profil_desa = $this->kelompok_dasawisma_model->add(array(
                'level' => $this->input->post('level'),
                'provinsi' => '32',
                'kabupaten' => '3204',
                'kecamatan' => $this->input->post('kd_kec'),
                'desa' => $this->input->post('kd_desa'),
                'dusun' => $this->input->post('dusun'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
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
        echo json_encode($id_profil_desa);
    }

    public function add_anggota()
    {
            $data = $this->kelompok_dasawisma_model->add_anggota(array(
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
            $data = $this->kelompok_dasawisma_model->edit_anggota($id_data_keluarga_anggota, array(
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
        $this->kelompok_dasawisma_model->delete($id);
        echo json_encode($this->kelompok_dasawisma_model->delete($id));

        redirect(site_url('dasawisma/kelompok_dasawisma'));
    }

    public function deleteAnggota($id)
    {
        $data = $this->kelompok_dasawisma_model->get_by_anggota($id);
        $this->kelompok_dasawisma_model->delete_anggota($id);
        echo json_encode($data);

        redirect(site_url('dasawisma/keluarga/edit/'.$data->id_data_keluarga));
    }

    public function edit($id)
    {
            $data = $this->kelompok_dasawisma_model->edit($id, array(
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
                'updated_id' => $this->session->userdata('id'),
                'updated_date' => date('Y-m-d h:i:s'),
            ));

            
        echo json_encode($data);
    }

    public function check_kecamatan($year, $kec)
    {
        echo json_encode($this->kelompok_dasawisma_model->check_kecamatan($year, $kec));
    }
    public function check_desa($year, $desa)
    {
        echo json_encode($this->kelompok_dasawisma_model->check_desa($year, $desa));
    }
    public function check_dusun($year, $kecamatan,$desa,$dusun)
    {
        echo json_encode($this->kelompok_dasawisma_model->check_dusun($year,$kecamatan,$desa,$dusun));
    }
    public function check_rw($year, $kecamatan,$desa,$dusun,$rw)
    {
        echo json_encode($this->kelompok_dasawisma_model->check_rw($year,$kecamatan,$desa,$dusun,$rw));
    }
    public function check_rt($year, $kecamatan,$desa,$dusun,$rw,$rt)
    {
        echo json_encode($this->kelompok_dasawisma_model->check_rt($year,$kecamatan,$desa,$dusun,$rw,$rt));
    }
}
