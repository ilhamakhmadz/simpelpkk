<?php

class desa_model extends MY_Model
{
    protected $table = 'master_desa';
    protected $table_rt = 'master_rt';
    protected $table_relation = 'master_url';
    private $ci;

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_select()
    {
        $select = $this->table.".Kd_Desa, ";
        $select .= $this->table.".Nama_Desa, ";
        $select .= $this->table.".id, ";
        $select .= $this->table.".Kd_Kec, ";
        return $select;
    }

    public function datatables()
    {
        $this->datatables->select($this->_get_select());
        $this->datatables->from($this->table);
        $this->datatables->where($this->table.'.visible', 1);
        
        if ($this->session->userdata('level_id') == 3) {
            if ($this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.Kd_Kec', $this->session->userdata('kec_id'));
            }
        }elseif($this->session->userdata('level_id') == 4 || $this->session->userdata('level_id') == 5 
        || $this->session->userdata('level_id') == 6 || $this->session->userdata('level_id') == 7) {
            if ($this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.Kd_Kec', $this->session->userdata('kec_id'));
                $this->datatables->where($this->table . '.Kd_Desa', $this->session->userdata('desa_id'));
            }
        }elseif($this->session->userdata('level_id') == 5 || $this->session->userdata('level_id') == 6 || $this->session->userdata('level_id') == 7) {
            if ($this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.Kd_Kec', $this->session->userdata('kec_id'));
                $this->datatables->where($this->table . '.Kd_Desa', $this->session->userdata('desa_id'));
                $this->datatables->where($this->table . '.id', $this->session->userdata('dusun_id'));
            }
        }
        return $this->datatables->generate();
    }


    public function add($data)
    {
        $this->db->insert($this->table, $data);
        $inserted = $this->db->get_where($this->table, array('Kd_Kec' => $data['Kd_Kec']))->row();

        return $inserted;
    }
    public function add_rw($data)
    {
        $this->db->insert('master_rw', $data);
        $inserted = $this->db->get_where('master_rw', array('Kd_Kec' => $data['Kd_Kec'],'Kd_Desa' => $data['Kd_Desa']))->row();

        return $inserted;
    }

    public function add_rt($data)
    {
        $this->db->insert('master_rt', $data);
        $inserted = $this->db->get_where('master_rt', array('Kd_Kec' => $data['Kd_Kec'],'Kd_Desa' => $data['Kd_Desa'],'Kd_Dusun' => $data['Kd_Dusun']))->row();

        return $inserted;
    }

    public function add_dusun($data)
    {
        $this->db->insert('master_dusun', $data);
        $inserted = $this->db->get_where('master_dusun', array('Kd_Kec' => $data['Kd_Kec'],'Kd_Desa' => $data['Kd_Desa'],'dusun' => $data['dusun']))->row();

        return $inserted;
    }

    public function delete($id)
    {
        $idString = (int)$id;
        $this->db->update($this->table, array('visible' => 0), array('id' => $idString));
        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('id' =>  $idString))->row();

        return $updated;
    }

    public function get_no_visi()
    {
        $this->db->select_max('No_Visi');
        $this->db->where($this->table.'.visible', 1);
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function get_by_id($id)
    {
        $this->db->select($this->_get_select().',master_kecamatan.Nama_Kecamatan');
        $this->db->where($this->table.'.id', $id);
        $this->db->join('master_kecamatan', 'master_kecamatan.Kd_Kec = master_desa.Kd_Kec');
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function get_by_kode_desa($id)
    {
        $this->db->select('*');
        $this->db->where($this->table.'.Kd_Desa', $id);
        $this->db->join('master_kecamatan', 'master_kecamatan.Kd_Kec = master_desa.Kd_Kec');
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function get_by_kode_rt($kode,$rt)
    {
        $this->db->select('*');
        $this->db->join('master_kecamatan as a', 'a.Kd_Kec = master_rt.Kd_Kec'); 
        $this->db->join('master_desa as b', 'b.Kd_Desa = master_rt.Kd_Desa');
        $this->db->where($this->table_rt.'.rt', $rt);
        $this->db->where($this->table_rt.'.Kd_Desa', $kode);
        $query = $this->db->get($this->table_rt)->row();

        return $query;
    }

    public function edit($id, $data)
    {
        $this->db->update($this->table, $data, array('id' => $id));

        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('id' => $id))->row();

        return $updated;
    }

    public function jml_desa($kd_kec){
        $this->db->select('COUNT(*) as total_count'); // Change to count(*)
        $this->db->from($this->table);
        $this->db->where('Kd_Kec',$kd_kec);
        $this->db->where($this->table . '.tipe', 0);
        $result = $this->db->get()->row();
        return $result->total_count;
    }

    public function jml_kel($kd_kec){
        $this->db->select('COUNT(*) as total_count'); // Change to count(*)
        $this->db->from($this->table);
        $this->db->where('Kd_Kec',$kd_kec);
        $this->db->where($this->table . '.tipe', 1);
        $result = $this->db->get()->row();
        return $result->total_count;
    }
}
