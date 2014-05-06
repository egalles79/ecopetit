<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class productes_base extends controlador {

    public function index() {
        $idioma = $this->lang->lang();  
        
        if ($idioma == "es") {
            $this->nuevos(null);
        }
        else {
            $this->nous(null);
        }
        
    }
        
    public function carregaDades($Tipus, $idCategoria) {
        

        $Nom_ca = null;
        $Nom_es = null;


        if (!is_null($idCategoria)) {
        
            $this->load->model('categories_model');
            $arrDades = $this->categories_model->getNom($idCategoria);
            $idCategoria = $arrDades['idCategoria'];
            $Nom_ca = $arrDades['Nom_ca'];
            $Nom_es = $arrDades['Nom_es'];
			
            
			
			
        } else {
            $idCategoria = null;
        }


        $data = $this->load_page();
        $data['idCategoria'] = $idCategoria;
        $this->load->model('productes_model');

        $data['result'] = $this->productes_model->getData($Tipus, $idCategoria);


        $data['main_template']  = 'productes';
        $data['nou'] = $Tipus;
        
        $data['Nom_ca'] = $Nom_ca;
        $data['Nom_es'] = $Nom_es;

       
       $this->load->model('marques_model');

       $LlistaMarques = $this->marques_model->getData();

       $aux = "";
      
       foreach($LlistaMarques as $marca) {
            $aux .= $marca['NomMarca'].",";            
        }
        $data['keywords'] = substr($aux,0,strlen($aux)-1);
                
        $this->lang->load('productes');
        
		if (is_null($Nom_ca)) {
			if ($Tipus == "S") {
				$data['title'] = lang('menu.productesnous');
				$data['description'] = lang('productes.descNous');
			}
			else {
				$data['title'] = lang('menu.productesseminous');
				$data['description'] = lang('productes.descSeminous');
			}
			
		}
		else {
			$idioma = $this->lang->lang();	

			if ($idioma == "es") 					
				$data['title'] = stripslashes($Nom_es);
			else
				$data['title'] = stripslashes($Nom_ca);
				
			$data['description'] = $data['title'];
			
		}		
		
        $this->load->view('main_template', $data);  
    }   


    public function carregaFitxa($idArticle) {

        $data = $this->load_page();

        $this->load->model('productes_model');

        $FitxaProducte = $this->productes_model->getFitxa($idArticle);
        $data['article'] = $FitxaProducte;
        $data['formulari'] = 'S';

        $data['arr_fotos']= $this->productes_model->getFotos($idArticle);

        $data['main_template']  = 'FitxaProducte';
        $this->lang->load('productes');
        $this->lang->load('contacte');

        $data['title'] = $FitxaProducte['titol'];
		$data['description'] = $FitxaProducte['contingut'];
		
		$data['keywords'] = str_replace(" ",",", $FitxaProducte['titol']);
		

        $this->load->view('main_template', $data);          
    }
}