<?php

	$data['categoriesNoves'] = $categoriesNoves;
	$data['categoriesSemiNoves'] = $categoriesSemiNoves;
		
	$data['title'] = $title;
	$data['contacte'] = $contacte;
	$data['formulari'] = $formulari;
		
	if (isset($PublicaArticles)) {
		$data['PublicaArticles'] = $PublicaArticles;
	}
	$this->load->view('plantilla/header',$data);
	$this->load->view('plantilla/capsalera');
	
	if ($admin) 
	{
		$this->load->view('plantilla/menu_admin',$data);	
	} else 
	{
		$this->load->view('plantilla/menu',$data);	
	}
	
	$this->load->view($main_template);
	if ($data['contacte']  === 'S') {
		$this->load->view('plantilla/footer_contacte');	
	}
	if ($data['formulari']  === 'S' ) {
		$this->load->view('plantilla/footer_form');	
	}
	$this->load->view('plantilla/footer');
	

?>