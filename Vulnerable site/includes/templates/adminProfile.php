<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<h2>Admin View<small> User Controller</small></h2>
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Username</th>
						<th>Email</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach(User::getAllUsers() as $user) {
							$name = $user->getUsername();
							$id = $user->getID();
							$email = $user->getEmail();
							$str = "";
							if($user->isAdmin())
								$str = "<a href=\"profile.php?adminUser=$id\">Make this user a normal user</a>";
							else
								$str = "<a href=\"profile.php?adminUser=$id\">Make this user an Admin</a>";
							echo "
								<tr>
									<td><a href=\"profile.php?user=$name\">$name</a></td>
									<td>$email</td>
									<td><a href=\"profile.php?deleteUser=$id\">Delete this user</a> | $str</td>
								</tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /.row -->