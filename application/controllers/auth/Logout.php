<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Logout controller.
 *
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class Logout extends MY_Controller
{
    public function index()
    {
        $this->auth->logout();
        redirect('/login');
    }
}
