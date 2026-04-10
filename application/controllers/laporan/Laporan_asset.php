<?php

class laporan_asset extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->input->post('cancel-button'))
            redirect('auth/user/index');

        $this->load->language('auth');
        $this->load->model('master/desa_model');
        $this->load->model('inventaris/inventaris_model');
    }

    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Laporan Asset Daerah',
            'ui_controller' => 'laporan_asset',
        ));
        $data['kecamatan'] = $this->user_model->get_kecamatan();
        $this->template
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js('app/laporan/laporan_asset/index')
            ->build('laporan/laporan_asset/index',$data);
    }

    public function print_excel($kec,$desa,$tahun,$jenis)
    {

        // include("donjo-app/views/inventaris/gedung/inventaris_print.php");
        $data['tahun'] = $tahun;
        $data['desa'] = $this->db->get_where('master_desa', array('Kd_Desa' => $desa))->row();
        $data['kec'] = $this->db->get_where('master_kecamatan', array('Kd_Kec' => $kec))->row();
        $data['inventaris_asset'] =  $this->inventaris_model->cetak($kec,$desa,$tahun,$jenis);
        $data['inventaris_gedung'] =  $this->inventaris_model->cetak_gedung($kec,$desa,$tahun,$jenis);
        $data['inventaris_jalan'] =  $this->inventaris_model->cetak_jalan($kec,$desa,$tahun,$jenis);
        $data['inventaris_peralatan'] =  $this->inventaris_model->cetak_peralatan($kec,$desa,$tahun,$jenis);
        $data['inventaris_kontruksi'] =  $this->inventaris_model->cetak_kontruksi($kec,$desa,$tahun,$jenis);
        $data['inventaris_tanah'] =  $this->inventaris_model->cetak_tanah($kec,$desa,$tahun,$jenis);

        // LAMPIRAN
        $dataInventaris['inventaris_asset_lampiran'] =  $this->inventaris_model->lampiran_cetak($kec,$desa,$tahun,$jenis);
        $dataInventaris['inventaris_asset_lampiran_gedung'] =  $this->inventaris_model->lampiran_cetak_gedung($kec,$desa,$tahun,$jenis);
        $dataInventaris['inventaris_asset_lampiran_jalan'] =  $this->inventaris_model->lampiran_cetak_jalan($kec,$desa,$tahun,$jenis);
        $dataInventaris['inventaris_asset_lampiran_kontruksi'] =  $this->inventaris_model->lampiran_cetak_kontruksi($kec,$desa,$tahun,$jenis);
        $dataInventaris['inventaris_asset_lampiran_peralatan'] =  $this->inventaris_model->lampiran_cetak_peralatan($kec,$desa,$tahun,$jenis);
        $dataInventaris['inventaris_asset_lampiran_tanah'] =  $this->inventaris_model->lampiran_cetak_tanah($kec,$desa,$tahun,$jenis);
        // print_r($data['inventaris_asset_lampiran']);
        // die;

        $data['inventaris_asset_baik'] =  $this->inventaris_model->cetak_mutasi_baik($kec,$desa,$tahun,$jenis);
        $data['inventaris_asset_rusak'] =  $this->inventaris_model->cetak_mutasi_rusak($kec,$desa,$tahun,$jenis);

        $data['inventaris_gedung_baik'] =  $this->inventaris_model->bangunan_cetak_mutasi_baik($kec,$desa,$tahun,$jenis);
        $data['inventaris_gedung_rusak'] =  $this->inventaris_model->bangunan_cetak_mutasi_rusak($kec,$desa,$tahun,$jenis);

        $data['inventaris_jalan_baik'] =  $this->inventaris_model->jalan_cetak_mutasi_baik($kec,$desa,$tahun,$jenis);
        $data['inventaris_jalan_rusak'] =  $this->inventaris_model->jalan_cetak_mutasi_rusak($kec,$desa,$tahun,$jenis);

        $data['inventaris_kontruksi_baik'] =  $this->inventaris_model->kontruksi_cetak_mutasi_baik($kec,$desa,$tahun,$jenis);
        $data['inventaris_kontruksi_rusak'] =  $this->inventaris_model->kontruksi_cetak_mutasi_rusak($kec,$desa,$tahun,$jenis);

        $data['inventaris_peralatan_baik'] =  $this->inventaris_model->peralatan_cetak_mutasi_baik($kec,$desa,$tahun,$jenis);
        $data['inventaris_peralatan_rusak'] =  $this->inventaris_model->peralatan_cetak_mutasi_rusak($kec,$desa,$tahun,$jenis);

        $data['inventaris_tanah_baik'] =  $this->inventaris_model->tanah_cetak_mutasi_baik($kec,$desa,$tahun,$jenis);
        $data['inventaris_tanah_rusak'] =  $this->inventaris_model->tanah_cetak_mutasi_rusak($kec,$desa,$tahun,$jenis);

        $data['mutasi_asset'] =  $this->inventaris_model->cetak_mutasi_asset($kec,$desa,$tahun,$jenis);
        $data['mutasi_gedung'] =  $this->inventaris_model->cetak_mutasi_gedung($kec,$desa,$tahun,$jenis);
        $data['mutasi_jalan'] =  $this->inventaris_model->cetak_mutasi_jalan($kec,$desa,$tahun,$jenis);
        $data['mutasi_kontruksi'] =  $this->inventaris_model->cetak_mutasi_kontruksi($kec,$desa,$tahun,$jenis);
        $data['mutasi_peralatan'] =  $this->inventaris_model->cetak_mutasi_peralatan($kec,$desa,$tahun,$jenis);
        $data['mutasi_tanah'] =  $this->inventaris_model->cetak_mutasi_tanah($kec,$desa,$tahun,$jenis);
        // print_r($this->inventaris_model->cetak_mutasi_asset($kec,$desa,$tahun,$jenis));
        // die;

        // $this->load->view('laporan/laporan_asset/print',$data);
        $data_file = array('laporan/laporan_asset/print_excel'=>$data);

        // include($this->load->view('laporan/laporan_asset/print_excel', $data));
        // include($this->load->view('laporan/laporan_asset/lampiran_tanah_excel', $dataInventaris));
        foreach ($data_file as $file  => $data){
            include($this->load->view($file,$data));
        }
        // $mpdf = new mPDF();
        // $mpdf->AddPage('L');
        // $mpdf->WriteHTML($html);
        // // Tanah
        // $mpdf->AddColumn();
        // $tanah = $this->load->view('laporan/laporan_asset/lampiran_tanah', $dataInventaris, TRUE);
        // $mpdf->WriteHTML($tanah);
        // // Peralatan
        // $mpdf->AddColumn();
        // $peralatan = $this->load->view('laporan/laporan_asset/lampiran_peralatan', $dataInventaris, TRUE);
        // $mpdf->WriteHTML($peralatan);
        // // Gedung
        // $mpdf->AddColumn();
        // $gedung = $this->load->view('laporan/laporan_asset/lampiran_gedung', $dataInventaris, TRUE);
        // $mpdf->WriteHTML($gedung);
        // // Jalan
        // $mpdf->AddColumn();
        // $jalan = $this->load->view('laporan/laporan_asset/lampiran_jalan', $dataInventaris, TRUE);
        // $mpdf->WriteHTML($jalan);
        // // Asset
        // $mpdf->AddColumn();
        // $asset = $this->load->view('laporan/laporan_asset/lampiran_asset', $dataInventaris, TRUE);
        // $mpdf->WriteHTML($asset);
        // // Kontruksi
        // $mpdf->AddColumn();
        // $kontruksi = $this->load->view('laporan/laporan_asset/lampiran_kontruksi', $dataInventaris, TRUE);
        // $mpdf->WriteHTML($kontruksi);



        // $mpdf->Output('Laporan Keseluruhan Asset - '.date('d M Y').'.pdf','I');
    }

    public function cetak_laporan($kec,$desa,$tahun,$jenis){
        $data['tahun'] = $tahun;
        $data['desa'] = $this->db->get_where('master_desa', array('Kd_Desa' => $desa))->row();
        $data['kec'] = $this->db->get_where('master_kecamatan', array('Kd_Kec' => $kec))->row();
        $data['inventaris_asset'] =  $this->inventaris_model->cetak($kec,$desa,$tahun,$jenis);
        $data['inventaris_gedung'] =  $this->inventaris_model->cetak_gedung($kec,$desa,$tahun,$jenis);
        $data['inventaris_jalan'] =  $this->inventaris_model->cetak_jalan($kec,$desa,$tahun,$jenis);
        $data['inventaris_peralatan'] =  $this->inventaris_model->cetak_peralatan($kec,$desa,$tahun,$jenis);
        $data['inventaris_kontruksi'] =  $this->inventaris_model->cetak_kontruksi($kec,$desa,$tahun,$jenis);
        $data['inventaris_tanah'] =  $this->inventaris_model->cetak_tanah($kec,$desa,$tahun,$jenis);

        // LAMPIRAN
        $dataInventaris['inventaris_asset_lampiran'] =  $this->inventaris_model->lampiran_cetak($kec,$desa,$tahun,$jenis);
        $dataInventaris['inventaris_asset_lampiran_gedung'] =  $this->inventaris_model->lampiran_cetak_gedung($kec,$desa,$tahun,$jenis);
        $dataInventaris['inventaris_asset_lampiran_jalan'] =  $this->inventaris_model->lampiran_cetak_jalan($kec,$desa,$tahun,$jenis);
        $dataInventaris['inventaris_asset_lampiran_kontruksi'] =  $this->inventaris_model->lampiran_cetak_kontruksi($kec,$desa,$tahun,$jenis);
        $dataInventaris['inventaris_asset_lampiran_peralatan'] =  $this->inventaris_model->lampiran_cetak_peralatan($kec,$desa,$tahun,$jenis);
        $dataInventaris['inventaris_asset_lampiran_tanah'] =  $this->inventaris_model->lampiran_cetak_tanah($kec,$desa,$tahun,$jenis);
        // print_r($data['inventaris_asset_lampiran']);
        // die;

        $data['inventaris_asset_baik'] =  $this->inventaris_model->cetak_mutasi_baik($kec,$desa,$tahun,$jenis);
        $data['inventaris_asset_rusak'] =  $this->inventaris_model->cetak_mutasi_rusak($kec,$desa,$tahun,$jenis);

        $data['inventaris_gedung_baik'] =  $this->inventaris_model->bangunan_cetak_mutasi_baik($kec,$desa,$tahun,$jenis);
        $data['inventaris_gedung_rusak'] =  $this->inventaris_model->bangunan_cetak_mutasi_rusak($kec,$desa,$tahun,$jenis);

        $data['inventaris_jalan_baik'] =  $this->inventaris_model->jalan_cetak_mutasi_baik($kec,$desa,$tahun,$jenis);
        $data['inventaris_jalan_rusak'] =  $this->inventaris_model->jalan_cetak_mutasi_rusak($kec,$desa,$tahun,$jenis);

        $data['inventaris_kontruksi_baik'] =  $this->inventaris_model->kontruksi_cetak_mutasi_baik($kec,$desa,$tahun,$jenis);
        $data['inventaris_kontruksi_rusak'] =  $this->inventaris_model->kontruksi_cetak_mutasi_rusak($kec,$desa,$tahun,$jenis);

        $data['inventaris_peralatan_baik'] =  $this->inventaris_model->peralatan_cetak_mutasi_baik($kec,$desa,$tahun,$jenis);
        $data['inventaris_peralatan_rusak'] =  $this->inventaris_model->peralatan_cetak_mutasi_rusak($kec,$desa,$tahun,$jenis);

        $data['inventaris_tanah_baik'] =  $this->inventaris_model->tanah_cetak_mutasi_baik($kec,$desa,$tahun,$jenis);
        $data['inventaris_tanah_rusak'] =  $this->inventaris_model->tanah_cetak_mutasi_rusak($kec,$desa,$tahun,$jenis);

        $data['mutasi_asset'] =  $this->inventaris_model->cetak_mutasi_asset($kec,$desa,$tahun,$jenis);
        $data['mutasi_gedung'] =  $this->inventaris_model->cetak_mutasi_gedung($kec,$desa,$tahun,$jenis);
        $data['mutasi_jalan'] =  $this->inventaris_model->cetak_mutasi_jalan($kec,$desa,$tahun,$jenis);
        $data['mutasi_kontruksi'] =  $this->inventaris_model->cetak_mutasi_kontruksi($kec,$desa,$tahun,$jenis);
        $data['mutasi_peralatan'] =  $this->inventaris_model->cetak_mutasi_peralatan($kec,$desa,$tahun,$jenis);
        $data['mutasi_tanah'] =  $this->inventaris_model->cetak_mutasi_tanah($kec,$desa,$tahun,$jenis);
        // print_r($this->inventaris_model->cetak_mutasi_asset($kec,$desa,$tahun,$jenis));
        // die;


        // $this->load->view('laporan/laporan_asset/print',$data);
        $html = $this->load->view('laporan/laporan_asset/print', $data, TRUE);
        $mpdf = new mPDF('utf-8', array(225,440));
        $mpdf->AddPage('L');
        $mpdf->WriteHTML($html);
        // Tanah
        $mpdf->AddColumn();
        $tanah = $this->load->view('laporan/laporan_asset/lampiran_tanah', $dataInventaris, TRUE);
        $mpdf->WriteHTML($tanah);
        // Peralatan
        $mpdf->AddColumn();
        $peralatan = $this->load->view('laporan/laporan_asset/lampiran_peralatan', $dataInventaris, TRUE);
        $mpdf->WriteHTML($peralatan);
        // Gedung
        $mpdf->AddColumn();
        $gedung = $this->load->view('laporan/laporan_asset/lampiran_gedung', $dataInventaris, TRUE);
        $mpdf->WriteHTML($gedung);
        // Jalan
        $mpdf->AddColumn();
        $jalan = $this->load->view('laporan/laporan_asset/lampiran_jalan', $dataInventaris, TRUE);
        $mpdf->WriteHTML($jalan);
        // Asset
        $mpdf->AddColumn();
        $asset = $this->load->view('laporan/laporan_asset/lampiran_asset', $dataInventaris, TRUE);
        $mpdf->WriteHTML($asset);
        // Kontruksi
        $mpdf->AddColumn();
        $kontruksi = $this->load->view('laporan/laporan_asset/lampiran_kontruksi', $dataInventaris, TRUE);
        $mpdf->WriteHTML($kontruksi);



        $mpdf->Output('Laporan Keseluruhan Asset - '.date('d M Y').'.pdf','I');

    }

}