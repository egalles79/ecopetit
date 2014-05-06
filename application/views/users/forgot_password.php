

<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper" class="content-wrapper">
	<div class="container">		
		<div class="clearfix">
			<div class="grid_12">
				<h2><?=lang('user.titleForgot')?></h2>				
				<div class="clear"></div>
			</div>
		</div>
        
        <div class="clearfix">
			<div class="grid_8">
				<!-- Register Form -->
			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url());	?>  	
					<div class="w100 frame">
						<ul>
							<li class="info_req">
								<label for="identity"><?=lang('user.email');?></label>
                                
								<input type="text" id="identity" name="forgot_password_identity" value="" class="tooltip_trigger"/>
							</li>
							<li>
								<input type="submit" name="send_forgotten_password" id="submit" value="<?=lang('user.enviar');?>" class="link_button large"/>
								
							</li>
						</ul>
					</div>	
				<?php echo form_close();?>
			</div>
		</div>
	</div>	
</div>
