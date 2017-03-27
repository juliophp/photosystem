<?php
    include '../includes/functions.php';
    include '../includes/header.php';
    include '../includes/page_restriction.php';



?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Admin
                    <small>Dashboard</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Dashboard Page <?php echo $_SESSION["role"]; ?></li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-1">
            </div>
            <!-- Content Column -->
            <div class="col-md-10">
                <div class="col-md-4 well" align="center">
                  <a href="users.php"><img src="../img/user.jpg" width="150" height="150"><h2>Manage Users</h2></a>
                </div>
                <div class="col-md-4 well" align="center">
                  <a href="pictures.php"><img src="../img/pic.png" width="150" height="150"><h2>Manage Pictures</h2></a>
                </div>
                <div class="col-md-4 well" align="center">
                  <a href="comments.php"><img src="../img/comment.jpg" width="150" height="150"><h2>Manage Comments</h2></a>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
    <?php
    include '../includes/footer.php';
    ?>