<html>
<body>
	<h1><?=lang('user.activa');?><?php echo $identity;?></h1>
    <?php 
	$msglink = lang('user.activa3');
	?>
	<p><?=lang('user.activa2');?><?php echo anchor('auth/activate_account/'. $user_id .'/'. $activation_token, $msglink);?>.</p>
</body>
</html>