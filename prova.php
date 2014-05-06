<?php


$str = "<b>Ecopetit</b> és una empresa que vol apropar les famílies a un consum més <b>sostenible</b>. Portar un estil de vida sostenible és l'opció més lògica";


	$params = func_get_args();

	for ($i = 1, $count = count($params); $i < $count; $i++) 
	{
	$str = preg_replace('/<' . $params[$i] . '\b[^>]*>/i', '', $str);
	$str = preg_replace('/<\/' . $params[$i] . '[^>]*>/i', '', $str);
	}
	echo $str; 
	
	
	
?>