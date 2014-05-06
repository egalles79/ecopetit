<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class controlador extends CI_Controller 
{
    public function load_page()
    {
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->lang->load('capsalera');
        $this->lang->load('menu');
        $this->lang->load('user');
        $this->lang->load('footer');
        
        
        $this->load->model("categories_model");
        $data['categoriesNoves'] = $this->categories_model->getData('S');
        $data['categoriesSemiNoves'] = $this->categories_model->getData('N');
        $data['contacte'] = 'N';
        $data['formulari'] = 'N';
        
		$data['keywords'] = lang('capsalera.keywords');

        $this->load->library('session');
        
        $sessio = $this->session->userdata('flexi_auth');
        
        if ($sessio['logged_in_via_password']) 
        {
            $data['logged'] = true;
            $data['user'] = $sessio['user_identifier'];

            if ($sessio['admin']) 
            {
                $data['admin'] = true;
            } else 
            {
                $data['admin'] =false;
            }                
        }
        else 
        {
            $data['user'] = "";
            $data['logged'] = false;
            $data['admin'] =false;
        }
        return $data;
    }

    public function redirect($pagina) 
    {
        redirect(base_url().$this->lang->lang()."/".$pagina);
    }
}