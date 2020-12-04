<?php
		require_once("../../common/connection.php");
$ID=$_POST['ID'];
$UQ="DELETE FROM usercomment WHERE ID=$ID";
$R=mysqli_query($CN,$UQ);
if($R==0)
{
    $Message="Slot has been deleted successfully";
}
else
{
    $Message="Slot...Error";
}
$Response[]=array("Message"=>$Message);
echo json_encode($Response)
?>