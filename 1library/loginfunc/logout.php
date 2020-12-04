<?php
session_start();
$A=$_SESSION["MobileNo"];
require_once("../common/connection.php");


unset($_SESSION["MobileNo"]);
session_destroy();
header("location:../../forms/login.php");
?>