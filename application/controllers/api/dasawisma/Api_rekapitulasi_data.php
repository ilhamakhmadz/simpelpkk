<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_rekapitulasi_data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dasawisma/Rakapitulasi_data_model');
    }

    public function level()
    {
        header('Content-type: application/json');
        $parent_id = $_GET['levelId'];

        $this->db->select('id_data_keluarga, nama_kepala_keluarga as text');
        $this->db->from('data_keluarga');
        $this->db->where('level', $parent_id);
        if ($this->input->get('q')) {
            $this->db->where("nama_kepala_keluarga LIKE '%" . $this->input->get('q') . "%'");
        }
        $data = $this->db->order_by('nama_kepala_keluarga', 'asc');
        echo json_encode($data->get()->result());
    }
    public function get_nama($id)
    {
        $data = $this->Rakapitulasi_data_model->get_nama($id);
        echo json_encode($data);
    }
    public function index()
    {
        $data = $this->Rakapitulasi_data_model->datatables();
        echo $data;
    }
    public function desa()
    {
        $data = $this->Rakapitulasi_data_model->desa_datatables();
        echo $data;
    }
    public function dusun()
    {
        $data = $this->Rakapitulasi_data_model->dusun_datatables();
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $id_profil_desa = $this->Rakapitulasi_data_model->add(array(
                'level' => $this->input->post('level'),
                'provinsi' => '32',
                'kabupaten' => '3204',
                'kecamatan' => $this->input->post('kd_kec'),
                'desa' => $this->input->post('kd_desa'),
                'dusun' => $this->input->post('dusun'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'nama_kepala_keluarga' => $this->input->post('nama_kepala_keluarga'),
                'id_data_keluarga' => $this->input->post('id_data_keluarga'),
                'dasawisma' => $this->input->post('dasawisma'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'nama_suami' => $this->input->post('nama_suami'),
                'nama_bayi' => $this->input->post('nama_bayi'),
                'status' => $this->input->post('status'),
                'laki_laki' => $this->input->post('laki_laki'),
                'perempuan' => $this->input->post('perempuan'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'ada_akte_kelahiran' => $this->input->post('ada_akte_kelahiran'),
                'tidak_ada_akte_kelahiran' => $this->input->post('tidak_ada_akte_kelahiran'),
                'nama_meninggal' => $this->input->post('nama_meninggal'),
                'laki_laki_meninggal' => $this->input->post('laki_laki_meninggal'),
                'perempuan_meninggal' => $this->input->post('perempuan_meninggal'),
                'tanggal_meninggal' => $this->input->post('tanggal_meninggal'),
                'sebab_meninggal' => $this->input->post('sebab'),
                'ket' => $this->input->post('ket'),
                'created_id' => $this->session->userdata('id'),
                'date_year' => date("Y")
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_profil_desa);
    }

    public function delete($id)
    {
        $this->Rakapitulasi_data_model->delete($id);
        echo json_encode($this->Rakapitulasi_data_model->delete($id));

        redirect(site_url('dasawisma/rekapitulasi_data'));
    }

    public function deleteAnggota($id)
    {
        $data = $this->Rakapitulasi_data_model->get_by_anggota($id);
        $this->Rakapitulasi_data_model->delete_anggota($id);
        echo json_encode($data);

        redirect(site_url('dasawisma/keluarga/edit/'.$data->id_data_keluarga));
    }

    public function edit($id)
    {
            $data = $this->Rakapitulasi_data_model->edit($id, array(
                'nama_kepala_keluarga' => $this->input->post('nama_kepala_keluarga'),
                'id_data_keluarga' => $this->input->post('id_data_keluarga'),
                'dasawisma' => $this->input->post('dasawisma'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'nama_suami' => $this->input->post('nama_suami'),
                'nama_bayi' => $this->input->post('nama_bayi'),
                'status' => $this->input->post('status'),
                'laki_laki' => $this->input->post('laki_laki'),
                'perempuan' => $this->input->post('perempuan'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'ada_akte_kelahiran' => $this->input->post('ada_akte_kelahiran'),
                'tidak_ada_akte_kelahiran' => $this->input->post('tidak_ada_akte_kelahiran'),
                'nama_meninggal' => $this->input->post('nama_meninggal'),
                'laki_laki_meninggal' => $this->input->post('laki_laki_meninggal'),
                'perempuan_meninggal' => $this->input->post('perempuan_meninggal'),
                'tanggal_meninggal' => $this->input->post('tanggal_meninggal'),
                'sebab_meninggal' => $this->input->post('sebab'),
                'ket' => $this->input->post('ket'),
                'updated_id' => $this->session->userdata('id'),
                'updated_date' => date('Y-m-d h:i:s'),
            ));

            
        echo json_encode($data);
    }

    public function check_kecamatan($year, $kec)
    {
        echo json_encode($this->Rakapitulasi_data_model->check_kecamatan($year, $kec));
    }

    public function check_desa($year, $desa)
    {
        echo json_encode($this->Rakapitulasi_data_model->check_desa($year, $desa));
    }
}
