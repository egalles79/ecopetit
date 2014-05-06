<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class productos extends productes_base {
    
    public function nuevos($idCategoria = null, $Nom = null) {
        $this->carregaDades('S',$idCategoria);
    }
        
    public function seminuevos($idCategoria = null, $Nom = null) {
        $this->carregaDades('N',$idCategoria);
    }

    public function ficha( $id = null, $Nom = null) {
        $this->carregaFitxa($id);
    }
}