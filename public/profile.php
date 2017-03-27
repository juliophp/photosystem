<?php
    include '../includes/functions.php';
    include '../includes/header.php';
if (!isset( $_GET["user"]))
{
     $userrid=$userid;
}
else
{
     $userrid=$_GET["user"];
}    
?>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
        <div class="col-sm-1">
                
            </div>
            <div class="col-lg-9">
                <h1 class="page-header"><?php echo $username.":"; ?>
                    <small>Your Profile</small>
                </h1>
                
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-1">
                
            </div>
            <!-- Content Column -->
            <div class="col-md-8">
            <ol class="breadcrumb">
                    <li><a href="/php_proj/">Home</a>
                    </li>
                    <li class="active">Profile Page</li>
            </ol>
            <?php $user = ReadUserDetails($userrid); ?>
                <table class="table">
                    <thead>
                        <tr class="success">
                            <th>Fields</th>
                            <th>Values</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ID No: </td>
                            <td><?php echo $user["id"]; ?></td>
                        </tr>
                        <tr>
                            <td>Name:</td>
                            <td><?php echo $user["name"]; ?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $user["email"]; ?></td>
                        </tr>
                         <tr>
                            <td>Username:</td>
                            <td><?php echo $user["username"]; ?></td>
                        </tr>
                        <tr>
                            <td>Gender:</td>
                            <td><?php echo $user["sex"]; ?></td>
                        </tr>
                        <tr>
                            <td>Role:</td>
                            <td><?php echo ucfirst($user["role"]); ?></td>
                        </tr>
                        <tr>
                            <td>Date Registered:</td>
                            <td><?php echo $user["date_registered"]; ?></td>
                        </tr>
                        <tr>
                            <td>Date Of Birth:</td>
                            <td><?php echo $user["dob"]; ?></td>
                        </tr>
                        <tr>
                            <td>Bio:</td>
                            <td><?php echo $user["bio"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3"><img src="<?php echo $user["photo"]; ?>" height="150" width="150"></div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
    <?php
    include '../includes/footer.php';
    ?>
