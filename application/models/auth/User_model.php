<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * User Model
 *
 * @package App
 * @category Model
 * @author Ardi Soebrata
 */
class User_model extends MY_Model
{
    protected $table = 'auth_users';
    protected $role_table = 'acl_roles';
    protected $kecamatan = 'master_kecamatan';
    protected $desa = 'master_desa';
    private $ci;

    private function _get_select()
    {
        $select = $this->table . ".id,";
        $select .= $this->table . ".nip, ";
        $select .= $this->table . ".first_name, ";
        $select .= $this->table . ".last_name, ";
        $select .= $this->table . ".username, ";
        $select .= $this->table . ".email, ";
        $select .= $this->table . ".password, ";
        $select .= $this->table . ".role_id, ";
        $select .= $this->table . ".rt, ";
        $select .= $this->table . ".rw, ";
        $select .= $this->table . ".registered, ";
        $select .= $this->table . ".last_login, ";
        $select .= $this->table . ".kec_id, ";
        $select .= $this->table . ".desa_id, ";
        $select .= $this->table . ".level_id, ";

        $select .= $this->role_table . ".name, ";

        return $select;
    }

    public function __construct()
    {
        parent::__construct();
        $this->ci = & get_instance();
        $this->ci->load->library('PasswordHash', array('iteration_count_log2' => 4, 'portable_hashes' => false));
    }

    public function datatable()
    {
        $this->datatables->select($this->_get_select())
                ->from($this->table)
                ->join($this->role_table, $this->role_table . '.id = ' . $this->table . '.role_id', 'left');

        if ($this->session->userdata('level_id') == 3) {
            if ($this->session->userdata('role_id') == 8 || $this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.kec_id', $this->session->userdata('kec_id'));
            }
        } elseif ($this->session->userdata('level_id') == 4) {
            if ($this->session->userdata('role_id') == 8 || $this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.kec_id', $this->session->userdata('kec_id'));
                $this->datatables->where($this->table . '.desa_id', $this->session->userdata('desa_id'));
            }
        }elseif ($this->session->userdata('level_id') == 5) {
            if ($this->session->userdata('role_id') == 8 || $this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.kec_id', $this->session->userdata('kec_id'));
                $this->datatables->where($this->table . '.desa_id', $this->session->userdata('desa_id'));
                $this->datatables->where($this->table . '.dusun', $this->session->userdata('dusun_id'));
            }
        }  elseif ($this->session->userdata('level_id') == 6) {
            if ($this->session->userdata('role_id') == 8 || $this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.kec_id', $this->session->userdata('kec_id'));
                $this->datatables->where($this->table . '.desa_id', $this->session->userdata('desa_id'));
                $this->datatables->where($this->table . '.dusun', $this->session->userdata('dusun_id'));
                $this->datatables->where($this->table . '.rw', $this->session->userdata('rw'));
            }
        }elseif ($this->session->userdata('level_id') == 7) {
            if ($this->session->userdata('role_id') == 8 || $this->session->userdata('role_id') == 3) {
                $this->datatables->where($this->table . '.kec_id', $this->session->userdata('kec_id'));
                $this->datatables->where($this->table . '.desa_id', $this->session->userdata('desa_id'));
                $this->datatables->where($this->table . '.dusun', $this->session->userdata('dusun_id'));
                $this->datatables->where($this->table . '.rt', $this->session->userdata('rt'));
                $this->datatables->where($this->table . '.rw', $this->session->userdata('rw'));
            }
        }

        return $this->datatables->generate();
    }

    /**
  * Insert data to User Model
  *
  * @param array $data
  * @return boolean
  */
    public function insert($data)
    {
        $data['registered'] = date('Y-m-d H:i:s');
        return parent::insert($this->prep_data($data));
    }

    /**
     * Update data to User Model
     *
     * @param int $id
     * @param array $data
     * @return boolean
     */
    public function update($id, $data)
    {
        return parent::update($id, $this->prep_data($data));
    }

    /**
     * Prepare input data
     *
     * @param array $data
     * @return array
     */
    private function prep_data($data)
    {
        // Remove confirm-password field
        unset($data['confirm-password']);

        // Hash password field if not empty
        if (isset($data['password'])) {
            if (strlen(trim($data['password'])) > 0) {
                $data['password'] = $this->ci->passwordhash->HashPassword($data['password']);
            } else {
                unset($data['password']);
            }
        }
        return $data;
    }

    /**
     * Compare user input password to stored hash
     *
     * @param string $password
     * @param string $userpass
     * @return boolean
     */
    public function check_password($password, $userpass)
    {
        // check password
        return $this->ci->passwordhash->CheckPassword($password, $userpass);
    }

