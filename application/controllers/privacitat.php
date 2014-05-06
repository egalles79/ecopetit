<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class privacitat extends controlador {

    public function index()
    {
        $data = $this->load_page();
        
        $data['main_template']  = 'privacitat';
        $data['contacte'] = 'N';
        $data['formulari'] = 'N';
        $this->lang->load('privacitat');
        $data['title'] = lang('menu.contacte');
		$data['description'] = $data['title'];
        $this->load->view('main_template', $data);

    }
}