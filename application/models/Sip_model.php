<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sip_model extends MY_Model
{
    protected $table = 'posyandu';
    protected $kegiatan_table = 'posyandu_kegiatan';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Check if current user has write access (strictly Level 6 - RW)
     */
    public function can_write()
    {
        return $this->session->userdata('level_id') == 6;
    }

    /**
     * Get list of Posyandu with regional filters matching user rights
     */
    public function get_posyandu_list()
    {
        $this->db->select('posyandu.*, master_kecamatan.Nama_Kecamatan, master_desa.Nama_Desa, master_dusun.dusun as nama_dusun');
        $this->db->from($this->table);
        $this->db->join('master_kecamatan', 'master_kecamatan.Kd_Kec = posyandu.kode_kecamatan', 'left');
        $this->db->join('master_desa', 'master_desa.Kd_Desa = posyandu.kode_desa', 'left');
        $this->db->join('master_dusun', 'master_dusun.id = posyandu.dusun_id', 'left');
        $this->db->where('posyandu.visible', 1);

        $level_id = $this->session->userdata('level_id');
        $kec_id = $this->session->userdata('kec_id');
        $desa_id = $this->session->userdata('desa_id');
        $dusun_id = $this->session->userdata('dusun_id');
        $rw = $this->session->userdata('rw');
        $rt = $this->session->userdata('rt');

        if ($level_id == 3) {
            $this->db->where('posyandu.kode_kecamatan', $kec_id);
        } elseif ($level_id == 4) {
            $this->db->where('posyandu.kode_kecamatan', $kec_id);
            $this->db->where('posyandu.kode_desa', $desa_id);
        } elseif ($level_id == 5) {
            $this->db->where('posyandu.kode_kecamatan', $kec_id);
            $this->db->where('posyandu.kode_desa', $desa_id);
            $this->db->where('posyandu.dusun_id', $dusun_id);
        } elseif ($level_id == 6) {
            $this->db->where('posyandu.kode_kecamatan', $kec_id);
            $this->db->where('posyandu.kode_desa', $desa_id);
            $this->db->where('posyandu.dusun_id', $dusun_id);
            $this->db->where('posyandu.rw', $rw);
        } elseif ($level_id == 7) {
            $this->db->where('posyandu.kode_kecamatan', $kec_id);
            $this->db->where('posyandu.kode_desa', $desa_id);
            $this->db->where('posyandu.dusun_id', $dusun_id);
            $this->db->where('posyandu.rw', $rw);
            $this->db->where('posyandu.rt', $rt);
        }

        $this->db->order_by('posyandu.nama_posyandu', 'ASC');
        return $this->db->get()->result();
    }

    /**
     * Get single Posyandu by ID, verifying access
     */
    public function get_posyandu_by_id($id)
    {
        $this->db->select('posyandu.*, master_kecamatan.Nama_Kecamatan, master_desa.Nama_Desa, master_dusun.dusun as nama_dusun');
        $this->db->from($this->table);
        $this->db->join('master_kecamatan', 'master_kecamatan.Kd_Kec = posyandu.kode_kecamatan', 'left');
        $this->db->join('master_desa', 'master_desa.Kd_Desa = posyandu.kode_desa', 'left');
        $this->db->join('master_dusun', 'master_dusun.id = posyandu.dusun_id', 'left');
        $this->db->where('posyandu.id', $id);
        $this->db->where('posyandu.visible', 1);

        $level_id = $this->session->userdata('level_id');
        $kec_id = $this->session->userdata('kec_id');
        $desa_id = $this->session->userdata('desa_id');
        $dusun_id = $this->session->userdata('dusun_id');
        $rw = $this->session->userdata('rw');
        $rt = $this->session->userdata('rt');

        if ($level_id == 3) {
            $this->db->where('posyandu.kode_kecamatan', $kec_id);
        } elseif ($level_id == 4) {
            $this->db->where('posyandu.kode_kecamatan', $kec_id);
            $this->db->where('posyandu.kode_desa', $desa_id);
        } elseif ($level_id == 5) {
            $this->db->where('posyandu.kode_kecamatan', $kec_id);
            $this->db->where('posyandu.kode_desa', $desa_id);
            $this->db->where('posyandu.dusun_id', $dusun_id);
        } elseif ($level_id == 6) {
            $this->db->where('posyandu.kode_kecamatan', $kec_id);
            $this->db->where('posyandu.kode_desa', $desa_id);
            $this->db->where('posyandu.dusun_id', $dusun_id);
            $this->db->where('posyandu.rw', $rw);
        } elseif ($level_id == 7) {
            $this->db->where('posyandu.kode_kecamatan', $kec_id);
            $this->db->where('posyandu.kode_desa', $desa_id);
            $this->db->where('posyandu.dusun_id', $dusun_id);
            $this->db->where('posyandu.rw', $rw);
            $this->db->where('posyandu.rt', $rt);
        }

        return $this->db->get()->row();
    }

    public function get_recap_sip6($level)
    {
        $kec_id = $this->session->userdata('kec_id');
        $desa_id = $this->session->userdata('desa_id');
        
        $this->db->select('COUNT(posyandu.id) as total_posyandu, SUM(posyandu.jumlah_kader) as total_kader');
        $this->db->from($this->table);
        $this->db->where('posyandu.visible', 1);

        $level_id = $this->session->userdata('level_id');

        if ($level == 'kecamatan') {
            $this->db->select('master_kecamatan.Nama_Kecamatan as wilayah');
            $this->db->join('master_kecamatan', 'master_kecamatan.Kd_Kec = posyandu.kode_kecamatan', 'left');
            $this->db->group_by('posyandu.kode_kecamatan');
            if ($level_id >= 3) $this->db->where('posyandu.kode_kecamatan', $kec_id);
        } elseif ($level == 'desa') {
            $this->db->select('master_desa.Nama_Desa as wilayah, master_kecamatan.Nama_Kecamatan as parent');
            $this->db->join('master_desa', 'master_desa.Kd_Desa = posyandu.kode_desa', 'left');
            $this->db->join('master_kecamatan', 'master_kecamatan.Kd_Kec = posyandu.kode_kecamatan', 'left');
            $this->db->group_by('posyandu.kode_desa');
            if ($level_id >= 3) $this->db->where('posyandu.kode_kecamatan', $kec_id);
            if ($level_id >= 4) $this->db->where('posyandu.kode_desa', $desa_id);
        } elseif ($level == 'dusun') {
            $this->db->select('master_dusun.dusun as wilayah, master_desa.Nama_Desa as parent');
            $this->db->join('master_dusun', 'master_dusun.id = posyandu.dusun_id', 'left');
            $this->db->join('master_desa', 'master_desa.Kd_Desa = posyandu.kode_desa', 'left');
            $this->db->group_by('posyandu.dusun_id');
            if ($level_id >= 3) $this->db->where('posyandu.kode_kecamatan', $kec_id);
            if ($level_id >= 4) $this->db->where('posyandu.kode_desa', $desa_id);
        }

        return $this->db->get()->result();
    }

    public function get_recap_sip7($level, $bulan, $tahun)
    {
        $kec_id = $this->session->userdata('kec_id');
        $desa_id = $this->session->userdata('desa_id');
        $level_id = $this->session->userdata('level_id');
        
        $this->db->select('
            SUM(frekuensi) as sum_frekuensi, 
            SUM(pengunjung_l) as sum_pengunjung_l,
            SUM(pengunjung_p) as sum_pengunjung_p,
            SUM(petugas_l) as sum_petugas_l,
            SUM(petugas_p) as sum_petugas_p
        ');
        $this->db->from($this->kegiatan_table);
        $this->db->join('posyandu', 'posyandu.id = '.$this->kegiatan_table.'.posyandu_id', 'inner');
        $this->db->where($this->kegiatan_table.'.bulan', $bulan);
        $this->db->where($this->kegiatan_table.'.tahun', $tahun);
        $this->db->where('posyandu.visible', 1);

        if ($level == 'kecamatan') {
            $this->db->select('master_kecamatan.Nama_Kecamatan as wilayah');
            $this->db->join('master_kecamatan', 'master_kecamatan.Kd_Kec = posyandu.kode_kecamatan', 'left');
            $this->db->group_by('posyandu.kode_kecamatan');
            if ($level_id >= 3) $this->db->where('posyandu.kode_kecamatan', $kec_id);
        } elseif ($level == 'desa') {
            $this->db->select('master_desa.Nama_Desa as wilayah, master_kecamatan.Nama_Kecamatan as parent');
            $this->db->join('master_desa', 'master_desa.Kd_Desa = posyandu.kode_desa', 'left');
            $this->db->join('master_kecamatan', 'master_kecamatan.Kd_Kec = posyandu.kode_kecamatan', 'left');
            $this->db->group_by('posyandu.kode_desa');
            if ($level_id >= 3) $this->db->where('posyandu.kode_kecamatan', $kec_id);
            if ($level_id >= 4) $this->db->where('posyandu.kode_desa', $desa_id);
        } elseif ($level == 'dusun') {
            $this->db->select('master_dusun.dusun as wilayah, master_desa.Nama_Desa as parent');
            $this->db->join('master_dusun', 'master_dusun.id = posyandu.dusun_id', 'left');
            $this->db->join('master_desa', 'master_desa.Kd_Desa = posyandu.kode_desa', 'left');
            $this->db->group_by('posyandu.dusun_id');
            if ($level_id >= 3) $this->db->where('posyandu.kode_kecamatan', $kec_id);
            if ($level_id >= 4) $this->db->where('posyandu.kode_desa', $desa_id);
        }

        return $this->db->get()->result();
    }

    /**
     * Add new Posyandu (RW level only)
     */
    public function add_posyandu($data)
    {
        if (!$this->can_write()) {
            return false;
        }
        return $this->db->insert($this->table, $data);
    }

    /**
     * Update Posyandu (RW level only)
     */
    public function update_posyandu($id, $data)
    {
        if (!$this->can_write()) {
            return false;
        }
        
        // Ensure this Posyandu is owned by/accessible to the RW user
        $posyandu = $this->get_posyandu_by_id($id);
        if (!$posyandu) {
            return false;
        }

        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Delete Posyandu (RW level only, soft delete)
     */
    public function delete_posyandu($id)
    {
        if (!$this->can_write()) {
            return false;
        }

        $posyandu = $this->get_posyandu_by_id($id);
        if (!$posyandu) {
            return false;
        }

        $this->db->where('id', $id);
        return $this->db->update($this->table, array('visible' => 0));
    }

    /**
     * Get activities list for a specific posyandu, month, and year
     */
    public function get_activities($posyandu_id, $bulan, $tahun)
    {
        // Enforce access verification on the Posyandu first
        $posyandu = $this->get_posyandu_by_id($posyandu_id);
        if (!$posyandu) {
            return array();
        }

        $this->db->select('*');
        $this->db->from($this->kegiatan_table);
        $this->db->where('posyandu_id', $posyandu_id);
        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);
        $this->db->where('visible', 1);
        $results = $this->db->get()->result_array();

        // 6 Standard Services
        $standard_services = array(
            'Pelayanan Sosial',
            'Pelayanan Trantibumlinmas',
            'Pelayanan Kesehatan',
            'Pelayanan Pekerjaan Umum',
            'Pelayanan Perumahan Rakyat',
            'Pelayanan Pendidikan'
        );

        // Map standard services and fill missing ones with zero defaults
        $mapped = array();
        foreach ($standard_services as $service) {
            $found = null;
            foreach ($results as $r) {
                if ($r['jenis_kegiatan'] == $service) {
                    $found = $r;
                    break;
                }
            }

            if ($found) {
                $mapped[] = $found;
            } else {
                $mapped[] = array(
                    'id' => null,
                    'posyandu_id' => $posyandu_id,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'jenis_kegiatan' => $service,
                    'frekuensi' => 0,
                    'pengunjung_l' => 0,
                    'pengunjung_p' => 0,
                    'petugas_l' => 0,
                    'petugas_p' => 0,
                    'keterangan' => '-'
                );
            }
        }

        // Add any other custom activities not in the 6 standard ones
        foreach ($results as $r) {
            if (!in_array($r['jenis_kegiatan'], $standard_services)) {
                $mapped[] = $r;
            }
        }

        return $mapped;
    }

    /**
     * Save an activity record (insert or update, RW level only)
     */
    public function save_kegiatan($data)
    {
        if (!$this->can_write()) {
            return false;
        }

        // Verify access to the Posyandu
        $posyandu = $this->get_posyandu_by_id($data['posyandu_id']);
        if (!$posyandu) {
            return false;
        }

        // Check if already exists
        $this->db->where('posyandu_id', $data['posyandu_id']);
        $this->db->where('bulan', $data['bulan']);
        $this->db->where('tahun', $data['tahun']);
        $this->db->where('jenis_kegiatan', $data['jenis_kegiatan']);
        $query = $this->db->get($this->kegiatan_table);

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->db->where('id', $row->id);
            return $this->db->update($this->kegiatan_table, $data);
        } else {
            return $this->db->insert($this->kegiatan_table, $data);
        }
    }

    /**
     * Delete an activity record (soft delete, RW level only)
     */
    public function delete_kegiatan($id)
    {
        if (!$this->can_write()) {
            return false;
        }

        // Verify that the user owns the Posyandu of this activity
        $this->db->where('id', $id);
        $keg = $this->db->get($this->kegiatan_table)->row();
        if (!$keg) {
            return false;
        }

        $posyandu = $this->get_posyandu_by_id($keg->posyandu_id);
        if (!$posyandu) {
            return false;
        }

        $this->db->where('id', $id);
        return $this->db->update($this->kegiatan_table, array('visible' => 0));
    }
}
