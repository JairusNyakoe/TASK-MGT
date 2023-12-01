<?php 
	include("db_conn.php");

	$page_title = "Tasks";
	include_once "header.php";
?>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Tasks</h3>
					<ol class="breadcrumb">
						<li><a style="color:#800000;" href="index.php">TMS</a></li>
						<li class="active">Tasks</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
				<?php if (isset($_POST['filterUserIDButton'])) { ?>
				        <div style="height:50%;overflow:auto;">
                            <table class="table">
                                <tr>
                                    <th>Task ID</th>
                                    <th>Task Description</th>
                                    <th>Duration(hours)</th>
                                    <th>Date</th>
                                    <th>User ID</th>
                                </tr>
                                <?php
									$filterUserID = $_POST['filterUserID'];
									$result = $db->query("select * from task where userid = '{$filterUserID}' GROUP BY idtask DESC");
									while ($row = $result->fetch_assoc()) {
										$task_id       = $row['idtask'];
										$task_name     = $row['name'];
										$task_duration = $row['duration'];
										$date          = $row['date'];
										$user_id       = $row['userid'];
										echo
											'<tr>
												<td>' . $task_id . '</td>
												<td>' . $task_name . '</td>
												<td>' . $task_duration . '</td>
												<td>' . $date . '</td>
												<td>' . $user_id . '</td>
											</tr>';
									}
									$result->free();
                                ?>
                            </table>
                        </div>
					<?php } elseif (isset($_POST['filterDateButton'])) { ?>
						<div style="height:50%;overflow:auto;">
							<table class="table">
								<tr>
									<th>Task ID</th>
                                    <th>Task Description</th>
                                    <th>Duration(hours)</th>
                                    <th>Date</th>
                                    <th>User ID</th>
								</tr>
								<?php
									$filterDate = $_POST['filterDate'];
									$result = $db->query("select * from task where date = '{$filterDate}' GROUP BY idtask DESC");
									while ($row = $result->fetch_assoc()) {
										$task_id       = $row['idtask'];
										$task_name     = $row['name'];
										$task_duration = $row['duration'];
										$date          = $row['date'];
										$user_id       = $row['userid'];
										echo
											'<tr>
												<td>' . $task_id . '</td>
												<td>' . $task_name . '</td>
												<td>' . $task_duration . '</td>
												<td>' . $date . '</td>
												<td>' . $user_id . '</td>
											</tr>';
									}
									$result->free();
								?>
							</table>
						</div>
					<?php } elseif (isset($_POST['filterTaskButton'])) {?>
								<div style="height:50%;overflow:auto;">
									<table class="table">
										<tr>
											<th>Task ID</th>
											<th>Task Description</th>
											<th>Duration(hours)</th>
											<th>Date</th>
											<th>User ID</th>
										</tr>
										<?php
											$filterTask = $_POST['filterTask'];
											$result = $db->query("select * from task where name = '{$filterTask}' GROUP BY idtask DESC");
											while ($row = $result->fetch_assoc()) {
												$task_id       = $row['idtask'];
												$task_name     = $row['name'];
												$task_duration = $row['duration'];
												$date          = $row['date'];
												$user_id       = $row['userid'];
												echo
													'<tr>
														<td>' . $task_id . '</td>
														<td>' . $task_name . '</td>
														<td>' . $task_duration . '</td>
														<td>' . $date . '</td>
														<td>' . $user_id . '</td>
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
											<th>ID</th>
											<th>Task Description</th>
											<th>Duration(hours)</th>
											<th>Date</th>
											<th>User id</th>
										</tr>
										<?php
											$result = $db->query("select * from task GROUP BY idtask DESC");
											while ($row = $result->fetch_assoc()) {
												$task_id       = $row['idtask'];
												$task_name     = $row['name'];
												$task_duration = $row['duration'];
												$date          = $row['date'];
												$user_id       = $row['userid'];
												echo
													'<tr>
														<td>' . $task_id . '</td>
														<td>' . $task_name . '</td>
														<td>' . $task_duration . '</td>
														<td>' . $date . '</td>
														<td>' . $user_id . '</td>
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
							<label for="filterDate" class="col-2 col-form-label">Date</label>
							<input class="form-control" type="date" placeholder="mm-dd-yyyy" id="filterDate" name="filterDate">
						</div>
						<button name="filterDateButton" type="submit" class="btn btn-primary col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3"><i class="fa fa-fw fa-filter"></i>Filter</button>
					</form>
				</div>
				<div class="col-xs-4 col-sm-4 col-lg-4">
					<form style action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
						<div class="form-group">
							<label for="filterUserID" class="col-2 col-form-label">User ID</label>
							<select class="form-control" id="filterUserID" name="filterUserID">
								<?php
									$result = $db->query("select distinct userid from task group by userid asc");
									while($row = $result->fetch_assoc()){
										$user_id        = $row['userid'];
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
							<label for="filterTask" class="col-2 col-form-label">Task description</label>
							<select class="form-control" id="filterTask" name="filterTask">
								<?php
									$result = $db->query("select distinct name from task group by name asc");
									while($row = $result->fetch_assoc()){
										$task_name     = $row['name'];
										echo '<option>' . $task_name . '</option>';
									}
									$result->free();
								?>
							</select>
						</div>
						<button name="filterTaskButton" type="submit" class="btn btn-primary col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3"><i class="fa fa-fw fa-filter"></i>Filter</button>
					</form>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-lg-6">
						<a class="btn btn-success col-xs-9 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3" href="createTask.php"><i class="fa fa-fw fa-plus"></i>Create Task</a>
				</div>
				<div class="col-xs-6 col-sm-6 col-lg-6">
						<a class="btn btn-info col-xs-9 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3" href="task.php"><i class="fa fa-fw fa-remove"></i>Clear Filter</a>
				</div>
			</div>
<?php include_once("footer.php");?>