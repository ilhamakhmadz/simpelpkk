<?php

class Galeri_model extends MY_Model
{
    protected $table = 'master_galeri';
    // protected $role_table = 'acl_roles';
    private $ci;

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_select()
    {
        // $select = $this->table.".Kd_Kec, ";
        $select = $this->table . ".id, ";
        $select .= $this->table . ".nama_galeri, ";
        return $select;
    }

    public function datatables()
    {
        $this->datatables->select($this->_get_select());
        $this->datatables->from($this->table);
        $this->datatables->where($this->table . '.visible', 1);
        return $this->datatables->generate();
    }


    public function add($data)
    {
        $this->db->insert($this->table, $data);
        $inserted = $this->db->get_where($this->table, array('nama_galeri' => $data['nama_galeri']))->row();

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
        $this->db->where($this->table . '.id', $id);
        $query = $this->db->get($this->table)->row();

        return $query;
    }


    public function get_galeri()
    {
        $this->db->select('*');
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->result();

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
