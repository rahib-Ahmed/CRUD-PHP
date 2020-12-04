
<?php
	require_once("../common/connection.php");

	$CategoryName=$_POST["CatN"];
	$CategoryDescription=$_POST["CatD"];
	$status=$_POST["statusID"];
	
	$IQ="Insert into category (CategoryName,CategoryDescription,statusID)
	values('$CategoryName','$CategoryDescription','$status')";

	$R=mysqli_query($CN,$IQ);
	if($R)
	{
		$Message="Category Saved Successfully";
	}
	else
	{
		$Message="Server Error ...";
	}
	$Response[]=array("Message"=>$Message);
	echo json_encode($Response)
?>