<?php
include("traduccio.php");
$url = $_SERVER['REQUEST_URI'];
$separate ='/';
$trams = explode($separate,$url);
$breadcrumb = array();
$breadcrumb_sr = '<div style="padding-left:20px">'.$textBreadcrumb['esta_a'].': ';
if (stristr($trams[1],'index')) {
	$breadcrumb_sr .='<strong>Ecopetit</strong>';
}
else {
	$breadcrumb_sr .= '<a href="http://www.ecopetit.cat">Ecopetit</a>';
}
$breadcrumb[] = $breadcrumb_sr;

if (stristr($trams[1],'Regal') && !(stristr($trams[1],'FitxaRegal'))) {
	$breadcrumb[] ='<strong>'.$textHeader['regals'].'</strong>';
}
if (stristr($trams[1],'FitxaRegal')) {
	$breadcrumb[] ='<a href="regals.php">'.$textHeader['regals'].'</a>';
	$trams2 = explode('=',$trams[1]);
	$id = base64_decode(str_replace('@','=',$trams2[1]));
	//$id2 = ucfirst(strtolower($id));	
	include "productes.class.php";
	$Producte = new Productes();
	$regals = $Producte->getRegals($id);
	$regal = array();
	if ($regals != false) {
		while ($rows = mysql_fetch_array($regals)) {
			$regal = $rows;
		}	
	}
	if (!empty($regal)) {
		$breadcrumb[] = '<strong>'.ucfirst(strtolower($regal['titol_web'])).'</strong>';
	}
	else {
		$breadcrumb[] = '<strong>'.$textBreadcrumb['producte_no_trobat'].'</strong>';
	}
}
if (stristr($trams[1],'productes') && !(stristr($trams[1],'idCategoria'))) {
	$breadcrumb[] ='<strong>'.$textHeader['productes'].'</strong>';
}
if (stristr($trams[1],'idCategoria')) {
	$breadcrumb[] ='<a href="productes.php">'.$textHeader['productes'].'</a>';
	$trams2 = explode('=',$trams[1]);
	
	$id = $trams2[1];	
	//$id2 = ucfirst(strtolower($id));	
	include "productes.class.php";
	$Producte = new Productes();
	include "categories.class.php";
	$Categoria = new Categories();
	$productes = $Producte->getArticles($id);	
	$prod = '';
	$nomCategoria = $Categoria->getNom($categoria_get);
	
	
	if ($nomCategoria != '') $breadcrumb[] = '<strong>'.ucfirst(strtolower($nomCategoria)).'</strong>';	
	else 				 $nom = '';
	
}

if (stristr($trams[1],'idArticle') && stristr($trams[1],'producte')) {
	$breadcrumb[] ='<a href="productes.php">'.$textHeader['productes'].'</a>';
	$trams2 = explode('=',$trams[1]);
	
	$id = $trams2[1];	
	//$id2 = ucfirst(strtolower($id));	
	include "productes.class.php";
	$Producte = new Productes();
	$id = base64_decode(str_replace('@','=',$trams2[1]));
	$productes = $Producte->getArticles(null, $id);	
	
	if ($productes != false) {
		$prod = array();
		while ($rows = mysql_fetch_array($productes)) {
			$prod = $rows;		
		}
		if (!empty($prod)) {
			$breadcrumb[] = '<strong>'.stripslashes(ucfirst(strtolower($prod['Nom_'.$idioma]))).'</strong>';
		}
		else {
			$breadcrumb[] = '<strong>'.$textBreadcrumb['producte_no_trobat'].'</strong>';
		}
	} else {
		$breadcrumb[] = '<strong>'.$textBreadcrumb['producte_no_trobat'].'</strong>';
	}
}

if (stristr($trams[1],'quisom')) {
	$breadcrumb[] ='<strong>'.$textHeader['quisom'].'</strong>';
}
if (stristr($trams[1],'contacte')) {
	$breadcrumb[] ='<strong>'.$textHeader['contacte'].'</strong>';
}
if (stristr($trams[1],'comfuncionem')) {
	$breadcrumb[] ='<strong>'.$textHeader['comfuncionem'].'</strong>';
}
$breadcrumbString = implode('&nbsp;&nbsp;&nbsp;>>&nbsp;&nbsp;&nbsp;', $breadcrumb);
echo stripslashes($breadcrumbString.'</div>');
?>