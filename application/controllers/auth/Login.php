<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Login controller.
 *
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class Login extends MY_Controller
{
	function index()
	{
		// redirect('maintenance');
		// user is already logged in
        if ($this->auth->loggedin())
		{
            redirect($this->config->item('dashboard_uri', 'template'));
        }

		$this->load->language('auth');
		$username = $this->input->post('username', TRUE); // TRUE otomatis membersihkan XSS
		$password = $this->input->post('password', TRUE); // TRUE otomatis membersihkan XSS
		$remember = $this->input->post('remember') ? TRUE : FALSE;
		$redirect = $this->input->get_post('redirect', TRUE); // TRUE otomatis membersihkan XSS

        // form submitted
        if ($username && $password)
		{
            // get user from database
			$user = $this->user_model->get_by_username($username);
			if ($user && $this->user_model->check_password($password, $user->password))
			{
				// mark user as logged in
				$this->auth->login($user->id, $remember);
				$this->user_model->last_login($user->id);
				// Add session data
				$this->session->set_userdata(array(
					'lang'		=> $user->lang,
					'role_id'	=> $user->role_id,
					'role_name'	=> $user->role_name
				));
				$nama_user=  $this->session->userdata['role_name'];
				

            if ($this->session->userdata('logged_in')) redirect(base_url());
				if ($redirect)
					redirect($redirect);
				else
					redirect($this->config->item('dashboard_uri', 'template'));
			}
			else
				$this->template->add_message ('error', lang('login_attempt_failed'));
        }
		else
		{
		if (($username === '') || ($password === ''))
				$this->template->add_message('error', lang('username_or_password_empty'));
		}

		$data = array();
		if ($username)
			$data['username'] = $username;
		if ($remember)
			$data['remember'] = $remember;

        // show login form
        $this->load->helper('form');
		$this->template->set_layout('login')
				->build('auth/login', $data);
	}
	function auto_login($username){
		if ($username)
		{
			// Get current logged-in user info
			$current_id = $this->auth->userid();
			$current_level = $this->session->userdata('level_id');
			$is_impersonating = $this->session->userdata('is_impersonating');

			if (!$this->auth->loggedin()) {
				redirect('auth/login');
			}

			// Block chained impersonation for simplicity and security
			if ($is_impersonating) {
				show_error('Anda sedang dalam mode impersonate. Silakan kembali ke akun utama terlebih dahulu untuk login sebagai user lain.', 403);
			}

            // get target user from database
			$target_user = $this->user_model->get_by_username($username);
			if (!$target_user) {
				show_error('User tidak ditemukan', 404);
			}

			// 1. Persyaratan Level Akses: Target harus level yang lebih bawah (angka lebih besar)
			if ($target_user->level_id <= $current_level) {
				show_error('Anda hanya bisa impersonate user dengan tingkat di bawah Anda.', 403);
			}
			
			// 2. Persyaratan Cakupan Wilayah (Regional Scope)
			$current_user = $this->user_model->get_by_id($current_id);
			
			// If current is Kecamatan (level 3)
			if ($current_level == 3) {
				if ($target_user->kec_id != $current_user->kec_id) {
					show_error('Akses ditolak: User target tidak berada dalam Kecamatan Anda.', 403);
				}
			}
			// If current is Desa (level 4)
			elseif ($current_level == 4) {
				if ($target_user->kec_id != $current_user->kec_id || $target_user->desa_id != $current_user->desa_id) {
					show_error('Akses ditolak: User target tidak berada dalam Desa Anda.', 403);
				}
			}
			// If current is Dusun (level 5)
			elseif ($current_level == 5) {
				if ($target_user->kec_id != $current_user->kec_id || $target_user->desa_id != $current_user->desa_id || $target_user->dusun != $current_user->dusun) {
					show_error('Akses ditolak: User target tidak berada dalam Dusun Anda.', 403);
				}
			}
			// If current is RW (level 6)
			elseif ($current_level == 6) {
				if ($target_user->kec_id != $current_user->kec_id || $target_user->desa_id != $current_user->desa_id || $target_user->dusun != $current_user->dusun || $target_user->rw != $current_user->rw) {
					show_error('Akses ditolak: User target tidak berada dalam RW Anda.', 403);
				}
			}
			// RT (level 7) cannot impersonate anyone (already handled by level check above)

			// Perform logout/login
			$this->auth->logout();
			$remember = FALSE;

			$this->auth->login($target_user->id, $remember);
			
			$this->session->set_userdata(array(
				'lang'		=> $target_user->lang,
				'role_id'	=> $target_user->role_id,
				'role_name'	=> $target_user->role_name,
				'is_impersonating' => TRUE,
				'original_user_id' => $current_id
			));
			
			$redirect = $this->input->get_post('redirect');
			if ($redirect)
				redirect($redirect);
			else
				redirect($this->config->item('dashboard_uri', 'template'));
        }
	}

	function exit_impersonate()
	{
		if (!$this->auth->loggedin()) {
			redirect('auth/login');
		}

		$is_impersonating = $this->session->userdata('is_impersonating');
		$original_user_id = $this->session->userdata('original_user_id');

		if ($is_impersonating && $original_user_id) {
			// Get original user
			$user = $this->user_model->get_by_id($original_user_id);
			if ($user) {
				// Logout target user
				$this->auth->logout();

				// Login as original user
				$this->auth->login($user->id, FALSE);

				$this->session->set_userdata(array(
					'lang'		=> $user->lang,
					'role_id'	=> $user->role_id,
					'role_name'	=> $user->role_name,
					'is_impersonating' => FALSE,
					'original_user_id' => NULL
				));

				redirect($this->config->item('dashboard_uri', 'template'));
			}
		}

		redirect('auth/login');
	}
}