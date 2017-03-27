<?php
 include '../includes/functions.php';
 include '../includes/header.php';

if(isset($_GET["user"]) && $_SESSION["role"]=="admin")
{
	$user_id = $_GET["user"];
	if($user_id == $userid)
	{
		echo "error, you can not delete yourself";
	}

	if(DeleteUser($user_id))
	{
		header("location:users.php");
	}
}
?>