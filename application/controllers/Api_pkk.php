<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_pkk extends Api_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model("dashboard/home_model");
        $this->load->model("web/profil_model");
        $this->load->model("web/berita_model");
        $this->load->model("web/dokumen_model");
        $this->load->model("web/galeri_model");
    }


    public function checkToken($tokenid){
        if($tokenid == 'pkkBedas'){
            return true;
        }else{
            $response = array(
                'code'=>500, 
                'message' =>"Access Denied",
                "data" => NULL
            );
            echo json_encode($response);
            die;
         }
        
    }

    public function info_statistik()
    {
        $this->log_request();
		$get = $this->input->get();
		$token = $get['token'];
        $this->checkToken($token);
        $jml_kec = $this->home_model->get_jml_kec();
        $jml_desa = $this->home_model->get_jml_desa();
        $jml_rw = $this->home_model->get_jml_rw();
        $jml_rt = $this->home_model->get_jml_rt();
        $jml_dasawisma = $this->home_model->get_jml_dasawisma();
        $jml_krt = $this->home_model->get_jml_krt();
        $jml_kk = $this->home_model->get_jml_kk();
        $jml_penduduk = $this->home_model->get_jml_penduduk();
        $jml_kader = $this->home_model->get_jml_kader();
        $data = array($jml_kec, $jml_desa, $jml_rw, $jml_rt,$jml_dasawisma,
                    $jml_krt,$jml_kk, $jml_penduduk,$jml_kader);
        if (isset($data)) {
            $response = array(
                'code'=>200, 
                'message' =>"API success",
                'title' =>"DATA STATISTIK PKK",
                "data" => $data
            );
        } else {
            $response = array(
                'code'=>403, 
                'message' =>"API forbidden",
                "data" => NULL
            );
         }
         echo json_encode($response);
    }

    public function profil_pkk()
    {
        $this->log_request();
		$get = $this->input->get();
		$token = $get['token'];
        $this->checkToken($token);
        $data = $this->profil_model->get_data();
        if (isset($data)) {
            $response = array(
                'code'=>200, 
                'message' =>"API success",
                'title' =>"DATA BUDIDAYA PEMBENIHAN",
                "data" => $data
            );
        } else {
            $response = array(
                'code'=>403, 
                'message' =>"API forbidden",
                "data" => NULL
            );
         }
         echo json_encode($response);
    }
    public function all_berita()
    {
        $this->log_request();
		$get = $this->input->get();
		$token = $get['token'];
        $this->checkToken($token);
        $data = $this->berita_model->all_news();
        if (isset($data)) {
            $response = array(
                'code'=>200, 
                'message' =>"API success",
                'title' =>"SEMUA BERITA PKK",
                "data" => $data
            );
        } else {
            $response = array(
                'code'=>403, 
                'message' =>"API forbidden",
                "data" => NULL
            );
         }
         echo json_encode($response);
    }

    public function detail_berita()
    {
        $this->log_request();
		$get = $this->input->get();
		$token = $get['token'];
        $this->checkToken($token);
        $data = $this->berita_model->detail_news_id($get['id']);

        if (isset($data)) {
            $response = array(
                'code'=>200, 
                'message' =>"API success",
                'title' =>"DETAIL BERITA PKK",
                "data" => $data
            );
        } else {
            $response = array(
                'code'=>403, 
                'message' =>"API forbidden",
                "data" => NULL
            );
         }
         echo json_encode($response);
    }
    public function dokumen()
    {
        $this->log_request();
		$get = $this->input->get();
		$token = $get['token'];
        $this->checkToken($token);
        $data = $this->dokumen_model->get_all_dokumen();

        if (isset($data)) {
            $response = array(
                'code'=>200, 
                'message' =>"API success",
                'title' =>"DETAIL BERITA PKK",
                "data" => $data
            );
        } else {
            $response = array(
                'code'=>403, 
                'message' =>"API forbidden",
                "data" => NULL
            );
         }
         echo json_encode($response);
    }

    public function galeri()
    {
        $this->log_request();
		$get = $this->input->get();
		$token = $get['token'];
        $this->checkToken($token);
        $data = $this->galeri_model->get_all_galeri();

        if (isset($data)) {
            $response = array(
                'code'=>200, 
                'message' =>"API success",
                'title' =>"DETAIL BERITA PKK",
                "data" => $data
            );
        } else {
            $response = array(
                'code'=>403, 
                'message' =>"API forbidden",
                "data" => NULL
            );
         }
         echo json_encode($response);
    }
    // public function mina_padi()
    // {
    //     $this->log_request();
	// 	$get = $this->input->get();
	// 	$token = $get['token'];
    //     $this->checkToken($token);
    //     $data = $this->mina_padi_model->mina_padi_all();
    //     if (isset($data)) {
    //         $response = array(
    //             'code'=>200, 
    //             'message' =>"API success",
    //             'title' =>"DATA BUDIDAYA MINA PADI",
    //             "data" => $data
    //         );
    //     } else {
    //         $response = array(
    //             'code'=>403, 
    //             'message' =>"API forbidden",
    //             "data" => NULL
    //         );
    //      }
    //      echo json_encode($response);
        
    // }
    // public function ikan_hias()
    // {
    //     $this->log_request();
	// 	$get = $this->input->get();
	// 	$token = $get['token'];
    //     $this->checkToken($token);
    //     $data = $this->ikan_hias_model->ikan_hias_all();
    //     if (isset($data)) {
    //         $response = array(
    //             'code'=>200, 
    //             'message' =>"API success",
    //             'title' =>"DATA BUDIDAYA IKAN HIAS",
    //             "data" => $data
    //         );
    //     } else {
    //         $response = array(
    //             'code'=>403, 
    //             'message' =>"API forbidden",
    //             "data" => NULL
    //         );
    //      }
    //      echo json_encode($response);
        
    // }
    // public function pengolahan()
    // {
    //     $this->log_request();
	// 	$get = $this->input->get();
	// 	$token = $get['token'];
    //     $this->checkToken($token);
    //     $data = $this->pengolahan_model->pengolahan_all();
    //     if (isset($data)) {
    //         $response = array(
    //             'code'=>200, 
    //             'message' =>"API success",
    //             'title' =>"DATA PENGOLAHAN HASIL PERIKANAN",
    //             "data" => $data
    //         );
    //     } else {
    //         $response = array(
    //             'code'=>403, 
    //             'message' =>"API forbidden",
    //             "data" => NULL
    //         );
    //      }
    //      echo json_encode($response);
        
    // }
    // public function nelayan_tangkap()
    // {
    //     $this->log_request();
	// 	$get = $this->input->get();
	// 	$token = $get['token'];
    //     $this->checkToken($token);
    //     $data = $this->nelayan_tangkap_model->nelayan_tangkap_all();
    //     if (isset($data)) {
    //         $response = array(
    //             'code'=>200, 
    //             'message' =>"API success",
    //             'title' =>"DATA PERIKANAN TANGKAP",
    //             "data" => $data
    //         );
    //     } else {
    //         $response = array(
    //             'code'=>403, 
    //             'message' =>"API forbidden",
    //             "data" => NULL
    //         );
    //      }
    //      echo json_encode($response);
        
    // }

    
}