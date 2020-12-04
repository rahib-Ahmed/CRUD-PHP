
<?php
	require_once("../common/connection.php");

	$Username=$_POST["username"];
	$Email=$_POST["mails"];
$ContactNo=$_POST["phnno"];
$Password=$_POST["passwords"];
$RegDateTime=date('y-m-d');
	
	$IQ = "Insert into usermastertable (Username,Email,MobileNo,Password,CreatedDateTime)
	values('$Username','$Email','$ContactNo','$Password','$RegDateTime')";

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