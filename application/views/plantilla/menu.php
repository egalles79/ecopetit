		 <!-- Main Navigation -->
		<div class="container clearfix">
			<div class="grid_12 mobile-nomargin">
				<nav class="primary clearfix">
					<!-- Menu -->
					<ul class="sf-menu" id="menu">
                    
                    <?php
					$idioma = $this->lang->lang();	
					$urlBase = base_url().$idioma.'/';
					$urlActual = $_SERVER["REQUEST_URI"];
					$selected = "class='current-menu-item'";
					
					
				
					
					
					//INICI
					if ($idioma == "ca") 
						$url = $urlBase."Inici";
					else
						$url = $urlBase."Inicio";

					$titol = lang('menu.inici');
					
					if (stristr($urlActual,'Inici') || stristr($urlActual,'Inicio') || $urlActual=="/")			
						echo "<li ".$selected.">";
					else
						echo "<li>";						
					
					echo "<a href='".$url."' title='".$titol."'>".$titol."</a></li>";
							
							
					//QUI SOM
					if ($idioma == "ca") 
						$url = $urlBase."Qui-som";
					else
						$url = $urlBase."Quien-somos";
					
					$titol = lang('menu.quisom');
					
					
					if (stristr($urlActual,'Qui-som') || stristr($urlActual,'Quien-somos'))
						echo "<li ".$selected.">";
					else
						echo "<li>";						
					
					echo "<a href='".$url."' title='".$titol."'>".$titol."</a></li>";
					
					
					//COM FUNCIONEM
					if ($idioma == "ca") 
						$url = $urlBase."Com-funcionem";
					else
						$url = $urlBase."Funcionamiento";
					
					$titol = lang('menu.comfuncionem');
					
					if (stristr($urlActual,'Com-funcionem') || stristr($urlActual,'Funcionamiento'))
						echo "<li ".$selected.">";
					else
						echo "<li>";						
					
					echo "<a href='".$url."' title='".$titol."'>".$titol."</a></li>";
					
					
					//PRODUCTES NOUS
					if ($idioma == "ca") {
						$url = $urlBase."Productes-nous/";
					}
					else {
						$url = $urlBase."Productos-nuevos/";
					}
					
					$titol = lang('menu.productesnous');
					
					if (stristr($urlActual,'Productes-nous')||stristr($urlActual,'Productos-nuevos'))
						echo "<li ".$selected.">";
					else
						echo "<li>";						
					
					echo "<a href='".$url."' class='sf-with-ul' title='".$titol."'>".$titol."</a>";
					
					
					echo "<ul style='display:none' class='sub-menu'>";
					
									
							
						foreach ($categoriesNoves as $categoria) {
							$classCategoria = "";
							$NomCategoria = $categoria['NomCategoria'];

							$urlCategoria = $url.$categoria['idCategoria']."/".NetejaLink($NomCategoria);

							echo "<li ".$classCategoria."><a href='".$urlCategoria."' title='".$NomCategoria."'>";
							echo $NomCategoria."</a></li>";
	
						}
						echo "</ul>";
 
						
					echo "</li>";



					//PRODUCTES SEMINOUS
					//$url = $urlBase."productesSeminous";
					if ($idioma == "ca") {
						$url = $urlBase."Productes-seminous/";
					}
					else {
						$url = $urlBase."Productos-seminuevos/";
					}
					$titol = lang('menu.productesseminous');
					
					if (stristr($urlActual,'Productes-seminous')||stristr($urlActual,'Productos-seminuevos'))
						echo "<li ".$selected.">";
					else
						echo "<li>";						
					
					echo "<a href='".$url."' class='sf-with-ul' title='".$titol."'>".$titol."</a>";
					
					echo "<ul style='display:none' class='sub-menu'>";
									
							
						foreach ($categoriesSemiNoves as $categoria) {
							$classCategoria = "";
							$NomCategoria = $categoria['NomCategoria'];
							
							$urlCategoria = $url.$categoria['idCategoria']."/".NetejaLink($NomCategoria);

							echo "<li ".$classCategoria."><a href='".$urlCategoria."' title='".$NomCategoria."'>";
							echo $NomCategoria."</a></li>";
	
						}
						echo "</ul>";
 
						
					echo "</li>";
					

					//CONTACTE
					if ($idioma == "ca") {
						$url = $urlBase."Contacte";
					}
					else {
						$url = $urlBase."Contacto";
					}
					$titol = lang('menu.contacte');
					
					if (stristr($urlActual,'Contacte') || stristr($urlActual,'Contacto'))
						echo "<li ".$selected.">";
					else
						echo "<li>";						
					
					echo "<a href='".$url."' title='".$titol."'>".$titol."</a></li>";
					
					?>                              
										
					</ul>
					<!-- Menu / End -->				
					
				</nav>
			</div>

			<div class="breadcrumb">    
		    	<?php echo set_breadcrumb(); ?>
		    </div>


		</div>

		
		<!-- Main Navigation / End -->
		</header>
		<!-- END HEADER -->