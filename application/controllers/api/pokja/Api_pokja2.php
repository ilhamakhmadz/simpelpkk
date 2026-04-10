<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_pokja2 extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pokja/pokja2_model');
    }
    public function kecamatan()
    {
        $data = $this->pokja2_model->datatables_kecamatan(1);
        echo $data;
    }
    public function desa()
    {
        $data = $this->pokja2_model->datatables_kecamatan(2);
        echo $data;
    }
    public function dusun()
    {
        $data = $this->pokja2_model->datatables_kecamatan(3);
        echo $data;
    }
    public function rw()
    {
        $data = $this->pokja2_model->datatables_kecamatan(4);
        echo $data;
    }
    public function rt()
    {
        $data = $this->pokja2_model->datatables_kecamatan(5);
        echo $data;
    }
    public function add()
    {
        if ($this->input->method('post')) {
            $id_pokja2 = $this->pokja2_model->add(array(
                'level' => $this->input->post('level'),
                'kode_kecamatan' => $this->input->post('kode_kecamatan'),
                'kode_desa' => $this->input->post('kode_desa'),
                'dusun' => $this->input->post('kd_dusun'),
                'rw' => $this->input->post('kd_rw'),
                'rt' => $this->input->post('kd_rt'),
                'butahuruf' => $this->input->post('butahuruf'),
                'paketAklpbelajar' => $this->input->post('paketAklpbelajar'),
                'paketAwargabelajar' => $this->input->post('paketAwargabelajar'),
                'paketBklpbelajar' => $this->input->post('paketBklpbelajar'),
                'paketBwargabelajar' => $this->input->post('paketBwargabelajar'),
                'paketCklpbelajar' => $this->input->post('paketCklpbelajar'),
                'paketCwargabelajar' => $this->input->post('paketCwargabelajar'),
                'kfklpbelajar' => $this->input->post('kfklpbelajar'),
                'kfwargabelajar' => $this->input->post('kfwargabelajar'),
                'paudsejenis' => $this->input->post('paudsejenis'),
                'jmltamanbacaan' => $this->input->post('jmltamanbacaan'),
                'bkbklp' => $this->input->post('bkbklp'),
                'bkbibupeserta' => $this->input->post('bkbibupeserta'),
                'bkbape' => $this->input->post('bkbape'),
                'bkbsimulasi' => $this->input->post('bkbsimulasi'),
                'kaderkhusus_tutorkf' => $this->input->post('kaderkhusus_tutorkf'),
                'kaderkhusus_tutorpaud' => $this->input->post('kaderkhusus_tutorpaud'),
                'kaderkhusus_bkb' => $this->input->post('kaderkhusus_bkb'),
                'kaderkhusus_koperasi' => $this->input->post('kaderkhusus_koperasi'),
                'kaderkhusus_keterampilan' => $this->input->post('kaderkhusus_keterampilan'),
                'kaderdilatih_lp3pkk' => $this->input->post('kaderdilatih_lp3pkk'),
                'kaderdilatih_tpk3pkk' => $this->input->post('kaderdilatih_tpk3pkk'),
                'kaderdilatih_damaspkk' => $this->input->post('kaderdilatih_damaspkk'),
                'koperasi_pemula_klp' => $this->input->post('koperasi_pemula_klp'),
                'koperasi_pemula_peserta' => $this->input->post('koperasi_pemula_peserta'),
                'koperasi_madya_klp' => $this->input->post('koperasi_madya_klp'),
                'koperasi_madya_peserta' => $this->input->post('koperasi_madya_peserta'),
                'koperasi_utama_klp' => $this->input->post('koperasi_utama_klp'),
                'koperasi_utama_peserta' => $this->input->post('koperasi_utama_peserta'),
                'koperasi_mandiri_klp' => $this->input->post('koperasi_mandiri_klp'),
                'koperasi_mandiri_peserta' => $this->input->post('koperasi_mandiri_peserta'),
                'koperasi_badanhukum_klp' => $this->input->post('koperasi_badanhukum_klp'),
                'koperasi_badanhukum_angg' => $this->input->post('koperasi_badanhukum_angg'),
                'keterangan' => $this->input->post('keterangan'),
                'created_id' => $this->session->userdata('id'),
                'date_year' => date("Y")
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_pokja2);
    }
    public function delete($id)
    {
        $data = $this->pokja2_model->delete($id);
        redirect(site_url('pokja/pokja2'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            $id_aparatur_desa = $this->pokja2_model->edit($id, array(
                'butahuruf' => $this->input->post('butahuruf'),
                'paketAklpbelajar' => $this->input->post('paketAklpbelajar'),
                'paketAwargabelajar' => $this->input->post('paketAwargabelajar'),
                'paketBklpbelajar' => $this->input->post('paketBklpbelajar'),
                'paketBwargabelajar' => $this->input->post('paketBwargabelajar'),
                'paketCklpbelajar' => $this->input->post('paketCklpbelajar'),
                'paketCwargabelajar' => $this->input->post('paketCwargabelajar'),
                'kfklpbelajar' => $this->input->post('kfklpbelajar'),
                'kfwargabelajar' => $this->input->post('kfwargabelajar'),
                'paudsejenis' => $this->input->post('paudsejenis'),
                'jmltamanbacaan' => $this->input->post('jmltamanbacaan'),
                'bkbklp' => $this->input->post('bkbklp'),
                'bkbibupeserta' => $this->input->post('bkbibupeserta'),
                'bkbape' => $this->input->post('bkbape'),
                'bkbsimulasi' => $this->input->post('bkbsimulasi'),
                'kaderkhusus_tutorkf' => $this->input->post('kaderkhusus_tutorkf'),
                'kaderkhusus_tutorpaud' => $this->input->post('kaderkhusus_tutorpaud'),
                'kaderkhusus_bkb' => $this->input->post('kaderkhusus_bkb'),
                'kaderkhusus_koperasi' => $this->input->post('kaderkhusus_koperasi'),
                'kaderkhusus_keterampilan' => $this->input->post('kaderkhusus_keterampilan'),
                'kaderdilatih_lp3pkk' => $this->input->post('kaderdilatih_lp3pkk'),
                'kaderdilatih_tpk3pkk' => $this->input->post('kaderdilatih_tpk3pkk'),
                'kaderdilatih_damaspkk' => $this->input->post('kaderdilatih_damaspkk'),
                'koperasi_pemula_klp' => $this->input->post('koperasi_pemula_klp'),
                'koperasi_pemula_peserta' => $this->input->post('koperasi_pemula_peserta'),
                'koperasi_madya_klp' => $this->input->post('koperasi_madya_klp'),
                'koperasi_madya_peserta' => $this->input->post('koperasi_madya_peserta'),
                'koperasi_utama_klp' => $this->input->post('koperasi_utama_klp'),
                'koperasi_utama_peserta' => $this->input->post('koperasi_utama_peserta'),
                'koperasi_mandiri_klp' => $this->input->post('koperasi_mandiri_klp'),
                'koperasi_mandiri_peserta' => $this->input->post('koperasi_mandiri_peserta'),
                'koperasi_badanhukum_klp' => $this->input->post('koperasi_badanhukum_klp'),
                'koperasi_badanhukum_angg' => $this->input->post('koperasi_badanhukum_angg'),
                'keterangan' => $this->input->post('keterangan'),
                'updated_id' => $this->session->userdata('id'),
                'updated_date' => date('Y-m-d h:i:s')
            ));
        } else {
            throw new Exception('Method not Allowed');
        }
        echo json_encode($id_aparatur_desa);
    }

    public function check_kecamatan($year, $kec)
    {
        echo json_encode($this->pokja2_model->check_kecamatan($year, $kec));
    }
    public function get_kecamatan($year, $kec)
    {
        echo json_encode($this->pokja2_model->get_kecamatan($year, $kec));
    }
    public function check_desa($year, $kec, $desa)
    {
        echo json_encode($this->pokja2_model->check_desa($year, $kec, $desa));
    }
    public function get_desa($year, $kec, $desa)
    {
        echo json_encode($this->pokja2_model->get_desa($year, $kec, $desa));
    }
    public function check_dusun($year, $kec,$desa,$dusun)
    {
        echo json_encode($this->pokja2_model->check_dusun($year,$kec,$desa,$dusun));
    }
    public function get_dusun($year, $kec,$desa,$dusun)
    {
        echo json_encode($this->pokja2_model->get_dusun($year,$kec,$desa,$dusun));
    }
    public function check_rw($year, $kec,$desa,$dusun,$rw)
    {
        echo json_encode($this->pokja2_model->check_rw($year,$kec,$desa,$dusun,$rw));
    }
    public function get_rw($year,$kec,$desa,$dusun,$rw)
    {
        echo json_encode($this->pokja2_model->get_rw($year,$kec,$desa,$dusun,$rw));
    }
    public function check_rt($year, $kec,$desa,$dusun,$rw,$rt)
    {
        echo json_encode($this->pokja2_model->check_rt($year,$kec,$desa,$dusun,$rw,$rt));
    }
    public function get_rt($year, $kec,$desa,$dusun,$rw,$rt)
    {
        echo json_encode($this->pokja2_model->get_rt($year,$kec,$desa,$dusun,$rw,$rt));
    }
}
