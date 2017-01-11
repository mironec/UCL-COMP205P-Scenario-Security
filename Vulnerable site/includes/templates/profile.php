Welcome, <?php echo $user->getUsername(); ?>!<br />
<br />
Change your profile:<br />
 <form action="?" method="POST">
  Bio: <textarea name="bio" style="vertical-align: top; width = 300px; height = 50px;"><?php echo $user->getBio(); ?></textarea><br />
  Email: <input name="email" type="text" value="<?php echo $user->getEmail(); ?>" /><br />
  <input value="Update" type="submit">
 </form>