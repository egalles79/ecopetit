<?php

$arrDirectori = array("210x152","88x88");
$arrAltura = array(210, 88);
$arrAmplada = array(152, 88);

$numarr = count($arrDirectori);
for ($i=0;$i<$numarr;$i++) {





	$Ruta = "images/productes/".$arrDirectori[$i]."/";
	
	var_dump($Ruta);


	$directorio = opendir($Ruta); //ruta actual
	while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
	{
		if (is_dir($archivo))//verificamos si es o no un directorio
		{
			echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
		}
		else
		{
		
			//Se define el maximo ancho o alto que tendra la imagen final
			$max_ancho = $arrAltura[$i];
			$max_alto = $arrAmplada[$i];
		
			$rutaImagenOriginal = $Ruta.$archivo;
		
			list($ancho,$alto)=getimagesize($rutaImagenOriginal);
		
			//echo $archivo . " (Ancho: ".$ancho." - Alto: ".$alto.") <br />";
			
			if ($alto != $max_alto && $alto != 0) {
			
				echo "Redimensionant imatge ".$archivo."<br />";
			
				//Creamos una variable imagen a partir de la imagen original
				$img_original = imagecreatefromjpeg($rutaImagenOriginal);
				
				//Se calcula ancho y alto de la imagen final
				$x_ratio = $max_ancho / $ancho;
				$y_ratio = $max_alto / $alto;
				
				
				//Si el ancho y el alto de la imagen no superan los maximos, 
				//ancho final y alto final son los que tiene actualmente
				if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
					$ancho_final = $ancho;
					$alto_final = $alto;
				}
				/*
				 * si proporcion horizontal*alto mayor que el alto maximo,
				 * alto final es alto por la proporcion horizontal
				 * es decir, le quitamos al alto, la misma proporcion que 
				 * le quitamos al alto
				 * 
				*/
				elseif (($x_ratio * $alto) < $max_alto){
					$alto_final = ceil($x_ratio * $alto);
					$ancho_final = $max_ancho;
				}
				/*
				 * Igual que antes pero a la inversa
				*/
				else{
					$ancho_final = ceil($y_ratio * $ancho);
					$alto_final = $max_alto;
				}
				
				
				//Creamos una imagen en blanco de tamaño $ancho_final  por $alto_final .
				$tmp=imagecreatetruecolor($ancho_final,$alto_final);	
				
				//Copiamos $img_original sobre la imagen que acabamos de crear en blanco ($tmp)
				imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
				
				//Se destruye variable $img_original para liberar memoria
				imagedestroy($img_original);
				
				//Definimos la calidad de la imagen final
				$calidad=100;
				
				//Se crea la imagen final en el directorio indicado
				imagejpeg($tmp,$rutaImagenOriginal,$calidad);
			
			}
		}
	}
}

?>