<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper" class="content-wrapper">
    <div class="container">
        <!-- Services -->
        <div class="clearfix">
            <div class="grid_11 mobile-nomargin">
                <h2><?=lang('comfuncionem.titol1');?></h2>
            </div>
        </div>
                            
        <div class="clearfix">
            <div class="grid_12">
                <!-- Icon Box -->
                <div class="ico-box ico-box__primary">
                    <div class="ico-holder">                    
                    <?php		
					$titol =lang('comfuncionem.titol2');
					echo img(array(
						'src' => 'images/icon%20eurus%2055x55.png', 
						'alt' => $titol, 
						'title' => $titol));
					?>	
                    </div>
                    <h3><?=lang('comfuncionem.titol2'); ?></h3>
                        <?=lang('comfuncionem.contingut1'); ?>		
                </div>						
                <!-- Icon Box / End -->
                <br /><br />
                <!-- Icon Box -->
                <div class="ico-box ico-box__secondary">
                    <div class="ico-holder">
                    <?php		
					$titol =lang('comfuncionem.titol3');
					echo img(array(
						'src' => 'images/icon%2050percent%2055x55.png', 
						'alt' => $titol, 
						'title' => $titol));
					?>	                    
                    
                    </div>
                    <h3><?=lang('comfuncionem.titol3'); ?></h3>
                        <?=lang('comfuncionem.contingut2');?>	
                </div>							
                <!-- Icon Box / End -->
            </div>						
        </div>                    					
    </div>
</div>
<!-- END CONTENT WRAPPER -->		
