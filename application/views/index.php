<?php
$idioma = $this->lang->lang();	
$urlBase = base_url().$idioma.'/'; 
?>
<section id="slider-main" class="slider">
	<div class="flexslider flexslider__nav-off loading">
		<ul class="slides">
			<li>
			
				<?php		
				$titol =lang('inici.titolImg1');
				
				echo img(array(
					'src' => 'images/foto_portada.jpg', 
					'width' => '980',
					'height' => '444',
					'alt' => $titol, 
					'title' => $titol));

				if ($idioma == "ca") 
						$url = $urlBase."Qui-som";
					else
						$url = $urlBase."Quien-somos";

				?>			
				<div class="flexslider-desc">
					<h2><?=lang('inici.titolImg1');?></h2>					
					<a href="<?php echo $url;?>" class="link" title="<?=lang('inici.SubtitolImg1');?>"><?=lang('inici.SubtitolImg1');?></a>
				</div>
			</li>
			<li>
				<?php	
				$titol =lang('inici.titolImg2');				
				echo img(array(
					'src' => 'images/foto_botiga.jpg', 
					'width' => '980',
					'height' => '444',
					'alt' => $titol, 
					'title' => $titol));

				if ($idioma == "ca") {
						$url = base_url().$idioma.'/'."Contacte";
					}
					else {
						$url = base_url().$idioma.'/'."Contacto";
					}
				?>	
				<div class="flexslider-desc">
					<h2><?=lang('inici.titolImg2');?></h2>
					<a href="<?php echo $url;?>" class="link" title="<?=lang('inici.SubtitolImg2');?>"><?=lang('inici.SubtitolImg2');?></a>
				</div>
			</li>
			<li>
				<?php		
				$titol =lang('inici.titolImg3');
				echo img(array(
					'src' => 'images/980x444_campanya_amic.jpg', 
					'width' => '980',
					'height' => '444',
					'alt' => $titol, 
					'title' => $titol));
				?>	
				<div class="flexslider-desc">
					<h2><?=lang('inici.titolImg3');?></h2>
					<a href="#" onclick="$('#promocio').animatescroll();" class="link" title="<?=lang('inici.SubtitolImg3');?>"><?=lang('inici.SubtitolImg3');?></a>
				</div>
			</li>
		</ul>
	</div>
