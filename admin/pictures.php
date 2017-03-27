<?php
    include '../includes/functions.php';
    include '../includes/header.php';
    include '../includes/page_restriction.php';


    $sql = "select * from pictures";
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
                            <th>ID</th>
                            <th>User Id</th>
                            <th>Image Title</th>
                            <th>Image</th>
                            <th>Caption</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <h2>Pictures Section</h2>
                <?php

                while ($pic = mysqli_fetch_array($res, MYSQLI_ASSOC))
                {
                   echo "<tbody>";
                   echo   "<tr>";
                   echo     "<td>$pic[id]</td>
                            <td>$pic[user_id]</td>
                            <td>$pic[img_title]</td>
                            <td><img src=\"$pic[img_path]\" width=\"70\" heigth=\"70\"></td>
                            <td width=\"500\">$pic[caption]</td>
                            <td>$pic[time_created]</td>
                            <td><a class=\"btn btn-danger\" href=\"../public/delete_pic.php?user=$pic[user_id]&pic=$pic[id]\">Delete Pic</a></td>";
                   echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
                 //echo "<a class=\"form-control btn-success \"href=\"\">Add New</a>";
                    


                ?>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
            <!-- Sidebar Column -->
            
            <!-- Content Column -->
        <!-- /.row -->

        <hr>

        <!-- Footer -->
    <?php
    include '../includes/footer.php';
    ?>