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

    public function datatables_kecamatan($level)
    {        
        $this->datatables->select($this->_get_select().$this->dusun . ".dusun as nama_dusun, ");
        $this->datatables->from($this->table);
        $this->datatables->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan', 'left');
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

    public function add($data)
    {
        $this->db->insert($this->table, $data);
        $inserted = $this->db->insert_id();


        return $inserted;
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
        $this->db->delete($this->table, array('id' => $idString));
        $id = $this->db->select('*')->where('id', $id)->get($this->table)->row();
        return $id;
    }

    public function get_by_id($id)
    {
        $this->db->select($this->_get_select().$this->dusun . '.dusun as nama_dusun,master_kecamatan.Kd_Kec,master_desa.Kd_Desa');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa', 'left');
        $this->db->join($this->dusun, $this->dusun . '.id = ' . $this->table . '.dusun', 'left');
        $this->db->where($this->table . '.id', $id);
        $query = $this->db->get($this->table)->row();

        return $query;
    }


    public function edit($id, $data)
    {
        $this->db->update($this->table, $data, array('id' => $id));

        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('id' => $id))->row();

        return $updated;
    }

    public function get_anggota($kec, $desa)
    {
        $this->db->select($this->table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa', 'left');
        $this->db->where($this->table . '.kode_kecamatan', $kec);
        $this->db->where($this->table . '.kode_desa', $desa);
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->result();

        return $query;
    }
    
    public function check_kecamatan($year, $kec)
    {
        $this->db->select('*');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->db->where($this->table . '.kode_kecamatan', $kec);
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where('level', 'kecamatan');
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();
        return $query;
    }

    public function get_kecamatan($year, $kec)
    {
        $this->db->select('SUM(kader_pkdrt) as jml_kader_pkdrt,
        ,SUM(kader_pkdrt) as jml_kader_pkdrt
        ,SUM(kader_pkbn) as jml_kader_pkbn
        ,SUM(kader_polaasuh) as jml_kader_polaasuh
        ,SUM(pkbn_klpsimulasi) as jml_pkbn_klpsimulasi
        ,SUM(pkbn_angg) as jml_pkbn_angg
        ,SUM(pkdrt_klpsimulasi) as jml_pkdrt_klpsimulasi
        ,SUM(pkdrt_angg) as jml_pkdrt_angg
        ,SUM(polaasuh_klp) as jml_polaasuh_klp
        ,SUM(polaasuh_anggota) as jml_polaasuh_anggota
        ,SUM(lansia_klp) as jml_lansia_klp
        ,SUM(lansia_angg) as jml_lansia_angg
        ,SUM(kelompok_kerjabakti) as jml_kelompok_kerjabakti
        ,SUM(kelompok_kematian) as jml_kelompok_kematian
        ,SUM(kelompok_keagamaan) as jml_kelompok_keagamaan
        ,SUM(kelompok_jimpitan) as jml_kelompok_jimpitan
        ,SUM(kelompok_arisan) as jml_kelompok_arisan');
        $this->db->where($this->table . '.kode_kecamatan', $kec);
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.visible', 1);
        $this->db->where('level', 'desa');
        $query = $this->db->get($this->table)->row();
        return $query;
    }

    public function check_desa($year,$kec, $desa)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa');
        $this->db->where($this->table . '.kode_kecamatan', $kec);
        $this->db->where($this->table . '.kode_desa', $desa);
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.visible', 1);
        $this->db->where('level', 'desa');
        $query = $this->db->get($this->table)->row();
        return $query;
    }

    public function get_desa($year,$kec, $desa)
    {
        $this->db->select('SUM(kader_pkdrt) as jml_kader_pkdrt,
        ,SUM(kader_pkdrt) as jml_kader_pkdrt
        ,SUM(kader_pkbn) as jml_kader_pkbn
        ,SUM(kader_polaasuh) as jml_kader_polaasuh
        ,SUM(pkbn_klpsimulasi) as jml_pkbn_klpsimulasi
        ,SUM(pkbn_angg) as jml_pkbn_angg
        ,SUM(pkdrt_klpsimulasi) as jml_pkdrt_klpsimulasi
        ,SUM(pkdrt_angg) as jml_pkdrt_angg
        ,SUM(polaasuh_klp) as jml_polaasuh_klp
        ,SUM(polaasuh_anggota) as jml_polaasuh_anggota
        ,SUM(lansia_klp) as jml_lansia_klp
        ,SUM(lansia_angg) as jml_lansia_angg
        ,SUM(kelompok_kerjabakti) as jml_kelompok_kerjabakti
        ,SUM(kelompok_kematian) as jml_kelompok_kematian
        ,SUM(kelompok_keagamaan) as jml_kelompok_keagamaan
        ,SUM(kelompok_jimpitan) as jml_kelompok_jimpitan
        ,SUM(kelompok_arisan) as jml_kelompok_arisan');
        $this->db->where($this->table . '.kode_kecamatan', $kec);
        $this->db->where($this->table . '.kode_desa', $desa);
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.visible', 1);
        $this->db->where('level', 'dusun');
        $query = $this->db->get($this->table)->row();
        return $query;
    }

    public function check_dusun($year,$kecamatan,$desa,$dusun)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kode_kecamatan', $kecamatan);
        $this->db->where($this->table . '.kode_desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where('level', 'dusun');
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function get_dusun($year,$kecamatan,$desa,$dusun)
    {
        $this->db->select('SUM(kader_pkdrt) as jml_kader_pkdrt,
        ,SUM(kader_pkdrt) as jml_kader_pkdrt
        ,SUM(kader_pkbn) as jml_kader_pkbn
        ,SUM(kader_polaasuh) as jml_kader_polaasuh
        ,SUM(pkbn_klpsimulasi) as jml_pkbn_klpsimulasi
        ,SUM(pkbn_angg) as jml_pkbn_angg
        ,SUM(pkdrt_klpsimulasi) as jml_pkdrt_klpsimulasi
        ,SUM(pkdrt_angg) as jml_pkdrt_angg
        ,SUM(polaasuh_klp) as jml_polaasuh_klp
        ,SUM(polaasuh_anggota) as jml_polaasuh_anggota
        ,SUM(lansia_klp) as jml_lansia_klp
        ,SUM(lansia_angg) as jml_lansia_angg
        ,SUM(kelompok_kerjabakti) as jml_kelompok_kerjabakti
        ,SUM(kelompok_kematian) as jml_kelompok_kematian
        ,SUM(kelompok_keagamaan) as jml_kelompok_keagamaan
        ,SUM(kelompok_jimpitan) as jml_kelompok_jimpitan
        ,SUM(kelompok_arisan) as jml_kelompok_arisan');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kode_kecamatan', $kecamatan);
        $this->db->where($this->table . '.kode_desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where('level', 'rw');
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function check_rw($year,$kecamatan,$desa,$dusun,$rw)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kode_kecamatan', $kecamatan);
        $this->db->where($this->table . '.kode_desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where($this->table . '.rw', $rw);
        $this->db->where('level', 'rw');
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function get_rw($year,$kecamatan,$desa,$dusun,$rw)
    {
        $this->db->select('SUM(kader_pkdrt) as jml_kader_pkdrt,
        ,SUM(kader_pkdrt) as jml_kader_pkdrt
        ,SUM(kader_pkbn) as jml_kader_pkbn
        ,SUM(kader_polaasuh) as jml_kader_polaasuh
        ,SUM(pkbn_klpsimulasi) as jml_pkbn_klpsimulasi
        ,SUM(pkbn_angg) as jml_pkbn_angg
        ,SUM(pkdrt_klpsimulasi) as jml_pkdrt_klpsimulasi
        ,SUM(pkdrt_angg) as jml_pkdrt_angg
        ,SUM(polaasuh_klp) as jml_polaasuh_klp
        ,SUM(polaasuh_anggota) as jml_polaasuh_anggota
        ,SUM(lansia_klp) as jml_lansia_klp
        ,SUM(lansia_angg) as jml_lansia_angg
        ,SUM(kelompok_kerjabakti) as jml_kelompok_kerjabakti
        ,SUM(kelompok_kematian) as jml_kelompok_kematian
        ,SUM(kelompok_keagamaan) as jml_kelompok_keagamaan
        ,SUM(kelompok_jimpitan) as jml_kelompok_jimpitan
        ,SUM(kelompok_arisan) as jml_kelompok_arisan');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kode_kecamatan', $kecamatan);
        $this->db->where($this->table . '.kode_desa', $desa);
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
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.kode_kecamatan', $kecamatan);
        $this->db->where($this->table . '.kode_desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where($this->table . '.rw', $rw);
        $this->db->where($this->table . '.rt', $rt);
        $this->db->where('level', 'rt');
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();

        return $query;
    }
}
