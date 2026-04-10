<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah extends MY_Controller
{
    public function desa()
    {
        header('Content-type: application/json');
        $parent_id = $_GET['desaId'];

        $this->db->select('Kd_Desa, Nama_Desa as text');
        $this->db->from('master_desa');
        if($this->session->userdata['level_id'] == 4 || $this->session->userdata['level_id'] == 5 || $this->session->userdata['level_id'] == 6|| $this->session->userdata['level_id'] == 7){
            $this->db->where('Kd_Kec', $this->session->userdata('kec_id'));
            $this->db->where('Kd_Desa', $this->session->userdata('desa_id'));
        }elseif($this->session->userdata['level_id'] == 3){
            $this->db->where('Kd_Kec', $this->session->userdata('kec_id'));
        }else{
            $this->db->where('Kd_Kec', $parent_id);
        }
        if ($this->input->get('q')) {
            $this->db->where("Nama_Desa LIKE '%" . $this->input->get('q') . "%'");
        }
        $this->db->where('visible', 1);
        $data = $this->db->order_by('Nama_Desa', 'asc');
        echo json_encode($data->get()->result());
    }

    public function dusun()
    {
        header('Content-type: application/json');
        $desa = $_GET['desa'];
        $this->db->select('id as dusun, dusun as text');
        $this->db->from('master_dusun');
        if($this->session->userdata['level_id'] == 1 || $this->session->userdata['level_id'] == 2 || $this->session->userdata['level_id'] == 3 || $this->session->userdata['level_id'] == 4){
            $this->db->where('Kd_Desa', $desa);
        }else if($this->session->userdata['level_id'] == 5 || $this->session->userdata['level_id'] == 6|| $this->session->userdata['level_id'] == 7){
            $this->db->where('Kd_Kec', $this->session->userdata('kec_id'));
            $this->db->where('Kd_Desa', $this->session->userdata('desa_id'));
            $this->db->where('id', $this->session->userdata('dusun_id'));
        }
        if ($this->input->get('q')) {
            $this->db->where("dusun LIKE '%" . $this->input->get('q') . "%'");
        }
        $data = $this->db->order_by('dusun', 'desc');
        echo json_encode($data->get()->result());
    }
    public function rw()
    {
        header('Content-type: application/json');
        $desa = $_GET['desa'];
        $dusun = $_GET['dusun'];
        
        $this->db->select('rw, rw as text');
        $this->db->from('master_rw');
        if($this->session->userdata['level_id'] == 1 || $this->session->userdata['level_id'] == 2 || $this->session->userdata['level_id'] == 3 || $this->session->userdata['level_id'] == 4 || $this->session->userdata['level_id'] == 5){
            $this->db->where('Kd_Desa', $desa);
            $this->db->where('Kd_Dusun', $dusun);
        }elseif($this->session->userdata['level_id'] == 6 || $this->session->userdata['level_id'] == 7){
            $this->db->where('Kd_Kec', $this->session->userdata('kec_id'));
            $this->db->where('Kd_Desa', $desa);
            $this->db->where('Kd_Dusun', $dusun);
            $this->db->where('rw', $this->session->userdata('rw'));
        }
        if ($this->input->get('q')) {
            $this->db->where("rw LIKE '%" . $this->input->get('q') . "%'");
        }
        $data = $this->db->order_by('rw', 'asc');
        echo json_encode($data->get()->result());
    }

    public function rt()
    {
        header('Content-type: application/json');
        $desa = $_GET['desa'];
        $dusun = $_GET['dusun'];
        $rw = $_GET['rw'];
        $this->db->select('rt, rt as text');
        $this->db->from('master_rt');
        if($this->session->userdata['level_id'] == 1 || $this->session->userdata['level_id'] == 2 || $this->session->userdata['level_id'] == 3 || $this->session->userdata['level_id'] == 4 || $this->session->userdata['level_id'] == 5 || $this->session->userdata['level_id'] == 6){
            // $this->db->where('Kd_Kec', $this->session->userdata('kec_id'));
            $this->db->where('Kd_Desa', $desa);
            $this->db->where('Kd_Dusun', $dusun);
            $this->db->where('rw', $rw);
        }elseif( $this->session->userdata['level_id'] == 7){
            $this->db->where('Kd_Desa', $desa);
            $this->db->where('Kd_Dusun', $dusun);
            $this->db->where('rw', $rw);
            $this->db->where('rt', $this->session->userdata('rt'));
        }
        if ($this->input->get('q')) {
            $this->db->where("rt LIKE '%" . $this->input->get('q') . "%'");
        }
        $data = $this->db->order_by('rt', 'asc');
        echo json_encode($data->get()->result());
    }
    
    public function dasawisma()
    {
        header('Content-type: application/json');
        $desa = $_GET['desa'];
        $dusun = $_GET['dusun'];
        $rw = $_GET['rw'];
        $rt = $_GET['rt'];
        $this->db->select('id, dasawisma as text');
        $this->db->from('master_dasawisma');
        if($this->session->userdata['level_id'] == 1 || $this->session->userdata['level_id'] == 2 || $this->session->userdata['level_id'] == 3 || $this->session->userdata['level_id'] == 4 || $this->session->userdata['level_id'] == 5 || $this->session->userdata['level_id'] == 6){
            $this->db->where('Kd_Kec', $this->session->userdata('kec_id'));
            $this->db->where('Kd_Desa', $desa);
            $this->db->where('Kd_Dusun', $dusun);
            $this->db->where('rw', $rw);
        }elseif( $this->session->userdata['level_id'] == 7){
            $this->db->where('Kd_Desa', $desa);
            $this->db->where('Kd_Dusun', $dusun);
            $this->db->where('rw', $rw);
            $this->db->where('rt', $rt);
        }
        if ($this->input->get('q')) {
            $this->db->where("dasawisma LIKE '%" . $this->input->get('q') . "%'");
        }
        $data = $this->db->order_by('dasawisma', 'asc');
        echo json_encode($data->get()->result());
    }

}
