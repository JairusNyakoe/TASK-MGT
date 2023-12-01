<?php
    include("db_conn.php");
    $page_title = "Create a Task";
    include_once "header.php";
?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Create a Task</h3>
                    <ol class="breadcrumb">
                        <li><a style="color:#800000;" href="task.php">Tasks</a></li>
                        <li class="active">Create a Task</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        if (isset($_POST['createTaskButton'])) {
                            $inputUserID = $_POST['inputUserID'];
                            $inputTask = $_POST['inputTask'];
                            $inputDuration = $_POST['inputDuration'];
                            $inputDate = $_POST['inputDate'];
                            $exists = 0;
                            $fields = array('inputDate','inputTask','inputDuration');
                            foreach($fields as $fieldname) {
                                if(empty($_POST[$fieldname])) {
                                    $exists = 1;
                                }
                            }
                            if($db->connect_errno > 0){
                                die('Unable to connect to database [' . $db->connect_error . ']');
                            }                            
                            if($exists == 1){
                                echo "<div class='alert alert-warning alert-dismissable'>";
                                    echo "Fields can not be empty!";
                                echo "</div>";
                            }
                            if ($exists == 0){
                                $sql = "INSERT  INTO `task` (`idtask`, `name`, `duration`, `date`, `userid`) VALUES (NULL, '{$inputTask}', '{$inputDuration}', '{$inputDate}', '{$inputUserID}')";
                                if ($db->query($sql)) { 
                                        echo "<div class='alert alert-success alert-dismissable'>";
                                        echo "Task was created.";
                                        echo "</div>";
                                }
                            }
                        }
                    ?>
                    <form style action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="col-xs-12 col-sm-12 col-lg-12">
                            <div class="form-group">
                                <label for="inputUserID" class="col-2 col-form-label">User ID</label>
                                <div class="col-10">
                                    <select class="form-control" id="inputUserID" name="inputUserID">
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
                            </div>
                            <div class="form-group">
                                <label for="inputTask">Task Description</label>
                                <input type="text" class="form-control" id="inputTask" name="inputTask" placeholder="Enter Task Description">
                            </div>
                            <div class="form-group">
                                <label for="inputDuration">Task Duration (hours)</label>
                                <input type="number" class="form-control" id="inputDuration" name="inputDuration" placeholder="Enter Task Duration (hours)">
                            </div>
                            <div class="form-group">
                                <label for="inputDate" class="col-2 col-form-label">Date</label>
                                <input class="form-control" type="date" placeholder="mm-dd-yyyy" id="inputDate" name="inputDate">
                            </div>
                            <button name="createTaskButton" type="submit" class="btn btn-success btn-block"><i class="fa fa-fw fa-plus"></i>Create Task</button>
                        </div>
                    </form>
                </div>
            </div>
<?php include_once "footer.php"; ?>