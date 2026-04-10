<?php

class dusun_model extends MY_Model
{
    protected $table = 'master_dusun';
    protected $table_relation = 'master_url';
    private $ci;

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_select()
    {
        $select = $this->table.".Kd_Desa, ";
        $select .= $this->table.".Kd_Dusun, ";
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
        $inserted = $this->db->get_where($this->table, array('rt' => $data['rt']))->row();

        return $inserted;
    }

    public function delete($id)
    {
        $idString = (int)$id;
        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('id' =>  $idString))->row();
        $this->db->delete($this->table, array('id' => $idString));

        return $updated->Kd_Desa;
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

    public function get_by_kode($desa,$dusun)
    {
        $this->db->select($this->table.'.*,a.Nama_Kecamatan,b.Nama_Desa');
        $this->db->where($this->table.'.id', $dusun);
        $this->db->join('master_kecamatan as a', 'a.Kd_Kec = master_dusun.Kd_Kec');
        $this->db->join('master_desa as b', 'b.Kd_Desa = master_dusun.Kd_Desa');
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
}
