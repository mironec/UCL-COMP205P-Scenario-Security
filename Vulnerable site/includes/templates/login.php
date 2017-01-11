<div class="login-form">
	<form action="?" method="GET" style="display: inline;">
		Username: <input name="username" type="text" /><br />
		Password: <input name="password" type="password" /><br />
		<input value="Login" type="submit" />
	</form>
	<a href="signup.php">Sign up here</a>
</div>
<br /><br />
<div class="news-feed">
	Current users:
	<ul>
		<?php 
			foreach(User::getAllUsers() as $user) {
				$name = $user->getUsername();
				echo "<li><a href=\"profile.php?user=$name\">$name</a></li>";
			}
		?>
	</ul>
</div>