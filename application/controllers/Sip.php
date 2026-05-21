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
            'page_title' => 'SIP 7 - Rekapitulasi Hasil Kegiatan Posyandu',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Rekapitulasi Kegiatan</li>',
        ));

        // Get the list of Posyandu accessible by this user to populate filters
        $data['posyandu_list'] = $this->sip_model->get_posyandu_list();
        $data['can_write'] = $this->sip_model->can_write();
        $data['user_level'] = $this->session->userdata('level_id');

        // Read active filters from GET / POST
        $data['selected_posyandu'] = $this->input->get_post('posyandu_id');
        $data['selected_bulan'] = $this->input->get_post('bulan');
        $data['selected_tahun'] = $this->input->get_post('tahun');

        // Apply defaults if filters are empty
        if (empty($data['selected_posyandu']) && !empty($data['posyandu_list'])) {
            $data['selected_posyandu'] = $data['posyandu_list'][0]->id;
        }
        if (empty($data['selected_bulan'])) {
            $data['selected_bulan'] = intval(date('m'));
        }
        if (empty($data['selected_tahun'])) {
            $data['selected_tahun'] = intval(date('Y'));
        }

        // Fetch activities only if a Posyandu is selected
        $data['activities'] = array();
        $data['posyandu_details'] = null;
        if (!empty($data['selected_posyandu'])) {
            $data['posyandu_details'] = $this->sip_model->get_posyandu_by_id($data['selected_posyandu']);
            $data['activities'] = $this->sip_model->get_activities($data['selected_posyandu'], $data['selected_bulan'], $data['selected_tahun']);
        }
        
        // Data rekapitulasi berdasarkan tingkatan user
        $data['recap_kecamatan'] = [];
        $data['recap_desa'] = [];
        $data['recap_dusun'] = [];
        
        if ($data['user_level'] <= 3) {
            $data['recap_kecamatan'] = $this->sip_model->get_recap_sip7('kecamatan', $data['selected_bulan'], $data['selected_tahun']);
            $data['recap_desa'] = $this->sip_model->get_recap_sip7('desa', $data['selected_bulan'], $data['selected_tahun']);
            $data['recap_dusun'] = $this->sip_model->get_recap_sip7('dusun', $data['selected_bulan'], $data['selected_tahun']);
        } elseif ($data['user_level'] == 4) {
            $data['recap_desa'] = $this->sip_model->get_recap_sip7('desa', $data['selected_bulan'], $data['selected_tahun']);
            $data['recap_dusun'] = $this->sip_model->get_recap_sip7('dusun', $data['selected_bulan'], $data['selected_tahun']);
        } elseif ($data['user_level'] == 5) {
            $data['recap_dusun'] = $this->sip_model->get_recap_sip7('dusun', $data['selected_bulan'], $data['selected_tahun']);
        }

        // Standard list of months in Indonesian
        $data['months'] = array(
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        );

        // List of years (current year down to current year - 5)
        $current_year = intval(date('Y'));
        $data['years'] = range($current_year, $current_year - 5);

        // Render view
        $this->template
            ->set_js('https://cdn.jsdelivr.net/npm/chart.js') // Premium charts
            ->build('sip/sip7', $data);
    }

    /**
     * SIP 7: Save activities (RW Only)
     */
    public function sip7_save()
    {
        if (!$this->sip_model->can_write()) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki hak akses untuk mencatat data kegiatan.');
            redirect('sip/sip7');
        }

        $posyandu_id = $this->input->post('posyandu_id');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        if (empty($posyandu_id) || empty($bulan) || empty($tahun)) {
            $this->session->set_flashdata('error', 'Parameter tidak lengkap.');
            redirect('sip/sip7');
        }

        // Retrieve arrays of activity values
        $kegiatans = $this->input->post('kegiatan'); // Array of data structured by service name

        $success_count = 0;
        foreach ($kegiatans as $key => $values) {
            $jenis_kegiatan = str_replace('_', ' ', $key);
            $data = array(
                'posyandu_id'    => $posyandu_id,
                'bulan'          => intval($bulan),
                'tahun'          => intval($tahun),
                'jenis_kegiatan' => $jenis_kegiatan,
                'frekuensi'      => intval($values['frekuensi']),
                'pengunjung_l'   => intval($values['pengunjung_l']),
                'pengunjung_p'   => intval($values['pengunjung_p']),
                'petugas_l'      => intval($values['petugas_l']),
                'petugas_p'      => intval($values['petugas_p']),
                'keterangan'     => !empty($values['keterangan']) ? $values['keterangan'] : '-',
                'visible'        => 1
            );

            if ($this->sip_model->save_kegiatan($data)) {
                $success_count++;
            }
        }

        if ($success_count > 0) {
            $this->session->set_flashdata('success', 'Berhasil menyimpan ' . $success_count . ' data kegiatan posyandu.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data kegiatan.');
        }

        redirect("sip/sip7?posyandu_id={$posyandu_id}&bulan={$bulan}&tahun={$tahun}");
    }

    /**
     * SIP 7: Export PDF using mPDF
     */
    public function sip7_pdf()
    {
        $posyandu_id = $this->input->get('posyandu_id');
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        if (empty($posyandu_id) || empty($bulan) || empty($tahun)) {
            show_error('Parameter laporan tidak lengkap.', 400);
        }

        $data['posyandu_details'] = $this->sip_model->get_posyandu_by_id($posyandu_id);
        if (!$data['posyandu_details']) {
            show_error('Posyandu tidak ditemukan atau Anda tidak memiliki akses.', 404);
        }

        $data['activities'] = $this->sip_model->get_activities($posyandu_id, $bulan, $tahun);

        $months = array(
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        );
        $data['nama_bulan'] = $months[intval($bulan)];
        $data['tahun'] = $tahun;

        // Render dynamic HTML for mPDF
        $html = $this->load->view('sip/pdf_sip7', $data, TRUE);

        // Instantiate mPDF and generate layout
        $filename = "SIP7_Rekap_Kegiatan_" . str_replace(' ', '_', $data['posyandu_details']->nama_posyandu) . "_{$data['nama_bulan']}_{$tahun}";

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 
            'format' => 'A4-L', // Landscape A4 matching PKK requirements
            'margin_left' => 15,
            'margin_right' => 15,
            'margin_top' => 15,
            'margin_bottom' => 15,
        ]);

        $mpdf->SetTitle("SIP 7 - Rekapitulasi Hasil Kegiatan Posyandu");
        $mpdf->SetFooter('SIP 7 (Rekap Kegiatan)|Cetak: ' . date("d-m-Y H:i") . '|Halaman {PAGENO}');
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename . '.pdf', 'I'); // Display in browser for printing
    }
}
