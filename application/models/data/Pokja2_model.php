<?php

class Pokja2_model extends MY_Model
{
    protected $table = 'tbl_keg_pokja_2';
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
        $select .= $this->table . ".butahuruf,";
        $select .= $this->table . ".paketAklpbelajar,";
        $select .= $this->table . ".paketAwargabelajar,";
        $select .= $this->table . ".paketBklpbelajar,";
        $select .= $this->table . ".paketBwargabelajar,";
        $select .= $this->table . ".paketCklpbelajar,";
        $select .= $this->table . ".paketCwargabelajar,";
        $select .= $this->table . ".kfklpbelajar,";
        $select .= $this->table . ".kfwargabelajar,";
        $select .= $this->table . ".paudsejenis,";
        $select .= $this->table . ".jmltamanbacaan,";
        $select .= $this->table . ".bkbklp,";
        $select .= $this->table . ".bkbibupeserta,";
        $select .= $this->table . ".bkbape,";
        $select .= $this->table . ".bkbsimulasi,";
        $select .= $this->table . ".kaderkhusus_tutorkf,";
        $select .= $this->table . ".kaderkhusus_tutorpaud,";
        $select .= $this->table . ".kaderkhusus_bkb,";
        $select .= $this->table . ".kaderkhusus_koperasi,";
        $select .= $this->table . ".kaderkhusus_keterampilan,";
        $select .= $this->table . ".kaderdilatih_lp3pkk,";
        $select .= $this->table . ".kaderdilatih_tpk3pkk,";
        $select .= $this->table . ".kaderdilatih_damaspkk,";
        $select .= $this->table . ".koperasi_pemula_klp,";
        $select .= $this->table . ".koperasi_pemula_peserta,";
        $select .= $this->table . ".koperasi_madya_klp,";
        $select .= $this->table . ".koperasi_madya_peserta,";
        $select .= $this->table . ".koperasi_utama_klp,";
        $select .= $this->table . ".koperasi_utama_peserta,";
        $select .= $this->table . ".koperasi_mandiri_klp,";
        $select .= $this->table . ".koperasi_mandiri_peserta,";
        $select .= $this->table . ".koperasi_badanhukum_klp,";
        $select .= $this->table . ".koperasi_badanhukum_angg,";
        $select .= $this->table . ".keterangan,";
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
        $this->db->select('SUM(butahuruf) as jml_butahuruf
        ,SUM(paketAklpbelajar) as jml_paketAklpbelajar
        ,SUM(paketAwargabelajar) as jml_paketAwargabelajar
        ,SUM(paketBklpbelajar) as jml_paketBklpbelajar
        ,SUM(paketBwargabelajar) as jml_paketBwargabelajar
        ,SUM(paketCklpbelajar) as jml_paketCklpbelajar
        ,SUM(paketCwargabelajar) as jml_paketCwargabelajar
        ,SUM(kfklpbelajar) as jml_kfklpbelajar
        ,SUM(kfwargabelajar) as jml_kfwargabelajar
        ,SUM(paudsejenis) as jml_paudsejenis
        ,SUM(jmltamanbacaan) as jml_jmltamanbacaan
        ,SUM(bkbklp) as jml_bkbklp
        ,SUM(bkbibupeserta) as jml_bkbibupeserta
        ,SUM(bkbape) as jml_bkbape
        ,SUM(bkbsimulasi) as jml_bkbsimulasi
        ,SUM(kaderkhusus_tutorkf) as jml_kaderkhusus_tutorkf
        ,SUM(kaderkhusus_tutorpaud) as jml_kaderkhusus_tutorpaud
        ,SUM(kaderkhusus_bkb) as jml_kaderkhusus_bkb
        ,SUM(kaderkhusus_koperasi) as jml_kaderkhusus_koperasi
        ,SUM(kaderkhusus_keterampilan) as jml_kaderkhusus_keterampilan
        ,SUM(kaderdilatih_lp3pkk) as jml_kaderdilatih_lp3pkk
        ,SUM(kaderdilatih_tpk3pkk) as jml_kaderdilatih_tpk3pkk
        ,SUM(kaderdilatih_damaspkk) as jml_kaderdilatih_damaspkk
        ,SUM(koperasi_pemula_klp) as jml_koperasi_pemula_klp
        ,SUM(koperasi_pemula_peserta) as jml_koperasi_pemula_peserta
        ,SUM(koperasi_madya_klp) as jml_koperasi_madya_klp
        ,SUM(koperasi_madya_peserta) as jml_koperasi_madya_peserta
        ,SUM(koperasi_utama_klp) as jml_koperasi_utama_klp
        ,SUM(koperasi_utama_peserta) as jml_koperasi_utama_peserta
        ,SUM(koperasi_mandiri_klp) as jml_koperasi_mandiri_klp
        ,SUM(koperasi_mandiri_peserta) as jml_koperasi_mandiri_peserta
        ,SUM(koperasi_badanhukum_klp) as jml_koperasi_badanhukum_klp
        ,SUM(koperasi_badanhukum_angg) as jml_koperasi_badanhukum_angg');
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
        $this->db->select('SUM(butahuruf) as jml_butahuruf
        ,SUM(paketAklpbelajar) as jml_paketAklpbelajar
        ,SUM(paketAwargabelajar) as jml_paketAwargabelajar
        ,SUM(paketBklpbelajar) as jml_paketBklpbelajar
        ,SUM(paketBwargabelajar) as jml_paketBwargabelajar
        ,SUM(paketCklpbelajar) as jml_paketCklpbelajar
        ,SUM(paketCwargabelajar) as jml_paketCwargabelajar
        ,SUM(kfklpbelajar) as jml_kfklpbelajar
        ,SUM(kfwargabelajar) as jml_kfwargabelajar
        ,SUM(paudsejenis) as jml_paudsejenis
        ,SUM(jmltamanbacaan) as jml_jmltamanbacaan
        ,SUM(bkbklp) as jml_bkbklp
        ,SUM(bkbibupeserta) as jml_bkbibupeserta
        ,SUM(bkbape) as jml_bkbape
        ,SUM(bkbsimulasi) as jml_bkbsimulasi
        ,SUM(kaderkhusus_tutorkf) as jml_kaderkhusus_tutorkf
        ,SUM(kaderkhusus_tutorpaud) as jml_kaderkhusus_tutorpaud
        ,SUM(kaderkhusus_bkb) as jml_kaderkhusus_bkb
        ,SUM(kaderkhusus_koperasi) as jml_kaderkhusus_koperasi
        ,SUM(kaderkhusus_keterampilan) as jml_kaderkhusus_keterampilan
        ,SUM(kaderdilatih_lp3pkk) as jml_kaderdilatih_lp3pkk
        ,SUM(kaderdilatih_tpk3pkk) as jml_kaderdilatih_tpk3pkk
        ,SUM(kaderdilatih_damaspkk) as jml_kaderdilatih_damaspkk
        ,SUM(koperasi_pemula_klp) as jml_koperasi_pemula_klp
        ,SUM(koperasi_pemula_peserta) as jml_koperasi_pemula_peserta
        ,SUM(koperasi_madya_klp) as jml_koperasi_madya_klp
        ,SUM(koperasi_madya_peserta) as jml_koperasi_madya_peserta
        ,SUM(koperasi_utama_klp) as jml_koperasi_utama_klp
        ,SUM(koperasi_utama_peserta) as jml_koperasi_utama_peserta
        ,SUM(koperasi_mandiri_klp) as jml_koperasi_mandiri_klp
        ,SUM(koperasi_mandiri_peserta) as jml_koperasi_mandiri_peserta
        ,SUM(koperasi_badanhukum_klp) as jml_koperasi_badanhukum_klp
        ,SUM(koperasi_badanhukum_angg) as jml_koperasi_badanhukum_angg');
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
        $this->db->select('SUM(butahuruf) as jml_butahuruf
        ,SUM(paketAklpbelajar) as jml_paketAklpbelajar
        ,SUM(paketAwargabelajar) as jml_paketAwargabelajar
        ,SUM(paketBklpbelajar) as jml_paketBklpbelajar
        ,SUM(paketBwargabelajar) as jml_paketBwargabelajar
        ,SUM(paketCklpbelajar) as jml_paketCklpbelajar
        ,SUM(paketCwargabelajar) as jml_paketCwargabelajar
        ,SUM(kfklpbelajar) as jml_kfklpbelajar
        ,SUM(kfwargabelajar) as jml_kfwargabelajar
        ,SUM(paudsejenis) as jml_paudsejenis
        ,SUM(jmltamanbacaan) as jml_jmltamanbacaan
        ,SUM(bkbklp) as jml_bkbklp
        ,SUM(bkbibupeserta) as jml_bkbibupeserta
        ,SUM(bkbape) as jml_bkbape
        ,SUM(bkbsimulasi) as jml_bkbsimulasi
        ,SUM(kaderkhusus_tutorkf) as jml_kaderkhusus_tutorkf
        ,SUM(kaderkhusus_tutorpaud) as jml_kaderkhusus_tutorpaud
        ,SUM(kaderkhusus_bkb) as jml_kaderkhusus_bkb
        ,SUM(kaderkhusus_koperasi) as jml_kaderkhusus_koperasi
        ,SUM(kaderkhusus_keterampilan) as jml_kaderkhusus_keterampilan
        ,SUM(kaderdilatih_lp3pkk) as jml_kaderdilatih_lp3pkk
        ,SUM(kaderdilatih_tpk3pkk) as jml_kaderdilatih_tpk3pkk
        ,SUM(kaderdilatih_damaspkk) as jml_kaderdilatih_damaspkk
        ,SUM(koperasi_pemula_klp) as jml_koperasi_pemula_klp
        ,SUM(koperasi_pemula_peserta) as jml_koperasi_pemula_peserta
        ,SUM(koperasi_madya_klp) as jml_koperasi_madya_klp
        ,SUM(koperasi_madya_peserta) as jml_koperasi_madya_peserta
        ,SUM(koperasi_utama_klp) as jml_koperasi_utama_klp
        ,SUM(koperasi_utama_peserta) as jml_koperasi_utama_peserta
        ,SUM(koperasi_mandiri_klp) as jml_koperasi_mandiri_klp
        ,SUM(koperasi_mandiri_peserta) as jml_koperasi_mandiri_peserta
        ,SUM(koperasi_badanhukum_klp) as jml_koperasi_badanhukum_klp
        ,SUM(koperasi_badanhukum_angg) as jml_koperasi_badanhukum_angg');
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
        $this->db->select('SUM(butahuruf) as jml_butahuruf
        ,SUM(paketAklpbelajar) as jml_paketAklpbelajar
        ,SUM(paketAwargabelajar) as jml_paketAwargabelajar
        ,SUM(paketBklpbelajar) as jml_paketBklpbelajar
        ,SUM(paketBwargabelajar) as jml_paketBwargabelajar
        ,SUM(paketCklpbelajar) as jml_paketCklpbelajar
        ,SUM(paketCwargabelajar) as jml_paketCwargabelajar
        ,SUM(kfklpbelajar) as jml_kfklpbelajar
        ,SUM(kfwargabelajar) as jml_kfwargabelajar
        ,SUM(paudsejenis) as jml_paudsejenis
        ,SUM(jmltamanbacaan) as jml_jmltamanbacaan
        ,SUM(bkbklp) as jml_bkbklp
        ,SUM(bkbibupeserta) as jml_bkbibupeserta
        ,SUM(bkbape) as jml_bkbape
        ,SUM(bkbsimulasi) as jml_bkbsimulasi
        ,SUM(kaderkhusus_tutorkf) as jml_kaderkhusus_tutorkf
        ,SUM(kaderkhusus_tutorpaud) as jml_kaderkhusus_tutorpaud
        ,SUM(kaderkhusus_bkb) as jml_kaderkhusus_bkb
        ,SUM(kaderkhusus_koperasi) as jml_kaderkhusus_koperasi
        ,SUM(kaderkhusus_keterampilan) as jml_kaderkhusus_keterampilan
        ,SUM(kaderdilatih_lp3pkk) as jml_kaderdilatih_lp3pkk
        ,SUM(kaderdilatih_tpk3pkk) as jml_kaderdilatih_tpk3pkk
        ,SUM(kaderdilatih_damaspkk) as jml_kaderdilatih_damaspkk
        ,SUM(koperasi_pemula_klp) as jml_koperasi_pemula_klp
        ,SUM(koperasi_pemula_peserta) as jml_koperasi_pemula_peserta
        ,SUM(koperasi_madya_klp) as jml_koperasi_madya_klp
        ,SUM(koperasi_madya_peserta) as jml_koperasi_madya_peserta
        ,SUM(koperasi_utama_klp) as jml_koperasi_utama_klp
        ,SUM(koperasi_utama_peserta) as jml_koperasi_utama_peserta
        ,SUM(koperasi_mandiri_klp) as jml_koperasi_mandiri_klp
        ,SUM(koperasi_mandiri_peserta) as jml_koperasi_mandiri_peserta
        ,SUM(koperasi_badanhukum_klp) as jml_koperasi_badanhukum_klp
        ,SUM(koperasi_badanhukum_angg) as jml_koperasi_badanhukum_angg');
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
