<?php
	require_once("common/connection.php");

	$ID=$_POST['ID'];
	
	$SelectQuery="Select * from category where ID=$ID";

	$Table=mysqli_query($CN,$SelectQuery);

	$Row=mysqli_fetch_array($Table);

	$Res[]=array("ID"=>$Row['ID'],"CategoryName"=>$Row['CategoryName'],"CategoryDescription"=>$Row['CategoryDescription']);

	echo json_encode($Res);
?>


