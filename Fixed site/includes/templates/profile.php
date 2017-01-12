<?php require_once('includes/utilities.php'); include('includes/templates/htmlHeader.php'); ?>
    <div id="wrapper">

        <?php include('includes/templates/navigationBar.php'); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile Page
                            <small>Your Dashboard</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="files.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> Profile Page
                            </li>
                        </ol>
                    </div>
                </div>

				<form action="?" method="POST">
					<div class="form-group">
						<label>Username</label>
						<p class="form-control-static"><?php echos($currentuser->getUsername()); ?></p>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" name="email" type="text" value="<?php echos($currentuser->getEmail()); ?>" /><br />
					</div>
					<div class="form-group">
						<label>Bio</label>
						<textarea name="bio" class="form-control" rows="3"><?php echos($currentuser->getBio()); ?></textarea>
					</div>

					<div class="text-center">
					<input class="btn btn-default" value="Update" type="submit">
					</div>
				</form>
				
				<?php if($currentuser->isAdmin()) include('includes/templates/adminProfile.php'); ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include('includes/templates/htmlFooter.php'); ?>