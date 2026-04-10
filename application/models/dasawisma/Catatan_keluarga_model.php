<?php

class Catatan_keluarga_model extends MY_Model
{
    protected $table = 'data_keluarga';
    protected $join_table = 'data_keluarga_anggota';
    protected $kecamatan = 'master_kecamatan';
    protected $desa = 'master_desa';
    protected $dusun = 'master_dusun';
    protected $dasawisma = 'master_dasawisma';
    private $ci;

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_select()
    {
        $select = $this->table . ".id_data_keluarga,";
        $select .= $this->table . ".level,";
        $select .= $this->table . ".dasawisma,";
        $select .= $this->table . ".rt,";
        $select .= $this->table . ".rw,";
        $select .= $this->table . ".dusun,";
        $select .= $this->table . ".desa,";
        $select .= $this->table . ".kecamatan,";
        $select .= $this->table . ".kabupaten,";
        $select .= $this->table . ".provinsi,";
        $select .= $this->table . ".nama_kepala_keluarga,";
        $select .= $this->table . ".jumlah_kk,";
        $select .= $this->table . ".total_laki,";
        $select .= $this->table . ".total_perempuan,";
        $select .= $this->table . ".balita_laki,";
        $select .= $this->table . ".balita_perempuan,";
        $select .= $this->table . ".jumlah_PUS,";
        $select .= $this->table . ".jumlah_WUS,";
        $select .= $this->table . ".jumlah_buta,";
        $select .= $this->table . ".jumlah_ibu_hamil,";
        $select .= $this->table . ".jumlah_menyusui,";
        $select .= $this->table . ".jumlah_lansia,";
        $select .= $this->table . ".berkebutuhan_khusus,";
        $select .= $this->table . ".rumah_sehat_layak_huni,";
        $select .= $this->table . ".rumah_tidak_sehat_layak_huni,";
        $select .= $this->table . ".rumah_memiliki_tps,";
        $select .= $this->table . ".rumah_memiliki_spal,";
        $select .= $this->table . ".rumah_memiliki_jamban,";
        $select .= $this->table . ".rumah_menempel_sp4k,";
        $select .= $this->table . ".pdam,";
        $select .= $this->table . ".sumur,";
        $select .= $this->table . ".sumber_air_lain,";
        $select .= $this->table . ".beras,";
        $select .= $this->table . ".non_beras,";
        $select .= $this->table . ".mengikuti_up2k,";
        $select .= $this->table . ".pemanfaatan_tanah,";
        $select .= $this->table . ".industri_rumah_tangga,";
        $select .= $this->table . ".kerja_bhakti,";
        $select .= $this->table . ".ket,";
        $select .= $this->table . ".date_year,";
        $select .= $this->table . ".created_date,";
        $select .= $this->table . ".created_id,";
        $select .= $this->table . ".updated_date,";
        $select .= $this->table . ".updated_id,";
        $select .= $this->table . ".visible,";
        $select .= $this->kecamatan . ".Nama_Kecamatan, ";
        $select .= $this->desa . ".Nama_Desa, ";

        return $select;
    }

