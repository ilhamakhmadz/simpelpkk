<?php

class Profil extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('web/profil_model');
        if ($this->input->post('cancel-button')) {
            redirect('auth/user/index');
        }

        $this->load->language('auth');
        $this->template
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'));
    }

    public function index()
    {
        $this->edit();
    }

    public function edit()
    {
        $this->load->vars(array(
            'page_title' => 'Ubah profil Dinas',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('web/profil') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('web/profil') . '" class="text-muted text-hover-primary">profil Dinas</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Ubah profil Dinas</li>',
        ));
        $data['profil'] = $this->profil_model->get_data();
        $data['kecamatan'] = $this->user_model->get_kecamatan_user();
        $data['sosmed'] = json_decode($data['profil']->socialmedia);

        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_css(bower_url('summernote/dist/summernote.min'))
            ->set_js(bower_url('summernote/dist/summernote.min', true))
            ->set_js(assets_url('js/app/web/profil/edit.js'))
            ->build('web/profil/edit', $data);
    }
}
