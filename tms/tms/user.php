<?php 
	include("db_conn.php");
	
	$page_title = "Users";
	include_once "header.php";
?>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Users</h3>
					<ol class="breadcrumb">
						<li><a style="color:#800000;" href="index.php">TMS</a></li>
						<li class="active">Users</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
				<?php if (isset($_POST['filterUserIDButton'])) { ?>
				        <div style="height:50%;overflow:auto;">
							<table class="table">
								<tr>
									<th>User ID</th>
									<th>First name</th>
									<th>Last name</th>
									<th>Type</th>
								</tr>
								<?php
									$filterUserID = $_POST['filterUserID'];
									$result = $db->query("select * from user where iduser = '{$filterUserID}' GROUP BY iduser DESC");
									while($row = $result->fetch_assoc()){
										$user_id        = $row['iduser'];
										$first_name     = $row['fname'];
										$last_name      = $row['lname'];
										$type           = $row['type'];
									echo
										'<tr>
											<td>' . $user_id . '</td>
											<td>' . $first_name .'</td>
											<td>' . $last_name . '</td>
											<td>' . $type . '</td>
										</tr>';
									}
									$result->free();
								?>
							</table>
						</div>
					<?php
					} elseif (isset($_POST['filterTypeButton'])) { ?>
						<div style="height:50%;overflow:auto;">
							<table class="table">
								<tr>
									<th>User ID</th>
									<th>First name</th>
									<th>Last name</th>
									<th>Type</th>
								</tr>
								<?php
									$filterType = $_POST['filterType'];
									$result = $db->query("select * from user where type = '{$filterType}' GROUP BY iduser DESC");
									while($row = $result->fetch_assoc()){
										$user_id        = $row['iduser'];
										$first_name     = $row['fname'];
										$last_name      = $row['lname'];
										$type           = $row['type'];
									echo 	
										'<tr>
											<td>' . $user_id . '</td>
											<td>' . $first_name .'</td>
											<td>' . $last_name . '</td>
											<td>' . $type . '</td>
										</tr>';
									}
									$result->free();
								?>
							</table>
						</div>
					<?php } elseif (isset($_POST['filterLastnameButton'])) { ?>
								<div style="height:50%;overflow:auto;">
									<table class="table">
										<tr>
											<th>User ID</th>
											<th>First name</th>
											<th>Last name</th>
											<th>Type</th>
										</tr>
										<?php
											$filterLastname = $_POST['filterLastname'];
											$result = $db->query("select * from user where lname = '{$filterLastname}' GROUP BY iduser DESC");
											while($row = $result->fetch_assoc()){
												$user_id        = $row['iduser'];
												$first_name     = $row['fname'];
												$last_name      = $row['lname'];
												$type           = $row['type'];
											echo
												'<tr>
													<td>' . $user_id . '</td>
													<td>' . $first_name .'</td>
													<td>' . $last_name . '</td>
													<td>' . $type . '</td>
												</tr>';
											}
											$result->free();
										?>
									</table>
								</div>
						<?php } else{ ?>
									<div style="height:50%;overflow:auto;">
										<table class="table">
											<tr>
												<th>User ID</th>
												<th>First name</th>
												<th>Last name</th>
												<th>Type</th>
											</tr>
											<?php
												$result = $db->query("select * from user");
												while($row = $result->fetch_assoc()){
													$user_id        = $row['iduser'];
													$first_name     = $row['fname'];
													$last_name      = $row['lname'];
													$type           = $row['type'];
												echo 
													'<tr>
														<td>' . $user_id . '</td>
														<td>' . $first_name .'</td>
														<td>' . $last_name . '</td>
														<td>' . $type . '</td>
													</tr>';
												}
												$result->free();
											?>
										</table>
									</div>
						<?php }	?>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-lg-4">
					<form style action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
						<div class="form-group">
							<label for="filterType" class="col-2 col-form-label">Type</label>
							<select class="form-control" id="filterType" name="filterType">
								<?php
									$result = $db->query("select distinct type from user group by type asc");
									while($row = $result->fetch_assoc()){
										$user_id        = $row['iduser'];
										$first_name     = $row['fname'];
										$last_name      = $row['lname'];
										$type           = $row['type'];	
										echo '<option>' . $type . '</option>';
									}
									$result->free();
								?>
							</select>
						</div>
						<button name="filterTypeButton" type="submit" class="btn btn-primary col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3"><i class="fa fa-fw fa-filter"></i>Filter</button>
					</form>
				</div>
				<div class="col-xs-4 col-sm-4 col-lg-4">
					<form style action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
						<div class="form-group">
							<label for="filterUserID" class="col-2 col-form-label">User ID</label>
							<select class="form-control" id="filterUserID" name="filterUserID">
								<?php
									$result = $db->query("select distinct iduser from user group by iduser asc");
									while($row = $result->fetch_assoc()){
										$user_id        = $row['iduser'];
										$first_name     = $row['fname'];
										$last_name      = $row['lname'];
										$type           = $row['type'];	
										echo '<option>' . $user_id . '</option>';
									}
									$result->free();
								?>
							</select>
						</div>
						<button name="filterUserIDButton" type="submit" class="btn btn-primary col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3"><i class="fa fa-fw fa-filter"></i>Filter</button>
					</form>
				</div>
				<div class="col-xs-4 col-sm-4 col-lg-4">
					<form style action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
						<div class="form-group">
							<label for="filterLastname" class="col-2 col-form-label">Last name</label>
							<select class="form-control" id="filterLastname" name="filterLastname">
								<?php
									$result = $db->query("select distinct lname from user group by lname asc");
									while($row = $result->fetch_assoc()){
										$user_id        = $row['iduser'];
										$first_name     = $row['fname'];
										$last_name      = $row['lname'];
										$type           = $row['type'];	
										echo '<option>' . $last_name . '</option>';
									}
									$result->free();
								?>
							</select>
						</div>
						<button name="filterLastnameButton" type="submit" class="btn btn-primary col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3"><i class="fa fa-fw fa-filter"></i>Filter</button>
					</form>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-lg-6">
						<a class="btn btn-success col-xs-9 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3" href="createUser.php"><i class="fa fa-fw fa-plus"></i>Create User</a>
				</div>
				<div class="col-xs-6 col-sm-6 col-lg-6">
						<a class="btn btn-info col-xs-9 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3" href="user.php"><i class="fa fa-fw fa-remove"></i>Clear Filter</a>
				</div>
			</div>
<?php include_once("footer.php");?>