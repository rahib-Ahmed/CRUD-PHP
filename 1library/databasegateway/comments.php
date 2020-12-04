
<?php
	require_once("../common/connection.php");

	$Name=$_POST["Name"];
	$Email=$_POST["Email"];
$Comment=$_POST["Comment"];
$CreatedDateTime=date('y-m-d');
	
	$IQ = "Insert into usercomment (UserName,Email,Comment,CreatedDateTime)
	values('$Name','$Email','$Comment','$CreatedDateTime')";

	$R=mysqli_query($CN,$IQ);
	if($R)
	{
		$Message="Comment Saved Successfully";
	}
	else
	{
		$Message="Missing Field ...";
	}
	$Response[]=array("Message"=>$Message);
	echo json_encode($Response)
?>