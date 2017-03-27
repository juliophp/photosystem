<?php
    include '../includes/functions.php';
    include '../includes/header.php';
    include '../includes/page_restriction.php';



    $sql = "select * from users";
    $res = mysqli_query($con, $sql);
   // $user = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>

    <!-- Page Content -->
    <div class="container-fluid">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">


            <div class="col-md-12">
            <table class=table>
                    <thead>
                        <tr class="success">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Sex</th>
                            <th>Role</th>
                            <th>DOB</th>
                            <th>Reg. Date</th>
                            <th>Bio</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <h2>Users Section</h2>
                <?php

                while ($user = mysqli_fetch_array($res, MYSQLI_ASSOC))
                {
                   echo "<tbody>";
                   echo   "<tr>";
                   echo     "<td>$user[id]</td>
                            <td>$user[name]</td>
                            <td>$user[username]</td>
                            <td>$user[email]</td>
                            <td>$user[password]</td>
                            <td>$user[sex]</td>
                            <td>$user[role]</td>
                            <td>$user[dob]</td>
                            <td>$user[date_registered]</td>
                            <td>$user[bio]</td>
                            <td><img src=\"../$user[photo]\" width=\"64\" heigth=\"64\"></td>
                            <td><a class=\"btn btn-primary\"href=\"eduser.php?user=$user[id]\">Edit</a> <a class=\"btn btn-danger\"href=\"deluser.php?user=$user[id]\">Delete</a></td>";
                   echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
                 echo "<a class=\"btn btn-success\"href=\"newuser.php\"><i class=\"fa fa-plus fa\" aria-hidden=\"true\"></i> Add New User</a>";
                    


                ?>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
       
            <!-- Content Column -->
            

        <hr>

        <!-- Footer -->
    <?php
    include '../includes/footer.php';
    ?>
