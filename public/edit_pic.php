    <?php
    include '../includes/functions.php';
    include '../includes/header.php';
    ?>
    <div class="container">
     <!-- Header Carousel -->
     <?php 
     $res = EditPictures($_GET["user"], $_GET["pic"]);
     $tst = UpdatePictures($_GET["user"], $_GET["pic"]);
     if($tst)
        header("location:images.php");

          ?>
    <!-- row -->
    <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
               <h3>Edit your picture</h3>
                <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                    <div class="control-group form-group">
                    <div class="well">
                    <?php echo "<img src= $res[img_path] width=\"700\" height=\"400\">";?>
                    </div>
                        <div class="controls">
                            <label>Photo:</label>
                            <input type="file" name="img" class="form-control" id="name" />
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Title:</label>
                            <input type="text" name="title" class="form-control" id="name" value="<?php echo $res["img_title"]; ?>"  />
                            <p class="help-block"></p>
                        </div>
                    </div>
                    
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Caption:</label>
                            <textarea rows="4" cols="100" name="caption" class="form-control" id="message" maxlength="999" style="resize:none"><?php echo $res["caption"]; ?></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" name="submit" class="btn btn-primary">Send Message</button>
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
