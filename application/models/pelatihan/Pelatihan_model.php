<?php

class Pelatihan_model extends MY_Model
{
    protected $table = 'dinas_pelatihan';
    protected $join = 'master_pelatihan';
    // protected $desa = 'master_desa';
    private $ci;

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_select()
    {
        $select = $this->table . ".id,";
        $select .= $this->table . ".id_pelatihan, ";
        $select .= $this->table . ".nama, ";
        $select .= $this->table . ".peserta, ";
        $select .= $this->table . ".desa, ";
        $select .= $this->table . ".jumlah, ";
        $select .= $this->table . ".date_year, ";
        $select .= $this->table . ".created_date, ";
        $select .= $this->table . ".created_id, ";
        $select .= $this->table . ".updated_date, ";
        $select .= $this->table . ".updated_id, ";
        $select .= $this->table . ".visible, ";
        $select .= $this->join . ".nama_pelatihan, ";
        // $select .= $this->kecamatan . ".Nama_Kecamatan, ";
        // $select .= $this->desa . ".Kd_Desa, ";
        // $select .= $this->desa . ".Nama_Desa, ";



        return $select;
    }

    public function datatables()
    {
        $this->datatables->select($this->_get_select() . "COUNT(" . $this->table . ".id_pelatihan) AS jml_pelatihan,");
        $this->datatables->from($this->table);
        $this->datatables->join($this->join, $this->join . '.id = ' . $this->table . '.id_pelatihan');
        $this->datatables->where($this->table . '.visible', 1);
        $this->datatables->group_by('id_pelatihan');

        return $this->datatables->generate();
    }


    public function add($data)
    {
        $this->db->insert($this->table, $data);
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
        $id = $this->db->insert_id();
        return $id;
    }

    public function get_by_id($id)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->join, $this->join . '.id = ' . $this->table . '.id_pelatihan');
        $this->db->where($this->table . '.id', $id);
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function get_by_kode($id_pelatihan)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->join, $this->join . '.id = ' . $this->table . '.id_pelatihan');
        $this->db->where($this->table . '.id_pelatihan', $id_pelatihan);
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->row();

        return $query;
    }


    public function get_by_id_pelatihan($id_pelatihan)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->join, $this->join . '.id = ' . $this->table . '.id_pelatihan');
        $this->db->where($this->table . '.id_pelatihan', $id_pelatihan);
        $this->db->where($this->table . '.visible', 1);
        $query = $this->db->get($this->table)->result();

        return $query;
    }

    public function get_prasarana_id($id)
    {
        $this->db->select('*');
        $this->db->where($this->prasarana . '.id_data_desa', $id);
        $query = $this->db->get($this->prasarana)->result();

        return $query;
    }

    public function edit($id, $data)
    {
        $this->db->update($this->table, $data, array('id' => $id));

        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('id' => $id))->row();

        return $updated;
    }
    public function get_pelatihan()
    {
        $this->db->select('*');
        $this->db->where($this->join . '.visible', 1);
        $query = $this->db->get($this->join)->result();

        return $query;
    }
}
