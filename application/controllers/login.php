<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class login extends controlador {

    public function index()
    {
        $this->load_page();
        $data['main_template']  = 'users/login_ajax';
        $data['title'] = lang('user.titlelogin');
		$data['description'] = '';
        $this->load->view('main_template', $data);
        $this->load->view('plantilla/footer_login');
    }

}