    /**
     * Get user by id
     *
     * @param int $id
     * @return array|boolean
     */
    public function get_by_id($id)
    {
        $this->db->select($this->table . '.*, ' . $this->role_table . '.name AS role_name,'
                            . $this->kecamatan . '.Kd_Kec as kec_id ,'. $this->desa . '.Kd_Desa as desa_id, '
                            . $this->kecamatan . '.Nama_Kecamatan AS kecamatan,'. $this->desa . '.Nama_Desa AS desa')
                ->join($this->role_table, $this->role_table . '.id = ' . $this->table . '.role_id', 'left')
                ->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kec_id', 'left')
                ->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa_id', 'left');
        return parent::get_by_id($id);
    }

    /**
     * Get user by username
     *
     * @param string $username
     * @return object user
     */
    public function get_by_username($username)
    {
        $this->db->select($this->table . '.*, ' . $this->role_table . '.name AS role_name')
                ->join($this->role_table, $this->role_table . '.id = ' . $this->table . '.role_id', 'left');
        $query = $this->db->get_where($this->table, array($this->table . '.username' => $username));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    /**
     * Check if username is available
     *
     * @param string $username
     * @param int $id
     * @return boolean
     */
    public function is_username_unique($username, $id = 0)
    {
        $this->db->where('username', $username);
        if ($id > 0) {
            $this->db->where($this->id_field . ' <>', $id);
        }
        $query = $this->db->get($this->table);
        return ($query->num_rows() == 0);
    }

    /**
     * Check if email is available
     *
     * @param string $email
     * @param int $id
     * @return boolean
     */
    public function is_email_unique($email, $id = 0)
    {
        $this->db->where('email', $email);
        if ($id > 0) {
            $this->db->where($this->id_field . ' <>', $id);
        }
        $query = $this->db->get($this->table);
        return ($query->num_rows() == 0);
    }



    public function get_kecamatan()
    {
        $this->db->select('*');
        $this->db->from('master_kecamatan');
        $this->db->where('visible', '1');
        if ($this->session->userdata['level_id'] == 2) {
            $this->db->where('master_kecamatan.Kd_Kec', $this->session->userdata['kec_id']);
        } elseif ($this->session->userdata['level_id'] == 3) {
            $this->db->where('master_kecamatan.Kd_Kec', $this->session->userdata['kec_id']);
        }
        $this->db->order_by('Nama_Kecamatan', 'ASC');
        $data = $this->db->get()->result();
        return $data;
    }

    public function get_kecamatan_user()
    {
        $this->db->select('*');
        $this->db->from('master_kecamatan');
        if($this->session->userdata['level_id'] != 1){
            $this->db->where('Kd_Kec', $this->session->userdata['kec_id']);
        }
        $this->db->where('visible', '1');
        $this->db->order_by('Nama_Kecamatan', 'ASC');
        $data = $this->db->get()->result();
        return $data;
    }

    public function get_kecamatan_user_id()
    {
        $this->db->select('*');
        $this->db->from('master_kecamatan');
        $this->db->where('Kd_Kec', $this->session->userdata('kec_id'));
        $this->db->where('visible', '1');
        $data = $this->db->get()->row();
        return $data;
    }

    public function get_kecamatan_id($kode)
    {
        $this->db->select('*');
        $this->db->from('master_kecamatan');
        $this->db->where('Kd_Kec', $kode);
        $this->db->where('visible', '1');
        $data = $this->db->get()->result();
        return $data;
    }
    
    public function get_desa_kode($kode)
    {
        $this->db->select('*');
        $this->db->from('master_desa');
        $this->db->where('Kd_Desa', $kode);
        $this->db->where('visible', '1');
        $data = $this->db->get()->result();
        return $data;
    }

    public function get_desa($id)
    {
        $this->db->select('*');
        $this->db->from('master_desa');
        $this->db->where('Kd_Kec', $id);
        $this->db->where('visible', '1');

        $this->db->order_by('Nama_Desa', 'ASC');
        $data = $this->db->get()->result();
        return $data;
    }

    public function get_desa_user($kec,$desa)
    {
        $this->db->select('*');
        $this->db->from('master_desa');
        $this->db->where('Kd_Kec', $kec);
        $this->db->where('Kd_Desa', $desa);
        $this->db->where('visible', '1');
        $this->db->order_by('Nama_Desa', 'ASC');
        $data = $this->db->get()->result();
        return $data;
    }
    public function get_dusun_user($kec,$desa,$dusun)
    {
        $this->db->select('*');
        $this->db->from('master_dusun');
        $this->db->where('Kd_Kec', $kec);
        $this->db->where('Kd_Desa', $desa);
        $this->db->where('id', $dusun);
        $this->db->order_by('dusun', 'ASC');
        $data = $this->db->get()->result();
        return $data;
    }


    public function get_rw_user($kec,$desa,$dusun,$rw)
    {
        $this->db->select('*');
        $this->db->from('master_rw');
        $this->db->where('Kd_Kec', $kec);
        $this->db->where('Kd_Desa', $desa);
        $this->db->where('Kd_Dusun', $dusun);
        $this->db->where('rw', $rw);
        $this->db->order_by('rw', 'ASC');
        $data = $this->db->get()->result();
        return $data;
    }
    public function get_rt_user($kec,$desa,$dusun,$rw,$rt)
    {
        $this->db->select('*');
        $this->db->from('master_rt');
        $this->db->where('Kd_Kec', $kec);
        $this->db->where('Kd_Desa', $desa);
        $this->db->where('Kd_Dusun', $dusun);
        $this->db->where('rw', $rw);
        $this->db->where('rt', $rt);
        $this->db->order_by('rt', 'ASC');
        $data = $this->db->get()->result();
        return $data;
    }

    public function get_desa_id()
    {
        $this->db->select('*');
        $this->db->from('master_desa');
        $this->db->where('Kd_Kec', $this->session->userdata('kec_id'));
        $this->db->where('visible', '1');
        $this->db->order_by('Nama_Desa', 'ASC');
        $data = $this->db->get()->result();
        return $data;
    }
    public function get_desa_select()
    {
        $this->db->select('*');
        $this->db->from('master_desa');
        $this->db->where('Kd_Desa', $this->session->userdata('desa_id'));
        $this->db->where('visible', '1');
        $this->db->order_by('Nama_Desa', 'ASC');
        $data = $this->db->get()->row();
        return $data;
    }

    public function get_dusun_id()
    {
        $this->db->select('*');
        $this->db->from('master_dusun');
        $this->db->where('id', $this->session->userdata('dusun_id'));
        $this->db->order_by('dusun', 'ASC');
        $data = $this->db->get()->result();
        return $data;
    }

    public function get_dusun_select()
    {
        $this->db->select('*');
        $this->db->from('master_dusun');
        $this->db->where('id', $this->session->userdata('dusun_id'));
        $this->db->order_by('dusun', 'ASC');
        $data = $this->db->get()->row();
        return $data;
    }

    public function get_rw_id()
    {
        $this->db->select('*');
        $this->db->from('master_rw');
        $this->db->where('Kd_Kec', $this->session->userdata('kec_id'));
        $this->db->where('Kd_Desa', $this->session->userdata('desa_id'));
        $this->db->where('Kd_Dusun', $this->session->userdata('dusun_id'));
        $this->db->where('rw', $this->session->userdata('rw'));
        $this->db->order_by('rw', 'ASC');
        $data = $this->db->get()->result();
        return $data;
    }


    public function get_rw_select()
    {
        $this->db->select('*');
        $this->db->from('master_rw');
        $this->db->where('Kd_Kec', $this->session->userdata('kec_id'));
        $this->db->where('Kd_Desa', $this->session->userdata('desa_id'));
        $this->db->where('Kd_Dusun', $this->session->userdata('dusun_id'));
        $this->db->where('rw', $this->session->userdata('rw'));
        $this->db->order_by('rw', 'ASC');
        $data = $this->db->get()->row();
        return $data;
    }

    public function get_rt_id()
    {
        $this->db->select('*');
        $this->db->from('master_rt');
        $this->db->where('Kd_Kec', $this->session->userdata('kec_id'));
        $this->db->where('Kd_Desa', $this->session->userdata('desa_id'));
        $this->db->where('Kd_Dusun', $this->session->userdata('dusun_id'));
        $this->db->where('rw', $this->session->userdata('rw'));
        $this->db->where('rt', $this->session->userdata('rt'));
        $this->db->order_by('rt', 'ASC');
        $data = $this->db->get()->result();
        return $data;
    }

    public function get_rt_select()
    {
        $this->db->select('*');
        $this->db->from('master_rt');
        $this->db->where('Kd_Kec', $this->session->userdata('kec_id'));
        $this->db->where('Kd_Desa', $this->session->userdata('desa_id'));
        $this->db->where('Kd_Dusun', $this->session->userdata('dusun_id'));
        $this->db->where('rw', $this->session->userdata('rw'));
        $this->db->where('rt', $this->session->userdata('rt'));
        $this->db->order_by('rt', 'ASC');
        $data = $this->db->get()->row();
        return $data;
    }
    public function get_all_data()
    {
        // $this->db->select(')','jumlah');
        $this->db->select('count(auth_users.id) as jumlah_user');
        $this->db->from('auth_users');
        $data = $this->db->get()->row();
        return $data;
    }

    public function get_pekerjaan()
    {
        $this->db->select('*');
        $this->db->from('master_pekerjaan');
        $data = $this->db->get()->result();
        return $data;
    }
    public function get_pancasila()
    {
        $this->db->select('*');
        $this->db->from('master_pancasila');
        $data = $this->db->get()->result();
        return $data;
    }
    public function get_kebutuhan_khusus()
    {
        $this->db->select('*');
        $this->db->from('master_kebutuhan_khusus');
        $data = $this->db->get()->result();
        return $data;
    }
    public function get_gotong_royong()
    {
        $this->db->select('*');
        $this->db->from('master_gotong_royong');
        $data = $this->db->get()->result();
        return $data;
    }
    public function get_ketrampilan()
    {
        $this->db->select('*');
        $this->db->from('master_ketrampilan');
        $data = $this->db->get()->result();
        return $data;
    }
    public function get_koperasi()
    {
        $this->db->select('*');
        $this->db->from('master_koperasi');
        $data = $this->db->get()->result();
        return $data;
    }
    public function get_pangan()
    {
        $this->db->select('*');
        $this->db->from('master_pangan');
        $data = $this->db->get()->result();
        return $data;
    }
    public function get_sandang()
    {
        $this->db->select('*');
        $this->db->from('master_sandang');
        $data = $this->db->get()->result();
        return $data;
    }
    public function get_kesehatan()
    {
        $this->db->select('*');
        $this->db->from('master_kesehatan');
        $data = $this->db->get()->result();
        return $data;
    }
    public function get_perencanaan_sehat()
    {
        $this->db->select('*');
        $this->db->from('master_perencanaan_sehat');
        $data = $this->db->get()->result();
        return $data;
    }

    public function last_login($id)
    {
        return parent::update($id, ['last_login'=>date('Y-m-d H:i:s')]);
    }


    public function last_login_users()
    {
        $this->db->select($this->table . '.*, '. $this->kecamatan . '.Kd_Kec as kec_id ,'. $this->desa . '.Kd_Desa as desa_id, '
                            . $this->kecamatan . '.Nama_Kecamatan AS kecamatan,'. $this->desa . '.Nama_Desa AS desa');
        $this->db->from($this->table);
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kec_id', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa_id', 'left');
        $this->db->where($this->table.'.level_id',7);
        $this->db->order_by('last_login', 'desc');
        $this->db->limit(10);
        $data = $this->db->get()->result();
        return $data;
    }
    public function last_login_users_kec()
    {
        $this->db->select($this->table . '.*, '. $this->kecamatan . '.Kd_Kec as kec_id ,'. $this->desa . '.Kd_Desa as desa_id, '
                            . $this->kecamatan . '.Nama_Kecamatan AS kecamatan,'. $this->desa . '.Nama_Desa AS desa');
        $this->db->from($this->table);
        $this->db->join($this->kecamatan, $this->kecamatan . '.Kd_Kec = ' . $this->table . '.kec_id', 'left');
        $this->db->join($this->desa, $this->desa . '.Kd_Desa = ' . $this->table . '.desa_id', 'left');
        $this->db->where_in($this->table.'.level_id', array(3, 4));
        $this->db->order_by('last_login', 'desc');
        $this->db->limit(10);
        $data = $this->db->get()->result();
        return $data;
    }
    public function generate_user($data){
        
        $data['username'] = str_replace(" ", "", $data['username']);
        $data['email'] = str_replace(" ", "", $data['email']);
        $uniqueUser = $this->get_by_username($data['username']);
        if($uniqueUser){
            if (isset($data['password'])) {
                if (strlen(trim($data['password'])) > 0) {
                    $data['password'] = $this->ci->passwordhash->HashPassword($data['password']);
                } else {
                    unset($data['password']);
                    unset($data['username']);
                    unset($data['password']);
                }
            }
            
            $inserted = parent::update($uniqueUser->id,$data);
        }else{
            if (isset($data['password'])) {
                if (strlen(trim($data['password'])) > 0) {
                    $data['password'] = $this->ci->passwordhash->HashPassword($data['password']);
                } else {
                    unset($data['password']);
                    unset($data['username']);
                    unset($data['password']);
                }
            }
            $inserted = $this->db->insert($this->table, $data);
        }
        return $inserted;
    }


}
