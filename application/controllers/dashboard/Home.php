<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Home controller - Dashboard with comprehensive data.
 *
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class Home extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->language('auth');
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'));
    }

    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Dashboard',
            'ui_controller' => 'home',
        ));
        $this->load->model('desa/profil_model');
        $this->load->model('dashboard/home_model');

        $this->load->driver('cache', array('adapter' => 'file', 'backup' => 'dummy'));

        $level_id = (int) $this->session->userdata('level_id');

        // === Core Statistics ===
        if (! $jumlah_penduduk = $this->cache->get('dasboard_jumlah_penduduk')) {
            $jumlah_penduduk = $this->profil_model->get_all_penduduk();
            $this->cache->save('dasboard_jumlah_penduduk', $jumlah_penduduk, 3600);
        }
        $data['jumlah_penduduk'] = $jumlah_penduduk;

        if (! $jumlah_by_desa = $this->cache->get('dasboard_jumlah_by_desa')) {
            $jumlah_by_desa = $this->profil_model->get_by_desa();
            $this->cache->save('dasboard_jumlah_by_desa', $jumlah_by_desa, 3600);
        }
        $data['jumlah_by_desa'] = $jumlah_by_desa;

        if (! $jumlah_by_kecamatan = $this->cache->get('dasboard_jumlah_by_kecamatan')) {
            $jumlah_by_kecamatan = $this->profil_model->get_by_kecamatan();
            $this->cache->save('dasboard_jumlah_by_kecamatan', $jumlah_by_kecamatan, 3600);
        }
        $data['jumlah_by_kecamatan'] = $jumlah_by_kecamatan;

        // === PKK Overview Stats ===
        $data['stat'] = (object) array(
            'jml_kec'       => $this->home_model->get_jml_kec(),
            'jml_desa'      => $this->home_model->get_jml_desa(),
            'jml_rw'        => $this->home_model->get_jml_rw(),
            'jml_rt'        => $this->home_model->get_jml_rt(),
            'jml_dasawisma' => $this->home_model->get_jml_dasawisma(),
            'jml_krt'       => $this->home_model->get_jml_krt(),
            'jml_kk'        => $this->home_model->get_jml_kk(),
            'jml_kader'     => $this->home_model->get_jml_kader(),
        );

        // === Module Data Counts ===
        $this->load->model('desa/anggota_model');
        $this->load->model('desa/aparatur_model');
        $this->load->model('pokja/pokja1_model');
        $this->load->model('pokja/pokja2_model');
        $this->load->model('pokja/pokja3_model');
        $this->load->model('pokja/pokja4_model');
        $this->load->model('dasawisma/keluarga_model');

        $data['module_counts'] = (object) array(
            'anggota'    => $this->anggota_model->count_all(),
            'aparatur'   => $this->aparatur_model->count_all(),
            'pokja1'     => $this->pokja1_model->count_all(),
            'pokja2'     => $this->pokja2_model->count_all(),
            'pokja3'     => $this->pokja3_model->count_all(),
            'pokja4'     => $this->pokja4_model->count_all(),
            'keluarga'   => $this->keluarga_model->count_all(),
        );

        $data['level_id'] = $level_id;

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js('https://cdn.jsdelivr.net/npm/chart.js')
            ->set_js(assets_url('js/app/dashboard/home/graph.js'))
            ->set_js(assets_url('js/app/dashboard/home/index.js'))
            ->build('dashboard/index', $data);
    }
}
