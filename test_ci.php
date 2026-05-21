<?php
// Bootstrap CodeIgniter to test saving
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
$_SERVER['REQUEST_URI'] = '/simpelpkk/index.php/sip/sip7';

define('ENVIRONMENT', 'development');
chdir('c:\xampp\htdocs\simpelpkk');
require_once 'index.php';
