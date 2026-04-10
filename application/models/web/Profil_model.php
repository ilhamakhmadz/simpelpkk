<?php

class Profil_model extends MY_Model
{
    protected $table = 'dinas_profil';
    protected $kecamatan = 'master_kecamatan';
    protected $desa = 'master_desa';
    private $ci;

    public function __construct()
    {
        parent::__construct();
    }

    // private function _get_select()
    // {
    //     $select = $this->table . ".id,";
    //     $select .= $this->table . ".kode_kecamatan, ";
    //     $select .= $this->table . ".kode_desa, ";
    //     $select .= $this->table . ".kepala_desa, ";
    //     $select .= $this->table . ".sekertariat_desa, ";
    //     $select .= $this->table . ".kaur_tu, ";
    //     $select .= $this->table . ".kaur_perencanaan, ";
    //     $select .= $this->table . ".kaur_keuangan, ";
    //     $select .= $this->table . ".seksi_pemerintahan, ";
    //     $select .= $this->table . ".seksi_kerjasama, ";
    //     $select .= $this->table . ".seksi_pelayanan, ";
    //     $select .= $this->table . ".staf_1, ";
    //     $select .= $this->table . ".staf_2, ";
    //     $select .= $this->table . ".staf_3, ";
    //     $select .= $this->table . ".date_year, ";
    //     $select .= $this->table . ".created_date, ";
    //     $select .= $this->table . ".created_id, ";
    //     $select .= $this->table . ".updated_date, ";
    //     $select .= $this->table . ".updated_id, ";
    //     $select .= $this->table . ".visible, ";
    //     $select .= $this->kecamatan . ".Kd_Kec, ";
    //     $select .= $this->kecamatan . ".Nama_Kecamatan, ";
    //     $select .= $this->desa . ".Kd_Desa, ";
    //     $select .= $this->desa . ".Nama_Desa, ";

    //     return $select;
    // }

    // public function datatables()
    // {
    //     $this->datatables->select($this->_get_select());
    //     $this->datatables->from($this->table);
    //     $this->datatables->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kode_kecamatan', 'left');
    //     $this->datatables->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.kode_desa', 'left');
    //     $this->datatables->where($this->table . '.visible', 1);
    //     return $this->datatables->generate();
    // }


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
        $id = $this->db->insert_id();
        return $id;
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->order_by('created_date', 'desc');
        $this->db->limit(1);
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
