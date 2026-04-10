<?php

class rt_model extends MY_Model
{
    protected $table = 'master_rt';
    protected $table_relation = 'master_url';
    private $ci;

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_select()
    {
        $select = $this->table.".Kd_Desa, ";
        $select .= $this->table.".Kd_Kec, ";
        $select .= $this->table.".Kd_Dusun, ";
        $select .= $this->table.".id, ";
        $select .= $this->table.".rw, ";
        $select .= $this->table.".rt, ";
        return $select;
    }

    public function datatables()
    {
        $this->datatables->select($this->_get_select());
        $this->datatables->from($this->table);
        $this->datatables->where($this->table.'.visible', 1);
        return $this->datatables->generate();
    }


    public function add($data)
    {
        $this->db->insert($this->table, $data);
        $inserted = $this->db->get_where($this->table, array('rt' => $data['rt'],'rw' => $data['rw']))->row();
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

    public function get_by_kode_rw($desa,$dusun, $rw)
    {
        $this->db->select($this->table.'.*,a.Nama_Kecamatan,b.Nama_Desa,c.dusun,user.*');
        $this->db->join('(SELECT username,dusun as dusun_id,rw as nama_rw, rt as nama_rt,level_id FROM auth_users WHERE auth_users.level_id = 7 AND auth_users.role_id = 8 
        AND auth_users.desa_id ='.$desa.' AND auth_users.dusun ='.$dusun.' AND auth_users.rw ='.$rw.') AS user','user.nama_rt = master_rt.rt', 'left');
        if($this->session->userdata('level_id') == 7) {
            if ($this->session->userdata('role_id') == 3) {
                $this->db->where($this->table.'.Kd_Desa', $desa);
                $this->db->where($this->table.'.Kd_Dusun', $dusun);
                $this->db->where($this->table.'.rw', $rw);
                $this->db->where($this->table.'.rt', $this->session->userdata('rt'));
            }
        }else{
            $this->db->where($this->table.'.Kd_Desa', $desa);
            $this->db->where($this->table.'.Kd_Dusun', $dusun);
            $this->db->where($this->table.'.rw', $rw);
        }
        $this->db->join('master_kecamatan as a', 'a.Kd_Kec = master_rt.Kd_Kec'); 
        $this->db->join('master_desa as b', 'b.Kd_Desa = master_rt.Kd_Desa');
        $this->db->join('master_dusun as c', 'c.id = master_rt.Kd_Dusun');
        $query = $this->db->get($this->table)->result();

        return $query;
    }
    public function get_by_kode($desa,$dusun, $rw,$rt)
    {
        $this->db->select($this->table.'.*,a.Nama_Kecamatan,b.Nama_Desa,c.dusun');
        $this->db->where($this->table.'.Kd_Desa', $desa);
        $this->db->where($this->table.'.Kd_Dusun', $dusun);
        $this->db->where($this->table.'.rw', $rw);
        $this->db->where($this->table.'.rt', $rt);
        $this->db->join('master_kecamatan as a', 'a.Kd_Kec = master_rt.Kd_Kec'); 
        $this->db->join('master_desa as b', 'b.Kd_Desa = master_rt.Kd_Desa');
        $this->db->join('master_dusun as c', 'c.id = master_rt.Kd_Dusun');
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
