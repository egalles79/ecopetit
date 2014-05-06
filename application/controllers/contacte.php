<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class contacte extends controlador {

    public function index()
    {
        $data = $this->load_page();



        
        $data['main_template']  = 'contacte';
        $data['contacte'] = 'S';
        $data['formulari'] = 'S';
        $this->lang->load('contacte');
        $data['title'] = lang('menu.contacte');
		$data['description'] = lang('menu.subtitol2')." Ronda Mossèn Jacint Verdaguer, 13 08304 Mataró (Barcelona) - 937412496 - 628988917 - info@ecopetit.cat";
        $this->load->view('main_template', $data);

    }
}