<?php

class Umum_model extends MY_Model
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
        $select .= $this->kecamatan . ".Kd_Kec, ";
        $select .= $this->kecamatan . ".Nama_Kecamatan, ";
        $select .= $this->desa . ".Kd_Desa, ";
        $select .= $this->desa . ".Nama_Desa, ";

        return $select;
    }

    public function datatables()
    {
        $this->datatables->select($this->_get_select().$this->dusun . ".dusun as nama_dusun, ");
        $this->datatables->from($this->table);
        $this->datatables->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->datatables->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa', 'left');
        $this->datatables->join($this->dusun, $this->dusun . '.id = ' . $this->table . '.dusun', 'left');
        $this->datatables->where('level','kecamatan');
        $this->datatables->where($this->table . '.visible', 1);
        return $this->datatables->generate();
    }
}