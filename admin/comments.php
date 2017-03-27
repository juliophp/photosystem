<?php
    include '../includes/functions.php';
    include '../includes/header.php';
    include '../includes/page_restriction.php';



    $sql = "select * from comments";
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
                            <th>Photo Id</th>
                            <th>Text</th>
                            <th>Time Posted</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <h2>Comments Section</h2>
                <?php

                while ($com = mysqli_fetch_array($res, MYSQLI_ASSOC))
                {
                   echo "<tbody>";
                   echo   "<tr>";
                   echo     "<td>$com[id]</td>
                            <td>$com[user_id]</td>
                            <td>$com[photo_id]</td>
                            <td>$com[text]</td>
                            <td>$com[time_created]</td>
                            <td><a class=\"btn btn-danger\" href=\"../public/deletecomment.php?user=$com[user_id]&pid=$com[photo_id]&cid=$com[id]\">Delete</a></td>";
                   echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
                // echo "<a class=\"form-control btn-success \"href=\"\">Add New</a>";
                    


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