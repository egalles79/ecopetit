<?php
$idioma = $this->lang->lang();	
$urlBase = base_url().$idioma.'/';
?>


<footer id="footer" class="footer">
		<!-- Footer Widgets -->
		<div class="widgets-footer">
			<div class="container clearfix">				
				<div class="grid_3">
					<!-- Newsletter Widget -->
					<div class="newsletter-widget widget widget__footer">
						<h3 class="widget-title">Newsletter</h3>
						<div class="widget-content">
							<p><?=lang('footer.informacion');?></p>
							<!-- Search Form -->

							<?php
							$url = base_url().$idioma.'/newsletter';
							?>

							<form action="<?php echo $url; ?>" id="newsletter-form" class="inline-form inline-form__footer" method="post">
								<input type="text" name="search-text" id="newsletter-text" placeholder="<?=lang('footer.email');?>">
								<div class="submit-wrapper">
									<input type="submit" value="<?=lang('footer.envia');?>">
								</div>
							</form>
							<!-- Search Form / End -->
						</div>
					</div>
					<!-- /Newsletter Widget -->
				</div>
                
                <div class="grid_5">
                    <!-- Tags Widget -->
                    <div class="tagcloud widget widget__footer">
                        <div class="widget-content">
                        <a class="twitter-timeline" href="https://twitter.com/ecopetit" data-widget-id="403123976882225152">Tweets</a>
				<script>
					!function(d,s,id)
					{
						var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
						if(!d.getElementById(id))
						{
							js=d.createElement(s);
							js.id=id;
							js.src=p+"://platform.twitter.com/widgets.js";
							fjs.parentNode.insertBefore(js,fjs);
						}
					}
					(document,"script","twitter-wjs");
                </script>
                        </div>
                    </div>
                    <!-- /Tags Widget -->
                </div>
                <div class="grid_3">
					<!-- Tags Widget -->
                    <div class="tagcloud widget widget__footer">
                    	<h3 class="widget-title"><?=lang('footer.quebusques');?></h3>
                    	<div class="widget-content">
                    		<?php
							
											
							

							if ($idioma == "ca") {
								$url = $urlBase."Productes-seminous/";
							}
							else {
								$url = $urlBase."Productos-seminuevos/";
							}
								
							foreach ($categoriesSemiNoves as $categoria) {
								$NomCategoria = $categoria['NomCategoria'];	
								$urlCategoria = $url.$categoria['idCategoria']."/".str_replace(" ","-",$NomCategoria);

													
								echo "<a href='".$urlCategoria."' title='".$NomCategoria."'>";
								echo $NomCategoria."</a>";
							}
                                                       
                            ?>
                                                  
                    
                    	</div>
                    </div>
                	<!-- /Tags Widget -->
                </div> 
			</div>
		</div>
		<!-- /Footer Widgets -->
	
		<!-- Copyright -->
		<div class="copyright">
			<div class="container clearfix">
				<div class="grid_12 mobile-nomargin">
					<div class="clearfix">
						<div class="copyright-secondary">
							COPYRIGHT © ECOPETIT <?php echo date('Y')." ";?><?=lang('footer.drets');?><span class="separator">|</span>

							<?php
							if ($idioma == "ca") {
								$url = $urlBase."Privacitat";
							}
							else {
								$url = $urlBase."Privacidad/";
							}
							?>


							<a href="<?php echo $url;?>"><?=lang('footer.privacitat');?></a>                                                
						</div>                    
					</div>
				</div>
			</div>
		</div>
		<!-- /Copyright -->
	</footer>
</div>
</div>
<!-- END FOOTER -->	
	</body>
</html>