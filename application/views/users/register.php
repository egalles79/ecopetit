

<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper" class="content-wrapper">
	<div class="container">		
		<div class="clearfix">
			<div class="grid_12">
				<h2><?=lang('user.titleRegister')?></h2>
				
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
				
				<?php echo form_open(current_url()); ?>  	

						<ul>
							<li class="info_req">
								<label for="first_name"><?=lang('user.nom');?></label>
								<input type="text" id="first_name" name="register_first_name" value="<?php echo set_value('register_first_name');?>"/>
							</li>
							<li class="info_req">
								<label for="last_name"><?=lang('user.cognoms');?></label>
								<input type="text" id="last_name" name="register_last_name" value="<?php echo set_value('register_last_name');?>"/>
							</li>
						</ul>
					
						<ul>
							<li>
								<label for="newsletter"><?=lang('user.newsletter');?></label>
								<input type="checkbox" id="newsletter" name="register_newsletter" value="1" <?php echo set_checkbox('register_newsletter',1);?>/>
							</li>
						</ul>
					
						<ul>
							<li class="info_req">
								<label for="email_address"><?=lang('user.regEmail');?></label>
								<input type="text" id="email_address" name="register_email_address" value="<?php echo set_value('register_email_address');?>" class="tooltip_trigger"										
								/>
							</li>
							<li class="info_req">
								<label for="username"><?=lang('user.regUsername');?></label>
								<input type="text" id="username" name="register_username" value="<?php echo set_value('register_username');?>" class="tooltip_trigger"									
								/>
							</li>
							<li>		
                            	<small>
									<?=lang('user.longPwd');?>
									<?php echo $this->flexi_auth->min_password_length(); ?>
									<?=lang('user.longPwd2');?><br/>
                                    <?=lang('user.charPwd');?>
								</small>
							</li>
							<li class="info_req">
								<label for="password"><?=lang('user.pwd');?></label>
								<input type="password" id="password" name="register_password" value="<?php echo set_value('register_password');?>"/>
							</li>
							<li class="info_req">
								<label for="confirm_password"><?=lang('user.confpwd');?></label>
								<input type="password" id="confirm_password" name="register_confirm_password" value="<?php echo set_value('register_confirm_password');?>"/>
							</li>
						</ul>
					
						<ul>
							
							<li>
								<hr/>
								<input type="submit" name="register_user" id="submit" value="<?=lang('user.register');?>" class="link_button large"/>
							</li>
						</ul>
					
				<?php echo form_close();?>
			</div>
		</div>
	</div>	
</div>
