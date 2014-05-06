<?php
include("header.php");
?>

	<!-- BEGIN WRAPPER -->
	<div id="wrapper">    
    	<div id="top-bar" class="top-bar">
			<div class="container clearfix">
				<div class="grid_12 mobile-nomargin">					
				</div>
			</div>
		</div>

        <div class="main-box">
		
			<?php
			include("capsalera.php");				
			?>
			<!-- BEGIN CONTENT WRAPPER -->
			<div id="content-wrapper" class="content-wrapper">
				<div class="container">
                	<!-- Services -->
                    <div class="clearfix">
						<div class="grid_11 mobile-nomargin">							
						</div>
					</div>
                                        
                    <div class="clearfix">
						<div class="grid_12">
							<!-- Icon Box -->
                            <div class="ico-box ico-box__primary">
                                <div><img src="images/qui som 292x219.jpg" width="100" class="alignleft"></div>
								
								<br><br>
                                
                                    <?php

							include "mailing.class.php";
							
							
							$email = $_POST['search-text'];
							//$email = $_GET['email'];
							
							$objMailing = new Mailing();
							
							$regExisteix = mysql_fetch_array($objMailing->comprova($email));
							
							
							
							if ($regExisteix==true) {
								echo $textFooter['jaregistrat'];
							}
							else {
								$objMailing->inserta($email);
								
								echo $textFooter['gracies'];
							}	
						
							
							
							
							?>
                            </div>						
							
						</div>						
					</div>                    					
				</div>
			</div>
			<!-- END CONTENT WRAPPER -->	
			
			
			
			
						<?php
			include("footer.php");
			?>
		</div>
	
	





</body>
</html>

