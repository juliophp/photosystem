<?php
 include '../includes/functions.php';
 include '..includes/header.php';

if(DeletePicture($_GET["user"], $_GET["pic"]) && $_SESSION["role"]=="user");
{
	header("location:images.php");
}
if(DeletePicture($_GET["user"], $_GET["pic"]) && $_SESSION["role"]=="admin");
{
	header("location:../admin/pictures.php");
}
?>
 <?php
    include '../includes/footer.php';
 ?>