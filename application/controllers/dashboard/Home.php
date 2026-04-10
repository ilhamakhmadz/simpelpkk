<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Home controller.
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
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'));
    }
    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Dashboard',
            'ui_controller' => 'home',
        ));
        $this->load->model('desa/profil_model');
        $this->load->model('auth/user_model');

        $this->load->driver('cache', array('adapter' => 'file', 'backup' => 'default'));

        $data['last_login'] = $this->user_model->last_login_users();
        $data['last_login_kec'] = $this->user_model->last_login_users_kec();
        
        if (! $jumlah_penduduk = $this->cache->get('dasboard_jumlah_penduduk')) {
            $jumlah_penduduk = $this->profil_model->get_all_penduduk();
            $this->cache->save('dasboard_jumlah_penduduk', $jumlah_penduduk, 3600); // 1 hour expire
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

        $this->template
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(assets_url('js/app/dashboard/home/graph.js'))
            ->set_js(assets_url('js/app/dashboard/home/index.js'))
            ->build('dashboard/index', $data);
    }
    
}
