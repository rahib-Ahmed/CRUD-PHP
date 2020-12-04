<?php
	require_once("common/connection.php");
	$ID=$_POST['ID'];
	$CategoryName=$_POST['CategoryName'];
	$CategoryDescription=$_POST['CategoryDescription'];
	$Course=$_POST['Course'];

	$UpdateQuery="Update category set CategoryName=$CategoryName, CategoryDescription='$CategoryDescription', where ID=$ID";

	$R=mysqli_query($CN,$UpdateQuery);

	if($R==1)
	{
		$MSG="Record has been Update Successfully";
	}
	else
	{
		$MSG="Server Error...Please try latter";
	}
	$Res[]=array("MSG"=>$MSG);
	echo json_encode($Res);
		

		
?>
