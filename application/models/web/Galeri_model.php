<?php

class Galeri_model extends MY_Model
{
    protected $table = 'dinas_galeri';
    protected $join = 'master_galeri';
    private $ci;

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_select()
    {
        $select = $this->table . ".id,";
        $select .= $this->table . ".nama, ";
        $select .= $this->table . ".id_galeri, ";
        $select .= $this->table . ".file, ";
        $select .= $this->table . ".created_date, ";
        $select .= $this->table . ".created_id, ";
        $select .= $this->table . ".updated_date, ";
        $select .= $this->table . ".updated_id, ";
        $select .= $this->table . ".visible, ";
        $select .= $this->join . ".nama_galeri, ";


        return $select;
    }

    public function datatables()
    {
        $this->datatables->select($this->_get_select());
        $this->datatables->from($this->table);
        $this->datatables->join($this->join, 'dinas_galeri.id_galeri = master_galeri.id');
        $this->datatables->where($this->table . '.visible', 1);
        return $this->datatables->generate();
    }

    public function add($data)
    {
        $this->db->insert($this->table, $data);
        $inserted = $this->db->insert_id();


        return $inserted;
    }

    public function delete($id)
    {
        $idString = (int)$id;
        $this->db->update($this->table, array('visible' => 0), array('id' => $idString));
        $id = $this->db->insert_id();
        return $id;
    }

    public function get_by_id($id)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->join, 'dinas_galeri.id_galeri = master_galeri.id');
        $this->db->where($this->table . '.id', $id);
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function get_by_kd_desa($kode_desa)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa');
        $this->db->where($this->table . '.kode_desa', $kode_desa);
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
    public function get_galeri()
    {
        $this->db->select('*');
        $this->db->where($this->join . '.visible', 1);
        $query = $this->db->get($this->join)->result();

        return $query;
    }

    public function get_all_galeri()
    {
        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        $this->db->join($this->join, 'dinas_galeri.id_galeri = master_galeri.id');
        $this->db->where($this->table . '.visible', 1);
        return $this->db->get()->result();
    }


    public function get_by_id_doc($id)
    {
        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        $this->db->join($this->join, 'dinas_galeri.id_galeri = master_galeri.id');
        $this->db->where($this->table . '.id_galeri', $id);
        $this->db->where($this->table . '.visible', 1);
        return $this->db->get()->result();
    }
}
