<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Statistik extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->language('welcome');
        $this->load->model("desa/profil_model");
        $this->load->model("desa/lembaga_model");
        $this->load->model("produk_desa/unggulan_model");
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
    
    public function idm()
    {
        $data["footer"] = $this->profil_model->get_profil_dinas();
        $data["idm"] = $this->profil_model->get_idm_desa(date("Y"));
        // var_dump($data["idm"]) or die;

        $this->template
            ->set_layout('front', $data)
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(assets_url('js/app/frontend/idm.js'))
            ->build('frontend/idm', $data);
    }

    public function lkd()
    {
        $data["footer"] = $this->profil_model->get_profil_dinas();
        $data["lkd"] = $this->lembaga_model->get_data(date("Y"));
        // var_dump($data["lkd"]) or die;

        $this->template
            ->set_layout('front', $data)
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(assets_url('js/app/frontend/idm.js'))
            ->build('frontend/lkd', $data);
    }
    public function product()
    {
        $data["footer"] = $this->profil_model->get_profil_dinas();
        $data["produk"] = $this->unggulan_model->get_data();
        // var_dump($data["produk"]) or die;

        $this->template
            ->set_layout('front', $data)
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            ->set_css(assets_url('js/simplePagination/simplePagination.css'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            ->set_js(assets_url('js/simplePagination/jquery.simplePagination.js'))
            ->set_js(assets_url('js/app/frontend/product.js'))
            ->build('frontend/product', $data);
    }
    public function product_detail($id)
    {
        $data["footer"] = $this->profil_model->get_profil_dinas();
        $data["produk_detail"] = $this->unggulan_model->get_by_id($id);
        // var_dump($data["produk"]) or die;

        $this->template
            ->set_layout('front', $data)
            ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
            ->set_css(assets_url('admin_assets/assets/css/style.bundle.css'))
            ->set_css(assets_url('js/simplePagination/simplePagination.css'))
            ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
            // ->set_js(assets_url('js/simplePagination/jquery.simplePagination.js'))
            // ->set_js(assets_url('js/app/frontend/product.js'))
            ->build('frontend/product_detail', $data);
    }
}
