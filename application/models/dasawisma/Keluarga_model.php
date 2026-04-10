<?php

class keluarga_model extends MY_Model
{
    protected $table = 'data_keluarga';
    protected $join_table = 'data_keluarga_anggota';
    protected $kecamatan = 'master_kecamatan';
    protected $dasawisma = 'master_dasawisma';
    protected $dusun = 'master_dusun';
    protected $desa = 'master_desa';
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
        $this->datatables->select($this->_get_select().$this->dusun . ".dusun as nama_dusun, ");
        $this->datatables->from($this->table);
        $this->datatables->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan', 'left');
        $this->datatables->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa', 'left');
        $this->datatables->join($this->dusun, $this->dusun . '.id = ' . $this->table . '.dusun', 'left');
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
        $this->db->delete($this->join_table, array('id_data_keluarga' => $idString));
        $id = $this->db->select('*')->where('id_data_keluarga', $id)->get($this->join_table)->row();
        return $id;
    }

    public function get_by_id($id)
    {
        $this->db->select($this->_get_select().',master_kecamatan.Kd_Kec,master_desa.Kd_Desa,'.$this->dusun . ".dusun as nama_dusun, ".$this->dasawisma . ".dasawisma as nama_dasawisma, ");
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa', 'left');
        $this->db->join($this->dusun, $this->dusun . '.id = ' . $this->table . '.dusun', 'left');
        $this->db->join($this->dasawisma, $this->dasawisma . '.id = ' . $this->table . '.dasawisma', 'left');
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

    public function get_anggota_id($id)
    {
        $this->db->select($this->join_table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa,
        master_kebutuhan_khusus.nama as nama_cacat,
        master_gotong_royong.nama as nama_gotong_royong,
        master_ketrampilan.nama as nama_keterampilan,
        master_koperasi.nama as nama_koperasi,
        master_pangan.nama as nama_pangan,
        master_sandang.nama as nama_sandang,
        master_kesehatan.nama as nama_kesehatan,
        master_perencanaan_sehat.nama as nama_perencanaan_sehat,
        master_pancasila.nama as nama_pancasila,
        data_keluarga_anggota.keterangan as ket_anggota');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->join_table . '.kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->join_table . '.desa', 'left');
        $this->db->join('master_gotong_royong', 'master_gotong_royong.id = ' . $this->join_table . '.gotong_royong', 'left');
        $this->db->join('master_ketrampilan', 'master_ketrampilan.id = ' . $this->join_table . '.keterampilan', 'left');
        $this->db->join('master_koperasi', 'master_koperasi.id = ' . $this->join_table . '.koperasi', 'left');
        $this->db->join('master_pangan', 'master_pangan.id = ' . $this->join_table . '.pangan', 'left');
        $this->db->join('master_sandang', 'master_sandang.id = ' . $this->join_table . '.sandang', 'left');
        $this->db->join('master_kesehatan', 'master_kesehatan.id = ' . $this->join_table . '.kesehatan', 'left');
        $this->db->join('master_perencanaan_sehat', 'master_perencanaan_sehat.id = ' . $this->join_table . '.perencanaan_sehat', 'left');
        $this->db->join('master_kebutuhan_khusus', 'master_kebutuhan_khusus.id = ' . $this->join_table . '.cacat', 'left');
        $this->db->join('master_pancasila', 'master_pancasila.id = ' . $this->join_table . '.pancasila', 'left');
        $this->db->where($this->join_table . '.id_data_keluarga', $id);
        $this->db->where($this->join_table . '.visible', 1);
        $query = $this->db->get($this->join_table)->result();

        return $query;
    }

    public function get_anggota_year($kec, $desa, $year)
    {
        $this->db->select('*');
        $this->db->where($this->join_table . '.desa', $desa);
        $this->db->where($this->join_table . '.kecamatan', $kec);
        $this->db->where($this->join_table . '.date_year', $year);

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
         $this->db->where($this->table . '.kecamatan', $kec);
         $this->db->where($this->table . '.desa', 'null');
         $query = $this->db->get($this->table)->row();
         return $query;
     }

    public function check_desa($year, $desa)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.desa', $desa);
        $query = $this->db->get($this->table)->row();
        return $query;
    }

    public function get_dasawisma($desa,$dusun,$rw,$rt)
    {
        $this->db->select('id, dasawisma');
        $this->db->from('master_dasawisma');
        $this->db->where('Kd_Desa', $desa);
        $this->db->where('Kd_Dusun', $dusun);
        $this->db->where('rw', $rw);
        $this->db->where('rt', $rt);

        $query = $this->db->get()->result();
        return $query;
    }   
}
