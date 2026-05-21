<?php

class Pokja3_model extends MY_Model
{
    protected $table = 'tbl_keg_pokja_3';
    protected $kecamatan = 'master_kecamatan';
    protected $dusun = 'master_dusun';
    protected $desa = 'master_desa';
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
        $select .= $this->table . ".kader_pangan, ";
        $select .= $this->table . ".kader_sandang, ";
        $select .= $this->table . ".kader_tatalaksana_rumahtangga, ";
        $select .= $this->table . ".pangan_beras, ";
        $select .= $this->table . ".pangan_nonberas, ";
        $select .= $this->table . ".pangan_peternakan, ";
        $select .= $this->table . ".pangan_perikanan, ";
        $select .= $this->table . ".pangan_warunghidup, ";
        $select .= $this->table . ".pangan_lumbunghidup, ";
        $select .= $this->table . ".pangan_toga, ";
        $select .= $this->table . ".pangan_tanaman_keras, ";
        $select .= $this->table . ".industri_pangan, ";
        $select .= $this->table . ".insdustri_sandang, ";
        $select .= $this->table . ".industri_jasa, ";
        $select .= $this->table . ".rumah_sehat, ";
        $select .= $this->table . ".rumah_tidaksehat, ";
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

    public function datatables_kecamatan($level, $year = null, $kec_id = null)
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

        if ($year !== null && $year !== '') {
            $this->datatables->where($this->table . '.date_year', $year);
        }
        if ($kec_id !== null && $kec_id !== '') {
            $this->datatables->where($this->table . '.kode_kecamatan', $kec_id);
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
        $this->db->update($this->table, array('visible' => 0), array('id' => $idString));
        $id = $this->db->select('*')->where('id', $id)->get($this->table)->row();
        return $id;
    }

    public function get_by_id($id)
    {
        $this->db->select($this->_get_select().',master_kecamatan.Kd_Kec,master_desa.Kd_Desa');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa', 'left');
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
        $this->db->select('SUM(kader_pangan) as jml_kader_pangan, 
        SUM(kader_sandang) as jml_kader_sandang, 
        SUM(kader_tatalaksana_rumahtangga) as jml_kader_tatalaksana_rumahtangga, 
        SUM(pangan_beras) as jml_pangan_beras, 
        SUM(pangan_nonberas) as jml_pangan_nonberas, 
        SUM(pangan_peternakan) as jml_pangan_peternakan, 
        SUM(pangan_perikanan) as jml_pangan_perikanan, 
        SUM(pangan_warunghidup) as jml_pangan_warunghidup, 
        SUM(pangan_lumbunghidup) as jml_pangan_lumbunghidup, 
        SUM(pangan_toga) as jml_pangan_toga, 
        SUM(pangan_tanaman_keras) as jml_pangan_tanaman_keras, 
        SUM(industri_pangan) as jml_industri_pangan, 
        SUM(insdustri_sandang) as jml_insdustri_sandang, 
        SUM(industri_jasa) as jml_industri_jasa, 
        SUM(rumah_sehat) as jml_rumah_sehat, 
        SUM(rumah_tidaksehat) as jml_rumah_tidaksehat');
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
        $this->db->select('SUM(kader_pangan) as jml_kader_pangan, 
        SUM(kader_sandang) as jml_kader_sandang, 
        SUM(kader_tatalaksana_rumahtangga) as jml_kader_tatalaksana_rumahtangga, 
        SUM(pangan_beras) as jml_pangan_beras, 
        SUM(pangan_nonberas) as jml_pangan_nonberas, 
        SUM(pangan_peternakan) as jml_pangan_peternakan, 
        SUM(pangan_perikanan) as jml_pangan_perikanan, 
        SUM(pangan_warunghidup) as jml_pangan_warunghidup, 
        SUM(pangan_lumbunghidup) as jml_pangan_lumbunghidup, 
        SUM(pangan_toga) as jml_pangan_toga, 
        SUM(pangan_tanaman_keras) as jml_pangan_tanaman_keras, 
        SUM(industri_pangan) as jml_industri_pangan, 
        SUM(insdustri_sandang) as jml_insdustri_sandang, 
        SUM(industri_jasa) as jml_industri_jasa, 
        SUM(rumah_sehat) as jml_rumah_sehat, 
        SUM(rumah_tidaksehat) as jml_rumah_tidaksehat');
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
        $this->db->select('SUM(kader_pangan) as jml_kader_pangan, 
        SUM(kader_sandang) as jml_kader_sandang, 
        SUM(kader_tatalaksana_rumahtangga) as jml_kader_tatalaksana_rumahtangga, 
        SUM(pangan_beras) as jml_pangan_beras, 
        SUM(pangan_nonberas) as jml_pangan_nonberas, 
        SUM(pangan_peternakan) as jml_pangan_peternakan, 
        SUM(pangan_perikanan) as jml_pangan_perikanan, 
        SUM(pangan_warunghidup) as jml_pangan_warunghidup, 
        SUM(pangan_lumbunghidup) as jml_pangan_lumbunghidup, 
        SUM(pangan_toga) as jml_pangan_toga, 
        SUM(pangan_tanaman_keras) as jml_pangan_tanaman_keras, 
        SUM(industri_pangan) as jml_industri_pangan, 
        SUM(insdustri_sandang) as jml_insdustri_sandang, 
        SUM(industri_jasa) as jml_industri_jasa, 
        SUM(rumah_sehat) as jml_rumah_sehat, 
        SUM(rumah_tidaksehat) as jml_rumah_tidaksehat');
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
        $this->db->select('SUM(kader_pangan) as jml_kader_pangan, 
        SUM(kader_sandang) as jml_kader_sandang, 
        SUM(kader_tatalaksana_rumahtangga) as jml_kader_tatalaksana_rumahtangga, 
        SUM(pangan_beras) as jml_pangan_beras, 
        SUM(pangan_nonberas) as jml_pangan_nonberas, 
        SUM(pangan_peternakan) as jml_pangan_peternakan, 
        SUM(pangan_perikanan) as jml_pangan_perikanan, 
        SUM(pangan_warunghidup) as jml_pangan_warunghidup, 
        SUM(pangan_lumbunghidup) as jml_pangan_lumbunghidup, 
        SUM(pangan_toga) as jml_pangan_toga, 
        SUM(pangan_tanaman_keras) as jml_pangan_tanaman_keras, 
        SUM(industri_pangan) as jml_industri_pangan, 
        SUM(insdustri_sandang) as jml_insdustri_sandang, 
        SUM(industri_jasa) as jml_industri_jasa, 
        SUM(rumah_sehat) as jml_rumah_sehat, 
        SUM(rumah_tidaksehat) as jml_rumah_tidaksehat');
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
