
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




