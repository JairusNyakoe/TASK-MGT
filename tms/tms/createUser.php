<?php
    include("db_conn.php");
    $page_title = "Create a User";
    include_once "header.php";
?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Create a User</h3>
                    <ol class="breadcrumb">
                        <li><a style="color:#800000;" href="user.php">Users</a></li>
                        <li class="active">Create a User</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        if (isset($_POST['createUserButton'])) {
                            $inputUserType = $_POST['inputUserType'];
                            $inputUserFirstname = $_POST['inputUserFirstname'];
                            $inputUserLastname = $_POST['inputUserLastname'];
                            $exists = 0;
                            $fields = array('inputUserType','inputUserFirstname','inputUserLastname');
                            foreach($fields as $fieldname) {
                                if(empty($_POST[$fieldname])) {
                                    $exists = 1;
                                }
                            }
                            if($db->connect_errno > 0){
                                die('Unable to connect to database [' . $db->connect_error . ']');
                            }
                            $result = $db->query("SELECT fname from user WHERE fname = '{$inputUserFirstname}' AND lname = '{$inputUserLastname}' LIMIT 1");
                            if ($result->num_rows == 1) 
                                $exists = 3;
                            if($exists == 1){
                                echo "<div class='alert alert-warning alert-dismissable'>";
                                    echo "Fields can not be empty!";
                                echo "</div>";
                            }
                            if ($exists == 3){
                                echo "<div class='alert alert-warning alert-dismissable'>";
                                    echo "User already exists!";
                                echo "</div>";
                            }
                            if ($exists == 0){
                                $sql = "INSERT  INTO `user` (`iduser`, `fname`, `lname`, `type`) VALUES (NULL, '{$inputUserFirstname}', '{$inputUserLastname}', '{$inputUserType}')";
                                if ($db->query($sql)) { 
                                        echo "<div class='alert alert-success alert-dismissable'>";
                                        echo "User was created.";
                                        echo "</div>";
                                }
                            }
                        }
                    ?>
                    <form style action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="col-xs-12 col-sm-12 col-lg-12">
                            <div class="form-group">
                                <label for="inputUserType" class="col-2 col-form-label">User Type</label>
                                <select class="form-control" id="inputUserType" name="inputUserType">
                                    <option selected>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputUserFirstname">First Name</label>
                                <input type="text" class="form-control" id="inputUserFirstname" name="inputUserFirstname" placeholder="Enter User's First Name">
                            </div>
                            <div class="form-group">
                                <label for="inputUserLastname">Last Name</label>
                                <input type="text" class="form-control" id="inputUserLastname" name="inputUserLastname" placeholder="Enter User's Last Name">
                            </div>
                            <button name="createUserButton" type="submit" class="btn btn-success btn-block"><i class="fa fa-fw fa-plus"></i>Create User</button>
                        </div>
                    </form>
                </div>
            </div>
<?php include_once "footer.php"; ?>
