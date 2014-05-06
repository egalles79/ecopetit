
	
	<!-- BEGIN CONTENT WRAPPER -->
			<div id="content-wrapper" class="content-wrapper">
				<div class="container">					
					<div class="clearfix">
						<div class="grid_12 mobile-nomargin">
							<h2><?php //echo stripslashes($nomCategoria);
							?></h2>
						</div>
					</div>
				
					<!-- Portfolio 4 cols -->
					<div class="portfolio portfolio__2cols clearfix">
                    	<!-- repeat-->
                        						
						<?php		
				
						
						
						
						foreach($result as $productes) {
						
											
						?>
						<div class="grid_6 portfolio-item">
							<?php 
							//$url = 'FitxaRegal.php?idArticle='.$regal['idArticle']; 
							$url = 'FitxaProducte.php?idArticle='.$productes['idArticle']; ?>
							<figure class="thumb thumb__hovered">
                            <?php
                            echo "<a href='".stripslashes($url)."' >";
							
							
                            
                            echo img(array(
								'src' => 'http://www.ecopetit.cat/images/productes/210x152/'.$productes['foto'], 
								'height' => '152',
								'alt' => $productes['titol'], 
								'title' => $productes['titol']));
                            ?>
                            </a></figure>	
							<div class="item-info">								
								<h5 class="name"><i class="fa fa-gift"></i>
								<?php echo stripslashes($productes['titol']);?></h5>
								<div class="rate">								
								<?php 
								
								if ( $productes['PreuVendaActual'] != 0 ) {
								echo "<span class='preuAntic'>";								
								echo stripslashes($productes['PreuVendaActual'])."€";
								echo "</span>&nbsp;&nbsp;";
								}
								echo "<span class='preuNou'>".stripslashes($productes['PreuVenda'])."€</span>";
								if ($productes['outlet'] == "S") {
										echo "&nbsp;&nbsp;<img src='images/outlet.png' alt='Outlet'>";
									}
								?></div>
							</div>	
                            <div class="excerpt">
                            	<?php 
								
								$linies = explode("\n", $productes['contingut']);
								$str_linea="";
								foreach ($linies as $linea)
								{
									$str_linea .= "<p class='liniesProducte'>".$linea."</p>";
								
								};
								echo stripslashes($str_linea);
								
								
								?>
                            </div>
                            						
                            <?php echo stripslashes("<a href='".$url."' class='button'>".lang('productes.veure')."</a>");?>
						</div>
                        <?php }
						
						?>
						
						
                        <!--  end repeat -->
						
					</div>
					<!-- Portfolio 4 cols / End -->
					
			</div>
			<!-- END CONTENT WRAPPER -->




