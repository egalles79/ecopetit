<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper" class="content-wrapper">
	<div class="container">
		
                    
            <?php 
                
        if (isset($_GET['opcio'])) {
            $opcio = $_GET['opcio'];
        }
        else {
            $opcio = 1;
        }       

        ?>        
                    
                    
        
        
		<div class="clearfix">
			<div class="grid_12">
				<h2><?=lang('user.opcio'.$opcio);?></h2>
				
				<div class="clear"></div>
			</div>
		</div>
       
      
        
		
        <!-- Part central -->
        <div class="content grid_12" id="content">

            <?php

            
			if ($opcio == 1) {				
	            $this->load->view('users/publicar_articles');
			} 
			
			if ($opcio == 2) {
				$this->load->view('users/fitxer_pla');
			}
			if ($opcio == 3) {
				$this->load->view('users/blog');
			}
			
            ?>
                        
                
        </div>
    </div>
</div>