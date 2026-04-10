<?php

class kecamatan_model extends MY_Model
{
    protected $table = 'master_kecamatan';
    protected $role_table = 'master_desa';
    private $ci;

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_select()
    {
        $select = $this->table.".Kd_Kec, ";
        $select .= $this->table.".id, ";
        $select .= $this->table.".Nama_Kecamatan, ";
        return $select;
    }

    public function datatables()
    {
        $this->datatables->select($this->_get_select().',user.*');
        $this->datatables->from($this->table);
        $this->datatables->join('(SELECT username,kec_id,level_id FROM auth_users WHERE auth_users.level_id = 3) AS user','user.kec_id = master_kecamatan.Kd_Kec', 'left');
        $this->datatables->where($this->table.'.visible', 1);
        if($this->session->userdata('level_id') == 3 || $this->session->userdata('level_id') == 4 || $this->session->userdata('level_id') == 5 
        || $this->session->userdata('level_id') == 6 || $this->session->userdata('level_id') == 7) {
            if ($this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.Kd_Kec', $this->session->userdata('kec_id'));
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

    public function delete($id)
    {
        $idString = (int)$id;
        $this->db->update($this->table, array('visible' => 0), array('id' => $idString));
        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('id' =>  $idString))->row();

        return $updated;
    }

    public function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->where($this->table.'.id', $id);
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function get_by_kec($kec)
    {
        $this->db->select('*');
        $this->db->where($this->table.'.Kd_Kec', $kec);
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function get_by_desa_generate($desa)
    {
        $this->db->select('*');
        $this->db->where($this->role_table.'.id', $desa);
        $this->db->join($this->table,'master_desa.Kd_Kec = master_kecamatan.Kd_Kec');
        $query = $this->db->get($this->role_table)->row();

        return $query;
    }

    public function get_by_dusun_generate($dusun)
    {
        $this->db->select('master_dusun.*,master_kecamatan.Nama_Kecamatan,master_desa.Nama_Desa');
        $this->db->where('master_dusun.id', $dusun);
        $this->db->join('master_kecamatan','master_dusun.Kd_Kec = master_kecamatan.Kd_Kec');
        $this->db->join('master_desa','master_dusun.Kd_Desa = master_desa.Kd_Desa');
        $query = $this->db->get('master_dusun')->row();

        return $query;
    }

    public function get_by_desa($kode)
    {
        $this->db->select('*');
        $this->db->join('(SELECT username,desa_id,level_id FROM auth_users WHERE auth_users.level_id = 4) AS user','user.desa_id = master_desa.Kd_Desa', 'left');
        if($this->session->userdata('level_id') == 4 || $this->session->userdata('level_id') == 5 
        || $this->session->userdata('level_id') == 6 || $this->session->userdata('level_id') == 7) {
            if ($this->session->userdata('role_id') == 3) {
                $this->db->where($this->role_table . '.Kd_Kec', $kode);
                $this->db->where($this->role_table . '.Kd_Desa', $this->session->userdata('desa_id'));
            }
        }else{
            $this->db->where($this->role_table . '.Kd_Kec', $kode);
        }
        $this->db->where($this->role_table.'.visible', 1);
        $query = $this->db->get($this->role_table)->result();

        return $query;
    }

    public function get_by_dusun($kode)
    {
        $this->db->select('master_dusun.*,user.*,master_desa.Nama_Desa');
        $this->db->join('(SELECT username,dusun as dusun_id,level_id FROM auth_users WHERE auth_users.level_id = 5) AS user','user.dusun_id = master_dusun.id', 'left');
        if($this->session->userdata('level_id') == 5 || $this->session->userdata('level_id') == 6 || $this->session->userdata('level_id') == 7) {
            if ($this->session->userdata('role_id') == 3) {
                // $this->db->where('master_dusun.Kd_Kec', $this->session->userdata('kec_id'));
                $this->db->where('master_dusun.Kd_Desa', $kode);
                $this->db->where('master_dusun.id', $this->session->userdata('dusun_id'));
            }
        }else{
            $this->db->where('master_dusun.Kd_Desa', $kode);

        }
        $this->db->join('master_desa', 'master_desa.Kd_Desa = master_dusun.Kd_Desa');
        $this->db->order_by('master_dusun.dusun', 'asc');
        $query = $this->db->get('master_dusun')->result();

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
