
<?php
	require_once("../common/connection.php");

	$Keyword=$_POST["Keyword"];
	$CatID=$_POST["Catname"];
	
	$IQ = "Insert into keycat (Keyword,catID)
	values('$Keyword','$CatID')";

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