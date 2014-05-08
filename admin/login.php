<?php require('../includes/config.php');
	if(logged_in()){header('Location : '.DIRADMIN);}
	?>

	<p><?php echo messages();?></p>

	<form method="post" action="">
	<p><label><strong>Username</strong><input type="text" name="username"/></label></p>
	<p><label><strong>Password</strong><input type="password" name="password"/></label></p>
	<p><br /><input type="submit" name="submit" class="button" value="login"/></p>
	</form>

	