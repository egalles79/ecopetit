
	
		 <!-- Main Navigation -->
		<div class="container clearfix">
			<div class="grid_12 mobile-nomargin">
				<nav class="primary clearfix">
					<!-- Menu -->
					<ul class="sf-menu">

<?php

$idioma = $this->lang->lang();
							$urlBase = base_url().$idioma."/";

?>

						<li <?php 
							$url = $urlBase."admin/fitxerPla";
							 ?>
							><a href="<?php echo $url;?>" title="<?=lang('user.opcio2');?>"><?=lang('user.opcio2');?></a></li>	
						 						<!--<li <?php 

							
							$selected = "class='current-menu-item'";
							$url = $urlBase."admin/articles";
							 ?>
							><a href="<?php echo $url;?>" title="<?=lang('user.opcio1');?>"><?=lang('user.opcio1');?></a></li>-->                    
						<!--<li <?php 
							$url = $urlBase."admin/blog";
							 ?>
							><a href="<?php echo $url;?>" title="<?=lang('user.opcio3');?>"><?=lang('user.opcio3');?></a></li>	-->
													
					</ul>
					<!-- Menu / End -->				
					
				</nav>
			</div>
		</div>
		<!-- Main Navigation / End -->
		</header>
		<!-- END HEADER -->