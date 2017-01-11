Welcome, <?php echo $currentuser->getUsername(); ?>!<br />
<br />
Change your profile:<br />
 <form action="?" method="POST">
  Bio: <textarea name="bio" style="vertical-align: top; width = 300px; height = 50px;"><?php echo $currentuser->getBio(); ?></textarea><br />
  Email: <input name="email" type="text" value="<?php echo $currentuser->getEmail(); ?>" /><br />
  <input value="Update" type="submit">
 </form>