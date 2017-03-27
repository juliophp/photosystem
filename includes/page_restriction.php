<?php
if(isset($_SESSION["role"]) && $_SESSION["role"]!="admin")
header("location:../public/");

?>