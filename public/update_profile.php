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
    <?php $user = ReadUserDetails($userrid); 
            $val=UpdateUserDetails($_FILES,$_POST,$user["id"]);
            if ($val) {header("location:profile.php");}  
    ?>

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
        <div class="col-md-1">
                
        </div>
            <div class="col-lg-9">
                <h1 class="page-header"><?php echo $username.":"; ?>
                    <small>Edit Your Profile</small>
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
            <form action="" method="post" enctype="multipart/form-data">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="/php_proj/">Home</a>
                    </li>
                    <li class="active">Edit Profile Page</li>
                </ol>            
                <table class="table">
                    <thead>
                        <tr class="success">
                            <th>Fields</th>
                            <th>Values</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><label for="userid" class="cols-sm-2 control-label">UserID:</label></td>
                            <td>
                            <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="userid" id="userid" value="<?php echo $user["id"]; ?>" disabled="true">
                                    </td>
                            </div>
                        </tr>
                        <tr>
                            <td><label for="name" class="cols-sm-2 control-label">Name:</label></td>
                            <td>
                            <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name" value="<?php echo $user["name"]; ?>"/>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="email" class="cols-sm-2 control-label">Email:</label></td>
                            <td>
                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span><input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" value="<?php echo $user["email"]; ?>" />
                            </div>
                            </td>
                        </tr>
                         <tr>
                            <td><label for="username" class="cols-sm-2 control-label">Username:</label></td></td>
                            <td>
                            <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username" value="<?php echo $user["username"]; ?>"  disabled="true"/>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="gender" class="cols-sm-2 control-label">Gender:</label></td>
                            <td><div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <select class="form-control" name="gender" id="gender"  placeholder="Select Your Gender" />
                                    <option <?php if($user["sex"]===1) echo "selected='selected'"; else {} ?>>Male</option>
                                    <option <?php if($user["sex"]===0) echo "selected='selected'"; else {} ?>>Female</option>
                                    </select>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="password" class="cols-sm-2 control-label">Password:</label></td>
                            <td>
                            <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="password" id="password"  placeholder="Enter your Password" value="<?php echo $user["password"]; ?>" />
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="date_reg" class="cols-sm-2 control-label">Date Registered:</label></td>
                            <td>
                            <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar fa-lg" aria-hidden="true"></i></span>
                                    <input type="date" disabled="true" class="form-control" name="date_reg" id="date_reg" value="<?php echo $user["date_registered"]; ?>" />
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dob" class="cols-sm-2 control-label">Date Of Birth:</label></td>
                            <td>
                            <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar fa-lg" aria-hidden="true"></i></span>
                                    <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $user["dob"]; ?>" required>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <td><label for="bio" class="cols-sm-2 control-label">Bio:</label></td>
                        <td>
                        <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-list-alt fa-lg" aria-hidden="true"></i></span>
                                    <textarea name="bio" id="bio" rows="3px" class="form-control" style="resize:none;"><?php echo $user["bio"]; ?></textarea>
                            </div>
                            </td>
                        </tr>
                        <tr>
                        <td colspan="2">
                                <input type="submit" class="form-control btn-success" name="update" value="Update" />
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
            <img src="<?php echo $user["photo"]; ?>" height="150" width="150">
            <input type="file" name="avatar" value="<?php echo $user["photo"]; ?>">
            </div>
        </form>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
    <?php
    include '../includes/footer.php';
    ?>
