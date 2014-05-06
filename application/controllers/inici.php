<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class inici extends controlador {

    public function index()
    {
        $data = $this->load_page();
        
        $this->load->model("productes_model");
        $data['ProductesDestacats'] = $this->productes_model->getProductesDestacats();
        
        $data['main_template']  = 'index';
        $this->lang->load('inici'); 
        $this->lang->load('productes');
        $this->lang->load('contacte');
        $data['title'] = lang('capsalera.title');
		$data['description'] = lang('capsalera.description');
              
        $this->load->view('main_template', $data);
    }
}