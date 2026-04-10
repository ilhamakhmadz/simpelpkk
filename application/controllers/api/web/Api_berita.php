<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_berita extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('web/berita_model');
    }
    public function index()
    {
        $data = $this->berita_model->datatables();
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $data = $this->berita_model->add(array(
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi_berita'),
                'gambar' => $this->input->post('gambar'),
                'enabled' => 1,
                'headline' => 0,
                'slug' => strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $this->input->post('judul')))))), '-')),
                'hit' => 0,
                'created_id' => $this->session->userdata('id')
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->berita_model->delete($id));
        redirect(site_url('web/berita'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            if (!empty($this->input->post('gambar'))) {
                // 'old_img' => ,
                $filename =  realpath(base64_decode($this->input->post('gambar_remove')));
                unlink($filename);
                $data = $this->berita_model->edit($id, array(
                    'judul' => $this->input->post('judul'),
                    'isi' => $this->input->post('isi_berita'),
                    'gambar' => $this->input->post('gambar'),
                    'slug' => strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $this->input->post('judul')))))), '-')),
                    'updated_id' => $this->session->userdata('id'),
                    'updated_date' => date('Y-m-d h:i:s')
                ));
            } else {
                $data = $this->berita_model->edit($id, array(
                    'judul' => $this->input->post('judul'),
                    'isi' => $this->input->post('isi_berita'),
                    'slug' => strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $this->input->post('judul')))))), '-')),
                    'updated_id' => $this->session->userdata('id'),
                    'updated_date' => date('Y-m-d h:i:s')
                ));
            }
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($data);
    }
    public function enabled($id)
    {
        echo json_encode($this->berita_model->enabled($id));
        redirect(site_url('web/berita'));
    }
    public function disabled($id)
    {
        echo json_encode($this->berita_model->disabled($id));
        redirect(site_url('web/berita'));
    }

    public function headline($id)
    {
        echo json_encode($this->berita_model->headline($id));
        redirect(site_url('web/berita'));
    }
    public function unheadline($id)
    {
        echo json_encode($this->berita_model->unheadline($id));
        redirect(site_url('web/berita'));
    }
}
