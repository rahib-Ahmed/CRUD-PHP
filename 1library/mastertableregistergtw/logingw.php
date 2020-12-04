<?php
	session_start();
	require_once("../common/connection.php");

	$MobileNo=$_POST["MobileNo"];
	$Password=$_POST["Password"];
	

	

	$LQ="select * from usermastertable where MobileNo='$MobileNo' and Password='$Password' and statusID=1";

	$Table=mysqli_query($CN,$LQ);

	if(mysqli_affected_rows($CN)>0)	{
					$Status=1;
		
				$Row=mysqli_fetch_array($Table);
		
		$_SESSION["UserID"]=$Row['ID'];
		$_SESSION["Fullname"]=$Row['Username'];
		$_SESSION["RegDateTime"]=$Row['CreatedDateTime'];
		$_SESSION["MobileNo"]=$Row['MobileNo'];
				
	}
	else
	{
		$Status=0;
	}
	$Response[]=array("Status"=>$Status);
	echo(json_encode($Response));

?>

