<?php

class kabupaten_model extends MY_Model {

    protected $table = 'master_kabupaten';
    // protected $role_table = 'acl_roles';
    private $ci;

  function __construct()
  {
    parent::__construct();
  }

  private function _get_select(){
    $select = $this->table.".kd_kabupaten, ";
    $select .= $this->table.".id, ";
    $select .= $this->table.".nama_kabupaten, ";
    // $select .= $this->operator_table.".avatar_operator,";

    return $select;
}

  function get_data()
  {
    $this->datatables->select($this->_get_select());
    $query = $this->db->get($this->table)->row();

    return $query;
    }

    public function add($data)
    {
      $this->db->empty_table($this->table);
      $this->db->insert($this->table, $data);
      $inserted = $this->db->get_where($this->table, array('kd_kabupaten' => $data['kd_kabupaten']))->row();

      return $inserted;
    }

    public function delete($id)
    {
      $idString = (int)$id;
      $this->db->update($this->table, array('visible' => 0), array('No_Visi' => $idString));
      $id = $this->db->insert_id();
      $updated = $this->db->get_where($this->table, array('No_Visi' =>  $idString))->row();

      return $updated;
    }

    public function get_by_id($id){
      $this->db->select($this->_get_select());
      $this->db->where($this->table.'.id',$id);
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
