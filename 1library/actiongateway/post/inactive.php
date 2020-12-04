<?php
	require_once("../../common/connection.php");
$ID=$_POST['ID'];
$UQ="Update post set statusID=0 where ID=$ID";
$R=mysqli_query($CN,$UQ);
if($R==0)
{
    $Message="Slot has been deactivated successfully";
}
else
{
    $Message="Slot...Error";
}
$Response[]=array("Message"=>$Message);
echo json_encode($Response)
?>
?>