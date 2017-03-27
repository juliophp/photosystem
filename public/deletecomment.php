<?php
 include '../includes/functions.php';
 include '../includes/header.php';

if(isset($_GET["cid"]) && isset($_GET["pid"]) && isset($_GET["user"]) && $userid == $_GET["user"])
    {
        $user = $_GET["user"];
        $pid = $_GET["pid"];
        $cid = $_GET["cid"];
        if(DeleteComments($cid, $pid) && $_SESSION["role"]=="user")
            header("location:full_img.php?user=$user&pic=$pid");
        else if (DeleteComments($cid, $pid) && $_SESSION["role"]=="admin"){
           header("location:../admin/comments.php");
        }
    }
    else
    {
        header("location:images.php");
    }
;

?> 
<?php
    include '../includes/footer.php';
?>