    public function datatables_kecamatan($level)
    {
        // Optimasi: Hanya select kolom yang benar-benar ditampilkan di tabel index.js untuk mempercepat query
        $select = "{$this->table}.id_data_keluarga, {$this->table}.date_year, {$this->table}.created_date, ";
        $select .= "{$this->table}.total_laki, {$this->table}.total_perempuan, {$this->table}.jumlah_kk, ";
        $select .= "{$this->table}.rw, {$this->table}.rt, {$this->table}.nama_kepala_keluarga, ";
        $select .= "{$this->kecamatan}.Nama_Kecamatan, {$this->desa}.Nama_Desa, ";
        $select .= "{$this->dusun}.dusun as nama_dusun, {$this->dasawisma}.dasawisma as nama_dasawisma";
        
        $this->datatables->select($select);
        $this->datatables->from($this->table);
        $this->datatables->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan', 'left');
        $this->datatables->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa', 'left');
        $this->datatables->join($this->dusun, $this->dusun . '.id = ' . $this->table . '.dusun', 'left');
        $this->datatables->join($this->dasawisma, $this->dasawisma . '.id = ' . $this->table . '.dasawisma', 'left');
        if($level == 1){
            $this->datatables->where('level','kecamatan');
        }elseif($level == 2){
            $this->datatables->where('level','desa');
        }elseif($level == 3){
            $this->datatables->where('level','dusun');
        }elseif($level == 4){
            $this->datatables->where('level','rw');
        }elseif($level == 5){
            $this->datatables->where('level','rt');
        }elseif($level == 6){
            $this->datatables->where('level','dasawisma');
        }elseif($level == 7){
            $this->datatables->where('level','keluarga');
        }
        if ($this->session->userdata('level_id') == 3) {
            if ($this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.kecamatan', $this->session->userdata('kec_id'));
            }
        } elseif ($this->session->userdata('level_id') == 4) {
            if ($this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.kecamatan', $this->session->userdata('kec_id'));
                $this->datatables->where($this->table . '.desa', $this->session->userdata('desa_id'));
            }
        } elseif ($this->session->userdata('level_id') == 5) {
            if ($this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.kecamatan', $this->session->userdata('kec_id'));
                $this->datatables->where($this->table . '.desa', $this->session->userdata('desa_id'));
                $this->datatables->where($this->table . '.dusun', $this->session->userdata('dusun_id'));
            }
        }elseif ($this->session->userdata('level_id') == 6) {
            if ($this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.kecamatan', $this->session->userdata('kec_id'));
                $this->datatables->where($this->table . '.desa', $this->session->userdata('desa_id'));
                $this->datatables->where($this->table . '.dusun', $this->session->userdata('dusun_id'));
                $this->datatables->where($this->table . '.rw', $this->session->userdata('rw'));
            }
        }elseif ($this->session->userdata('level_id') == 7) {
            if ($this->session->userdata('role_id') == 3 || $this->session->userdata('role_id') == 8) {
                $this->datatables->where($this->table . '.kecamatan', $this->session->userdata('kec_id'));
                $this->datatables->where($this->table . '.desa', $this->session->userdata('desa_id'));
                $this->datatables->where($this->table . '.dusun', $this->session->userdata('dusun_id'));
                $this->datatables->where($this->table . '.rw', $this->session->userdata('rw'));
                $this->datatables->where($this->table . '.rt', $this->session->userdata('rt'));
            }
        }
        $this->datatables->where($this->table . '.visible', 1);
        return $this->datatables->generate();
    }

    
    public function add($data)
    {
        $this->db->insert($this->table, $data);
        $inserted = $this->db->insert_id();

        return $inserted;
    }

    public function add_anggota($data)
    {
        $this->db->insert($this->join_table, $data);
        $inserted = $this->db->insert_id();

        return $inserted;
    }

    public function edit_anggota($id, $data)
    {
        $this->db->update($this->join_table, $data, array('id_data_keluarga_anggota' => $id));

        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->join_table, array('id_data_keluarga_anggota' => $id))->row();

