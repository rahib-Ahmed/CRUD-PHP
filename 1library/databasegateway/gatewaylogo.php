
<?php
	require_once("common/connectionlogo.php");

	$logoname=$_POST["logN"];
	$icon=$_POST["logIcon"];
	$link=$_POST["logLink"];
	
	$IQ="Insert into logo (logoname,icon,link)
	values('$logoname','$icon','$link')";

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
