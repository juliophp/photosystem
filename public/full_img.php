<?php
    include '../includes/functions.php';
    include '../includes/header.php';
 
    if(isset($_GET["user"]) && isset($_GET["pic"]))
    {
        $user_id = $_GET["user"];
        $picid = $_GET["pic"];   
    }
    else
    {
        header("location:images.php");
    }
    

    if(isset($_POST["post_comment"]))
    {
       if(CreateComment($user_id,$picid, $userid, $_POST))
        header("location:full_img.php?user=$user_id&pic=$picid");
    }



?>
   

       <?php DisplayFullPictures($user_id, $picid) ?>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <textarea class="form-control" name="comment" rows="3" style="resize:none"></textarea>
                        </div>
                        <button type="submit" name="post_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                
                <?php ReadComment($user_id, $picid, $userid);?>
                <!-- Comment -->
                

            </div>
        <hr>

        <!-- Footer -->
    <?php
    include '../includes/footer.php';
    ?>