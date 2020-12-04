<?php
require_once("../../common/connection.php");
$ID=$_POST['ID'];
$UQ="Update keycat set statusID=1 where ID=$ID";
$R=mysqli_query($CN,$UQ);
if($R==1)
{
    $Message="Slot has been activated successfully";
}
else
{
    $Message="Slot...Error";
}
$Response[]=array("Message"=>$Message);
echo json_encode($Response)
?>
