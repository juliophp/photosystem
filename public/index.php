    <?php
    include '../includes/functions.php';
    include '../includes/header.php';
    ?>

    <div class="container-fluid">
    <div class="row">
        <div class="jumbotron text-center">
          <div class="row">
            <!-- Map Column -->
            <div>
            <h1>Post a Picture</h1> 
            <p>Let The World See Your Kayaking Pictures</p>
                <form action="" method="post" enctype="multipart/form-data" class="form-inline">
                    <div class="control-group form-group">
                    <div class="controls">
                        <label>Image: </label><input type="file" name="img" class="form-control" required="required">
                    </div>
                       
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Title:</label>
                            <input type="text" name="title" class="form-control" id="name" required="required"/>
                            
                        </div>
                    </div>
                    <br/>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Caption:</label>
                            <textarea rows="4" cols="100" name="caption" class="form-control" id="message" maxlength="999" style="resize:none" required="required"></textarea>
                        </div>
                    </div>
                    <div id="success"><?php InsertPictures() ?></div>
                    <!-- For success/fail messages -->
                   <br/> <button type="submit" name="submit" class="btn btn-success btn-lg">Post Picture</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
    <!-- row -->
<div class="container-fluid text-center bg-grey">
  <h2>Random Photos</h2>
  <h4>Random Photos Uploaded By Our Users</h4>
  <div class="row text-center">
        <?php DisplayPicturesFront() ?>
        
        
</div>
</div>
</div>

        <hr>

        <!-- Footer -->
    <?php
    include '../includes/footer.php';
    ?>