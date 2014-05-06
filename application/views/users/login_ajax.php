<script>
	// Hide content onload, prevents JS flicker
	document.body.className += ' js-enabled';
</script>

<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper" class="content-wrapper">
	<div class="container">
		
		<div class="clearfix">
			<div class="grid_12">
				<h2>
				<?=lang('user.titlelogin');?></h2>
				
				<div class="clear"></div>
			</div>
		</div>
		
		
		<div class="clearfix">
			<div class="grid_8">
				<!-- Login Form -->
				
				<div id="message" style="display:none;">
					<p class="error_msg">Your submitted login details are incorrect.</p>
				</div>
				
				<?php echo form_open(current_url());?> 
					<fieldset class="w100">
						<div class="clearfix">
							<div class="grid_8 alpha">						
									<div class="field">
										<label for="identity"><?=lang('user.email');?></label>
										<input type="text" id="identity" name="login_identity"  class="tooltip_parent"/>
									</div>
									<div class="field">
										<label for="password"><?=lang('user.pwd');?></label>
										<input type="password" id="password" name="login_password"  />
									</div>
									<div class="field">
										<label for="remember_me"><?=lang('user.recorda');?></label>
										<input type="checkbox" id="remember_me" name="remember_me" value="1" <?php echo set_checkbox('remember_me', 1); ?>/>
									</div>
									<div class="field">
										<input type="submit" name="login_user" id="submit" value="<?=lang('user.titlelogin');?>" class="link_button large"/>
									</div>
								
							</div>
						</div>
						
					</fieldset>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>
	
	

<!-- Scripts -->  
<?php $this->load->view('users/scripts'); ?> 
<script>
$(function() 
{
	$('form').submit(function(event)
	{
	
		event.preventDefault();

		// Get the url that the ajax form data is to be submitted to.
		var submit_url = $(this).attr('action');

		// Get the form data.
		var $form_inputs = $(this).find(':input');
		var form_data = {};
		$form_inputs.each(function() 
		{
			form_data[this.name] = $(this).val();
		});

		$.ajax(
		{
			url: submit_url,
			type: 'POST',
			data: form_data,
			success:function(data)
			{
			
				// If the returned login value successul.
				if (data)
				{
					// Empty the login form content and replace it will a successful login message.
					$('fieldset').empty().append('<h1>Login via Ajax was successful!</h1><p>Refreshing this page would now redirect you away from the login page to the user dashboard.</p>');
					
					// Hide any error message that may be showing.
					$('#message').hide();
				}
				// Else the login credentials were invalid.
				else
				{
					// Show an error message stating the users login credentials were invalid.
					$('#message').show();
				}
			}
		});
	})
});
</script>




