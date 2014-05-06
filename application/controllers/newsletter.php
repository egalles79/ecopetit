<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class newsletter extends controlador {

    public function index()
    {


        $data = $this->load_page();
        $email = $this->input->post('search-text');

        $this->load->model('newsletter_model');
        $existeix = $this->newsletter_model->comprova($email);
        if ($existeix) {
        	$data['missatge'] = lang('footer.jaregistrat');
        } else {
        	$this->newsletter_model->inserta($email);
        	$data['missatge'] = lang('footer.gracies');
        }
        $data['title'] = 'Newsletter';
		$data['description'] = 'Newsletter';
        $data['main_template']  = 'newsletter';
       	$this->load->view('main_template', $data);
    }
}