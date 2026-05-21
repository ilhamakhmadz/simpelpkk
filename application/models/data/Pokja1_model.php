<?php

class Pokja1_model extends MY_Model
{
    protected $table = 'tbl_keg_pokja_1';
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
        $select .= $this->table . ".kader_pkdrt, ";
        $select .= $this->table . ".kader_pkbn, ";
        $select .= $this->table . ".kader_polaasuh, ";
        $select .= $this->table . ".pkbn_klpsimulasi, ";
        $select .= $this->table . ".pkbn_angg, ";
        $select .= $this->table . ".pkdrt_klpsimulasi, ";
        $select .= $this->table . ".pkdrt_angg, ";
        $select .= $this->table . ".polaasuh_klp, ";
        $select .= $this->table . ".polaasuh_anggota, ";
        $select .= $this->table . ".lansia_klp, ";
        $select .= $this->table . ".lansia_angg, ";
        $select .= $this->table . ".kelompok_kerjabakti, ";
        $select .= $this->table . ".kelompok_kematian, ";
        $select .= $this->table . ".kelompok_keagamaan, ";
        $select .= $this->table . ".kelompok_jimpitan, ";
        $select .= $this->table . ".kelompok_arisan, ";
        $select .= $this->table . ".keterangan, ";
        $select .= $this->table . ".date_year, ";
        $select .= $this->table . ".created_id, ";
        $select .= $this->table . ".updated_date, ";
        $select .= $this->table . ".updated_id, ";
        $select .= $this->table . ".visible, ";
        $select .= $this->kecamatan . ".Nama_Kecamatan, ";
        $select .= $this->desa . ".Nama_Desa, ";

        return $select;
    }

    public function datatables($year = null, $kec_id = null)
    {        
        $this->datatables->select($this->_get_select().$this->dusun . ".dusun as nama_dusun, ");
        $this->datatables->from($this->table);
        $this->datatables->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan', 'left');
        $this->datatables->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa', 'left');
        $this->datatables->join($this->dusun, $this->dusun . '.id = ' . $this->table . '.dusun', 'left');
        $this->datatables->where('level','kecamatan');
        $this->datatables->where($this->table . '.visible', 1);
        if ($year !== null && $year !== '') {
            $this->datatables->where($this->table . '.date_year', $year);
        }
        if ($kec_id !== null && $kec_id !== '') {
            $this->datatables->where($this->table . '.kode_kecamatan', $kec_id);
        }
        return $this->datatables->generate();
    }

}
