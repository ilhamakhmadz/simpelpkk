<?php

class Profil_model extends MY_Model
{
    protected $table = 'pkk';
    protected $anggota = 'pkk_anggota';
    protected $aparatur = 'pkk_aparatur';
    protected $kecamatan = 'master_kecamatan';
    protected $desa = 'master_desa';
    protected $dusun = 'master_dusun';
    private $ci;

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_select()
    {
        $select = $this->table . ".id,";
        $select .= $this->table . ".kode_kecamatan, ";
        $select .= $this->table . ".kode_desa, ";
        $select .= $this->table . ".dusun, ";
        $select .= $this->table . ".rw, ";
        $select .= $this->table . ".rt, ";
        $select .= $this->table . ".level, ";
        $select .= $this->table . ".jml_kelompok_pkk_rw, ";
        $select .= $this->table . ".jml_kelompok_pkk_rt, ";
        $select .= $this->table . ".jml_kelompok_dasawisma, ";
        $select .= $this->table . ".jml_krt, ";
        $select .= $this->table . ".jml_kk, ";
        $select .= $this->table . ".jml_laki, ";
        $select .= $this->table . ".jml_perempuan, ";
        $select .= $this->table . ".jml_penduduk, ";
        $select .= $this->table . ".jml_anggota_tp_pkk_laki, ";
        $select .= $this->table . ".jml_anggota_tp_pkk_perempuan, ";
        $select .= $this->table . ".jml_kader_umum_laki, ";
        $select .= $this->table . ".jml_kader_umum_perempuan, ";
        $select .= $this->table . ".jml_kader_khusus_laki, ";
        $select .= $this->table . ".jml_kader_khusus_perempuan, ";
        $select .= $this->table . ".jml_tenaga_sek_honorer_laki, ";
        $select .= $this->table . ".jml_tenaga_sek_honorer_perempuan, ";
        $select .= $this->table . ".jml_tenaga_sek_bantuan_laki, ";
        $select .= $this->table . ".jml_tenaga_sek_bantuan_perempuan, ";
        $select .= $this->table . ".keterangan, ";
        $select .= $this->table . ".jml_kader_khusus_laki, ";
        $select .= $this->table . ".jml_kader_khusus_laki, ";
        $select .= $this->table . ".date_year, ";
        $select .= $this->table . ".created_date, ";
        $select .= $this->table . ".created_id, ";
        $select .= $this->table . ".updated_date, ";
        $select .= $this->table . ".updated_id, ";
        $select .= $this->table . ".visible, ";
        $select .= $this->kecamatan . ".Kd_Kec, ";
        $select .= $this->kecamatan . ".Nama_Kecamatan, ";
        // $select .= $this->aparatur . ".kepala_desa, ";
        $select .= $this->desa . ".Kd_Desa, ";
        $select .= $this->desa . ".Nama_Desa, ";

        return $select;
    }

