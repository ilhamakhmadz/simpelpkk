<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sip extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sip_model', 'sip_model');
        $this->load->model('auth/user_model', 'user_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    /**
     * SIP 6: Register Posyandu List and CRUD
     */
    public function sip6()
    {
        $this->load->vars(array(
            'page_title' => 'SIP 6 - Data Pengunjung dan Register Posyandu',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Register Posyandu</li>',
        ));

        // Get the list of Posyandu accessible by this user (applying regional filters)
        $data['posyandu_list'] = $this->sip_model->get_posyandu_list();
        $data['can_write'] = $this->sip_model->can_write();
        $data['user_level'] = $this->session->userdata('level_id');
        
        // Data rekapitulasi berdasarkan tingkatan user
        $data['recap_kecamatan'] = [];
        $data['recap_desa'] = [];
        $data['recap_dusun'] = [];
        
        if ($data['user_level'] <= 3) {
            $data['recap_kecamatan'] = $this->sip_model->get_recap_sip6('kecamatan');
            $data['recap_desa'] = $this->sip_model->get_recap_sip6('desa');
            $data['recap_dusun'] = $this->sip_model->get_recap_sip6('dusun');
        } elseif ($data['user_level'] == 4) {
            $data['recap_desa'] = $this->sip_model->get_recap_sip6('desa');
            $data['recap_dusun'] = $this->sip_model->get_recap_sip6('dusun');
        } elseif ($data['user_level'] == 5) {
            $data['recap_dusun'] = $this->sip_model->get_recap_sip6('dusun');
        }

        // Load the view with admin layout
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->build('sip/sip6', $data);
    }

    /**
     * SIP 6: Add Posyandu (RW Only)
     */
    public function sip6_add()
    {
        if (!$this->sip_model->can_write()) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki hak akses untuk menambah data Posyandu.');
            redirect('sip/sip6');
        }

        $nama_posyandu = $this->input->post('nama_posyandu');
        $pengelola = $this->input->post('pengelola');
        $sekretaris = $this->input->post('sekretaris');
        $jenis_posyandu = $this->input->post('jenis_posyandu');
        $jumlah_kader = $this->input->post('jumlah_kader');

        if (empty($nama_posyandu)) {
            $this->session->set_flashdata('error', 'Nama Posyandu tidak boleh kosong.');
            redirect('sip/sip6');
        }

        // Region values are populated from session to prevent tampering and simplify input
        $data = array(
            'kode_kecamatan' => $this->session->userdata('kec_id'),
            'kode_desa'      => $this->session->userdata('desa_id'),
            'dusun_id'       => $this->session->userdata('dusun_id') ? $this->session->userdata('dusun_id') : null,
            'rw'             => $this->session->userdata('rw'),
            'rt'             => $this->session->userdata('rt') ? $this->session->userdata('rt') : null,
            'nama_posyandu'  => $nama_posyandu,
            'pengelola'      => $pengelola,
            'sekretaris'     => $sekretaris,
            'jenis_posyandu' => $jenis_posyandu,
            'jumlah_kader'   => intval($jumlah_kader),
            'visible'        => 1
        );

        if ($this->sip_model->add_posyandu($data)) {
            $this->session->set_flashdata('success', 'Data Posyandu berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data Posyandu.');
        }

        redirect('sip/sip6');
    }

    /**
     * SIP 6: Edit Posyandu (RW Only)
     */
    public function sip6_edit($id)
    {
        if (!$this->sip_model->can_write()) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki hak akses untuk mengubah data Posyandu.');
            redirect('sip/sip6');
        }

        $nama_posyandu = $this->input->post('nama_posyandu');
        $pengelola = $this->input->post('pengelola');
        $sekretaris = $this->input->post('sekretaris');
        $jenis_posyandu = $this->input->post('jenis_posyandu');
        $jumlah_kader = $this->input->post('jumlah_kader');

        if (empty($nama_posyandu)) {
            $this->session->set_flashdata('error', 'Nama Posyandu tidak boleh kosong.');
            redirect('sip/sip6');
        }

        $data = array(
            'nama_posyandu'  => $nama_posyandu,
            'pengelola'      => $pengelola,
            'sekretaris'     => $sekretaris,
            'jenis_posyandu' => $jenis_posyandu,
            'jumlah_kader'   => intval($jumlah_kader)
        );

        if ($this->sip_model->update_posyandu($id, $data)) {
            $this->session->set_flashdata('success', 'Data Posyandu berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data Posyandu.');
        }

        redirect('sip/sip6');
    }

    /**
     * SIP 6: Delete Posyandu (RW Only)
     */
    public function sip6_delete($id)
    {
        if (!$this->sip_model->can_write()) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki hak akses untuk menghapus data Posyandu.');
            redirect('sip/sip6');
        }

        if ($this->sip_model->delete_posyandu($id)) {
            $this->session->set_flashdata('success', 'Data Posyandu berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data Posyandu.');
        }

        redirect('sip/sip6');
    }


    /**
     * SIP 7: Rekapitulasi Hasil Kegiatan Posyandu
     */
    public function sip7()
    {
        $this->load->vars(array(
            'page_title' => 'CATATAN DATA DAN KEGIATAN WARGA TP PKK DESA/KELURAHAN',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Catatan Warga TP PKK</li>',
        ));

        $data['user_level'] = $this->session->userdata('level_id');
        $session_kec = $this->session->userdata('kec_id');
        $session_desa = $this->session->userdata('desa_id');

        // Parameter filter wilayah & tahun
        $data['selected_kec'] = $this->input->get_post('kec_id');
        $data['selected_desa'] = $this->input->get_post('desa_id');
        $data['selected_tahun'] = $this->input->get_post('tahun');

        if (empty($data['selected_tahun'])) {
            $data['selected_tahun'] = intval(date('Y'));
        }

        // Terapkan batasan level pengguna
        if ($data['user_level'] == 3) {
            $data['selected_kec'] = $session_kec;
        } elseif ($data['user_level'] >= 4 && !empty($session_desa)) {
            $data['selected_kec'] = $session_kec;
            $data['selected_desa'] = $session_desa;
        }

        // Default jika admin belum memilih
        if (empty($data['selected_kec'])) {
            $data['selected_kec'] = '320405'; // Default Cileunyi
        }
        if (empty($data['selected_desa'])) {
            // Ambil desa pertama dari kecamatan terpilih
            $desas = $this->sip_model->get_desa_by_kecamatan($data['selected_kec']);
            if (!empty($desas)) {
                $data['selected_desa'] = $desas[0]->Kd_Desa;
            }
        }

        // List dropdown kecamatan & desa
        $data['kecamatan_list'] = $this->sip_model->get_all_kecamatan();
        $data['desa_list'] = $this->sip_model->get_desa_by_kecamatan($data['selected_kec']);

        // Detail info wilayah
        $data['info_desa'] = $this->db->get_where('master_desa', array('Kd_Desa' => $data['selected_desa']))->row();
        $data['info_kec'] = $this->db->get_where('master_kecamatan', array('Kd_Kec' => $data['selected_kec']))->row();

        // Ambil data catatan warga desa ini dari tabel baru
        $data['catatan_warga'] = [];
        $data['master_counts'] = (object) ['jml_rw' => 0, 'jml_rt' => 0, 'jml_dasawisma' => 0];
        if (!empty($data['selected_desa'])) {
            $data['catatan_warga'] = $this->sip_model->get_catatan_warga_desa($data['selected_desa'], $data['selected_tahun']);
            $data['master_counts'] = $this->sip_model->get_master_wilayah_counts($data['selected_desa']);
        }

        // List tahun
        $current_year = intval(date('Y'));
        $data['years'] = range($current_year, $current_year - 5);

        // Render view
        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->build('sip/sip7', $data);
    }

    /**
     * SIP 7: Get data Catatan Warga by ID via AJAX
     */
    public function sip7_get($id)
    {
        $item = $this->sip_model->get_catatan_warga_by_id($id);
        header('Content-Type: application/json');
        if ($item) {
            echo json_encode(array('status' => true, 'data' => $item));
        } else {
            echo json_encode(array('status' => false, 'message' => 'Data tidak ditemukan'));
        }
        exit;
    }

    /**
     * SIP 7: Simpan / Edit data Catatan Warga Total Desa (CRUD Form)
     */
    public function sip7_save()
    {
        $id = $this->input->post('id');
        $desa_id = $this->input->post('desa_id');
        $tahun = $this->input->post('tahun');
        $kec_id = $this->input->post('kec_id');

        if (empty($desa_id) || empty($tahun)) {
            $this->session->set_flashdata('error', 'Desa dan Tahun wajib diisi.');
            redirect('sip/sip7?kec_id=' . $kec_id . '&desa_id=' . $desa_id . '&tahun=' . $tahun);
        }

        $data = array(
            'kode_kecamatan' => $kec_id ? $kec_id : $this->session->userdata('kec_id'),
            'kode_desa' => $desa_id,
            'tahun' => (int) $tahun,
            'jml_rw' => (int) $this->input->post('jml_rw'),
            'jml_rt' => (int) $this->input->post('jml_rt'),
            'jml_dasawisma' => (int) $this->input->post('jml_dasawisma'),
            'jml_krt' => (int) $this->input->post('jml_krt'),
            'jml_kk' => (int) $this->input->post('jml_kk'),
            'total_l' => (int) $this->input->post('total_l'),
            'total_p' => (int) $this->input->post('total_p'),
            'balita_l' => (int) $this->input->post('balita_l'),
            'balita_p' => (int) $this->input->post('balita_p'),
            'pus' => (int) $this->input->post('pus'),
            'wus' => (int) $this->input->post('wus'),
            'ibu_hamil' => (int) $this->input->post('ibu_hamil'),
            'ibu_menyusui' => (int) $this->input->post('ibu_menyusui'),
            'lansia' => (int) $this->input->post('lansia'),
            'buta' => (int) $this->input->post('buta'),
            'sehat_layak_huni' => (int) $this->input->post('sehat_layak_huni'),
            'tidak_sehat_layak_huni' => (int) $this->input->post('tidak_sehat_layak_huni'),
            'tempat_sampah' => (int) $this->input->post('tempat_sampah'),
            'spal' => (int) $this->input->post('spal'),
            'pdam' => (int) $this->input->post('pdam'),
            'sumur' => (int) $this->input->post('sumur'),
            'sungai' => (int) $this->input->post('sungai'),
            'dll' => (int) $this->input->post('dll'),
            'jamban' => (int) $this->input->post('jamban'),
            'beras' => (int) $this->input->post('beras'),
            'non_beras' => (int) $this->input->post('non_beras'),
            'up2k' => (int) $this->input->post('up2k'),
            'pemanfaatan_tanah' => (int) $this->input->post('pemanfaatan_tanah'),
            'industri_rumah_tangga' => (int) $this->input->post('industri_rumah_tangga'),
            'kesling' => (int) $this->input->post('kesling'),
            'keterangan' => $this->input->post('keterangan') ? $this->input->post('keterangan') : ''
        );

        if ($this->sip_model->save_catatan_warga($data, $id)) {
            $this->session->set_flashdata('success', 'Data Catatan Warga TP PKK berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data Catatan Warga.');
        }

        redirect('sip/sip7?kec_id=' . $kec_id . '&desa_id=' . $desa_id . '&tahun=' . $tahun);
    }

    /**
     * SIP 7: Hapus data Catatan Warga
     */
    public function sip7_delete($id = null)
    {
        $kec_id = $this->input->get('kec_id');
        $desa_id = $this->input->get('desa_id');
        $tahun = $this->input->get('tahun');

        if (!empty($id) && $this->sip_model->delete_catatan_warga($id)) {
            $this->session->set_flashdata('success', 'Data Catatan Warga berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan atau gagal dihapus.');
        }

        redirect('sip/sip7?kec_id=' . $kec_id . '&desa_id=' . $desa_id . '&tahun=' . $tahun);
    }

    /**
     * SIP 7: Export PDF Catatan Data dan Kegiatan Warga TP PKK Desa/Kelurahan
     */
    public function sip7_pdf()
    {
        $desa_id = $this->input->get('desa_id');
        $tahun = $this->input->get('tahun');

        if (empty($desa_id) || empty($tahun)) {
            show_error('Parameter laporan tidak lengkap.', 400);
        }

        $data['info_desa'] = $this->db->get_where('master_desa', array('Kd_Desa' => $desa_id))->row();
        if (!$data['info_desa']) {
            show_error('Desa tidak ditemukan.', 404);
        }
        $data['info_kec'] = $this->db->get_where('master_kecamatan', array('Kd_Kec' => $data['info_desa']->Kd_Kec))->row();
        $data['catatan_warga'] = $this->sip_model->get_catatan_warga_desa($desa_id, $tahun);
        $data['tahun'] = $tahun;

        // Render dynamic HTML for mPDF
        $html = $this->load->view('sip/pdf_sip7', $data, TRUE);

        // Instantiate mPDF and generate layout
        $filename = "Catatan_Kegiatan_Warga_" . str_replace(' ', '_', $data['info_desa']->Nama_Desa) . "_{$tahun}";

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 
            'format' => 'A4-L', // Landscape A4 matching PKK requirements
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 12,
            'margin_bottom' => 12,
        ]);

        $mpdf->SetTitle("Catatan Data dan Kegiatan Warga TP PKK Desa/Kelurahan");
        $mpdf->SetFooter('Catatan Data & Kegiatan Warga TP PKK|Cetak: ' . date("d-m-Y H:i") . '|Halaman {PAGENO}');
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename . '.pdf', 'I'); // Display in browser for printing
    }

    /**
     * SIP 7: Export Excel Catatan Data dan Kegiatan Warga TP PKK Desa/Kelurahan
     */
    public function sip7_excel()
    {
        $desa_id = $this->input->get('desa_id');
        $tahun = $this->input->get('tahun');

        if (empty($desa_id) || empty($tahun)) {
            show_error('Parameter laporan tidak lengkap.', 400);
        }

        $data['info_desa'] = $this->db->get_where('master_desa', array('Kd_Desa' => $desa_id))->row();
        if (!$data['info_desa']) {
            show_error('Desa tidak ditemukan.', 404);
        }
        $data['info_kec'] = $this->db->get_where('master_kecamatan', array('Kd_Kec' => $data['info_desa']->Kd_Kec))->row();
        $data['catatan_warga'] = $this->sip_model->get_catatan_warga_desa($desa_id, $tahun);
        $data['tahun'] = $tahun;

        $filename = "Catatan_Kegiatan_Warga_" . str_replace(' ', '_', $data['info_desa']->Nama_Desa) . "_{$tahun}.xls";

        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Cache-Control: max-age=0");

        $this->load->view('sip/excel_sip7', $data);
    }
}
