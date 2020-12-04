
<?php
	require_once("../common/connection.php");

	$UserID=$_POST["UserID"];
	
$Comment=$_POST["Comment"];
$CreatedDateTime=date('y-m-d');
	
	$IQ = "Insert into admincomment (UserID,Comment,CreatedDateTime)
	values('$UserID','$Comment','$CreatedDateTime')";

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