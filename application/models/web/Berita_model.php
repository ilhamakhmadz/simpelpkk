<?php

class Berita_model extends MY_Model
{
    protected $table = 'dinas_artikel';
    private $ci;

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_select()
    {
        $select = $this->table . ".id,";
        $select .= $this->table . ".gambar, ";
        $select .= $this->table . ".isi, ";
        $select .= $this->table . ".enabled, ";
        $select .= $this->table . ".tgl_upload, ";
        $select .= $this->table . ".judul, ";
        $select .= $this->table . ".headline, ";
        $select .= $this->table . ".slug, ";
        $select .= $this->table . ".hit, ";
        $select .= $this->table . ".created_date, ";
        $select .= $this->table . ".created_id, ";
        $select .= $this->table . ".updated_date, ";
        $select .= $this->table . ".updated_id, ";
        $select .= $this->table . ".visible, ";


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
        $this->db->where($this->table . '.id', $id);
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function get_by_kd_desa($kode_desa)
    {
        $this->db->select($this->_get_select());
        $this->db->where($this->table . '.id', $kode_desa);
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
    public function enabled($id)
    {
        $idString = (int)$id;
        $this->db->update($this->table, array('enabled' => 1), array('id' => $idString));
        $id = $this->db->insert_id();
        return $id;
    }
    public function disabled($id)
    {
        $idString = (int)$id;
        $this->db->update($this->table, array('enabled' => 0), array('id' => $idString));
        $id = $this->db->insert_id();
        return $id;
    }
    public function headline($id)
    {
        $idString = (int)$id;
        $this->db->update($this->table, array('headline' => 1), array('id' => $idString));
        $id = $this->db->insert_id();
        return $id;
    }
    public function unheadline($id)
    {
        $idString = (int)$id;
        $this->db->update($this->table, array('headline' => 0), array('id' => $idString));
        $id = $this->db->insert_id();
        return $id;
    }

    public function news($limit)
    {
        $this->db->select($this->_get_select() . ", first_name, last_name");
        $this->db->join('auth_users', 'auth_users.id = ' . $this->table . '.created_id');
        $this->db->where($this->table . '.visible', 1);
        $this->db->where($this->table . '.enabled', 1);
        $this->db->order_by($this->table . '.tgl_upload', "DESC");
        $this->db->limit($limit);
        $query = $this->db->get($this->table)->result();

        return $query;
    }

    public function all_news()
    {
        $this->db->select($this->_get_select() . ", first_name, last_name");
        $this->db->join('auth_users', 'auth_users.id = ' . $this->table . '.created_id');
        $this->db->where($this->table . '.visible', 1);
        $this->db->where($this->table . '.enabled', 1);
        $this->db->order_by($this->table . '.tgl_upload', "DESC");
        $query = $this->db->get($this->table)->result();

        return $query;
    }

    public function detail_news($slug)
    {
        $this->db->select($this->_get_select() . ", first_name, last_name");
        $this->db->join('auth_users', 'auth_users.id = ' . $this->table . '.created_id');
        $this->db->where($this->table . '.slug', $slug);
        $query = $this->db->get($this->table)->row();

        return $query;
    }

    public function detail_news_id($id)
    {
        $this->db->select($this->_get_select() . ", first_name, last_name");
        $this->db->join('auth_users', 'auth_users.id = ' . $this->table . '.created_id');
        $this->db->where($this->table . '.id', $id);
        $query = $this->db->get($this->table)->row();

        return $query;
    }
}
