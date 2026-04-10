<?php

class Home_model extends MY_Model
{
    protected $table = 'pkk';
    protected $anggota = 'pkk_anggota';
    protected $aparatur = 'pkk_aparatur';
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
        return $select;
    }

    public function get_jml_kec()
    {
        $this->db->select('COUNT(level) as jml_kec');
        $this->db->from($this->table);
        $this->db->where($this->table . '.visible', 1);
        $this->db->where($this->table . '.level', 'kecamatan');
        $this->db->where($this->table . '.date_year', date('Y'));
        return $this->db->get()->row();
    }

    public function get_jml_desa()
    {
        $this->db->select('COUNT(level) as jml_desa');
        $this->db->from($this->table);
        $this->db->where($this->table . '.visible', 1);
        $this->db->where($this->table . '.level', 'desa');
        $this->db->where($this->table . '.date_year', date('Y'));
        return $this->db->get()->row();
    }

    public function get_jml_rw()
    {
        $this->db->select('SUM(jml_kelompok_pkk_rw) as jml_rw');
        $this->db->from($this->table);
        $this->db->where($this->table . '.visible', 1);
        $this->db->where($this->table . '.level', 'kecamatan');
        $this->db->where($this->table . '.date_year', date('Y'));
        return $this->db->get()->row();
    }

    public function get_jml_rt()
    {
        $this->db->select('SUM(jml_kelompok_pkk_rt) as jml_rt');
        $this->db->from($this->table);
        $this->db->where($this->table . '.visible', 1);
        $this->db->where($this->table . '.level', 'kecamatan');
        $this->db->where($this->table . '.date_year', date('Y'));
        return $this->db->get()->row();
    }

    public function get_jml_dasawisma()
    {
        $this->db->select('SUM(jml_kelompok_dasawisma) as jml_dasawisma');
        $this->db->from($this->table);
        $this->db->where($this->table . '.visible', 1);
        $this->db->where($this->table . '.level', 'kecamatan');
        $this->db->where($this->table . '.date_year', date('Y'));
        return $this->db->get()->row();
    }

    public function get_jml_krt()
    {
        $this->db->select('SUM(jml_krt) as jml_krt');
        $this->db->from($this->table);
        $this->db->where($this->table . '.visible', 1);
        $this->db->where($this->table . '.level', 'kecamatan');
        $this->db->where($this->table . '.date_year', date('Y'));
        return $this->db->get()->row();
    }

    public function get_jml_kk()
    {
        $this->db->select('SUM(jml_kk) as jml_kk');
        $this->db->from($this->table);
        $this->db->where($this->table . '.visible', 1);
        $this->db->where($this->table . '.level', 'kecamatan');
        $this->db->where($this->table . '.date_year', date('Y'));
        return $this->db->get()->row();
    }

    public function get_jml_penduduk()
    {
        $this->db->select('SUM(jml_penduduk) as jml_penduduk');
        $this->db->from($this->table);
        $this->db->where($this->table . '.visible', 1);
        $this->db->where($this->table . '.level', 'kecamatan');
        $this->db->where($this->table . '.date_year', date('Y'));
        return $this->db->get()->row();
    }

    public function get_jml_kader()
    {
        $this->db->select('SUM(jml_anggota_tp_pkk_laki) + SUM(jml_anggota_tp_pkk_perempuan) + 
        SUM(jml_kader_umum_laki) + SUM(jml_kader_umum_perempuan) + 
        SUM(jml_kader_khusus_laki) + SUM(jml_kader_khusus_perempuan)  as jml_kader');
        $this->db->from($this->table);
        $this->db->where($this->table . '.visible', 1);
        $this->db->where($this->table . '.level', 'kecamatan');
        $this->db->where($this->table . '.date_year', date('Y'));
        return $this->db->get()->row();
    }
    public function get_all_dokumen()
    {
        $this->db->select('*');
        $this->db->from("master_dokumen");
        $this->db->where("master_dokumen" . '.visible', 1);
        return $this->db->get()->result();
    }

    public function get_all_galeri()
    {
        $this->db->select('*');
        $this->db->from("master_galeri");
        $this->db->where("master_galeri" . '.visible', 1);
        return $this->db->get()->result();
    }
}
