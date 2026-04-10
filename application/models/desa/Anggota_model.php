<?php

class Anggota_model extends MY_Model
{
    protected $table = 'pkk_anggota';
    // protected $anggota = 'pkk_anggota';
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
        $select .= $this->table . ".nik, ";
        $select .= $this->table . ".kk, ";
        $select .= $this->table . ".level, ";
        $select .= $this->table . ".no_reg_tp_pkk, ";
        $select .= $this->table . ".nama, ";
        $select .= $this->table . ".jenis_kelamin, ";
        $select .= $this->table . ".jabatan, ";
        $select .= $this->table . ".kedudukan_fungsi, ";
        $select .= $this->table . ".tempat_lahir, ";
        $select .= $this->table . ".tanggal_lahir, ";
        $select .= $this->table . ".status, ";
        $select .= $this->table . ".alamat, ";
        $select .= $this->table . ".pendidikan, ";
        $select .= $this->table . ".pekerjaan, ";
        $select .= $this->table . ".keterangan, ";
        $select .= $this->table . ".date_year, ";
        $select .= $this->table . ".created_id, ";
        $select .= $this->table . ".updated_date, ";
        $select .= $this->table . ".updated_id, ";
        $select .= $this->table . ".visible, ";

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
        $id = $this->db->select('*')->where('id',$id)->get($this->table)->row();
        return $id;
    }

    public function get_by_id($id)
    {
        $this->db->select($this->_get_select());
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
    public function kec_anggota($kec)
    {
        $this->db->select($this->table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa', 'left');
        $this->db->join($this->dusun, $this->dusun . '.id = ' . $this->table . '.dusun', 'left');
        $this->db->where($this->table . '.kode_kecamatan', $kec);
        $this->db->where($this->table . '.kode_desa' , 'null');
        $this->db->where($this->table . '.dusun' , 'null');
        $this->db->where($this->table . '.rw' , 'null');
        $this->db->where($this->table . '.rt' , 'null');
        // $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->result();

        return $query;
    }

    
    public function desa_anggota($kec,$desa)
    {
        $this->db->select($this->table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa', 'left');
        $this->db->join($this->dusun, $this->dusun . '.id = ' . $this->table . '.dusun', 'left');
        $this->db->where($this->table . '.kode_kecamatan', $kec);
        $this->db->where($this->table . '.kode_desa', $desa);
        $this->db->where($this->table . '.dusun' , 'null');
        $this->db->where($this->table . '.rw' , 'null');
        $this->db->where($this->table . '.rt' , 'null');
        // $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->result();

        return $query;
    }
    public function dusun_anggota($kec,$desa,$dusun)
    {
        $this->db->select($this->table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa', 'left');
        $this->db->join($this->dusun, $this->dusun . '.id = ' . $this->table . '.dusun', 'left');
        $this->db->where($this->table . '.kode_kecamatan', $kec);
        $this->db->where($this->table . '.kode_desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where($this->table . '.rw' , 'null');
        $this->db->where($this->table . '.rt' , 'null');
        // $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->result();

        return $query;
    }
    public function rw_anggota($kec,$desa,$dusun,$rw)
    {
        $this->db->select($this->table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa', 'left');
        $this->db->join($this->dusun, $this->dusun . '.id = ' . $this->table . '.dusun', 'left');
        $this->db->where($this->table . '.kode_kecamatan', $kec);
        $this->db->where($this->table . '.kode_desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where($this->table . '.rw', $rw);
        $this->db->where($this->table . '.rt' , 'null');
        // $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->result();

        return $query;
    }
    public function rt_anggota($kec,$desa,$dusun,$rw,$rt)
    {
        $this->db->select($this->table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa', 'left');
        $this->db->join($this->dusun, $this->dusun . '.id = ' . $this->table . '.dusun', 'left');
        $this->db->where($this->table . '.kode_kecamatan', $kec);
        $this->db->where($this->table . '.kode_desa', $desa);
        $this->db->where($this->table . '.dusun', $dusun);
        $this->db->where($this->table . '.rw', $rw);
        $this->db->where($this->table . '.rt', $rt);
        // $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->result();

        return $query;
    }
}
