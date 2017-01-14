<?php require_once('includes/utilities.php'); include('includes/templates/htmlHeader.php'); ?>
	<div id="wrapper">

        <?php include('includes/templates/navigationBar.php'); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Database
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="files.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Database
                            </li>
                        </ol>
                    </div>
                </div>
				<?php echo $uploadStatus; ?>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Your Data</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>File</th>
                                        <th>File size</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$arr = scandir($dirpath);
										foreach($arr as $file){
											if($file == '.' || $file == '..') continue;
											$filesize = filesize($dirpath."/".$file);
											$token = session_id();
											echo "
												<tr>
													<td><a href=\"download.php?file=$file&token=$token\">";
											echos($file);
											echo "</a></td>
													<td>$filesize</td>
												</tr>";
										}
									?>
                                </tbody>
                            </table>
                        </div>
                    </div>
				</div>
                    
            <!-- /.row -->
            <div class="form-group">
				<form action="?" method="post" enctype="multipart/form-data">
				<label class="btn btn-default btn-file">
				 Add Files <input class="hidden" type="file" name="uploadedFile" />
				</label>
				<input type="submit" class="btn btn-default" name="submit" value="Submit" />
				</form>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include('includes/templates/htmlFooter.php'); ?>