</section>
<!-- Slider / End -->
<div id="content-wrapper" class="content-wrapper">
	<div class="container">
		<!-- Info Boxes -->
		<div class="clearfix">
			<div class="grid_4">
				<!-- Info Box -->
				<div class="info-box info-box__primary">
					<span class="info-box-num">
						<span class="info-box-num-inner">1</span>
					</span>
					<div class="inner-wrapper">
						<h2 class="info-box-title"><?=lang('inici.caixa1');?></h2>
						<div class="info-box-txt">
							<?=lang('inici.textCaixa1');?></div>
					</div>
				</div>
				<!-- Info Box / End -->
			</div>
			<div class="grid_4">
				<!-- Info Box -->
				<div class="info-box info-box__secondary">
					<span class="info-box-num">
						<span class="info-box-num-inner">2</span>
					</span>
					<div class="inner-wrapper">
						<h2 class="info-box-title"><?=lang('inici.caixa2');?></h2>
						<div class="info-box-txt">
							<?=lang('inici.textCaixa2');?></div>
					</div>
				</div>
				<!-- Info Box / End -->
			</div>
			<div class="grid_4">
				<!-- Info Box -->
				<div class="info-box info-box__tertiary">
					<span class="info-box-num">
						<span class="info-box-num-inner">3</span>
					</span>
					<div class="inner-wrapper">
						<h2 class="info-box-title"><?=lang('inici.caixa3');?></h2>
						<div class="info-box-txt">
							<?=lang('inici.textCaixa3');?></div>
					</div>
				</div>
				<!-- Info Box / End -->
			</div>
		</div>
        <!-- Primary Content / End -->
        
        <div class="spacer"></div>
        
        <!-- Secció promoció -->
        <div class="clearfix">
			<div id="promocio">
				<div class="clearfix">
					<div class="grid_11 mobile-nomargin">
						<h2><?=lang('inici.promo_titol');?></h2>
					</div>
				</div>
		
				<div class="portfolio clearfix grid_12">					
					 <div class="ico-box ico-box__primary">
					 	<h3><?=lang('inici.promo_subtitol1');?></h3>										
						<p><?=lang('inici.promo_contingut1');?></p>                                
						<h3><?=lang('inici.promo_subtitol2');?></h3>
						<p><?=lang('inici.promo_contingut2');?></p>
						<h3><?=lang('inici.promo_subtitol3');?></h3>
						<p><?=lang('inici.promo_contingut3');?></p>
						<h3><?=lang('inici.promo_subtitol4');?></h3>
						<p><?=lang('inici.promo_contingut4');?></p>
						<p><?=lang('inici.promo_contingut5');?></p>                               
						   
					</div>						
				</div>
			</div>
        </div>
        
        <!-- Tertiary Content -->
		<div class="clearfix">
			<div class="clearfix">
				<div class="grid_12 mobile-nomargin">
					<h2>
						<?=lang('inici.ProductesDestacats');?></h2>
				</div>
			</div>
		
			<!-- Portfolio 4 cols  -->
			<div class="portfolio portfolio__4cols clearfix">

				<?php
				
				
				$idioma = $this->lang->lang();		
				$urlBase = base_url().$idioma.'/';

				
			
				foreach ($ProductesDestacats as $article) 
				{
					//$urlArticle = "FitxaProducte.php?idArticle=".$article['idArticle']; 
					
					/*if ($article['nou_sn'] == "S") {
						if ($idioma == "es") {
							$aux = "Productos-nuevos/";
						} else {
							$aux = "Productes-nous/";
						}
					} else {
						if ($idioma == "es") {
							$aux = "Productos-seminuevos/";
						} else {
							$aux = "Productes-seminous/";
						}

					}*/

					$urlArticle = $urlBase.$article['idArticle']."/".netejaLink($article['titol_web']);
					
					
					$urlImatge = "http://www.ecopetit.cat/images/productes/210x152/".$article['idFoto'];
					$titolArticle = $article['titol_web'];
					$PVPActual = $article['PreuVendaActual'];
					$PreuVenda = $article['PreuVenda'];

					$style="";


					if (strlen($titolArticle)>27) {
						$style="style='font-size:10px'";
					}

					if (strlen($titolArticle)>39) {
						$style="style='font-size:9px'";
					}
					
				?>
				
                    <div class="grid_3 portfolio-item" style="height: 296px;">
                        <figure class="thumb thumb__hovered">							
                            <a href="<?php echo $urlArticle;?>">
                                <img src="<?php echo $urlImatge;?>" height='152' alt="<?php echo $titolArticle;?>">
                            </a>
                        </figure>
                    	<!-- inici info article -->
                        <div class="item-info">
                            <h5 class="name" <?php echo $style;?>>
                                <i class="fa fa-gift"></i><?php echo $titolArticle;?>
                            </h5>
                            <!-- inici preus -->
                            <div class="rate">
                                <?php
                    
                                if ( $PVPActual != 0 ) {
                                    echo "<span class='preuAntic'>";
                                    echo stripslashes($PVPActual)."€";
                                    echo "</span>&nbsp;&nbsp;";
                                    
                                }
                                ?>
                                <span class="preuNou">
                                    <?php echo stripslashes($PreuVenda);?>€
                                </span>
                                <p class="estalvi">
                                    <?php
                                    if ( $PVPActual != 0 ) {
                                        $estalvi = ($PVPActual - $PreuVenda) / $PVPActual;                                                
                                        $estalvi = round($estalvi * 100,0);
                                        ?>
                                        <?=lang('productes.estalviat');?>
                                        <?php echo $estalvi." %";
                                    } else {
                                        echo "&nbsp;";                                            
                                    }
                                    ?>
                                 </p>							
                            </div>
                            <!-- fi preus -->
                        </div>
                        <!-- fi info article -->
                        <!-- inici descripció article -->


<!--
                        <div class="excerpt">
                            <?php     

                            $contingut = $article['contingut_web'];
                            $contingut = substr($contingut,0,50);

                            $linies = explode("\n", $contingut);
                            $str_linea="";
                            foreach ($linies as $linea)
                            {
                                $str_linea .= "<p class='liniesProducte'>".$linea."</p>";                                        
                            };
                            echo stripslashes($str_linea);
                            ?>
                        </div>
                         fi descripció article -->

                        <a href="<?php echo $urlArticle;?>" class="button">
							<?=lang('productes.veure');?>
                        </a>
                    </div>
                    <?php								
                        
                      }
				?>

			</div>
		</div> 										
		<!-- Tertiary Content / End -->

        <!-- Secondary Content -->
		<div class="clearfix">
			<div class="grid_4">
				<h2><?=lang('inici.titolResum1');?></h2>
				<p class="lead"><?=lang('inici.textResum1');?></p>
				
				<p><?=lang('inici.textResum1b');?></p>
                <p><?=lang('inici.textResum1c');?></p>      

				<?php

                if ($idioma == "ca") 
						$url = base_url().$idioma.'/'."Qui-som";
					else
						$url = base_url().$idioma.'/'."Quien-somos";
				?>

				<a href="<?php echo $url;?>" class="button"><?=lang('inici.llegeix');?></a>
			</div>
			<div class="grid_4">
				<h2><?=lang('inici.titolResum2');?></h2>
				<h4 class="rosa"><?=lang('comfuncionem.titol2'); ?></h4>
				<p><?=lang('inici.textResum2'); ?>	</p>
				<h4 class="rosa"><?=lang('comfuncionem.titol3'); ?></h4>
				<p><?=lang('inici.textResum2b'); ?>	</p>

				<?php

                if ($idioma == "ca") 
						$url = base_url().$idioma.'/'."Com-funcionem";
					else
						$url = base_url().$idioma.'/'."Funcionamiento";
				?>

                <a href="<?php echo $url;?>" class="button"><?=lang('inici.llegeix');?></a>
			
			</div>
			<div class="grid_4">
				<h2><?=lang('inici.titolResum3');?></h2>
                <?php
				echo "<ul class='contact-info'>";
				echo "<li><i class='fa fa-map-marker'></i>".lang('contacte.adressa')." Ronda Mossèn Jacint Verdaguer, 13  08304 Mataró (Barcelona)";
				echo "</li><li>";
				echo "<i class='fa fa-phone'></i>".lang('contacte.telefon')." 937412496 - 628988917";
				echo "</li><li>";
				echo "<i class='fa fa-envelope'></i><strong>Email: </strong><a href='mailto:info@ecopetit.cat'>info@ecopetit.cat</a>";
				echo "</li><li>";
				echo "<i class='fa fa-globe'></i><strong>Web: </strong><a href='http://www.ecopetit.cat'>www.ecopetit.cat</a>";
				echo "</li><li>";
				echo "<i class='fa fa-time'></i>".lang('contacte.horari');
				echo "</li></ul>";



                if ($idioma == "ca") 
						$url = base_url().$idioma.'/'."Contacte";
					else
						$url = base_url().$idioma.'/'."Contacto";
				?>
				
                <a href="<?php echo $url;?>" class="button"><?=lang('inici.llegeix');?></a>
			</div>
		</div>
		<!-- Secondary Content / End -->
	</div>
</div>