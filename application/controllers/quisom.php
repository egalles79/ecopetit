<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class quisom extends controlador {

    public function index()
    {
        $data = $this->load_page();
        $data['main_template']  = 'quisom';
        $this->lang->load('quisom');
        $data['title'] = lang('menu.quisom');     
		$data['description'] = lang('capsalera.description_quisom');  
        $this->load->view('main_template', $data);      
    }
}