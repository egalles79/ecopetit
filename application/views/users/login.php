
<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper" class="content-wrapper">
	<div class="container">
		
		<div class="clearfix">
			<div class="grid_12">
				<h2><?=lang('user.titlelogin');?></h2>
			</div>
		</div>
				
		<div class="clearfix">
			<div class="grid_8">
				<!-- Login Form -->
                
                <?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
				<?php } ?>
            
							
				<?php echo form_open(current_url(), 'class="parallel"');?>  	
					<fieldset class="w50 parallel_target">
						<ul>
							<li>
								<label for="identity"><?=lang('user.email');?></label>
								<input type="text" id="identity" name="login_identity" class="tooltip_parent"/>
								
							</li>
							<li>
								<label for="password"><?=lang('user.pwd');?></label>
								<input type="password" id="password" name="login_password" />
							</li>
						<?php 
							# Below are 2 examples, the first shows how to implement 'reCaptcha' (By Google - http://www.google.com/recaptcha),
							# the second shows 'math_captcha' - a simple math question based captcha that is native to the flexi auth library. 
							# This example is setup to use reCaptcha by default, if using math_captcha, ensure the 'auth' controller and 'demo_auth_model' are updated.
						
							# reCAPTCHA Example
							# To activate reCAPTCHA, ensure the 'if' statement immediately below is uncommented and then comment out the math captcha 'if' statement further below.
			 				# You will also need to enable the recaptcha examples in 'controllers/auth.php', and 'models/demo_auth_model.php'.
							#/*
							if (isset($captcha)) 
							{ 
								echo "<li>\n";
								echo $captcha;
								echo "</li>\n";
							}
							#*/
							
							/* math_captcha Example
							# To activate math_captcha, ensure the 'if' statement immediately below is uncommented and then comment out the reCAPTCHA 'if' statement just above.
							# You will also need to enable the math_captcha examples in 'controllers/auth.php', and 'models/demo_auth_model.php'.
							if (isset($captcha))
							{
								echo "<li>\n";
								echo "<label for=\"captcha\">Captcha Question:</label>\n";
								echo $captcha.' = <input type="text" id="captcha" name="login_captcha" class="width_50"/>'."\n";
								echo "</li>\n";
							}
							#*/
						?>
							<li>
								<label for="remember_me"><?=lang('user.recorda');?></label>
								<input type="checkbox" id="remember_me" name="remember_me" value="1" <?php echo set_checkbox('remember_me', 1); ?>/>
							</li>
							<li>
								<input type="submit" name="login_user" id="submit" value="<?=lang('user.titlelogin');?>" class="link_button large"/>
							</li>							
							<li>
								<hr/>
								<a href="auth/forgotten_password"><?=lang('user.pwdoblidat');?></a>
							</li>
							<li>
								<a href="auth/resend_activation_token"><?=lang('user.reenviar');?></a>
							</li>
						</ul>
					</fieldset>
					
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>
	
	