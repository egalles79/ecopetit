
<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper" class="content-wrapper">
	<div class="container">
		
		<div class="clearfix">
			<div class="grid_12">
				<h2><?=lang('user.CanviaPwd');?></h2>
			</div>
		</div>

		<div class="clearfix">
			<div class="grid_8">
				<?php
				$idioma = $this->lang->lang();  
				$url = base_url().$idioma.'/';

				echo "<a href='".$url."auth_public/update_account'>".lang('user.titlePerfil')."</a>";

				if (! empty($message)) { ?>
					<div id="message">
						<?php echo $message; ?>
					</div>
				<?php } ?>
				
				<?php 

				echo form_open(current_url());	?>  	
					<div class="w100 frame">
						<ul>
							<li>
								<small>
									<?=lang('user.longPwd');?>
									<?php echo $this->flexi_auth->min_password_length(); ?>
									<?=lang('user.longPwd2');?><br/>
                                    <?=lang('user.charPwd');?>
								</small>
							</li>
							<li class="info_req">
								<label for="current_password"><?=lang('user.PwdActual');?></label>
								<input type="password" id="current_password" name="current_password" value="<?php echo set_value('current_password');?>"/>
							</li>
							<li class="info_req">
								<label for="new_password"><?=lang('user.PwdNova');?></label>
								<input type="password" id="new_password" name="new_password" value="<?php echo set_value('new_password');?>"/>
							</li>
							<li class="info_req">
								<label for="confirm_new_password"><?=lang('user.PwdNova2');?></label>
								<input type="password" id="confirm_new_password" name="confirm_new_password" value="<?php echo set_value('confirm_new_password');?>"/>
							</li>
							<li>
								<input type="submit" name="change_password" id="submit" value="<?=lang('user.ActualitzarPwd');?>" class="link_button large"/>
							</li>
						</ul>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>	
</div>