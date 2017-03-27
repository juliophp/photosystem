    <?php
    include '../includes/functions.php';
    include '../includes/header.php';
    if(isset($_GET["cid"]) && isset($_GET["pid"]) && isset($_GET["user"]))
    {
        $user = $_GET["user"];
        $pid = $_GET["pid"];
        $cid = $_GET["cid"];
        $val = SelectSingleComment($pid, $cid);
        if(isset($_POST["comment"]))
        {
        $comment = $_POST["comment"];
        if(EditComment($comment,$pid,$cid))
            header("location:full_img.php?user=$user&pic=$pid");
        }
        
    }
    else
    {
        header("location:images.php");
    }
    ?>
    <div class="container">
     <!-- Header Carousel -->
    <!-- row -->
    <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
               <h3>Edit your Comment</h3>
                <form id="contactForm" action="" method="post">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Comment:</label>
                            <textarea class="form-control" name="comment" rows="3" style="resize:none"><?php echo $val["text"]; ?></textarea>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                
            </div>
        </div>

        <hr>

        <!-- Footer -->
    <?php
    include '../includes/footer.php';
    ?>