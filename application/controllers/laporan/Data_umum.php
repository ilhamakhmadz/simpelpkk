<?php
use Mpdf\Mpdf;
class data_umum extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->input->post('cancel-button'))
            redirect('auth/user/index');

        $this->load->language('auth');
        $this->load->model('desa/profil_model');
        $this->load->model('master/desa_model');

    }


    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Laporan Data Umum PKK',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Laporan</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('desa/index') . '" class="text-muted text-hover-primary">Profil PKK</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Data Umum PKK</li>',
        ));

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(assets_url('js/app/laporan/data_umum/index.js'))
            ->build('laporan/data_umum/index');
    }

    public function view($id)
    {
        $this->load->vars(array(
            'page_title' => 'Lihat Profil PKK',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('laporan/data_umum') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('laporan/data_umum') . '" class="text-muted text-hover-primary">Profil PKK</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Lihat Profil PKK</li>',
        ));
        $data['profil'] = $this->profil_model->get_by_id($id);
        // var_dump($data['profil']);
        
        if($data['profil']->level == 'kecamatan'){
            $data['aparatur'] = $this->profil_model->get_aparatur_kec($data['profil']->date_year, $data['profil']->kode_kecamatan, null,null,null,null);
            $data['anggota'] = $this->profil_model->get_anggota_kec($data['profil']->date_year, $data['profil']->kode_kecamatan, null,null,null,null);
        }else if($data['profil']->level == 'desa'){
            $data['aparatur'] = $this->profil_model->get_aparatur_desa($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa,null,null,null);
            $data['anggota'] = $this->profil_model->get_anggota_desa($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa,null,null,null);
        }else if($data['profil']->level == 'dusun'){
            $data['aparatur'] = $this->profil_model->get_aparatur_dusun($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun,null,null);
            $data['anggota'] = $this->profil_model->get_anggota_dusun($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun,null,null);
        }else if($data['profil']->level == 'rw'){
            $data['aparatur'] = $this->profil_model->get_aparatur_rw($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun, $data['profil']->rw,null);
            $data['anggota'] = $this->profil_model->get_anggota_rw($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun, $data['profil']->rw,null);
        }else if($data['profil']->level == 'rt'){
            $data['aparatur'] = $this->profil_model->get_aparatur_rt($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun, $data['profil']->rw,$data['profil']->rt);
            $data['anggota'] = $this->profil_model->get_anggota_rt($data['profil']->date_year, $data['profil']->kode_kecamatan, $data['profil']->kode_desa, $data['profil']->dusun, $data['profil']->rw,$data['profil']->rt);
        }

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            // ->set_js(assets_url('admin_assets/assets/js/scripts.bundle.js', true))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->build('desa/profil/view', $data);
    }

    public function pdf($tipe,$year){
        // 1 : Kabupaten
        // 2 : Kecamatan
        // 3 : Desa
        // 4 : Dusun
        // 5 : RW
        // 6 : RT
        if($tipe == 1){
            $data['filename'] = "Laporan Data Umum Tingkat Kabupaten";
        }else if($tipe == 2){
            $data['filename'] = "Laporan Data Umum Tingkat Kecamatan";
        }else if($tipe == 3){
            $data['filename'] = "Laporan Data Umum Tingkat Desa";
        }else if($tipe == 4){
            $data['filename'] = "Laporan Data Umum Tingkat Dusun";
        }else if($tipe == 5){
            $data['filename'] = "Laporan Data Umum Tingkat RW";
        }else if($tipe == 6){
            $data['filename'] = "Laporan Data Umum Tingkat RT";
        }
        $data['tahun'] = $year;
        
        $data['data_umum'] = $this->profil_model->cetak_pdf($tipe,$year);
        $html = $this->load->view('laporan/data_umum/pdf',$data, TRUE);
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
        $mpdf->SetTitle($data['filename']);
        $mpdf->SetFooter('Laporan Data Umum|'.date("d F Y").'|{PAGENO}');
        $mpdf->WriteHTML($html);
        $mpdf->Output($data['filename'].'.pdf', 'I');
    }

    public function excel($a="0",$b="0"){
        $a = preg_replace('/%20/', ' ',$a);
        $data_excel = $this->ikan_hias_model->cetak_pdf($a,$b);
    
        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                                    ->setLastModifiedBy("Maarten Balliauw")
                                    ->setTitle("Office 2007 XLSX Test Document")
                                    ->setSubject("Office 2007 XLSX Test Document")
                                    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                    ->setKeywords("office 2007 openxml php")
                                    ->setCategory("Test result file");

    $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells('A1:J1')
                ->getStyle('A1:A1')
                ->applyFromArray(
                    array('font' => array('size' => 14,'bold' => true)));
    $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells('A2:J2')
                ->getStyle('A2:A2')
                ->applyFromArray(
                    array('font' => array('size' => 14,'bold' => true)));
    $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells('A3:J3')
                ->getStyle('A3:A3')
                ->applyFromArray(
                    array('font' => array('size' => 14,'bold' => true)));
    $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells('A4:C4')
                ->getStyle('A4:A4')
                ->applyFromArray(
                    array('font' => array('size' => 12,'bold' => false)));
    $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A5:C5')
                    ->getStyle('A5:A5')
                    ->applyFromArray(
                        array('font' => array('size' => 12,'bold' => false)));
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'LAPORAN DATA BUDIDAYA IKAN HIAS');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', 'DINAS KETAHANAN PANGAN DAN PERIKANAN');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3', 'KABUPATEN BANDUNG');

    if($a != "0"){
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4', 'KELOMPOK : ' . $a);
    }else{
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4', 'KELOMPOK : -');
    }

    if($b != "0"){
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5', 'KECAMATAN : ' . $b);
    }else{
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5', 'KECAMATAN : -');
    }
    
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A7', 'No')
        ->setCellValue('B7', 'NIK')
        ->setCellValue('C7', 'Nama')
        ->setCellValue('D7', 'Kelompok')
        ->setCellValue('E7', 'Kecamatan')
        ->setCellValue('F7', 'Desa')
        ->setCellValue('G7', 'Luas Lahan (m2)')
        ->setCellValue('H7', 'Biaya Produksi')
        ->setCellValue('I7', 'Volume Produksi')
        ->setCellValue('J7', 'Nilai Produksi'); 
        
        $rowCount = 8;
        $no = 1;
        foreach ($data_excel as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $no);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->nik);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->nama);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->nama_kelompok);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->Nama_Kecamatan);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->Nama_Desa);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->luas_kolam_m2);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->harga_produksi);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->volume_produksi);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $list->nilai_produksi);
            $rowCount++;
            $no++;
        }
                                               

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle(date('Y-m-d').' - Ikan Hias');


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.date('Y-m-d').' - Ikan Hias'.'.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

}