<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class register extends controlador {

    public function index()
    {
        $this->load_page();
        $data['main_template']  = 'users/register';
        $data['title'] = lang('user.titleRegister');
		$data['description'] = '';
        $this->load->library('flexi_auth');
        $this->load->view('main_template', $data);
        $this->load->view('users/scripts');
    }

}