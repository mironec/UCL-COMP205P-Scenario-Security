Welcome admin, <?php echo $currentuser->getUsername(); ?>!<br />
<br />
Change your profile:<br />
<form action="?" method="POST">
	Bio: <textarea name="bio" style="vertical-align: top; width = 300px; height = 50px;"><?php echo $currentuser->getBio(); ?></textarea><br />
	Email: <input name="email" type="text" value="<?php echo $currentuser->getEmail(); ?>" /><br />
<input value="Update" type="submit">
</form><br />

Administrate users:
<ul>
<?php
	foreach(User::getAllUsers() as $user) {
		$name = $user->getUsername();
		$id = $user->getID();
		echo "<li><a href=\"profile.php?user=$name\">$name</a> <a href=\"profile.php?deleteUser=$id\">Delete this user</a></li>";
	}
?>
</ul>