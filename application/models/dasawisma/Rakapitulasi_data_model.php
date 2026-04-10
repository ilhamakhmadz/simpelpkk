<?php

class Rakapitulasi_data_model extends MY_Model
{
    protected $table = 'data_rekapitulasi';
    protected $join_table = 'data_keluarga';
    protected $kecamatan = 'master_kecamatan';
    protected $desa = 'master_desa';
    private $ci;

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_select()
    {
        $select = $this->table. ".id_data_rekapitulasi,";
        $select .= $this->table. ".id_data_keluarga,";
        $select .= $this->table. ".level,";
        $select .= $this->table. ".dasawisma,";
        $select .= $this->table. ".rt,";
        $select .= $this->table. ".rw,";
        $select .= $this->table. ".dusun,";
        $select .= $this->table. ".desa,";
        $select .= $this->table. ".kecamatan,";
        $select .= $this->table. ".kabupaten,";
        $select .= $this->table. ".provinsi,";
        $select .= $this->table. ".nama_kepala_keluarga,";
        $select .= $this->table. ".nama_ibu,";
        $select .= $this->table. ".nama_suami,";
        $select .= $this->table. ".status,";
        $select .= $this->table. ".nama_bayi,";
        $select .= $this->table. ".laki_laki,";
        $select .= $this->table. ".perempuan,";
        $select .= $this->table. ".tanggal_lahir,";
        $select .= $this->table. ".ada_akte_kelahiran,";
        $select .= $this->table. ".tidak_ada_akte_kelahiran,";
        $select .= $this->table. ".nama_meninggal,";
        $select .= $this->table. ".laki_laki_meninggal,";
        $select .= $this->table. ".perempuan_meninggal,";
        $select .= $this->table. ".tanggal_meninggal,";
        $select .= $this->table. ".sebab_meninggal,";
        $select .= $this->table. ".date_year,";
        $select .= $this->table. ".created_date,";
        $select .= $this->table. ".created_id,";
        $select .= $this->table. ".updated_date,";
        $select .= $this->table. ".updated_id,";
        $select .= $this->table. ".visible,";
        $select .= $this->table. ".ket,";

        $select .= $this->kecamatan . ".Nama_Kecamatan, ";
        $select .= $this->desa . ".Nama_Desa, ";

        return $select;
    }

    public function datatables()
    {
        $this->datatables->select($this->_get_select());
        $this->datatables->from($this->table);
        $this->datatables->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan', 'left');
        $this->datatables->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa', 'left');
        $this->datatables->where($this->table . '.level', "kecamatan");

        if ($this->session->userdata('level_id') == 3) {
            if ($this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.kecamatan', $this->session->userdata('kec_id'));
            }
        }

        $this->datatables->where($this->table . '.visible', 1);
        return $this->datatables->generate();
    }

         public function desa_datatables()
         {
             $this->datatables->select($this->_get_select());
             $this->datatables->from($this->table);
             $this->datatables->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan', 'left');
             $this->datatables->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa', 'left');
             $this->datatables->where($this->table . '.level', "desa");

             if ($this->session->userdata('level_id') == 3) {
                 if ($this->session->userdata('role_id') == 3) {
                     $this->datatables->where($this->table . '.kecamatan', $this->session->userdata('kec_id'));
                 }
             } elseif ($this->session->userdata('level_id') == 4) {
                 if ($this->session->userdata('role_id') == 3) {
                     $this->datatables->where($this->table . '.kecamatan', $this->session->userdata('kec_id'));
                     $this->datatables->where($this->table . '.desa', $this->session->userdata('desa_id'));
                 }
             }

             $this->datatables->where($this->table . '.visible', 1);
             return $this->datatables->generate();
         }

          public function dusun_datatables()
          {
              $this->datatables->select($this->_get_select());
              $this->datatables->from($this->table);
              $this->datatables->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan', 'left');
              $this->datatables->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa', 'left');
              $this->datatables->where($this->table . '.level', "dusun");

              if ($this->session->userdata('level_id') == 3) {
                  if ($this->session->userdata('role_id') == 3) {
                      $this->datatables->where($this->table . '.kecamatan', $this->session->userdata('kec_id'));
                  }
              } elseif ($this->session->userdata('level_id') == 4) {
                  if ($this->session->userdata('role_id') == 3) {
                      $this->datatables->where($this->table . '.kecamatan', $this->session->userdata('kec_id'));
                      $this->datatables->where($this->table . '.desa', $this->session->userdata('desa_id'));
                  }
              }

              $this->datatables->where($this->table . '.visible', 1);
              return $this->datatables->generate();
          }



