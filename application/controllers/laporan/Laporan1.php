<?php

class Laporan1 extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan/laporan1_model');
        if ($this->input->post('cancel-button')) {
            redirect('auth/user/index');
        }

        $this->load->language('auth');
    }


    public function index()
    {
        $this->load->vars(array(
        //    'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('pokja/pokja1/add/') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',
            'page_title' => 'Data Pokja I',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Laporan Pokja I</li>',
        ));
        $data['kelompok_ikan_hias'] = $this->ikan_hias_model->get_kelompok_ikan_hias();
        $data['kecamatan_ikan_hias'] = $this->ikan_hias_model->get_kecamatan_ikan_hias();
        $this->template
                ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                ->set_css(assets_url('datatables_responsive/datatables.bundle'))
                ->set_js(assets_url('datatables_responsive/datatables.bundle', true))
                ->set_css(bower_url('select2/dist/css/select2.min'))
                ->set_js(bower_url('select2/dist/js/select2.min'))
                ->set_js(assets_url('js/app/laporan/laporan1.js'))
                ->build('laporan/laporan1', $data);
    }

    // public function pdf($a="0", $b="0")
    // {
    //     $a = preg_replace('/%20/', ' ', $a);
    //     $data['ikan_hias'] = $this->ikan_hias_model->cetak_pdf($a, $b);
    //     $data['kelompok'] = $a;
    //     $data['kecamatan'] = $b;
    //     $filename = "Budidaya Ikan Hias";

    //     $html = $this->load->view('report/Pdf_ikan_hias', $data, true);
    //     $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
    //     $mpdf->SetTitle($filename);
    //     $mpdf->SetFooter('Sikandung|'.date("d F Y").'|{PAGENO}');
    //     $mpdf->WriteHTML($html);
    //     $mpdf->Output($filename.'.pdf', 'I');
    // }

    // public function excel($a="0", $b="0")
    // {
    //     $a = preg_replace('/%20/', ' ', $a);
    //     $data_excel = $this->ikan_hias_model->cetak_pdf($a, $b);

    //     // Create new PHPExcel object
    //     $objPHPExcel = new PHPExcel();

    //     // Set document properties
    //     $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
    //                                 ->setLastModifiedBy("Maarten Balliauw")
    //                                 ->setTitle("Office 2007 XLSX Test Document")
    //                                 ->setSubject("Office 2007 XLSX Test Document")
    //                                 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    //                                 ->setKeywords("office 2007 openxml php")
    //                                 ->setCategory("Test result file");

    //     $objPHPExcel->setActiveSheetIndex(0)
    //                 ->mergeCells('A1:J1')
    //                 ->getStyle('A1:A1')
    //                 ->applyFromArray(
    //                     array('font' => array('size' => 14,'bold' => true))
    //                 );
    //     $objPHPExcel->setActiveSheetIndex(0)
    //                 ->mergeCells('A2:J2')
    //                 ->getStyle('A2:A2')
    //                 ->applyFromArray(
    //                     array('font' => array('size' => 14,'bold' => true))
    //                 );
    //     $objPHPExcel->setActiveSheetIndex(0)
    //                 ->mergeCells('A3:J3')
    //                 ->getStyle('A3:A3')
    //                 ->applyFromArray(
    //                     array('font' => array('size' => 14,'bold' => true))
    //                 );
    //     $objPHPExcel->setActiveSheetIndex(0)
    //                 ->mergeCells('A4:C4')
    //                 ->getStyle('A4:A4')
    //                 ->applyFromArray(
    //                     array('font' => array('size' => 12,'bold' => false))
    //                 );
    //     $objPHPExcel->setActiveSheetIndex(0)
    //                     ->mergeCells('A5:C5')
    //                     ->getStyle('A5:A5')
    //                     ->applyFromArray(
    //                         array('font' => array('size' => 12,'bold' => false))
    //                     );
    //     $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'LAPORAN DATA BUDIDAYA IKAN HIAS');
    //     $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', 'DINAS KETAHANAN PANGAN DAN PERIKANAN');
    //     $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3', 'KABUPATEN BANDUNG');

    //     if ($a != "0") {
    //         $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4', 'KELOMPOK : ' . $a);
    //     } else {
    //         $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4', 'KELOMPOK : -');
    //     }

    //     if ($b != "0") {
    //         $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5', 'KECAMATAN : ' . $b);
    //     } else {
    //         $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5', 'KECAMATAN : -');
    //     }

    //     $objPHPExcel->setActiveSheetIndex(0)
    //         ->setCellValue('A7', 'No')
    //         ->setCellValue('B7', 'NIK')
    //         ->setCellValue('C7', 'Nama')
    //         ->setCellValue('D7', 'Kelompok')
    //         ->setCellValue('E7', 'Kecamatan')
    //         ->setCellValue('F7', 'Desa')
    //         ->setCellValue('G7', 'Luas Lahan (m2)')
    //         ->setCellValue('H7', 'Biaya Produksi')
    //         ->setCellValue('I7', 'Volume Produksi')
    //         ->setCellValue('J7', 'Nilai Produksi');

    //     $rowCount = 8;
    //     $no = 1;
    //     foreach ($data_excel as $list) {
    //         $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $no);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->nik);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->nama);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->nama_kelompok);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->Nama_Kecamatan);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->Nama_Desa);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->luas_kolam_m2);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->harga_produksi);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->volume_produksi);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $list->nilai_produksi);
    //         $rowCount++;
    //         $no++;
    //     }


    //     // Rename worksheet
    //     $objPHPExcel->getActiveSheet()->setTitle(date('Y-m-d').' - Ikan Hias');


    //     // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    //     $objPHPExcel->setActiveSheetIndex(0);


    //     // Redirect output to a client’s web browser (Excel5)
    //     header('Content-Type: application/vnd.ms-excel');
    //     header('Content-Disposition: attachment;filename="'.date('Y-m-d').' - Ikan Hias'.'.xls"');
    //     header('Cache-Control: max-age=0');
    //     // If you're serving to IE 9, then the following may be needed
    //     header('Cache-Control: max-age=1');

    //     // If you're serving to IE over SSL, then the following may be needed
    //     header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    //     header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    //     header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    //     header('Pragma: public'); // HTTP/1.0

    //     $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    //     $objWriter->save('php://output');
    //     exit;
    // }
}
