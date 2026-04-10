<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_profil extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('web/profil_model');
    }
    // public function index()
    // {
    //     $data = $this->profil_model->datatables();
    //     echo $data;
    // }
    // public function add()
    // {
    //     if ($this->input->method('post')) {
    //         $id_profil_desa = $this->profil_model->add(array(
    //             'kode_kecamatan' => $this->input->post('kd_kec'),
    //             'kode_desa' => $this->input->post('kd_desa'),
    //             'kepala_desa' => $this->input->post('kepala_desa'),
    //             'sekertariat_desa' => $this->input->post('sekertariat_desa'),
    //             'kaur_tu' => $this->input->post('kaur_tu'),
    //             'kaur_perencanaan' => $this->input->post('kaur_perencanaan'),
    //             'kaur_keuangan' => $this->input->post('kaur_keuangan'),
    //             'seksi_pemerintahan' => $this->input->post('seksi_pemerintahan'),
    //             'seksi_kerjasama' => $this->input->post('seksi_kerjasama'),
    //             'seksi_pelayanan' => $this->input->post('seksi_pelayanan'),
    //             'staf_1' => $this->input->post('staf_1'),
    //             'staf_2' => $this->input->post('staf_2'),
    //             'staf_3' => $this->input->post('staf_3'),
    //             'created_id' => $this->session->userdata('id'),
    //             'date_year' => date("Y")
    //         ));
    //     } else {
    //         throw new Exception('Method not Allowed');
    //     }
    //     echo json_encode($id_profil_desa);
    // }
    // public function delete($id)
    // {
    //     echo json_encode($this->profil_model->delete($id));

    //     redirect(site_url('desa/profil'));
    // }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            $id_profil_desa = $this->profil_model->edit($id, array(
                'nama_dinas' => $this->input->post('nama_dinas'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'socialmedia' => json_encode(
                    array(
                        'facebook' => $this->input->post('facebook'),
                        'twitter' => $this->input->post('twitter'),
                        'whatsapp' => $this->input->post('whatsapp'),
                        'instagram' => $this->input->post('instagram')
                    )
                ),
                'sejarah' => $this->input->post('sejarah'),
                'sambutan' => $this->input->post('sambutan'),
                'tupoksi' => $this->input->post('tupoksi'),
                'program_kerja' => $this->input->post('program_kerja'),
                'mars_pkk' => $this->input->post('mars_pkk'),
                'file_logo' => $this->input->post('file_logo'),
                // 'kepala_dinas' => $this->input->post('kepala_dinas'),
                // 'sekretaris_dinas' => $this->input->post('sekretaris_dinas'),
                // 'bidang_peum' => $this->input->post('bidang_peum'),
                // 'bidang_kpm' => $this->input->post('bidang_kpm'),
                // 'bidang_pemerintahan' => $this->input->post('bidang_pemerintahan'),
                // 'bidang_pkald' => $this->input->post('bidang_pkald'),
                'visi' => $this->input->post('visi'),
                'misi' => $this->input->post('misi'),
                'updated_id' => $this->session->userdata('id'),
                'updated_date' => date('Y-m-d h:i:s')

            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_profil_desa);
    }

    public function upload_struktur($id)
    {
        if ($this->input->method('post')) {
            // $id_profil_desa = $this->input->post('file_struktur_organisasi');
            $id_profil_desa = $this->profil_model->edit($id, array(

                'file_struktur_organisasi' => $this->input->post('file_struktur_organisasi'),
                'updated_id' => $this->session->userdata('id'),
                'updated_date' => date('Y-m-d h:i:s')

            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_profil_desa);
    }
}