    public function add($data)
    {
        $this->db->insert($this->table, $data);
        $inserted = $this->db->insert_id();

        return $inserted;
    }

    public function add_anggota($data)
    {
        $this->db->insert($this->join_table, $data);
        $inserted = $this->db->insert_id();

        return $inserted;
    }

    public function edit_anggota($id, $data)
    {
        $this->db->update($this->join_table, $data, array('id_data_keluarga_anggota' => $id));

        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->join_table, array('id_data_keluarga_anggota' => $id))->row();

        return $updated;
    }


    

    public function delete($id)
    {
        $idString = (int)$id;
        $this->db->delete($this->table, array('id_data_rekapitulasi' => $idString));
        $id = $this->db->select('*')->where('id_data_rekapitulasi', $id)->get($this->table)->row();
        return $id;
    }

    public function delete_anggota($id)
    {
        $idString = (int)$id;
        $this->db->delete($this->join_table, array('id_data_keluarga' => $idString));
        $id = $this->db->select('*')->where('id_data_keluarga', $id)->get($this->join_table)->row();
        return $id;
    }

    public function get_by_id($id)
    {
        $this->db->select($this->_get_select().',master_kecamatan.Kd_Kec,master_desa.Kd_Desa');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa', 'left');
        $this->db->where($this->table . '.id_data_rekapitulasi', $id);
        $query = $this->db->get($this->table)->row();

        return $query;
    }


    public function edit($id, $data)
    {
        $this->db->update($this->table, $data, array('id_data_rekapitulasi' => $id));

        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('id_data_rekapitulasi' => $id))->row();

        return $updated;
    }

    public function get_anggota_id($id)
    {
        $this->db->select($this->join_table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->join_table . '.kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->join_table . '.desa', 'left');
        $this->db->where($this->join_table . '.id_data_keluarga', $id);
        $this->db->where($this->join_table . '.visible', 1);
        $query = $this->db->get($this->join_table)->result();

        return $query;
    }

    public function get_anggota_year($kec, $desa, $year)
    {
        $this->db->select('*');
        $this->db->where($this->join_table . '.desa', $desa);
        $this->db->where($this->join_table . '.kecamatan', $kec);
        $this->db->where($this->join_table . '.date_year', $year);

        $query = $this->db->get($this->join_table)->result();

        return $query;
    }

    public function get_by_anggota($id)
    {
        $this->db->select($this->join_table.'.*,'.$this->kecamatan . '.Nama_Kecamatan,'.$this->desa . '.Nama_Desa');
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->join_table . '.kecamatan', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->join_table . '.desa', 'left');
        $this->db->where($this->join_table . '.id_data_keluarga_anggota', $id);
        $this->db->where($this->join_table . '.visible', 1);
        $query = $this->db->get($this->join_table)->row();

        return $query;
    }
     public function check_kecamatan($year, $kec)
     {
         $this->db->select('*');
         $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan');
         $this->db->where($this->table . '.date_year', $year);
         $this->db->where($this->table . '.kecamatan', $kec);
         $this->db->where($this->table . '.desa', 'null');
         $query = $this->db->get($this->table)->row();
         return $query;
     }

    public function check_desa($year, $desa)
    {
        $this->db->select($this->_get_select());
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa');
        $this->db->where($this->table . '.date_year', $year);
        $this->db->where($this->table . '.desa', $desa);
        $query = $this->db->get($this->table)->row();
        return $query;
    }


    

    function get_nama($id)
    {
        $this->db->select('data_keluarga.*,'.'master_kecamatan.Nama_Kecamatan,master_desa.Nama_Desa');
        $this->db->from($this->join_table);
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->join_table . '.kecamatan');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->join_table . '.desa','left');
        $this->db->where($this->join_table.'.id_data_keluarga', $id);
        return $this->db->get()->row();
    }
}
