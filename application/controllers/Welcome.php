<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->language('welcome');
        $this->load->model("web/profil_model");
        $this->load->model("dashboard/home_model");
        $this->load->model("web/pegawai_model");
        $this->load->model("web/berita_model");
        $this->load->model("web/galeri_model");
        $this->load->model("web/dokumen_model");
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $data["footer"] = $this->profil_model->get_data();
        $data["sambutan"] = $this->pegawai_model->get_pegawai(1);
        $data["news"] = $this->berita_model->news(3);
        $data["jml_kec"] = $this->home_model->get_jml_kec();
        // $data["jml_desa"] = $this->home_model->get_jml_desa();
        $data["jml_rw"] = $this->home_model->get_jml_rw();
        $data["jml_rt"] = $this->home_model->get_jml_rt();
        $data["jml_dasawisma"] = $this->home_model->get_jml_dasawisma();
        $data["jml_krt"] = $this->home_model->get_jml_krt();
        $data["jml_kk"] = $this->home_model->get_jml_kk();
        $data["jml_penduduk"] = $this->home_model->get_jml_penduduk();
        $data["jml_kader"] = $this->home_model->get_jml_kader();
        $this->template
            ->set_layout('front', $data)
            ->build('frontend/index', $data);
    }

    public function sejarah()
    {
        $data["footer"] = $this->profil_model->get_data();

        $this->template
            ->set_title('Sejarah')
            ->set_layout('front', $data)
            ->build('frontend/sejarah', $data);
    }

    public function tupoksi()
    {
        $data["footer"] = $this->profil_model->get_data();

        $this->template
            ->set_title('Tugas Pokok dan Fungsi')
            ->set_layout('front', $data)
            ->build('frontend/tupoksi', $data);
    }

    public function visi()
    {
        $data["footer"] = $this->profil_model->get_data();

        $this->template
            ->set_title('Visi dan Misi')
            ->set_layout('front', $data)
            ->build('frontend/visi', $data);
    }
    public function pegawai()
    {
        $data["footer"] = $this->profil_model->get_data();
        $data["pegawai"] = $this->pegawai_model->all_pegawai();

        // var_dump($data["news"]) or die;

        $this->template
            ->set_title('Kepengurusan')
            ->set_layout('front', $data)
            ->build('frontend/pegawai', $data);
    }

    public function berita()
    {
        $data["footer"] = $this->profil_model->get_data();
        $data["news"] = $this->berita_model->all_news();

        // var_dump($data["news"]) or die;

        $this->template
            ->set_title('Berita')
            ->set_layout('front', $data)
            // ->set_js(assets_url('js/paginationjs/paging.js'))
            ->build('frontend/berita', $data);
    }

    public function detail($slug)
    {
        $data["footer"] = $this->profil_model->get_data();
        $data["detail"] = $this->berita_model->detail_news($slug);
        $data["news"] = $this->berita_model->news(3);

        // var_dump($data["news_detail"]) or die;

        $this->template
            ->set_layout('front', $data)
            // ->set_js(assets_url('js/paginationjs/paging.js'))
            ->build('frontend/detail', $data);
    }

    public function dokument()
    {
        $data["footer"] = $this->profil_model->get_data();
        $data["kategori_dokumen"] = $this->home_model->get_all_dokumen();
        $data["dokumen"] = $this->dokumen_model->get_all_dokumen();
        // var_dump($data["dokumen"]) or die;

        $this->template
            ->set_title('Dokumen')
            ->set_layout('front', $data)
            ->build('frontend/dokument', $data);
    }

    public function mars()
    {
        $data["footer"] = $this->profil_model->get_data();
        $data["kategori_dokumen"] = $this->home_model->get_all_dokumen();
        $data["dokumen"] = $this->dokumen_model->get_all_dokumen();
        // var_dump($data["dokumen"]) or die;

        $this->template
            ->set_title('Mars PKK')
            ->set_layout('front', $data)
            ->build('frontend/mars', $data);
    }

    public function program_kerja()
    {
        $data["footer"] = $this->profil_model->get_data();
        $data["kategori_dokumen"] = $this->home_model->get_all_dokumen();
        $data["dokumen"] = $this->dokumen_model->get_all_dokumen();
        // var_dump($data["dokumen"]) or die;

        $this->template
            ->set_title('Program Kerja')
            ->set_layout('front', $data)
            ->build('frontend/program_kerja', $data);
    }
    public function seragam()
    {
        $data["footer"] = $this->profil_model->get_data();
        $data["kategori_dokumen"] = $this->home_model->get_all_dokumen();
        $data["dokumen"] = $this->dokumen_model->get_all_dokumen();
        // var_dump($data["dokumen"]) or die;

        $this->template
            ->set_title('Ketentuan Seragam')
            ->set_layout('front', $data)
            ->build('frontend/seragam', $data);
    }

    public function galeri()
    {
        $data["footer"] = $this->profil_model->get_data();
        $data["kategori_galeri"] = $this->home_model->get_all_galeri();
        $data["galeri"] = $this->galeri_model->get_all_galeri();
        // var_dump($data["galeri"]) or die;

        $this->template
            ->set_title('Galeri')
            ->set_layout('front', $data)
            ->build('frontend/galeri', $data);
    }

    public function list()
    {
        $this->template
            ->set_layout('layout_data')
            ->build('maintenance');
    }
}
