<!DOCTYPE HTML>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Task Management System">
        <meta name="author" content="jairus">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/modern-business.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="assets/js/jquery.min.js"></script>
        <title><?php echo $page_title; ?></title>
    </head>
    <body>
        <nav style="background-color:#800000;" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><i class="fa fa-fw fa-tasks"></i>TASK MANAGEMENTS SYSTEM</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="task.php"><i class="fa fa-fw fa-check"></i>Tasks</a>
                        </li>
                        <li>
                            <a href="user.php"><i class="fa fa-fw fa-user"></i>Users</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-compass"></i>Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>