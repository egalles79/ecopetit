<!DOCTYPE html >
<?php
$idioma = $this->lang->lang();  
?>

<html lang="<?php echo $idioma;?>" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="author" content="Ecopetit">


<?php
if ($idioma == "es")
	echo "<link rel='alternate' hreflang='ca' href='http://www.ecopetit.cat/ca/'>";
else
	echo "<link rel='alternate' hreflang='es' href='http://www.ecopetit.cat/es/'>";


?>


<meta property="og:title" content="<?php echo $title; ?>">

<meta name="description" content="<?php echo $description; ?>">
<meta property="og:description" content="<?php echo $description; ?>">

<meta property="og:image" content="http://www.ecopetit.cat/images/logo.png">

<meta name="robots" content="all">
	
<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php


$ExisteixFancybox = false;

if (isset($PublicaArticles))  {	
	$ExisteixFancybox = true;
	echo "<link rel='stylesheet' href='".base_url()."/fancybox/source/jquery.fancybox.css?v=2.1.5' type='text/css' media='screen' />";
}

?>

<link rel="stylesheet" type="text/css" href="<?php echo LAYOUT_URL;?>normalize.css">
<link rel="stylesheet" type="text/css" href="<?php echo LAYOUT_URL;?>font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo LAYOUT_URL;?>ecopetit.css">
<link rel="stylesheet" type="text/css" href="<?php echo LAYOUT_URL;?>pure.css">
<link rel="stylesheet" type="text/css" href="<?php echo LAYOUT_URL;?>responsive.css">

<link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="<?php echo LAYOUT_URL;?>normalize.css">
<link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="<?php echo LAYOUT_URL;?>font-awesome.min.css">
<link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="<?php echo LAYOUT_URL;?>ecopetit.css">
<link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="<?php echo LAYOUT_URL;?>pure.css">
<link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="<?php echo LAYOUT_URL;?>responsive.css">





<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo LAYOUT_URL;?>ie/ie8.css" media="screen" />
	<![endif]-->
	
<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?php echo IMAGES_URL;?>favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo IMAGES_URL;?>apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo IMAGES_URL;?>apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo IMAGES_URL;?>apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo IMAGES_URL;?>apple-touch-icon-144x144.png">
     
	<!-- Javascript Files
	================================================== -->
	
<?php
	//include("efecte_neu.php");	
	
	$LlistaJS = array("jquery-1.9.1.min.js",
		"jquery-migrate-1.1.1.min.js",
		"modernizr.custom.14583.js",
		"jquery.easing.min.js",		 
		"jquery.mobilemenu.js",
		"jquery.superfish.js",	     
	    "jquery.flexslider-min.js",
		"jquery.fitvids.js",
		"jflickrfeed.js",
		"animatescroll.js",
		"animatescroll.noeasing.js",
		"custom.js");
		
		foreach ($LlistaJS as $i => $value) {
			echo "<script type='text/javascript' src='".site_url("js/".$LlistaJS[$i])."'></script>" ;
		}
		

		if ($ExisteixFancybox == true) {
			$jsFancybox = base_url()."fancybox/source/jquery.fancybox.pack.js?v=2.1.5";
			
			echo "<script type='text/javascript' src='".$jsFancybox."'></script>" ;

		}
		
		



?>   
	     
	
	
	<!-- Custom -->
	
<script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-41729215-1']);
	_gaq.push(['_setDomainName', 'ecopetit.cat']);
	_gaq.push(['_trackPageview']);
	
	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

</script>

<title><?php echo $title; ?></title>


<?php
if ($ExisteixFancybox) {

	
	echo "<script type='text/javascript'>";
	echo "$(document).ready(function() {";
	echo "	$('.various').fancybox({";
	echo "		maxWidth	: 800,";
	echo "		maxHeight	: 700,";
	echo "		fitToView	: false,";
	echo "		width		: '80%',";
	echo "		height		: '80%',";
	echo "		autoSize	: false,";
	echo "		closeClick	: false,";
	echo "		openEffect	: 'none',";
	echo "		closeEffect	: 'none',";
	echo "		afterClose : function() {";
	echo "   location.reload();";
	echo "        return;";
	echo "    }";
	echo "	});";
	echo "});";
	echo "</script>";
	
}

?>

</head>

<?php

function NetejaLink($link) {

	$nouLink = $link;
	$nouLink = str_replace(" ","-", $nouLink);
	$nouLink = str_replace("+","", $nouLink);
	$nouLink = str_replace(",","", $nouLink);
	$nouLink = str_replace("'","", $nouLink);
	$nouLink = str_replace(array("á","à","â","ã","ª","ä"),"a",$nouLink);
	$nouLink = str_replace(array("Á","À","Â","Ã","Ä"),"A",$nouLink);
	$nouLink = str_replace(array("Í","Ì","Î","Ï"),"I",$nouLink);
	$nouLink = str_replace(array("í","ì","î","ï"),"i",$nouLink);
	$nouLink = str_replace(array("é","è","ê","ë"),"e",$nouLink);
	$nouLink = str_replace(array("É","È","Ê","Ë"),"E",$nouLink);
	$nouLink = str_replace(array("ó","ò","ô","õ","ö","º"),"o",$nouLink);
	$nouLink = str_replace(array("Ó","Ò","Ô","Õ","Ö"),"O",$nouLink);
	$nouLink = str_replace(array("ú","ù","û","ü"),"u",$nouLink);
	$nouLink = str_replace(array("Ú","Ù","Û","Ü"),"U",$nouLink);
	
	$nouLink = str_replace(array("[','^','´','`','¨','~',']"),"",$nouLink);


	$nouLink = str_replace("ç","c",$nouLink);
	$nouLink = str_replace("Ç","C",$nouLink);
	$nouLink = str_replace("ñ","n",$nouLink);
	$nouLink = str_replace("Ñ","N",$nouLink);
	$nouLink = str_replace("Ý","Y",$nouLink);
	$nouLink = str_replace("ý","y",$nouLink);

	$nouLink = urlencode($nouLink);

	return $nouLink;

}

?>