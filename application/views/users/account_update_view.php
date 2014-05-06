
<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper" class="content-wrapper">
	<div class="container">
		
		<div class="clearfix">
			<div class="grid_12">
				<h2><?=lang('user.titlePerfil');?></h2>
			</div>
		</div>

		<div class="clearfix">
			<div class="grid_8">
				<?php
				$idioma = $this->lang->lang();  
				$url = base_url().$idioma.'/';

				echo "<a href='".$url."auth_public/change_password'>".lang('user.CanviaPwd')."</a>";
				
				if (! empty($message)) { ?>
					<div id="message">
						<?php echo $message; ?>
					</div>
				<?php } ?>


				<?php 

				echo form_open(current_url());	?>  	
							<ul>
								<li class="info_req">
									<label for="first_name"><?=lang('user.nom');?></label>
									<input type="text" id="first_name" name="update_first_name" value="<?php echo set_value('update_first_name',$user['upro_first_name']);?>"/>
								</li>
								<li class="info_req">
									<label for="last_name"><?=lang('user.cognoms');?></label>
									<input type="text" id="last_name" name="update_last_name" value="<?php echo set_value('update_last_name',$user['upro_last_name']);?>"/>
								</li>
								<li>
									<?php $newsletter = ($user['upro_newsletter'] == 1) ;?>
									<label for="newsletter"><?=lang('user.newsletter');?></label>
									<input type="checkbox" id="newsletter" name="update_newsletter" value="1" <?php echo set_checkbox('update_newsletter',1,$newsletter); ?>/>
								</li>
								<li class="info_req">
									<label><?=lang('user.regEmail');?></label>
									<input type="text" id="email" name="update_email" value="<?php echo set_value('update_email',$user[$this->flexi_auth->db_column('user_acc', 'email')]);?>" class="tooltip_trigger"
										title="Set an email address that can be used to login with."
									/>
									
								</li>
								<li>
									<label for="username"><?=lang('user.regUsername');?></label>
									<input type="text" id="username" name="update_username" value="<?php echo set_value('update_username',$user[$this->flexi_auth->db_column('user_acc', 'username')]);?>" class="tooltip_trigger"
										title="Set a username that can be used to login with."
									/>
								</li>
								
							</ul>
							<ul>
								<li>
									<input type="submit" name="update_account" id="submit" value="<?=lang('user.actualizar');?>" class="link_button large"/>
								</li>
							</ul>
						
				<?php echo form_close();?>

			</div>
		</div>
	</div>
</div>