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

    /**
     * Get Catatan Data dan Kegiatan Warga TP PKK Desa/Kelurahan
     * Mengambil data baru langsung dari tabel catatan_warga_tp_pkk (total per desa, bukan per dusun)
     */
    public function get_catatan_warga_desa($kode_desa, $tahun)
    {
        $this->db->select('c.*, md.Nama_Desa, mk.Nama_Kecamatan');
        $this->db->from('catatan_warga_tp_pkk c');
        $this->db->join('master_desa md', 'md.Kd_Desa = c.kode_desa', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = c.kode_kecamatan', 'left');
        $this->db->where('c.kode_desa', $kode_desa);
        $this->db->where('c.tahun', $tahun);
        $this->db->where('c.visible', 1);
        $this->db->order_by('c.id', 'DESC');
        return $this->db->get()->result();
    }

    /**
     * Rekapitulasi Catatan Data dan Kegiatan Warga TP PKK Tingkat Kecamatan (35 Kolom)
     * Agregasi dari catatan_warga_tp_pkk per Desa/Kelurahan dalam satu Kecamatan
     */
    public function get_rekap_kecamatan($kode_kecamatan, $tahun)
    {
        $this->db->select('
            md.Kd_Desa,
            md.Nama_Desa,
            COUNT(c.id) as jml_dusun,
            SUM(c.jml_rw) as jml_rw,
            SUM(c.jml_rt) as jml_rt,
            SUM(c.jml_dasawisma) as jml_dasawisma,
            SUM(c.jml_krt) as jml_krt,
            SUM(c.jml_kk) as jml_kk,
            SUM(c.total_l) as total_l,
            SUM(c.total_p) as total_p,
            SUM(c.balita_l) as balita_l,
            SUM(c.balita_p) as balita_p,
            SUM(c.pus) as pus,
            SUM(c.wus) as wus,
            SUM(c.ibu_hamil) as ibu_hamil,
            SUM(c.ibu_menyusui) as ibu_menyusui,
            SUM(c.lansia) as lansia,
            SUM(c.buta) as buta,
            SUM(c.buta_l) as buta_l,
            SUM(c.buta_p) as buta_p,
            SUM(c.sehat_layak_huni) as sehat_layak_huni,
            SUM(c.tidak_sehat_layak_huni) as tidak_sehat_layak_huni,
            SUM(c.tempat_sampah) as tempat_sampah,
            SUM(c.spal) as spal,
            SUM(c.pdam) as pdam,
            SUM(c.sumur) as sumur,
            SUM(c.sungai) as sungai,
            SUM(c.dll) as dll,
            SUM(c.jamban) as jamban,
            SUM(c.beras) as beras,
            SUM(c.non_beras) as non_beras,
            SUM(c.up2k) as up2k,
            SUM(c.pemanfaatan_tanah) as pemanfaatan_tanah,
            SUM(c.industri_rumah_tangga) as industri_rumah_tangga,
            SUM(c.kesling) as kesling,
            GROUP_CONCAT(DISTINCT NULLIF(c.keterangan, "") SEPARATOR "; ") as keterangan
        ');
        $this->db->from('catatan_warga_tp_pkk c');
        $this->db->join('master_desa md', 'md.Kd_Desa = c.kode_desa', 'left');
        $this->db->where('c.kode_kecamatan', $kode_kecamatan);
        $this->db->where('c.tahun', $tahun);
        $this->db->where('c.visible', 1);
        $this->db->group_by('c.kode_desa');
        $this->db->order_by('md.Nama_Desa', 'ASC');
        return $this->db->get()->result();
    }

    /**
     * Ambil jumlah master RW, RT, Dasawisma dari tabel master untuk pengisian form
     */
    public function get_master_wilayah_counts($kode_desa)
    {
        $this->db->where('Kd_Desa', $kode_desa);
        $jml_rw = $this->db->count_all_results('master_rw');

        $this->db->where('Kd_Desa', $kode_desa);
        $jml_rt = $this->db->count_all_results('master_rt');

        $this->db->where('Kd_Desa', $kode_desa);
        $jml_dasawisma = $this->db->count_all_results('master_dasawisma');

        return (object) [
            'jml_rw' => $jml_rw,
            'jml_rt' => $jml_rt,
            'jml_dasawisma' => $jml_dasawisma
        ];
    }

    /**
     * Helper to get list of Kecamatan for dropdown filter
     */
    public function get_all_kecamatan()
    {
        $this->db->where('visible', 1);
        $this->db->order_by('Nama_Kecamatan', 'ASC');
        return $this->db->get('master_kecamatan')->result();
    }

    /**
     * Helper to get list of Desa by Kecamatan
     */
    public function get_desa_by_kecamatan($kd_kec)
    {
        $this->db->where('Kd_Kec', $kd_kec);
        $this->db->where('visible', 1);
        $this->db->order_by('Nama_Desa', 'ASC');
        return $this->db->get('master_desa')->result();
    }

    /**
     * Get single Catatan Warga record by ID
     */
    public function get_catatan_warga_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->where('visible', 1);
        return $this->db->get('catatan_warga_tp_pkk')->row();
    }

    /**
     * Save Catatan Warga Total Desa (Insert or Update)
     */
    public function save_catatan_warga($data, $id = null)
    {
        if (!empty($id)) {
            $this->db->where('id', $id);
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('user_id');
            return $this->db->update('catatan_warga_tp_pkk', $data);
        } else {
            $data['created_by'] = $this->session->userdata('user_id');
            $data['visible'] = 1;
            return $this->db->insert('catatan_warga_tp_pkk', $data);
        }
    }

    /**
     * Soft delete Catatan Warga record
     */
    public function delete_catatan_warga($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('catatan_warga_tp_pkk', array(
            'visible' => 0,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('user_id')
        ));
    }

    /**
     * Get Catatan Ibu Hamil, Melahirkan, Nifas, Bayi & Balita TP PKK Desa/Kelurahan
     */
    public function get_catatan_ibu_bayi($kode_desa, $bulan, $tahun)
    {
        $this->db->select('c.*, md.Nama_Desa, mk.Nama_Kecamatan');
        $this->db->from('catatan_ibu_bayi_tp_pkk c');
        $this->db->join('master_desa md', 'md.Kd_Desa = c.kode_desa', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = c.kode_kecamatan', 'left');
        $this->db->where('c.kode_desa', $kode_desa);
        $this->db->where('c.bulan', $bulan);
        $this->db->where('c.tahun', $tahun);
        $this->db->where('c.visible', 1);
        $this->db->order_by('c.id', 'DESC');
        return $this->db->get()->result();
    }

    /**
     * Save Catatan Ibu Hamil, Melahirkan, Nifas, Bayi & Balita (Insert or Update)
     */
    public function save_catatan_ibu_bayi($data, $id = null)
    {
        if (!empty($id)) {
            $this->db->where('id', $id);
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('user_id');
            return $this->db->update('catatan_ibu_bayi_tp_pkk', $data);
        } else {
            $data['created_by'] = $this->session->userdata('user_id');
            $data['visible'] = 1;
            return $this->db->insert('catatan_ibu_bayi_tp_pkk', $data);
        }
    }

    /**
     * Soft delete Catatan Ibu Hamil & Bayi record
     */
    public function delete_catatan_ibu_bayi($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('catatan_ibu_bayi_tp_pkk', array(
            'visible' => 0,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('user_id')
        ));
    }

    /**
     * Rekapitulasi Catatan Ibu Hamil, Melahirkan, Nifas, Bayi & Balita Tingkat Kecamatan (Lampiran 4.19b - 19 Kolom)
     */
    public function get_rekap_ibu_bayi_kecamatan($kode_kecamatan, $bulan, $tahun)
    {
        $this->db->select('
            md.Kd_Desa,
            md.Nama_Desa,
            COUNT(c.id) as jml_dusun,
            SUM(c.jml_rw) as jml_rw,
            SUM(c.jml_rt) as jml_rt,
            SUM(c.jml_dasawisma) as jml_dasawisma,
            SUM(c.ibu_hamil) as ibu_hamil,
            SUM(c.ibu_melahirkan) as ibu_melahirkan,
            SUM(c.ibu_nifas) as ibu_nifas,
            SUM(c.ibu_meninggal) as ibu_meninggal,
            SUM(c.bayi_lahir_l) as bayi_lahir_l,
            SUM(c.bayi_lahir_p) as bayi_lahir_p,
            SUM(c.bayi_akte_ada) as bayi_akte_ada,
            SUM(c.bayi_akte_tidak) as bayi_akte_tidak,
            SUM(c.bayi_meninggal_l) as bayi_meninggal_l,
            SUM(c.bayi_meninggal_p) as bayi_meninggal_p,
            SUM(c.balita_meninggal_l) as balita_meninggal_l,
            SUM(c.balita_meninggal_p) as balita_meninggal_p,
            GROUP_CONCAT(DISTINCT NULLIF(c.keterangan, "") SEPARATOR "; ") as keterangan
        ');
        $this->db->from('catatan_ibu_bayi_tp_pkk c');
        $this->db->join('master_desa md', 'md.Kd_Desa = c.kode_desa', 'left');
        $this->db->where('c.kode_kecamatan', $kode_kecamatan);
        $this->db->where('c.bulan', $bulan);
        $this->db->where('c.tahun', $tahun);
        $this->db->where('c.visible', 1);
        $this->db->group_by('c.kode_desa');
        $this->db->order_by('md.Nama_Desa', 'ASC');
        return $this->db->get()->result();
    }
}
