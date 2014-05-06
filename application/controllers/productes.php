<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class productes extends productes_base {

    public function nous($idCategoria = null, $NomCategoria = null) {
        $this->carregaDades('S',$idCategoria );        
    } 
    
    public function seminous($idCategoria = null, $Nom = null) {
        $this->carregaDades('N',$idCategoria);
    }

    public function fitxa($id = null, $Nom = null) {
        $this->carregaFitxa($id);
    }
}