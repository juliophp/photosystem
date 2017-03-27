<?php
session_start();
$_SESSION["username"] = null;
$_SESSION["userid"] = null;
$_SESSION["role"] = null;
header("location: login.php");
?>