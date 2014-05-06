<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper" class="content-wrapper">
	<div class="container">					
		<div class="clearfix">
			<div class="grid_12 mobile-nomargin">
				<h2>
				<?php 
				if (is_null($Nom_ca)) 
				{
					echo $title;
				}
				else 
				{

					$idioma = $this->lang->lang();	

					if ($idioma == "es") 
					{
						echo stripslashes($Nom_es);
					}
					else 
					{
						echo stripslashes($Nom_ca);
					}
					
				}
				
				?></h2>
			</div>
		</div>
		
		<?php
		if ($idCategoria == 10 && $nou == "S") {					
		//Només per regals
		?>
		<div class="clearfix">
			<div class="grid_12">
			<!-- Icon Box -->
				<div class="ico-box ico-box__primary">
					<div class="ico-holder">
                    <?php
                    echo img('http://www.ecopetit.cat/images/icon bolquer 55x55.png');
					?>
                    </div>
					<h3><?=lang('productes.subtitol1');?></h3>
						<?=lang('productes.contingut1');?>
				</div>						
				<!-- Icon Box / End -->                            
				
				<div class="clear"></div>				
			</div>
	   </div>
	   <div class="spacer"></div>
	   <?php
	   }
	   ?>
		<!-- Portfolio 4 cols -->
		<div class="portfolio portfolio__2cols clearfix">
        	<!-- repeat-->
            						
			<?php	

			$idioma = $this->lang->lang();		
			$urlBase = base_url().$idioma.'/';

			
			foreach($result as $productes) {
			
								
			?>
			<div class="grid_6 portfolio-item" style="height: 178px;">
				<?php 
				

				$url = $urlBase.$productes['idArticle']."/".NetejaLink($productes['titol']);


				?>

				

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
						echo "&nbsp;&nbsp;";
						
						echo img(array(
							'src' => 'http://www.ecopetit.cat/images/outlet.png', 
							'alt' => 'Outlet', 
							'title' => 'Outlet'));
				
					
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
</div>
<!-- END CONTENT WRAPPER -->




