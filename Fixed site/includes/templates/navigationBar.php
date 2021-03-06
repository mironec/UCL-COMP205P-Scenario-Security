<?php require_once('includes/utilities.php'); ?>		
		<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="files.php">Database</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
				<?php if(isset($currentuser)) { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echos($currentuser->getUsername()); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="profile.php?action=logout&token=<?php echo session_id(); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
						<li>
                            <a href="profile.php?deleteUser=<?php echos($currentuser->getID()); ?>&token=<?php echo session_id(); ?>"><i class="fa fa-fw fa-times"></i> Delete account</a>
                        </li>
                    </ul>
                </li>
				<?php } ?>
            </ul>
			
			<?php if(isset($currentuser)) { ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-dashboard"></i> Dashboard <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li class= "active">
                                <a href="profile.php"><i class="fa fa-fw fa-desktop"></i> Profile</a>
                            </li>
                            <li>
                                <a href="files.php"><i class="fa fa-fw fa-table"></i> Database</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
			<?php } ?>
			
        </nav>