        return $updated;
    }


    // TAMBAH DATA PRASARANA
    public function add_prasarana($data)
    {
        $this->db->insert($this->prasarana, $data);
        $inserted = $this->db->insert_id();

        return $inserted;
    }

    public function delete_prasarana($id)
    {
        $idString = (int)$id;
        $this->db->delete($this->prasarana, array('id_data_desa' => $idString));
        return $id;
    }

    public function delete($id)
    {
        $idString = (int)$id;
        $this->db->delete($this->table, array('id_data_keluarga' => $idString));
        $id = $this->db->select('*')->where('id_data_keluarga', $id)->get($this->table)->row();
        return $id;
    }

    public function delete_anggota($id)
    {
        $idString = (int)$id;
        // $data = $this->db->delete($this->join_table, array('id_data_keluarga_anggota' => $idString));
        $data = $this->db->update($this->join_table, array('visible' => 0), array('id_data_keluarga_anggota' => $idString));
        // $id = $this->db->select('*')->where('id_data_keluarga', $id)->get($this->join_table)->row();
        return $data;
    }

    public function get_by_id($id)
    {
        $this->db->select($this->_get_select().',master_kecamatan.Kd_Kec,master_desa.Kd_Desa');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa', 'left');
        $this->db->where($this->table . '.id_data_keluarga', $id);
        $query = $this->db->get($this->table)->row();

        return $query;
    }


    public function edit($id, $data)
    {
        $this->db->update($this->table, $data, array('id_data_keluarga' => $id));

        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('id_data_keluarga' => $id))->row();

        return $updated;
    }

    public function get_anggota_byId($id)
    {
        $this->db->select($this->join_table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa,'.$this->dusun . ".dusun as nama_dusun, ".$this->dasawisma . ".dasawisma as nama_dasawisma, ");
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->join_table . '.kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->join_table . '.desa', 'left');
        $this->db->join($this->dusun, $this->dusun . '.id = ' . $this->join_table . '.dusun', 'left');
        $this->db->join($this->dasawisma, $this->dasawisma . '.id = ' . $this->join_table . '.dasawisma', 'left');
        $this->db->where($this->join_table . '.id_data_keluarga', $id);
        $this->db->where($this->join_table . '.visible', 1);
        $this->db->order_by($this->join_table . '.created_date','desc');
        $query = $this->db->get($this->join_table)->result();

        return $query;
    }
    public function get_anggota_dasawisma($year = null,$kec = null,$desa = null,$dusun = null,$rw = null,$rt = null,$dasawisma= null)
    {
        $this->db->select($this->join_table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa,'.$this->dusun . ".dusun as nama_dusun, ".$this->dasawisma . ".dasawisma as nama_dasawisma, ");
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->join_table . '.kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->join_table . '.desa', 'left');
        $this->db->join($this->dusun, $this->dusun . '.id = ' . $this->join_table . '.dusun', 'left');
        $this->db->join($this->dasawisma, $this->dasawisma . '.id = ' . $this->join_table . '.dasawisma', 'left');
        $this->db->where($this->join_table . '.kecamatan', $kec);
        $this->db->where($this->join_table . '.desa', $desa);
        $this->db->where($this->join_table . '.dusun', $dusun);
        $this->db->where($this->join_table . '.rw', $rw);
        $this->db->where($this->join_table . '.rt', $rt);
        $this->db->where($this->join_table . '.dasawisma', $dasawisma);
        $this->db->where($this->join_table . '.visible', 1);
        $this->db->order_by($this->join_table . '.created_date','desc');
        $query = $this->db->get($this->join_table)->result();

        return $query;
    }

    public function get_anggota_rt($year = null,$kec = null,$desa = null,$dusun = null,$rw = null,$rt = null)
    {
        $this->db->select($this->join_table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa,'.$this->dusun . ".dusun as nama_dusun, ".$this->dasawisma . ".dasawisma as nama_dasawisma, ");
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->join_table . '.kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->join_table . '.desa', 'left');
        $this->db->join($this->dusun, $this->dusun . '.id = ' . $this->join_table . '.dusun', 'left');
        $this->db->join($this->dasawisma, $this->dasawisma . '.id = ' . $this->join_table . '.dasawisma', 'left');
        $this->db->where($this->join_table . '.kecamatan', $kec);
        $this->db->where($this->join_table . '.desa', $desa);
        $this->db->where($this->join_table . '.dusun', $dusun);
        $this->db->where($this->join_table . '.rw', $rw);
        $this->db->where($this->join_table . '.rt', $rt);
        $this->db->where($this->join_table . '.visible', 1);
        $query = $this->db->get($this->join_table)->result();

        return $query;
    }
    public function get_anggota_rw($year = null,$kec = null,$desa = null,$dusun = null,$rw = null)
    {
        $this->db->select($this->join_table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa,'.$this->dusun . ".dusun as nama_dusun, ".$this->dasawisma . ".dasawisma as nama_dasawisma, ");
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->join_table . '.kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->join_table . '.desa', 'left');
        $this->db->join($this->dusun, $this->dusun . '.id = ' . $this->join_table . '.dusun', 'left');
        $this->db->join($this->dasawisma, $this->dasawisma . '.id = ' . $this->join_table . '.dasawisma', 'left');
        $this->db->where($this->join_table . '.kecamatan', $kec);
        $this->db->where($this->join_table . '.desa', $desa);
        $this->db->where($this->join_table . '.dusun', $dusun);
        $this->db->where($this->join_table . '.rw', $rw);
        $this->db->where($this->join_table . '.visible', 1);
        $query = $this->db->get($this->join_table)->result();

        return $query;
    }
    public function get_anggota_dusun($year = null,$kec = null,$desa = null,$dusun = null)
    {
        $this->db->select($this->join_table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa,'.$this->dusun . ".dusun as nama_dusun, ".$this->dasawisma . ".dasawisma as nama_dasawisma, ");
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->join_table . '.kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->join_table . '.desa', 'left');
        $this->db->join($this->dusun, $this->dusun . '.id = ' . $this->join_table . '.dusun', 'left');
        $this->db->join($this->dasawisma, $this->dasawisma . '.id = ' . $this->join_table . '.dasawisma', 'left');
        $this->db->where($this->join_table . '.kecamatan', $kec);
        $this->db->where($this->join_table . '.desa', $desa);
        $this->db->where($this->join_table . '.dusun', $dusun);
        $this->db->where($this->join_table . '.visible', 1);
        $query = $this->db->get($this->join_table)->result();

        return $query;
    }
    public function get_anggota_desa($year = null,$kec = null,$desa = null)
    {
        $this->db->select($this->join_table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa,'.$this->dusun . ".dusun as nama_dusun, ".$this->dasawisma . ".dasawisma as nama_dasawisma, ");
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->join_table . '.kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->join_table . '.desa', 'left');
        $this->db->join($this->dusun, $this->dusun . '.id = ' . $this->join_table . '.dusun', 'left');
        $this->db->join($this->dasawisma, $this->dasawisma . '.id = ' . $this->join_table . '.dasawisma', 'left');
        $this->db->where($this->join_table . '.kecamatan', $kec);
        $this->db->where($this->join_table . '.desa', $desa);
        $this->db->where($this->join_table . '.visible', 1);
        $query = $this->db->get($this->join_table)->result();

        return $query;
    }
    public function get_anggota_kecamatan($year = null,$kec = null)
    {
        $this->db->select($this->join_table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa,'.$this->dusun . ".dusun as nama_dusun, ".$this->dasawisma . ".dasawisma as nama_dasawisma, ");
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->join_table . '.kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->join_table . '.desa', 'left');
        $this->db->join($this->dusun, $this->dusun . '.id = ' . $this->join_table . '.dusun', 'left');
        $this->db->join($this->dasawisma, $this->dasawisma . '.id = ' . $this->join_table . '.dasawisma', 'left');
        $this->db->where($this->join_table . '.kecamatan', $kec);
        $this->db->where($this->join_table . '.visible', 1);
        $query = $this->db->get($this->join_table)->result();

        return $query;
    }

    public function get_anggota_year($id)
    {
        $this->db->select('*');
        $this->db->where($this->join_table . '.id_data_keluarga', $id);

        $query = $this->db->get($this->join_table)->result();

        return $query;
    }

    public function get_by_anggota($id)
    {
        $this->db->select($this->join_table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->join_table . '.kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->join_table . '.desa', 'left');
        $this->db->where($this->join_table . '.id_data_keluarga_anggota', $id);
        $this->db->where($this->join_table . '.visible', 1);
        $query = $this->db->get($this->join_table)->row();

        return $query;
    }
    
    public function check_kecamatan($year, $kec)
    {
        $this->db->select('*');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where('level', 'kecamatan');
        $this->db->where($this->table . '.visible', 1);
        $this->db->where($this->table . '.kecamatan', $kec);
        $query = $this->db->get($this->table)->row();
        return $query;
    }


    public function get_kecamatan($year, $kec)
    {
        $this->db->select('SUM(jumlah_kk) as jml_jumlah_kk
        ,SUM(total_laki) as jml_total_laki
        ,SUM(total_perempuan) as jml_total_perempuan
        ,SUM(balita_laki) as jml_balita_laki
        ,SUM(balita_perempuan) as jml_balita_perempuan
        ,SUM(jumlah_PUS) as jml_jumlah_PUS
        ,SUM(jumlah_WUS) as jml_jumlah_WUS
        ,SUM(jumlah_ibu_hamil) as jml_jumlah_ibu_hamil
        ,SUM(jumlah_menyusui) as jml_jumlah_menyusui
        ,SUM(jumlah_lansia) as jml_jumlah_lansia
        ,SUM(jumlah_buta) as jml_jumlah_buta
        ,SUM(berkebutuhan_khusus) as jml_berkebutuhan_khusus
        ,SUM(rumah_sehat_layak_huni) as jml_rumah_sehat_layak_huni
        ,SUM(rumah_tidak_sehat_layak_huni) as jml_rumah_tidak_sehat_layak_huni
        ,SUM(rumah_memiliki_tps) as jml_rumah_memiliki_tps
        ,SUM(rumah_memiliki_spal) as jml_rumah_memiliki_spal
        ,SUM(rumah_memiliki_jamban) as jml_rumah_memiliki_jamban
        ,SUM(rumah_menempel_sp4k) as jml_rumah_menempel_sp4k
        ,SUM(pdam) as jml_pdam
        ,SUM(sumur) as jml_sumur
        ,SUM(sumber_air_lain) as jml_sumber_air_lain
        ,SUM(beras) as jml_beras
        ,SUM(non_beras) as jml_non_beras
        ,SUM(mengikuti_up2k) as jml_mengikuti_up2k
        ,SUM(pemanfaatan_tanah) as jml_pemanfaatan_tanah
        ,SUM(industri_rumah_tangga) as jml_industri_rumah_tangga
        ,SUM(kerja_bhakti) as jml_kerja_bhakti');
        $this->db->where($this->table . '.kecamatan', $kec);
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.visible', 1);
        $this->db->where('level', 'desa');
        $query = $this->db->get($this->table)->row();
        return $query;
    }

    public function check_desa($year, $kec,$desa)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.visible', 1);
        $this->db->where($this->table . '.kecamatan', $kec);
        $this->db->where($this->table . '.desa', $desa);
        $this->db->where('level', 'desa');
        $query = $this->db->get($this->table)->row();
        return $query;
    }

    public function get_desa($year,$kec, $desa)
    {
        $this->db->select('SUM(jumlah_kk) as jml_jumlah_kk
        ,SUM(total_laki) as jml_total_laki
        ,SUM(total_perempuan) as jml_total_perempuan
        ,SUM(balita_laki) as jml_balita_laki
        ,SUM(balita_perempuan) as jml_balita_perempuan
        ,SUM(jumlah_PUS) as jml_jumlah_PUS
        ,SUM(jumlah_WUS) as jml_jumlah_WUS
        ,SUM(jumlah_ibu_hamil) as jml_jumlah_ibu_hamil
        ,SUM(jumlah_menyusui) as jml_jumlah_menyusui
        ,SUM(jumlah_lansia) as jml_jumlah_lansia
        ,SUM(jumlah_buta) as jml_jumlah_buta
        ,SUM(berkebutuhan_khusus) as jml_berkebutuhan_khusus
        ,SUM(rumah_sehat_layak_huni) as jml_rumah_sehat_layak_huni
        ,SUM(rumah_tidak_sehat_layak_huni) as jml_rumah_tidak_sehat_layak_huni
        ,SUM(rumah_memiliki_tps) as jml_rumah_memiliki_tps
        ,SUM(rumah_memiliki_spal) as jml_rumah_memiliki_spal
        ,SUM(rumah_memiliki_jamban) as jml_rumah_memiliki_jamban
        ,SUM(rumah_menempel_sp4k) as jml_rumah_menempel_sp4k
        ,SUM(pdam) as jml_pdam
        ,SUM(sumur) as jml_sumur
        ,SUM(sumber_air_lain) as jml_sumber_air_lain
        ,SUM(beras) as jml_beras
        ,SUM(non_beras) as jml_non_beras
        ,SUM(mengikuti_up2k) as jml_mengikuti_up2k
        ,SUM(pemanfaatan_tanah) as jml_pemanfaatan_tanah
        ,SUM(industri_rumah_tangga) as jml_industri_rumah_tangga
        ,SUM(kerja_bhakti) as jml_kerja_bhakti');
        $this->db->where($this->table . '.kecamatan', $kec);
        $this->db->where($this->table . '.desa', $desa);
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.visible', 1);
        $this->db->where('level', 'dusun');
        $query = $this->db->get($this->table)->row();
        return $query;
    }

    public function check_dusun($year,$kecamatan,$desa,$dusun)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kecamatan', $kecamatan);
        $this->db->where($this->table . '.desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where('level', 'dusun');
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function get_dusun($year,$kecamatan,$desa,$dusun)
    {
        $this->db->select('SUM(jumlah_kk) as jml_jumlah_kk
        ,SUM(total_laki) as jml_total_laki
        ,SUM(total_perempuan) as jml_total_perempuan
        ,SUM(balita_laki) as jml_balita_laki
        ,SUM(balita_perempuan) as jml_balita_perempuan
        ,SUM(jumlah_PUS) as jml_jumlah_PUS
        ,SUM(jumlah_WUS) as jml_jumlah_WUS
        ,SUM(jumlah_ibu_hamil) as jml_jumlah_ibu_hamil
        ,SUM(jumlah_menyusui) as jml_jumlah_menyusui
        ,SUM(jumlah_lansia) as jml_jumlah_lansia
        ,SUM(jumlah_buta) as jml_jumlah_buta
        ,SUM(berkebutuhan_khusus) as jml_berkebutuhan_khusus
        ,SUM(rumah_sehat_layak_huni) as jml_rumah_sehat_layak_huni
        ,SUM(rumah_tidak_sehat_layak_huni) as jml_rumah_tidak_sehat_layak_huni
        ,SUM(rumah_memiliki_tps) as jml_rumah_memiliki_tps
        ,SUM(rumah_memiliki_spal) as jml_rumah_memiliki_spal
        ,SUM(rumah_memiliki_jamban) as jml_rumah_memiliki_jamban
        ,SUM(rumah_menempel_sp4k) as jml_rumah_menempel_sp4k
        ,SUM(pdam) as jml_pdam
        ,SUM(sumur) as jml_sumur
        ,SUM(sumber_air_lain) as jml_sumber_air_lain
        ,SUM(beras) as jml_beras
        ,SUM(non_beras) as jml_non_beras
        ,SUM(mengikuti_up2k) as jml_mengikuti_up2k
        ,SUM(pemanfaatan_tanah) as jml_pemanfaatan_tanah
        ,SUM(industri_rumah_tangga) as jml_industri_rumah_tangga
        ,SUM(kerja_bhakti) as jml_kerja_bhakti');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kecamatan', $kecamatan);
        $this->db->where($this->table . '.desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where('level', 'rw');
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function check_rw($year,$kecamatan,$desa,$dusun,$rw)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kecamatan', $kecamatan);
        $this->db->where($this->table . '.desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where($this->table . '.rw', $rw);
        $this->db->where('level', 'rw');
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function get_rw($year,$kecamatan,$desa,$dusun,$rw)
    {
        $this->db->select('SUM(jumlah_kk) as jml_jumlah_kk
        ,SUM(total_laki) as jml_total_laki
        ,SUM(total_perempuan) as jml_total_perempuan
        ,SUM(balita_laki) as jml_balita_laki
        ,SUM(balita_perempuan) as jml_balita_perempuan
        ,SUM(jumlah_PUS) as jml_jumlah_PUS
        ,SUM(jumlah_WUS) as jml_jumlah_WUS
        ,SUM(jumlah_ibu_hamil) as jml_jumlah_ibu_hamil
        ,SUM(jumlah_menyusui) as jml_jumlah_menyusui
        ,SUM(jumlah_lansia) as jml_jumlah_lansia
        ,SUM(jumlah_buta) as jml_jumlah_buta
        ,SUM(berkebutuhan_khusus) as jml_berkebutuhan_khusus
        ,SUM(rumah_sehat_layak_huni) as jml_rumah_sehat_layak_huni
        ,SUM(rumah_tidak_sehat_layak_huni) as jml_rumah_tidak_sehat_layak_huni
        ,SUM(rumah_memiliki_tps) as jml_rumah_memiliki_tps
        ,SUM(rumah_memiliki_spal) as jml_rumah_memiliki_spal
        ,SUM(rumah_memiliki_jamban) as jml_rumah_memiliki_jamban
        ,SUM(rumah_menempel_sp4k) as jml_rumah_menempel_sp4k
        ,SUM(pdam) as jml_pdam
        ,SUM(sumur) as jml_sumur
        ,SUM(sumber_air_lain) as jml_sumber_air_lain
        ,SUM(beras) as jml_beras
        ,SUM(non_beras) as jml_non_beras
        ,SUM(mengikuti_up2k) as jml_mengikuti_up2k
        ,SUM(pemanfaatan_tanah) as jml_pemanfaatan_tanah
        ,SUM(industri_rumah_tangga) as jml_industri_rumah_tangga
        ,SUM(kerja_bhakti) as jml_kerja_bhakti');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kecamatan', $kecamatan);
        $this->db->where($this->table . '.desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where($this->table . '.rw', $rw);
        $this->db->where('level', 'rt');
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function check_rt($year,$kecamatan,$desa,$dusun,$rw,$rt)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kecamatan', $kecamatan);
        $this->db->where($this->table . '.desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where($this->table . '.rw', $rw);
        $this->db->where($this->table . '.rt', $rt);
        $this->db->where($this->table . '.level', 'rt');
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();

        return $query;
    }
    public function check_dasawisma($year,$kecamatan,$desa,$dusun,$rw,$rt,$dasawisma)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kecamatan', $kecamatan);
        $this->db->where($this->table . '.desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where($this->table . '.rw', $rw);
        $this->db->where($this->table . '.rt', $rt);
        $this->db->where($this->table . '.level', 'dasawisma');
        $this->db->where($this->table . '.dasawisma', $dasawisma);
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();

        return $query;
    }
    public function get_rt($year,$kecamatan,$desa,$dusun,$rw,$rt)
    {
        $this->db->select('SUM(jumlah_kk) as jml_jumlah_kk
        ,SUM(total_laki) as jml_total_laki
        ,SUM(total_perempuan) as jml_total_perempuan
        ,SUM(balita_laki) as jml_balita_laki
        ,SUM(balita_perempuan) as jml_balita_perempuan
        ,SUM(jumlah_PUS) as jml_jumlah_PUS
        ,SUM(jumlah_WUS) as jml_jumlah_WUS
        ,SUM(jumlah_ibu_hamil) as jml_jumlah_ibu_hamil
        ,SUM(jumlah_menyusui) as jml_jumlah_menyusui
        ,SUM(jumlah_lansia) as jml_jumlah_lansia
        ,SUM(jumlah_buta) as jml_jumlah_buta
        ,SUM(berkebutuhan_khusus) as jml_berkebutuhan_khusus
        ,SUM(rumah_sehat_layak_huni) as jml_rumah_sehat_layak_huni
        ,SUM(rumah_tidak_sehat_layak_huni) as jml_rumah_tidak_sehat_layak_huni
        ,SUM(rumah_memiliki_tps) as jml_rumah_memiliki_tps
        ,SUM(rumah_memiliki_spal) as jml_rumah_memiliki_spal
        ,SUM(rumah_memiliki_jamban) as jml_rumah_memiliki_jamban
        ,SUM(rumah_menempel_sp4k) as jml_rumah_menempel_sp4k
        ,SUM(pdam) as jml_pdam
        ,SUM(sumur) as jml_sumur
        ,SUM(sumber_air_lain) as jml_sumber_air_lain
        ,SUM(beras) as jml_beras
        ,SUM(non_beras) as jml_non_beras
        ,SUM(mengikuti_up2k) as jml_mengikuti_up2k
        ,SUM(pemanfaatan_tanah) as jml_pemanfaatan_tanah
        ,SUM(industri_rumah_tangga) as jml_industri_rumah_tangga
        ,SUM(kerja_bhakti) as jml_kerja_bhakti');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kecamatan', $kecamatan);
        $this->db->where($this->table . '.desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where($this->table . '.rw', $rw);
        $this->db->where($this->table . '.rt', $rt);
        $this->db->where('level', 'dasawisma');
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function get_dasawisma($kecamatan,$desa,$dusun,$rw,$rt,$dasawisma)
    {
        $this->db->select('SUM(jumlah_kk) as jml_jumlah_kk
        ,SUM(total_laki) as jml_total_laki
        ,SUM(total_perempuan) as jml_total_perempuan
        ,SUM(balita_laki) as jml_balita_laki
        ,SUM(balita_perempuan) as jml_balita_perempuan
        ,SUM(jumlah_PUS) as jml_jumlah_PUS
        ,SUM(jumlah_WUS) as jml_jumlah_WUS
        ,SUM(jumlah_ibu_hamil) as jml_jumlah_ibu_hamil
        ,SUM(jumlah_menyusui) as jml_jumlah_menyusui
        ,SUM(jumlah_lansia) as jml_jumlah_lansia
        ,SUM(jumlah_buta) as jml_jumlah_buta
        ,SUM(berkebutuhan_khusus) as jml_berkebutuhan_khusus
        ,SUM(rumah_sehat_layak_huni) as jml_rumah_sehat_layak_huni
        ,SUM(rumah_tidak_sehat_layak_huni) as jml_rumah_tidak_sehat_layak_huni
        ,SUM(rumah_memiliki_tps) as jml_rumah_memiliki_tps
        ,SUM(rumah_memiliki_spal) as jml_rumah_memiliki_spal
        ,SUM(rumah_memiliki_jamban) as jml_rumah_memiliki_jamban
        ,SUM(rumah_menempel_sp4k) as jml_rumah_menempel_sp4k
        ,SUM(pdam) as jml_pdam
        ,SUM(sumur) as jml_sumur
        ,SUM(sumber_air_lain) as jml_sumber_air_lain
        ,SUM(beras) as jml_beras
        ,SUM(non_beras) as jml_non_beras
        ,SUM(mengikuti_up2k) as jml_mengikuti_up2k
        ,SUM(pemanfaatan_tanah) as jml_pemanfaatan_tanah
        ,SUM(industri_rumah_tangga) as jml_industri_rumah_tangga
        ,SUM(kerja_bhakti) as jml_kerja_bhakti');
        $this->db->where($this->table . '.kecamatan', $kecamatan);
        $this->db->where($this->table . '.desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where($this->table . '.rw', $rw);
        $this->db->where($this->table . '.rt', $rt);
        $this->db->where($this->table . '.dasawisma', $dasawisma);
        $this->db->where('level', 'keluarga');
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();

        return $query;
    }
}
