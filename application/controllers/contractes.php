<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class contractes extends controlador {
    public function index()
    {
        $data = $this->load_page();
        $data['main_template']  = 'contractes';
        $this->lang->load('contractes');
        $data['title'] = lang('title.contractes');
		$data['description'] = lang('description.contractes');
        $this->load->view('main_template', $data);
    }

	public function inserta($idContracte,$idVenedor,$DataEntrada,$DataLimit,$Estat,$idBotiga,$CodiPromocio )
	{
		$this->load->model('contractes_model');
		$this->contractes_model->inserta($idContracte,$idVenedor,$DataEntrada,$DataLimit,$Estat,$idBotiga,$CodiPromocio);
	}
}
