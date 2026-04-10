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
            // get user from database
			$user = $this->user_model->get_by_username($username);
				// mark user as logged in
				$this->auth->logout();
				$remember = $this->input->post('remember') ? TRUE : FALSE;

				$this->auth->login($user->id, $remember);
				
				$this->session->set_userdata(array(
					'lang'		=> $user->lang,
					'role_id'	=> $user->role_id,
					'role_name'	=> $user->role_name
				));
				$nama_user=  $this->session->userdata['role_name'];
				if ($remember)
				$data['remember'] = $remember;
				$redirect = $this->input->get_post('redirect');
				if ($redirect)
					redirect($redirect);
				else
					redirect($this->config->item('dashboard_uri', 'template'));
        }
	}
}