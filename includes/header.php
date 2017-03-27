<?php
    if(!isset($_SESSION["username"]))
    header("location: ../login.php");
    $username = ucfirst($_SESSION["username"]);
    $userid = $_SESSION["userid"]; 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Kayaking  - Post Kayaking Pictures</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Reg-Login CSS style -->
    <link rel="stylesheet" type="text/css" href="../css/main.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../css/modern-business.css">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href="../css/Passion_One.css" rel="stylesheet" "type=text/css">
    <link href="../css/Oxygen.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php if($_SESSION["role"]=="admin")
                                                    {echo "../admin";}
                                                    else 
                                                    {echo "../public";} ?>"> Kayaking </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if($_SESSION["role"]=="admin")
                    {
                        echo 
                        "
                        <li>
                        <a href=\"users.php\">Users</a>
                        </li>
                        <li>
                        <a href=\"pictures.php\">Pictures</a>
                        </li>
                        <li>
                        <a href=\"comments.php\">Comments</a>
                        </li>
                        <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"> Welcome $username <b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">
                            <li>
                                <a href=\"../logout.php\">Logout</a>
                            </li>
                        </ul>
                    </li>
                        ";
                    }
                    else
                    {
                        echo
                        "
                        <li>
                        <a href=\"images.php\">Pictures</a>
                        </li>
                        <li>
                        <a href=\"grpmembers.php\">Group Members</a>
                        </li>
                        <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"> Welcome $username <b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">
                            <li>
                                <a href=\"../public/profile.php\">Profile</a>
                            </li>
                            <li>
                                <a href=\"../public/update_profile.php\">Update Profile</a>
                            </li>
                            <li>
                                <a href=\"../logout.php\">Logout</a>
                            </li>
                        </ul>
                    </li>



                        ";                    }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