    public function datatables_kecamatan($level)
    {
        $this->datatables->select($this->_get_select().$this->dusun . ".dusun as nama_dusun, ");
        $this->datatables->from($this->table);
        $this->datatables->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->datatables->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa', 'left');
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
                $this->datatables->where($this->table . '.kode_kecamatan', $this->session->userdata('kec_id'));
            }
        } elseif ($this->session->userdata('level_id') == 4) {
            if ($this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.kode_kecamatan', $this->session->userdata('kec_id'));
                $this->datatables->where($this->table . '.kode_desa', $this->session->userdata('desa_id'));
            }
        } elseif ($this->session->userdata('level_id') == 5) {
            if ($this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.kode_kecamatan', $this->session->userdata('kec_id'));
                $this->datatables->where($this->table . '.kode_desa', $this->session->userdata('desa_id'));
                $this->datatables->where($this->table . '.dusun', $this->session->userdata('dusun_id'));
            }
        }elseif ($this->session->userdata('level_id') == 6) {
            if ($this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.kode_kecamatan', $this->session->userdata('kec_id'));
                $this->datatables->where($this->table . '.kode_desa', $this->session->userdata('desa_id'));
                $this->datatables->where($this->table . '.dusun', $this->session->userdata('dusun_id'));
                $this->datatables->where($this->table . '.rw', $this->session->userdata('rw'));
            }
        }elseif ($this->session->userdata('level_id') == 7) {
            if ($this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.kode_kecamatan', $this->session->userdata('kec_id'));
                $this->datatables->where($this->table . '.kode_desa', $this->session->userdata('desa_id'));
                $this->datatables->where($this->table . '.dusun', $this->session->userdata('dusun_id'));
                $this->datatables->where($this->table . '.rw', $this->session->userdata('rw'));
                $this->datatables->where($this->table . '.rt', $this->session->userdata('rt'));
            }
        }
        $this->datatables->where($this->table . '.visible', 1);
        return $this->datatables->generate();
    }

    public function cetak_pdf($tipe,$year){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        if($tipe == 1){
            $this->db->where('level','kecamatan');
        }
        $this->db->where('date_year', $year);
        $this->db->order_by($this->kecamatan . '.Nama_Kecamatan', 'asc');
        return $this->db->get()->result();
    }


    public function add($data)
    {
        $this->db->insert($this->table, $data);
        $inserted = $this->db->insert_id();


        return $inserted;
    }

    // TAMBAH DATA PRASARANA
    public function add_anggota($data)
    {
        $this->db->insert($this->anggota, $data);
        $inserted = $this->db->insert_id();

        return $inserted;
    }
    public function add_aparatur($data)
    {
        $this->db->insert($this->aparatur, $data);
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
        $data = $this->db->delete($this->table, array('id' => $idString));
        return $id;
    }

    public function delete_aparatur($id)
    {
        $idString = (int)$id;
        $data = $this->db->delete($this->aparatur, array('id' => $idString));
        return true;
    }

    public function delete_anggota($id)
    {
        $idString = (int)$id;
        $data = $this->db->delete($this->anggota, array('id' => $idString));
        return $id;
    }
    public function get_by_id($id)
    {
        $this->db->select($this->_get_select().$this->dusun . ".dusun as nama_dusun, ");
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa', 'left');
        $this->db->join($this->dusun, $this->dusun . '.id = ' . $this->table . '.dusun', 'left');
        $this->db->where($this->table . '.id', $id);
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function get_aparatur_kec($year,$kec)
    {
        $this->db->select('*');        
        $this->db->where($this->aparatur . '.kode_kecamatan', $kec);
        $this->db->where($this->aparatur . '.kode_desa','null');
        $this->db->where($this->aparatur . '.dusun', 'null');
        $this->db->where($this->aparatur . '.rw', 'null');
        $this->db->where($this->aparatur . '.rt', 'null');
        // $this->db->where($this->aparatur . '.date_year', $year);
        $query = $this->db->get($this->aparatur)->row();

        return $query;
    }
    public function get_anggota_kec($year,$kec)
    {
        $this->db->select('*');
        $this->db->where($this->anggota . '.kode_kecamatan', $kec);
        $this->db->where($this->anggota . '.kode_desa', 'null');
        $this->db->where($this->anggota . '.dusun', 'null');
        $this->db->where($this->anggota . '.rw', 'null');
        $this->db->where($this->anggota . '.rt', 'null');
        $this->db->where($this->anggota . '.visible', 1);
        // $this->db->where($this->anggota . '.date_year', $year);
        $query = $this->db->get($this->anggota)->result();

        return $query;
    }
    public function get_aparatur_desa($year,$kec,$desa)
    {
        $this->db->select('*');        
        $this->db->where($this->aparatur . '.kode_kecamatan', $kec);
        $this->db->where($this->aparatur . '.kode_desa', $desa);
        $this->db->where($this->aparatur . '.dusun', 'null');
        $this->db->where($this->aparatur . '.rw', 'null');
        $this->db->where($this->aparatur . '.rt', 'null');
        // $this->db->where($this->aparatur . '.date_year', $year);
        $query = $this->db->get($this->aparatur)->row();

        return $query;
    }
    public function get_anggota_desa($year,$kec,$desa)
    {
        $this->db->select('*');
        $this->db->where($this->anggota . '.kode_kecamatan', $kec);
        $this->db->where($this->anggota . '.kode_desa', $desa);
        $this->db->where($this->anggota . '.dusun', 'null');
        $this->db->where($this->anggota . '.rw', 'null');
        $this->db->where($this->anggota . '.rt', 'null');
        $this->db->where($this->anggota . '.visible', 1);
        // $this->db->where($this->anggota . '.date_year', $year);
        $query = $this->db->get($this->anggota)->result();

        return $query;
    }
    public function get_aparatur_dusun($year,$kec,$desa,$dusun)
    {
        $this->db->select('*');        
        $this->db->where($this->aparatur . '.kode_kecamatan', $kec);
        $this->db->where($this->aparatur . '.kode_desa', $desa);
        $this->db->where($this->aparatur . '.dusun', $dusun);
        $this->db->where($this->aparatur . '.rw', 'null');
        $this->db->where($this->aparatur . '.rt', 'null');
        // $this->db->where($this->aparatur . '.date_year', $year);
        $query = $this->db->get($this->aparatur)->row();

        return $query;
    }
    public function get_anggota_dusun($year,$kec,$desa,$dusun)
    {
        $this->db->select('*');
        $this->db->where($this->anggota . '.kode_kecamatan', $kec);
        $this->db->where($this->anggota . '.kode_desa', $desa);
        $this->db->where($this->anggota . '.dusun', $dusun);
        $this->db->where($this->anggota . '.rw', 'null');
        $this->db->where($this->anggota . '.rt', 'null');
        $this->db->where($this->anggota . '.visible', 1);
        // $this->db->where($this->anggota . '.date_year', $year);
        $query = $this->db->get($this->anggota)->result();

        return $query;
    }
    public function get_aparatur_rw($year,$kec,$desa,$dusun,$rw)
    {
        $this->db->select('*');        
        $this->db->where($this->aparatur . '.kode_kecamatan', $kec);
        $this->db->where($this->aparatur . '.kode_desa', $desa);
        $this->db->where($this->aparatur . '.dusun', $dusun);
        $this->db->where($this->aparatur . '.rw', $rw);
        $this->db->where($this->aparatur . '.rt', 'null');
        // $this->db->where($this->aparatur . '.date_year', $year);
        $query = $this->db->get($this->aparatur)->row();

        return $query;
    }
    public function get_anggota_rw($year,$kec,$desa,$dusun,$rw)
    {
        $this->db->select('*');
        $this->db->where($this->anggota . '.kode_kecamatan', $kec);
        $this->db->where($this->anggota . '.kode_desa', $desa);
        $this->db->where($this->anggota . '.dusun', $dusun);
        $this->db->where($this->anggota . '.rw', $rw);
        $this->db->where($this->anggota . '.rt', 'null');
        $this->db->where($this->anggota . '.visible', 1);
        // $this->db->where($this->anggota . '.date_year', $year);
        $query = $this->db->get($this->anggota)->result();

        return $query;
    }
    public function get_aparatur_rt($year,$kec,$desa,$dusun,$rw,$rt)
    {
        $this->db->select('*');        
        $this->db->where($this->aparatur . '.kode_kecamatan', $kec);
        $this->db->where($this->aparatur . '.kode_desa', $desa);
        $this->db->where($this->aparatur . '.dusun', $dusun);
        $this->db->where($this->aparatur . '.rw', $rw);
        $this->db->where($this->aparatur . '.rt', $rt);
        // $this->db->where($this->aparatur . '.date_year', $year);
        $query = $this->db->get($this->aparatur)->row();

        return $query;
    }
    public function get_anggota_rt($year,$kec,$desa,$dusun,$rw,$rt)
    {
        $this->db->select('*');
        $this->db->where($this->anggota . '.kode_kecamatan', $kec);
        $this->db->where($this->anggota . '.kode_desa', $desa);
        $this->db->where($this->anggota . '.dusun', $dusun);
        $this->db->where($this->anggota . '.rw', $rw);
        $this->db->where($this->anggota . '.rt', $rt);
        $this->db->where($this->anggota . '.visible', 1);
        // $this->db->where($this->anggota . '.date_year', $year);
        $query = $this->db->get($this->anggota)->result();

        return $query;
    }

    public function get_aparatur_year($level,$year,$kec,$desa,$dusun,$rw,$rt)
    {
        $this->db->select('*');
        if($level == 'rt'){
            $this->db->where($this->aparatur . '.kode_kecamatan', $kec);
            $this->db->where($this->aparatur . '.kode_desa', $desa);
            $this->db->where($this->aparatur . '.dusun', $dusun);
            $this->db->where($this->aparatur . '.rw', $rw);
            $this->db->where($this->aparatur . '.rt', $rt);
        }else if($level == 'rw'){
            $this->db->where($this->aparatur . '.kode_kecamatan', $kec);
            $this->db->where($this->aparatur . '.kode_desa', $desa);
            $this->db->where($this->aparatur . '.dusun', $dusun);
            $this->db->where($this->aparatur . '.rw', $rw);
        }else if($level == 'dusun'){
            $this->db->where($this->aparatur . '.kode_kecamatan', $kec);
            $this->db->where($this->aparatur . '.kode_desa', $desa);
            $this->db->where($this->aparatur . '.dusun', $dusun);
        }else if($level == 'desa'){
            $this->db->where($this->aparatur . '.kode_kecamatan', $kec);
            $this->db->where($this->aparatur . '.kode_desa', $desa);
        }else if($level == 'desa'){
            $this->db->where($this->aparatur . '.kode_kecamatan', $kec);
        }
        $this->db->where($this->aparatur . '.level', $level);
        $this->db->where($this->aparatur . '.date_year', $year);

        $query = $this->db->get($this->aparatur)->row();

        return $query;
    }
    public function get_anggota_year($level,$year,$kec,$desa,$dusun,$rw,$rt)
    {
        $this->db->select('*');
        if($level == 'rt'){
            $this->db->where($this->anggota . '.kode_kecamatan', $kec);
            $this->db->where($this->anggota . '.kode_desa', $desa);
            $this->db->where($this->anggota . '.dusun', $dusun);
            $this->db->where($this->anggota . '.rw', $rw);
            $this->db->where($this->anggota . '.rt', $rt);
        }else if($level == 'rw'){
            $this->db->where($this->anggota . '.kode_kecamatan', $kec);
            $this->db->where($this->anggota . '.kode_desa', $desa);
            $this->db->where($this->anggota . '.dusun', $dusun);
            $this->db->where($this->anggota . '.rw', $rw);
        }else if($level == 'dusun'){
            $this->db->where($this->anggota . '.kode_kecamatan', $kec);
            $this->db->where($this->anggota . '.kode_desa', $desa);
            $this->db->where($this->anggota . '.dusun', $dusun);
        }else if($level == 'desa'){
            $this->db->where($this->anggota . '.kode_kecamatan', $kec);
            $this->db->where($this->anggota . '.kode_desa', $desa);
        }else if($level == 'desa'){
            $this->db->where($this->anggota . '.kode_kecamatan', $kec);
        };
        $this->db->where($this->anggota . '.level', $level);
        $this->db->where($this->anggota . '.date_year', $year);
        $query = $this->db->get($this->anggota)->result();

        return $query;
    }

    public function edit($id, $data)
    {
        $this->db->update($this->table, $data, array('id' => $id));

        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('id' => $id))->row();

        return $updated;
    }
    public function edit_aparatur($id, $data)
    {
        $this->db->update($this->aparatur, $data, array('id' => $id));

        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->aparatur, array('id' => $id))->row();

        return $updated;
    }

    // HOME DASHBOARD
    public function get_all_penduduk()
    {
        $this->db->select('SUM(jml_perempuan) as perempuan, SUM(jml_laki) as laki, SUM(jml_penduduk) as penduduk');
        $this->db->from($this->table);
        $this->db->where($this->table . '.visible', 1);
        $this->db->where($this->table . '.date_year', date('Y'));
        return $this->db->get()->row();
    }

    public function get_lp()
    {
        $this->db->select('SUM(jml_perempuan) as perempuan, SUM(jml_laki) as laki');
        $this->db->from($this->table);
        $this->db->where($this->table . '.visible', 1);
        return $this->db->get()->row();
    }

    public function get_by_desa()
    {
        $this->db->select('Nama_Desa as nama_desa, Nama_Kecamatan as nama_kecamatan, SUM(jml_perempuan) as perempuan, SUM(jml_laki) as laki, SUM(jml_penduduk) as penduduk');
        $this->db->from($this->table);
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa');
        $this->db->where($this->table . '.visible', 1);
        $this->db->where($this->table . '.date_year', date('Y'));
        $this->db->group_by($this->table . '.kode_desa');
        $this->db->order_by($this->table . '.kode_desa', 'DESC');
        return $this->db->get()->result();
    }
    public function get_idm()
    {
        $this->db->select('idm,COUNT(idm) AS jumlah_idm');
        $this->db->from($this->table);
        $this->db->where($this->table . '.visible', 1);
        $this->db->group_by($this->table . '.idm');
        return $this->db->get()->row();
    }

    public function get_by_kecamatan()
    {
        $this->db->select('Nama_Kecamatan as nama_kecamatan, SUM(jml_perempuan) as perempuan, SUM(jml_laki) as laki, SUM(jml_penduduk) as penduduk');
        $this->db->from($this->table);
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->db->where($this->table . '.visible', 1);
        $this->db->where($this->table . '.date_year', date('Y'));
        $this->db->group_by($this->table . '.kode_kecamatan');
        $this->db->order_by($this->table . '.kode_kecamatan', 'DESC');
        return $this->db->get()->result();
    }

    //Digunakan untuk frontend
    public function get_profil_dinas()
    {
        $this->db->select('*');
        $this->db->order_by('created_date', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('dinas_profil')->row();

        return $query;
    }

    public function get_idm_desa($tahun)
    {
        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa');
        $this->db->where('date_year', $tahun);
        $this->db->where($this->table.'.visible', 1);
        $query = $this->db->get()->result();

        return $query;
    }

    public function check_kecamatan($year, $kec)
    {
        $this->db->select('*');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where('level', 'kecamatan');
        $this->db->where($this->table . '.kode_kecamatan', $kec);
        $this->db->where($this->table . '.kode_desa', 'null');
        $this->db->where($this->table . '.dusun', 'null');
        $this->db->where($this->table . '.rw', 'null');
        $this->db->where($this->table . '.rt', 'null');
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();
        return $query;
    }

    public function check_desa($year,$kec, $desa)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->datatables->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa');
        $this->datatables->join($this->aparatur, $this->aparatur . '.kode_desa = ' . $this->table . '.kode_desa', 'left');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kode_kecamatan', $kec);
        $this->db->where($this->table . '.kode_desa', $desa);
        $this->db->where($this->table . '.dusun', 'null');
        $this->db->where($this->table . '.rw', 'null');
        $this->db->where($this->table . '.rt', 'null');
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();
        return $query;
    }
    public function get_desa($year,$kecamatan){
        {
            $this->db->select('
                    SUM(jml_kelompok_pkk_rt) AS jml_kelompok_pkk_rt,
                    SUM(jml_kelompok_dasawisma) AS jml_kelompok_dasawisma,
                    SUM(jml_kelompok_pkk_rw) AS jml_kelompok_pkk_rw,
                    SUM(jml_krt) AS jml_krt,
                    SUM(jml_kk) AS jml_kk,
                    SUM(jml_laki) AS jml_laki,
                    SUM(jml_perempuan) AS jml_perempuan,
                    SUM(jml_penduduk) AS jml_penduduk,
                    SUM(jml_anggota_tp_pkk_laki) AS jml_anggota_tp_pkk_laki,
                    SUM(jml_anggota_tp_pkk_perempuan) AS jml_anggota_tp_pkk_perempuan,
                    SUM(jml_kader_umum_laki) AS jml_kader_umum_laki,
                    SUM(jml_kader_umum_perempuan) AS jml_kader_umum_perempuan,
                    SUM(jml_kader_khusus_laki) AS jml_kader_khusus_laki,
                    SUM(jml_kader_khusus_perempuan) AS jml_kader_khusus_perempuan,
                    SUM(jml_tenaga_sek_honorer_laki) AS jml_tenaga_sek_honorer_laki,
                    SUM(jml_tenaga_sek_honorer_perempuan) AS jml_tenaga_sek_honorer_perempuan,
                    SUM(jml_tenaga_sek_bantuan_laki) AS jml_tenaga_sek_bantuan_laki,
                    SUM(jml_tenaga_sek_bantuan_perempuan) AS jml_tenaga_sek_bantuan_perempuan');
            $this->db->where($this->table . '.date_year', $year);
            $this->db->where($this->table . '.kode_kecamatan', $kecamatan);
            $this->db->where($this->table . '.level', 'desa');
            $this->db->where($this->table . '.visible', 1);
            $query = $this->db->get($this->table)->row();
    
            return $query;
        }
    }

    public function check_dusun($year,$kecamatan,$desa,$dusun)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa');
        $this->db->join($this->aparatur, $this->aparatur . '.kode_desa = ' . $this->table . '.kode_desa', 'left');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kode_kecamatan', $kecamatan);
        $this->db->where($this->table . '.kode_desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where($this->table . '.rw', 'null');
        $this->db->where($this->table . '.rt', 'null');
        $this->db->where($this->table . '.visible', 1);

        $query = $this->db->get($this->table)->row();

        return $query;
    }
    public function get_dusun($year,$kecamatan,$desa){
        {
            $this->db->select('
                    SUM(jml_kelompok_pkk_rt) AS jml_kelompok_pkk_rt,
                    SUM(jml_kelompok_dasawisma) AS jml_kelompok_dasawisma,
                    SUM(jml_kelompok_pkk_rw) AS jml_kelompok_pkk_rw,
                    SUM(jml_krt) AS jml_krt,
                    SUM(jml_kk) AS jml_kk,
                    SUM(jml_laki) AS jml_laki,
                    SUM(jml_perempuan) AS jml_perempuan,
                    SUM(jml_penduduk) AS jml_penduduk,
                    SUM(jml_anggota_tp_pkk_laki) AS jml_anggota_tp_pkk_laki,
                    SUM(jml_anggota_tp_pkk_perempuan) AS jml_anggota_tp_pkk_perempuan,
                    SUM(jml_kader_umum_laki) AS jml_kader_umum_laki,
                    SUM(jml_kader_umum_perempuan) AS jml_kader_umum_perempuan,
                    SUM(jml_kader_khusus_laki) AS jml_kader_khusus_laki,
                    SUM(jml_kader_khusus_perempuan) AS jml_kader_khusus_perempuan,
                    SUM(jml_tenaga_sek_honorer_laki) AS jml_tenaga_sek_honorer_laki,
                    SUM(jml_tenaga_sek_honorer_perempuan) AS jml_tenaga_sek_honorer_perempuan,
                    SUM(jml_tenaga_sek_bantuan_laki) AS jml_tenaga_sek_bantuan_laki,
                    SUM(jml_tenaga_sek_bantuan_perempuan) AS jml_tenaga_sek_bantuan_perempuan');
            $this->db->where($this->table . '.date_year', $year);
            $this->db->where($this->table . '.kode_kecamatan', $kecamatan);
            $this->db->where($this->table . '.kode_desa', $desa);
            $this->db->where($this->table . '.level', 'dusun');
            $this->db->where($this->table . '.visible', 1);
            $query = $this->db->get($this->table)->row();
    
            return $query;
        }
    }

    public function check_rw($year,$kecamatan,$desa,$dusun,$rw)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa');
        $this->db->join($this->aparatur, $this->aparatur . '.kode_desa = ' . $this->table . '.kode_desa', 'left');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kode_kecamatan', $kecamatan);
        $this->db->where($this->table . '.kode_desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where($this->table . '.rw', $rw);
        $this->db->where($this->table . '.rt', 'null');
        $this->db->where($this->table . '.visible', 1);

        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function get_rw($year,$kecamatan,$desa,$dusun){
        {
            $this->db->select('
                    SUM(jml_kelompok_pkk_rt) AS jml_kelompok_pkk_rt,
                    SUM(jml_kelompok_dasawisma) AS jml_kelompok_dasawisma,
                    SUM(jml_kelompok_pkk_rw) AS jml_kelompok_pkk_rw,
                    SUM(jml_krt) AS jml_krt,
                    SUM(jml_kk) AS jml_kk,
                    SUM(jml_laki) AS jml_laki,
                    SUM(jml_perempuan) AS jml_perempuan,
                    SUM(jml_penduduk) AS jml_penduduk,
                    SUM(jml_anggota_tp_pkk_laki) AS jml_anggota_tp_pkk_laki,
                    SUM(jml_anggota_tp_pkk_perempuan) AS jml_anggota_tp_pkk_perempuan,
                    SUM(jml_kader_umum_laki) AS jml_kader_umum_laki,
                    SUM(jml_kader_umum_perempuan) AS jml_kader_umum_perempuan,
                    SUM(jml_kader_khusus_laki) AS jml_kader_khusus_laki,
                    SUM(jml_kader_khusus_perempuan) AS jml_kader_khusus_perempuan,
                    SUM(jml_tenaga_sek_honorer_laki) AS jml_tenaga_sek_honorer_laki,
                    SUM(jml_tenaga_sek_honorer_perempuan) AS jml_tenaga_sek_honorer_perempuan,
                    SUM(jml_tenaga_sek_bantuan_laki) AS jml_tenaga_sek_bantuan_laki,
                    SUM(jml_tenaga_sek_bantuan_perempuan) AS jml_tenaga_sek_bantuan_perempuan');
            $this->db->where($this->table . '.date_year', $year);
            $this->db->where($this->table . '.kode_kecamatan', $kecamatan);
            $this->db->where($this->table . '.kode_desa', $desa);
            $this->db->where($this->table . '.dusun', $dusun);
            $this->db->where($this->table . '.level', 'rw');
            $this->db->where($this->table . '.visible', 1);
            $query = $this->db->get($this->table)->row();
    
            return $query;
        }
    }

    public function check_rt($year,$kecamatan,$desa,$dusun,$rw,$rt)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa');
        $this->db->join($this->aparatur, $this->aparatur . '.kode_desa = ' . $this->table . '.kode_desa', 'left');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kode_kecamatan', $kecamatan);
        $this->db->where($this->table . '.kode_desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where($this->table . '.rw', $rw);
        $this->db->where($this->table . '.rt', $rt);
        $this->db->where($this->table . '.visible', 1);

        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function get_rt($year,$kecamatan,$desa,$dusun,$rw)
    {
        $this->db->select('
                SUM(jml_kelompok_pkk_rt) AS jml_kelompok_pkk_rt,
                SUM(jml_kelompok_dasawisma) AS jml_kelompok_dasawisma,
                SUM(jml_kelompok_pkk_rw) AS jml_kelompok_pkk_rw,
                SUM(jml_krt) AS jml_krt,
                SUM(jml_kk) AS jml_kk,
                SUM(jml_laki) AS jml_laki,
                SUM(jml_perempuan) AS jml_perempuan,
                SUM(jml_penduduk) AS jml_penduduk,
                SUM(jml_anggota_tp_pkk_laki) AS jml_anggota_tp_pkk_laki,
                SUM(jml_anggota_tp_pkk_perempuan) AS jml_anggota_tp_pkk_perempuan,
                SUM(jml_kader_umum_laki) AS jml_kader_umum_laki,
                SUM(jml_kader_umum_perempuan) AS jml_kader_umum_perempuan,
                SUM(jml_kader_khusus_laki) AS jml_kader_khusus_laki,
                SUM(jml_kader_khusus_perempuan) AS jml_kader_khusus_perempuan,
                SUM(jml_tenaga_sek_honorer_laki) AS jml_tenaga_sek_honorer_laki,
                SUM(jml_tenaga_sek_honorer_perempuan) AS jml_tenaga_sek_honorer_perempuan,
                SUM(jml_tenaga_sek_bantuan_laki) AS jml_tenaga_sek_bantuan_laki,
                SUM(jml_tenaga_sek_bantuan_perempuan) AS jml_tenaga_sek_bantuan_perempuan');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kode_kecamatan', $kecamatan);
        $this->db->where($this->table . '.kode_desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where($this->table . '.rw', $rw);
        $this->db->where($this->table . '.level', 'rt');
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();

        return $query;
    }
}
