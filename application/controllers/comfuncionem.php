<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class comfuncionem extends controlador {

    public function index()
    {
        $data = $this->load_page();
        $data['main_template']  = 'comfuncionem';
        $this->lang->load('comfuncionem');
        $data['title'] = lang('menu.comfuncionem');
		$data['description'] = lang('capsalera.description_comfuncionem');
        $this->load->view('main_template', $data);
    }
}