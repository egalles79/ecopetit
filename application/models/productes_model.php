<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class productes_model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
    }
    
    
    function getProductesDestacats()
    {
        $idioma = $this->lang->lang();
        
        $this->db->start_cache();
    

        $sql = "select articles.titol_web_".$idioma." as titol_web, articles_fotos.idFoto, ";
        $sql .= "articles.idArticle, articles.PreuVendaActual, articles.PreuVenda, articles.endiposit_sn, ";
        $sql .= "articles.contingut_web_".$idioma." as contingut_web, articles.outlet, articles.nou_sn ";
        $sql .= "from articles, articles_fotos ";
        $sql .= "where articles_fotos.idArticle = articles.idArticle and ";
        $sql .= "articles.publicat_web = 'S' and articles.publicat_portada = 'S' and ";
        $sql .= "articles_fotos.principal_sn = 'S' and ";
        $sql .= "( articles.estat =  'E' or articles.sempre_publicat_web = 1 )";

        $this->db->flush_cache();
        
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0) {
            // almacenamos en una matriz bidimensional
            foreach($query->result() as $row) {
                    $arrDato['idArticle']= htmlspecialchars($row->idArticle, ENT_QUOTES);
                    $arrDato['idFoto'] = htmlspecialchars($row->idFoto, ENT_QUOTES);
                    $arrDato['titol_web']  = htmlspecialchars($row->titol_web, ENT_QUOTES);
                    $arrDato['contingut_web']  = htmlspecialchars($row->contingut_web, ENT_QUOTES);
                    $arrDato['PreuVenda']  = htmlspecialchars($row->PreuVenda, ENT_QUOTES);
                    $arrDato['PreuVendaActual']  = htmlspecialchars($row->PreuVendaActual, ENT_QUOTES);
                    $arrDato['endiposit_sn']  = htmlspecialchars($row->endiposit_sn, ENT_QUOTES);
                    $arrDato['nou_sn']  = htmlspecialchars($row->nou_sn, ENT_QUOTES);
                    
                    $arrDatos[]      = $arrDato;
            }
            $query->free_result();
                            
            return $arrDatos;
        }
    }
    
    function getFitxerPla()
    {
        $this->db->start_cache();

        $sql = "SELECT articles.idArticle, articles.idProducte, articles.PreuVenda,
        articles.CodiBarres, articles.PreuCompra, articles.Unitats, articles.PercentatgeCompra, 
        articles.endiposit_sn, articles.estat, contractes_detall.idContracte, articles.model,  
        articles.color, marques.Nom as marques_nom, grupproducte.Nom_ca as grupproducte_nom_ca, contractes.DataEntrada, contractes.DataLimit,   
        usuaris.Nom usuaris_nom, usuaris.TelefonFix, usuaris.TelefonMobil, parametres.dies_avis_contracte, 
        (select max(vendes.DataVenda) from vendes, vendesdetall where vendes.idVenda = vendesdetall.idVenda and 
        vendes.estat = 'C' and vendesdetall.idArticle = articles.idArticle) as DataVenda, 
        (select count(1) from articles_fotos where articles_fotos.idArticle = articles.idArticle) numFotos, 
        articles.publicat_web,  articles.venda_notificada, articles.outlet, articles.titol_web_ca,  
        articles.PreuVendaActual pvp_original, articles.segundamano ,
        (select max(vendes.FormaCobrament) from vendes, vendesdetall where vendes.idVenda = vendesdetall.idVenda and 
        vendes.VendaRetorn = 'V' and vendes.estat = 'C' and vendesdetall.idArticle = articles.idArticle and not exists(
            select 1 from vendes Abonament, vendesdetall AbonamentDet where Abonament.idVenda =  AbonamentDet.idVenda and
                Abonament.idAbona = vendes.idVenda and AbonamentDet.idArticle = articles.idArticle)) as FormaCobrament 
        FROM articles, contractes_detall, grupproducte, marques, contractes, usuaris, parametres 
        WHERE ( marques.idMarca = articles.idMarca ) and  
        ( grupproducte.idGrup = articles.idGrup ) and  
        ( contractes_detall.idContracte = contractes.idContracte ) and  
        ( contractes.idVenedor = usuaris.idUsuari ) and  
        ( articles.idArticle = contractes_detall.idArticle ) and  
        ( articles.endiposit_sn = 'S' )    and      
        ( contractes_detall.estat <> 'A' ) and 
        ( articles.unitats > 0 ) 
        UNION ALL
  SELECT articles.idArticle,   
         articles.idProducte,   
         articles.PreuVenda,   
         articles.CodiBarres,           
         articles.PreuCompra,            
        articles.Unitats,
         articles.PercentatgeCompra,   
         articles.endiposit_sn,   
         articles.estat,   
         null,   
         articles.model,  
        articles.color, 
         marques.Nom,   
         grupproducte.Nom_ca,   
         null,   
         null,   
         null,   
        null,   
        null,   
        parametres.dies_avis_contracte,
        null as DataVenda,
        (select count(1) from articles_fotos where articles_fotos.idArticle = articles.idArticle) numFotos,
        articles.publicat_web,
        articles.venda_notificada,
        articles.outlet,
        articles.titol_web_ca,
        articles.PreuVendaActual pvp_original,
        articles.segundamano,
        null
    FROM articles,   
         grupproducte,   
         marques,   
         parametres
   WHERE ( marques.idMarca = articles.idMarca ) and  
         ( grupproducte.idGrup = articles.idGrup ) and  
         ( articles.endiposit_sn = 'N' ) and
        ( articles.estat = 'E' ) and
        ( articles.unitats > 0 )
UNION ALL
  SELECT articles.idArticle,   
         articles.idProducte,   
         vendesdetall.Preu + (vendesdetall.importiva / vendesdetall.unitats),   
         articles.CodiBarres,           
         articles.PreuCompra,            
        vendesdetall.Unitats,
         articles.PercentatgeCompra,   
         articles.endiposit_sn,   
         'V',   
         null,   
         articles.model,  
        articles.color, 
         marques.Nom,   
         grupproducte.Nom_ca,   
         null,   
         null,   
         null,   
        null,   
        null,   
        parametres.dies_avis_contracte,
        vendes.DataVenda as DataVenda,
        (select count(1) from articles_fotos where articles_fotos.idArticle = articles.idArticle) numFotos,
        articles.publicat_web,
        articles.venda_notificada,
        articles.outlet,
        articles.titol_web_ca,
        articles.PreuVendaActual pvp_original,
        articles.segundamano,
        vendes.FormaCobrament
    FROM articles,   
         grupproducte,   
         marques,   
         parametres,
        vendes, vendesdetall
   WHERE ( marques.idMarca = articles.idMarca ) and  
         ( grupproducte.idGrup = articles.idGrup ) and  
         ( articles.endiposit_sn = 'N' ) and
        ( vendes.idVenda = vendesdetall.idVenda ) and 
        ( vendes.estat = 'C' ) and 
        ( vendesdetall.idArticle = articles.idArticle) ";

        $this->db->flush_cache();
        
        $query = $this->db->query($sql);


        if ($query->num_rows() > 0) {
            // almacenamos en una matriz bidimensional
            foreach($query->result() as $row) {
                    $arrDato['idArticle']= htmlspecialchars($row->idArticle, ENT_QUOTES);
                    $arrDato['idProducte'] = htmlspecialchars($row->idProducte, ENT_QUOTES);
                    $arrDato['PreuVenda']  = htmlspecialchars($row->PreuVenda, ENT_QUOTES);
                    $arrDato['CodiBarres']  = htmlspecialchars($row->CodiBarres, ENT_QUOTES);
                    $arrDato['PreuCompra']  = htmlspecialchars($row->PreuCompra, ENT_QUOTES);
                    $arrDato['Unitats']  = htmlspecialchars($row->Unitats, ENT_QUOTES);
                    $arrDato['PercentatgeCompra']  = htmlspecialchars($row->PercentatgeCompra, ENT_QUOTES);                 
                    $arrDato['endiposit_sn']  = htmlspecialchars($row->endiposit_sn, ENT_QUOTES);
                    $arrDato['estat']  = htmlspecialchars($row->estat, ENT_QUOTES);
                    $arrDato['idContracte']  = htmlspecialchars($row->idContracte, ENT_QUOTES);
                    $arrDato['model']  = htmlspecialchars($row->model, ENT_QUOTES);
                    $arrDato['color']  = htmlspecialchars($row->color, ENT_QUOTES);
                    $arrDato['marques_nom']  = htmlspecialchars($row->marques_nom, ENT_QUOTES);
                    $arrDato['grupproducte_nom_ca']  = htmlspecialchars($row->grupproducte_nom_ca, ENT_QUOTES);
                    $arrDato['DataEntrada']  = htmlspecialchars($row->DataEntrada, ENT_QUOTES);
                    $arrDato['DataLimit']  = htmlspecialchars($row->DataLimit, ENT_QUOTES);
                    $arrDato['usuaris_nom']  = htmlspecialchars($row->usuaris_nom, ENT_QUOTES);
                    $arrDato['TelefonFix']  = htmlspecialchars($row->TelefonFix, ENT_QUOTES);
                    $arrDato['TelefonMobil']  = htmlspecialchars($row->TelefonMobil, ENT_QUOTES);
                    $arrDato['dies_avis_contracte']  = htmlspecialchars($row->dies_avis_contracte, ENT_QUOTES);
                    $arrDato['DataVenda']  = htmlspecialchars($row->DataVenda, ENT_QUOTES);
                    $arrDato['numFotos']  = htmlspecialchars($row->numFotos, ENT_QUOTES);
                    $arrDato['publicat_web']  = htmlspecialchars($row->publicat_web, ENT_QUOTES);
                    $arrDato['venda_notificada']  = htmlspecialchars($row->venda_notificada, ENT_QUOTES);
                    $arrDato['outlet']  = htmlspecialchars($row->outlet, ENT_QUOTES);
                    $arrDato['titol_web_ca']  = htmlspecialchars($row->titol_web_ca, ENT_QUOTES);
                    $arrDato['pvp_original']  = htmlspecialchars($row->pvp_original, ENT_QUOTES);
                    $arrDato['segundamano']  = htmlspecialchars($row->segundamano, ENT_QUOTES);
                    $arrDato['FormaCobrament']  = htmlspecialchars($row->FormaCobrament, ENT_QUOTES);



                    $arrDatos[]      = $arrDato;
            }
            $query->free_result();
                            
            return $arrDatos;
        }
    
    }
    
    function getProductes($filter = null)
    {
        $idioma = $this->lang->lang();
        
        $this->db->start_cache();
        

        /*$sql = "articles.titol_web_".$idioma." as titol_web, articles_fotos.idFoto, articles.idArticle, ";
        $sql .= "articles.PreuVenda, articles.contingut_web_".$idioma." as contingut_web, articles.publicat_web, ";
        $sql .= "grupproducte.Nom_".$idioma." as NomGrup, categories.Nom_".$idioma."' as NomCategoria, articles.color, ";
        $sql .= "articles.model, marques.Nom as NomMarca from articles, articles_fotos, grupproducte, marques, categories "; 
        $sql .= "where articles_fotos.idArticle = articles.idArticle and ";
        $sql .= "grupproducte.idGrup = articles.idGrup and ";
        $sql .= "marques.idMarca = articles.idMarcan and ";
        $sql .= "grupproducte.idCategoria = categories.idCategoria and ";
        $sql .= "articles_fotos.principal_sn = 'S' and ";
        $sql .= "( articles.estat = 'E' or articles.sempre_publicat_web = 1) ";*/



        $this->db->select('articles.titol_web_'.$idioma.' as titol_web, articles_fotos.idFoto, articles.idArticle,
        articles.PreuVenda, articles.contingut_web_'.$idioma.' as contingut_web, articles.publicat_web, 
        grupproducte.Nom_'.$idioma.' as NomGrup, categories.Nom_'.$idioma.' as NomCategoria, articles.color,
        articles.model, marques.Nom as NomMarca');
        $this->db->from('articles');
        $this->db->join('articles_fotos', 'articles_fotos.idArticle = articles.idArticle', 'left outer');
        $this->db->join('grupproducte', 'grupproducte.idGrup = articles.idGrup');
        $this->db->join('marques', 'marques.idMarca = articles.idMarca');
        $this->db->join('categories', 'grupproducte.idCategoria = categories.idCategoria');
        $this->db->where('articles.estat', 'E');
        $this->db->where('articles_fotos.principal_sn', 'S');


        

        if(!empty($filter)) {
            if(!empty($filter['CodiBarres'])) {
                $this->db->like('articles.codibarres', $filter['CodiBarres']);
            }
            if(!empty($filter['publicat'])) {
                $this->db->where('articles.publicat_web', $filter['publicat']);                
            }
            if($filter['idGrup'] != -1) {
                $this->db->where('articles.idGrup', $filter['idGrup']);                
            }
            if($filter['idMarca'] != -1) {
                $this->db->where('articles.idMarca', $filter['idMarca']);                
            }
            if(!empty($filter['model'])) {
                $this->db->like('articles.model', $filter['model']);                
            }

        }


        $this->db->flush_cache();
        
        $query = $this->db->get();
        
       
        
        if ($query->num_rows() > 0) {
            // almacenamos en una matriz bidimensional
            foreach($query->result() as $row) {
                    $arrDato['idArticle']= htmlspecialchars($row->idArticle, ENT_QUOTES);
                    $arrDato['foto'] = htmlspecialchars($row->idFoto, ENT_QUOTES);
                    $arrDato['titol_web']  = htmlspecialchars($row->titol_web, ENT_QUOTES);
                    $arrDato['contingut_web']  = htmlspecialchars($row->contingut_web, ENT_QUOTES);
                    $arrDato['PreuVenda']  = htmlspecialchars($row->PreuVenda, ENT_QUOTES);
                    $arrDato['publicat']  = htmlspecialchars($row->publicat_web, ENT_QUOTES);
                    $arrDato['grup']  = htmlspecialchars($row->NomGrup, ENT_QUOTES);                    
                    $arrDato['categoria']  = htmlspecialchars($row->NomCategoria, ENT_QUOTES);
                    $arrDato['color']  = htmlspecialchars($row->color, ENT_QUOTES);
                    $arrDato['model']  = htmlspecialchars($row->model, ENT_QUOTES);
                    $arrDato['marca']  = htmlspecialchars($row->NomMarca, ENT_QUOTES);
                    
                    $arrDatos[]      = $arrDato;
            }
            $query->free_result();
                            
            return $arrDatos;
        }
    }
    
    function getData($Nou, $idCategoria = null)
    {
        
        
        $idioma = $this->lang->lang();
        
        $this->db->start_cache();
        $sql = "select articles.titol_web_".$idioma." as titol_web, articles_fotos.idFoto, articles.idArticle, ";
        $sql .= "articles.PreuVendaActual, articles.PreuVenda, articles.contingut_web_".$idioma." as contingut_web, ";
        $sql .= "articles.outlet, grupproducte.idCategoria, categories.Nom_".$idioma." as NomCategoria ";
        $sql .= "from articles, articles_fotos, grupproducte, categories ";
        $sql .= "where articles_fotos.idArticle = articles.idArticle ";
        $sql .= "and grupproducte.idGrup = articles.idGrup ";
        $sql .= "and grupproducte.idCategoria = categories.idCategoria ";
        $sql .= "and articles_fotos.principal_sn = 'S' ";
        $sql .= "and articles.publicat_web = 'S' ";
        $sql .= "and (articles.estat = 'E' or articles.sempre_publicat_web = 1 ) ";
        
    
        if(!is_null($idCategoria)) {
            $sql .= " and  grupproducte.idCategoria =".$idCategoria." ";
        }
    
        if ($Nou == "S") {
            $sql .= "and  articles.nou_sn = 'S' ";
        }
        else {
            $sql .= "and articles.endiposit_sn = 'S' ";
            $sql .= "and articles.outlet =  'N' "; 
        }
        

        $sql .= "order by articles.idArticle desc"; 
        $this->db->flush_cache();
        
        $query = $this->db->query($sql);

        // si hay resultados
        if ($query->num_rows() > 0) {
            // almacenamos en una matriz bidimensional
            foreach($query->result() as $row) {
                    $arrDato['idArticle']= htmlspecialchars($row->idArticle, ENT_QUOTES);
                    $arrDato['foto'] = htmlspecialchars($row->idFoto, ENT_QUOTES);
                    $arrDato['titol']  = htmlspecialchars($row->titol_web, ENT_QUOTES);
                    $arrDato['contingut']  = htmlspecialchars($row->contingut_web, ENT_QUOTES);
                    $arrDato['PreuVendaActual']  = htmlspecialchars($row->PreuVendaActual, ENT_QUOTES);
                    $arrDato['PreuVenda']  = htmlspecialchars($row->PreuVenda, ENT_QUOTES);
                    $arrDato['outlet']  = htmlspecialchars($row->outlet, ENT_QUOTES);
                    $arrDatos[]      = $arrDato;
            }
            $query->free_result();
                            
            return $arrDatos;
        }
            
    }
      
    function getFotos($idArticle) {
        $this->db->start_cache();
        $this->db->select('idFoto, idArticle, principal_sn');
        $this->db->from('articles_fotos');
        $this->db->where('articles_fotos.idArticle', $idArticle);
        $this->db->order_by("principal_sn", "desc"); 

        $this->db->flush_cache();
        
        $query = $this->db->get();

        // si hay resultados
        if ($query->num_rows() > 0) {
            // almacenamos en una matriz bidimensional
            foreach($query->result() as $row) {
                    $arrDato['idFoto']= htmlspecialchars($row->idFoto, ENT_QUOTES);
                    $arrDato['idArticle'] = htmlspecialchars($row->idArticle, ENT_QUOTES);
                    $arrDato['principal_sn'] = htmlspecialchars($row->principal_sn, ENT_QUOTES);
                    
                    $arrDatos[]      = $arrDato;
            }
            $query->free_result();
                            
            return $arrDatos;
        }


    }
    function getFitxa($idArticle) {

        $idioma = $this->lang->lang();

        $this->db->start_cache();
        $this->db->select('articles.titol_web_'.$idioma.' as titol_web, articles.idArticle, articles.PreuVendaActual,
        articles.PreuVenda, articles.contingut_web_'.$idioma.' as contingut_web, articles.outlet, articles_fotos.idFoto');
        $this->db->from('articles');
        $this->db->join('articles_fotos', 'articles_fotos.idArticle = articles.idArticle');

        $this->db->where('articles_fotos.principal_sn', 'S');
        $this->db->where('articles.idArticle', $idArticle);


        $this->db->flush_cache();
        
        $query = $this->db->get();


        if ($query->num_rows() > 0) {
            $row = $query->row();
            $arrDades['titol'] = htmlspecialchars($row->titol_web, ENT_QUOTES);
            $arrDades['idArticle'] = htmlspecialchars($row->idArticle, ENT_QUOTES);
            $arrDades['PreuVendaActual'] = htmlspecialchars($row->PreuVendaActual, ENT_QUOTES);
            $arrDades['PreuVenda'] = htmlspecialchars($row->PreuVenda, ENT_QUOTES);
            $arrDades['contingut'] = htmlspecialchars($row->contingut_web, ENT_QUOTES);
            $arrDades['outlet'] = htmlspecialchars($row->outlet, ENT_QUOTES);
            $arrDades['Foto'] = htmlspecialchars($row->idFoto, ENT_QUOTES);
            

            $query->free_result();

            return $arrDades;
        }
    }

    function getFitxaAdmin($idArticle) {

        $idioma = $this->lang->lang();

        $this->db->start_cache();
        $this->db->select('articles.idArticle, articles.titol_web_ca, articles.titol_web_es,
        articles.PreuVenda, articles.contingut_web_ca, articles.contingut_web_es,
        grupproducte.Nom_'.$idioma.' as NomGrup, categories.Nom_'.$idioma.' as NomCategoria, articles.color,
        articles.model, marques.Nom as NomMarca');
        $this->db->from('articles');
        $this->db->join('grupproducte', 'grupproducte.idGrup = articles.idGrup');
        $this->db->join('marques', 'marques.idMarca = articles.idMarca');
        $this->db->join('categories', 'grupproducte.idCategoria = categories.idCategoria');
        $this->db->where('articles.idArticle', $idArticle);


        $this->db->flush_cache();
        
        $query = $this->db->get();


        if ($query->num_rows() > 0) {
            $row = $query->row();
            $arrDades['idArticle']          = htmlspecialchars($row->idArticle, ENT_QUOTES);
            $arrDades['titol_web_ca']       = htmlspecialchars($row->titol_web_ca, ENT_QUOTES);
            $arrDades['titol_web_es']       = htmlspecialchars($row->titol_web_es, ENT_QUOTES);
            $arrDades['PreuVenda']          = htmlspecialchars($row->PreuVenda, ENT_QUOTES);
            $arrDades['contingut_web_ca']   = htmlspecialchars($row->contingut_web_ca, ENT_QUOTES);
            $arrDades['contingut_web_es']   = htmlspecialchars($row->contingut_web_es, ENT_QUOTES);
            $arrDades['NomGrup']            = htmlspecialchars($row->NomGrup, ENT_QUOTES);
            $arrDades['NomCategoria']       = htmlspecialchars($row->NomCategoria, ENT_QUOTES);
            $arrDades['color']              = htmlspecialchars($row->color, ENT_QUOTES);
            $arrDades['model']              = htmlspecialchars($row->model, ENT_QUOTES);
            $arrDades['NomMarca']           = htmlspecialchars($row->NomMarca, ENT_QUOTES);
            
            

            $query->free_result();

            return $arrDades;
        }
    }
	
	
	function getNomFoto() {
		$this->db->start_cache();
		
		$this->db->select_max('idFoto');
		$this->db->from('articles_fotos');
		$this->db->flush_cache();
        
        $query = $this->db->get();
		
		 if ($query->num_rows() == 1) {
			 $row = $query->row();
			 $idNovaFoto = $row->idFoto;
			 
			 $val = intval(substr($idNovaFoto,0,4));
			 
			 $val = $val + 1;
			 
			 $idNovaFoto = strval($val).".jpg";
			 
			 return $idNovaFoto;
		 }
		
		
		return "";
		
	}
	
	function AssignaFoto($idArticle, $Foto, $Principal) {
	
		$data = array(
			   'idArticle' => $idArticle ,
			   'idFoto' => $Foto ,
			   'principal' => $Principal
			  );

		$this->db->start_cache();
		$this->db->insert('articles_fotos',$data);
		$this->db->flush_cache();
		return $this->db->insert_id();
		
	}
	
	
	function EsborraFoto($idArticle, $idFoto) {
		$this->db->start_cache();
		$this->db->delete('articles_fotos', array('idArticle' => $idArticle, 'idFoto' => $idFoto)); 
		$this->db->flush_cache();
	}
		
	
}