<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * User management controller.
 *
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class User extends Admin_Controller
{
    /**
     * User form definition.
     *
     * @var array
     */
    protected $user_form = array(
        'first_name' => array(
            'label' => 'lang:first_name',
            'rules' => 'trim|max_length[50]',
            'helper' => 'form_inputlabel',
            'class' => 'mt-10 mb-5'
        ),
        'last_name' => array(
            'label'	=> 'lang:last_name',
            'rules' => 'trim|max_length[50]',
            'helper' => 'form_inputlabel'
        ),
        'id' => array(
            'helper' => 'form_hidden'
        ),
        'username' => array(
            'label' => 'lang:username',
            'rules' => 'trim|required|max_length[255]|callback_unique_username',
            'helper' => 'form_inputlabel'
        ),
        'email' => array(
            'label' => 'lang:email',
            'rules' => 'trim|required|max_length[255]|valid_email|callback_unique_email',
            'helper' => 'form_emaillabel'
        ),
        'password' => array(
            'label' => 'lang:password',
            'rules' => 'trim|required|matches[confirm-password]',
            'helper' => 'form_passwordlabel',
            'value' => ''
        ),
        'confirm-password' => array(
            'label' => 'lang:Konfirmasi_Password',
            'rules' => 'trim|required',
            'helper' => 'form_passwordlabel',
            'value' => ''
        ),
        'level_id' => array(
            'label' => 'lang:Tingkat User',
            'rules' => 'trim',
            'helper' => 'form_dropdownlabel'
        ),
        'kab_id' => array(
            'label' => 'lang:Kabupaten',
            'rules' => 'trim|hidden',
            'helper' => 'form_dropdownlabel'
        ),
        'kec_id' => array(
            'label' => 'lang:Kecamatan',
            'rules' => 'trim',
            'helper' => 'form_dropdownlabel'
        ),
        'desa_id' => array(
            'label' => 'lang:Desa',
            'rules' => 'trim',
            'helper' => 'form_dropdownlabel'
        ),
        'dusun' => array(
            'label' => 'lang:Dusun',
            'rules' => 'trim',
            'helper' => 'form_dropdownlabel'
        ),
        'rw' => array(
            'label' => 'lang:RW',
            'rules' => 'trim',
            'helper' => 'form_dropdownlabel'
        ),
        'rt' => array(
            'label' => 'lang:RT',
            'rules' => 'trim',
            'helper' => 'form_dropdownlabel'
        ),
        'role_id' => array(
            'label' => 'lang:Role',
            'rules' => 'trim',
            'helper' => 'form_dropdownlabel'
        ),
        'lang' => array(
            'label'	=> 'lang:language',
            'rules' => 'trim',
            'helper' => 'form_dropdownlabel'
        )
    );

    protected $edit_form = array(
        'id' => array(
            'helper' => 'form_hidden'
        ),
        'first_name' => array(
            'label' => 'lang:first_name',
            'rules' => 'trim|max_length[50]',
            'helper' => 'form_inputlabel',
            'class' => 'mt-10 mb-5'
        ),
        'last_name' => array(
            'label'	=> 'lang:last_name',
            'rules' => 'trim|max_length[50]',
            'helper' => 'form_inputlabel'
        ),
        'password' => array(
            'label' => 'lang:password',
            'rules' => 'trim|required|matches[confirm-password]',
            'helper' => 'form_passwordlabel',
            'value' => ''
        ),
        'confirm-password' => array(
            'label' => 'lang:confirm_password',
            'rules' => 'trim|required',
            'helper' => 'form_passwordlabel',
            'value' => ''
        )
    );



    /**
     * Redirect to index if cancel-button clicked.
     */
    public function __construct()
    {
        parent::__construct();

        if ($this->input->post('cancel-button')) {
            redirect('auth/user/index');
        }

        $this->load->language('auth');
        $this->load->model('User_model');
        $this->template
        ->set_css(bower_url('select2/dist/css/select2.min'))
        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
        ->set_js(bower_url('datatables/media/js/dataTables.bootstrap4.min'))
        ->set_js(bower_url('select2/dist/js/select2.min'));
    }

    /**
     * Display User list.
     */
    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Data User',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            // 'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('User/index') . '" class="text-muted text-hover-primary">Data User</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Data User</li>',
        ));
        
        if($this->session->userdata('level_id') != 7):
            $this->load->vars(array(
                'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('auth/user/add') . '"> <i class="fa fa-plus"></i> Tambah Data</a>',

        ));
        endif;
        $this->data['users'] = $this->user_model->get_list(site_url('auth/user/index'));
        $this->template
                ->set_css(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle'))
                ->set_js(assets_url('admin_assets/assets/plugins/custom/datatables/datatables.bundle.js', true))
                ->build('auth/index', $this->data);
    }

    /**
     * Edit User
     *
     * @param integer $id
     */
    public function edit($id)
    {
        $this->_updatedata($id);
    }

    public function edit_profile($id)
    {
        $this->profile_updatedata($id);
    }


    /**
     * Add a new User.
     */
    public function add()
    {
        $this->_updatedata();
    }

    /**
     * Update profile.
     */
    public function profile()
    {
        $this->load->vars(array(
            'page_title' => lang('user'),
            // 'page_icon' => '<a href="' . site_url('auth/user/add') . '"> <i class="fa fa-plus"></i>'. lang('add').'</a><br>',
            'ui_controller' => 'user',
        ));

        $this->data['users'] = $this->user_model->get_list(site_url('auth/user/profile'));
        $this->template
                ->set_css('../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap')
                ->set_js('../bower_components/datatables/media/js/jquery.dataTables.min', true)
                ->set_js('../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min')
                ->set_js_script('

				')
                ->build('auth/profile', $this->data);
    }

    /**
     * Update user data
     *
     * @param int $id
     */
    public function _updatedata($id = 0)
    {
        // var_dump($this->session->userdata['level_id']) or die;
        $this->load->vars(array(
            'page_title' => 'Tambah Data User',
            'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('auth/user') . '"> <i class="fa fa-reply"></i> Back</a>',
            'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
            'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('auth/user') . '" class="text-muted text-hover-primary">Data User</a></li>',
            'url_page' => '<li class="breadcrumb-item text-dark">Tambah Data User</li>',
        ));

        $this->load->library('form_validation');
        $user_form = $this->user_form;

        // Update rules for update data
        if ($id > 0) {
            $this->load->vars(array(
                'page_title' => 'Ubah Data User',
                'page_icon' => '<a class="btn btn-active-accent fw-bolder" href="' . site_url('auth/user') . '"> <i class="fa fa-reply"></i> Back</a>',
                'url_home' => '<li class="breadcrumb-item"><a href="' . base_url('dashboard/home') . '" class="text-muted text-hover-primary">Home</a></li>',
                'url_children' => '<li class="breadcrumb-item"><a href="' . base_url('auth/user') . '" class="text-muted text-hover-primary">Data User</a></li>',
                'url_page' => '<li class="breadcrumb-item text-dark">Ubah Data User</li>',
            ));

            $user_form['username']['rules']	= "trim|required|max_length[255]|callback_unique_username[$id]";
            $user_form['email']['rules']	= "trim|required|max_length[255]|valid_email|callback_unique_email[$id]";
            $user_form['password']['rules']	= "trim|matches[confirm-password]";
            $user_form['confirm-password']['rules']	= "trim";
            // $user_form['desa_id']['options']['3204'] = 'Kabupaten Bandung';
            $users = $this->user_model->get_by_id($id);
            $desa = $this->user_model->get_desa_user($users->kec_id,$users->desa_id);
            $dusun = $this->user_model->get_dusun_user($users->kec_id,$users->desa_id,$users->dusun);
            $rw = $this->user_model->get_rw_user($users->kec_id,$users->desa_id,$users->dusun,$users->rw);
            $rt = $this->user_model->get_rt_user($users->kec_id,$users->desa_id,$users->dusun,$users->rw,$users->rt);

        }
        $kecamatan = $this->user_model->get_kecamatan_user();
        // Add language options
        $languages = $this->config->item('languages', 'template');
        // Add language options
        $languages = $this->config->item('languages', 'template');
        foreach ($languages as $code => $language) {
            $user_form['lang']['options'][$code] = $language['name'];
        }
        if ($_SESSION['level_id'] == 1) {
            $user_form['level_id']['options'][] = '-- Pilih --';
            $user_form['level_id']['options'][2] = 'Kabupaten';
            $user_form['level_id']['options'][3] = 'Kecamatan';
            $user_form['level_id']['options'][4] = 'Desa';
            $user_form['level_id']['options'][5] = 'Dusun';
            $user_form['level_id']['options'][6] = 'RW';
            $user_form['level_id']['options'][7] = 'RT';
        } elseif ($_SESSION['level_id'] == 2) {
            $user_form['level_id']['options'][] = '-- Pilih --';
            $user_form['level_id']['options'][3] = 'Kecamatan';
            $user_form['level_id']['options'][4] = 'Desa';
            $user_form['level_id']['options'][5] = 'Dusun';
            $user_form['level_id']['options'][6] = 'RW';
            $user_form['level_id']['options'][7] = 'RT';
        } elseif ($_SESSION['level_id'] == 3) {
            $user_form['level_id']['options'][] = '-- Pilih --';
            $user_form['level_id']['options'][4] = 'Desa';
            $user_form['level_id']['options'][5] = 'Dusun';
            $user_form['level_id']['options'][6] = 'RW';
            $user_form['level_id']['options'][7] = 'RT';
        } elseif ($_SESSION['level_id'] == 4) {
            $user_form['level_id']['options'][] = '-- Pilih --';
            $user_form['level_id']['options'][5] = 'Dusun';
            $user_form['level_id']['options'][6] = 'RW';
            $user_form['level_id']['options'][7] = 'RT';
        } elseif ($_SESSION['level_id'] == 5) {
            $user_form['level_id']['options'][] = '-- Pilih --';
            $user_form['level_id']['options'][6] = 'RW';
            $user_form['level_id']['options'][7] = 'RT';
        }elseif ($_SESSION['level_id'] == 6 || $_SESSION['level_id'] == 7) {
            $user_form['level_id']['options'][] = '-- Pilih --';
            $user_form['level_id']['options'][7] = 'RT';
        }elseif ($_SESSION['level_id'] == 7) {
            $user_form['level_id']['options'][7] = 'RT';
        }

        $user_form['kab_id']['options']['3204'] = 'Kabupaten Bandung';

        // if ($id > 0) {
            foreach ($kecamatan as $nama) {
            $user_form['kec_id']['options'][0] = "-- Pilih Kecamatan --";
            $user_form['kec_id']['options'][(int)$nama->Kd_Kec] = $nama->Nama_Kecamatan;
            }
        // }

        if ($id > 0) {
            foreach ($desa as $nama) {
                $user_form['desa_id']['options'][0] = "-- Pilih Desa --";
                $user_form['desa_id']['options'][(int)$nama->Kd_Desa] = $nama->Nama_Desa;
            }
        }
        if ($id > 0) {
            foreach ($dusun as $nama) {
                $user_form['dusun']['options'][0] = "-- Pilih Dusun --";
                $user_form['dusun']['options'][(int)$nama->id] = $nama->dusun;
            }
        }
        if ($id > 0) {
            foreach ($rw as $nama) {
                $user_form['rw']['options'][0] = "-- Pilih RW --";
                $user_form['rw']['options'][(int)$nama->rw] = $nama->rw;
            }
        }
        if ($id > 0) {
            foreach ($rt as $nama) {
                $user_form['rt']['options'][0] = "-- Pilih RT --";
                $user_form['rt']['options'][(int)$nama->rt] = $nama->rt;
            }
        }
        // var_dump($rw) or die;


        $role_tree = $this->role_model->get_tree();
        // $user_form['role_id']['options'] = array(0 => '(' . lang('none') . ')') + $this->role_model->generate_options($role_tree);
        if ($_SESSION['level_id'] == 1) {
            $user_form['role_id']['options'][] = '-- Pilih Hak Akses --';
            $user_form['role_id']['options'][2] = 'Pengelola Website';
            $user_form['role_id']['options'][3] = 'Ketua Pokja';
            $user_form['role_id']['options'][8] = 'Operator Dasawisma';
            $user_form['role_id']['options'][4] = 'Operator Pokja I';
            $user_form['role_id']['options'][5] = 'Operator Pokja II';
            $user_form['role_id']['options'][6] = 'Operator Pokja III';
            $user_form['role_id']['options'][7] = 'Operator Pokja IV';
        } elseif ($_SESSION['level_id'] == 2 || $_SESSION['level_id'] == 3) {
            $user_form['role_id']['options'][] = '-- Pilih Hak Akses --';
            $user_form['role_id']['options'][3] = 'Ketua Pokja';
            $user_form['role_id']['options'][8] = 'Operator Dasawisma';
            $user_form['role_id']['options'][4] = 'Operator Pokja I';
            $user_form['role_id']['options'][5] = 'Operator Pokja II';
            $user_form['role_id']['options'][6] = 'Operator Pokja III';
            $user_form['role_id']['options'][7] = 'Operator Pokja IV';
        }elseif ($_SESSION['level_id'] == 4 || $_SESSION['level_id'] == 5 || $_SESSION['level_id'] == 6) {
            $user_form['role_id']['options'][] = '-- Pilih Hak Akses --';
            $user_form['role_id']['options'][3] = 'Ketua Pokja';
            $user_form['role_id']['options'][8] = 'Operator Dasawisma';
        }elseif ($_SESSION['level_id'] == 7) {
            $user_form['role_id']['options'][] = '-- Pilih Hak Akses --';
            $user_form['role_id']['options'][3] = 'Ketua Pokja';
        }

        $this->form_validation->init($user_form);
        // Set default value for update data
        if ($id > 0) {
            $this->form_validation->set_default($this->user_model->get_by_id($id));
        }
        if ($this->form_validation->run()) {
            if ($id > 0) {
                $this->user_model->update($id, $this->form_validation->get_values());
                $this->template->set_flashdata('info', lang('user_updated'));
            } else {
                $this->user_model->insert($this->form_validation->get_values());
                $this->template->set_flashdata('info', lang('user_added'));
            }

            if (isset($this->data['redirect'])) {
                redirect($this->data['redirect']);
            } else {
                redirect('auth/user');
            }
        }

        $this->data['form'] = $this->form_validation;
        $this->template->build('auth/user-form', $this->data);
    }


    public function profile_updatedata($id = 0)
    {
        $this->load->library('form_validation');
        $edit_form = $this->edit_form;

        // Update rules for update data
        if ($id > 0) {
            $edit_form['password']['rules']	= "trim|matches[confirm-password]";
            $edit_form['confirm-password']['rules']	= "trim";
        }

        $this->form_validation->init($edit_form);
        // Set default value for update data
        if ($id > 0) {
            $this->form_validation->set_default($this->user_model->get_by_id($id));
        }
        if ($this->form_validation->run()) {
            if ($id > 0) {
                if ($id == $this->session->userdata('id')) {
                    $this->user_model->update($id, $this->form_validation->get_values());
                    $this->template->set_flashdata('info', lang('user_updated'));
                } else {
                    redirect('auth/user/edit_profile/'.$id);
                }
            } else {
                $this->user_model->insert($this->form_validation->get_values());
                $this->template->set_flashdata('info', lang('user_added'));
            }

            if (isset($this->data['redirect'])) {
                redirect($this->data['redirect']);
            } else {
                redirect('dashboard/home');
            }
        }

        $this->data['form'] = $this->form_validation;
        $this->template->build('auth/user-form', $this->data);
    }

    /**
     * Delete a User
     *
     * @param integer $id
     */
    public function delete($id)
    {
        $user = $this->user_model->get_by_id($id);
        if ($user) {
            $this->user_model->delete($id);
        }

        redirect('auth/user');
    }

    /**
     * Validation callback function to check whether the username is unique
     *
     * @param string $value Username to check
     * @param int $id Don't check if the username has this ID
     * @return boolean
     */
    public function unique_username($value, $id = 0)
    {
        if ($this->user_model->is_username_unique($value, $id)) {
            return true;
        } else {
            $this->form_validation->set_message('unique_username', lang('already_taken'));
            return false;
        }
    }

    /**
     * Validation callback function to check whether the email is unique
     *
     * @param string $value Email to check
     * @param int $id Don't check if the email has this ID
     * @return boolean
     */
    public function unique_email($value, $id = 0)
    {
        if ($this->user_model->is_email_unique($value, $id)) {
            return true;
        } else {
            $this->form_validation->set_message('unique_email', lang('already_taken'));
            return false;
        }
    }
}

/* End of file user.php */
/* Location: ./application/modules/auth/controllers/user.php */
