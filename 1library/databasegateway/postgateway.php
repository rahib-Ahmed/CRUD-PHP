<?php
			require_once("../common/connection.php");
			$title=$_POST['title'];
			$category=$_POST['category'];
	$thumbnail=$_POST['thumbnail'];
	$descript=$_POST['des'];
			$key=$_POST['key'];
$status=$_POST["statusID"];
$filename=$_FILES['F1']['name'];
$tmp=$_FILES['F1']['tmp_name'];
		$RegDateTime=date('y-m-d');
		
$IQ="Insert into post (Title,CatID,Thumbnail,Description,statusID,KeywordID,CreatedDateTime) values ('$title','$category','$thumbnail','$descript','$status','$key','$RegDateTime')";

$R=mysqli_query($CN,$IQ);
if($R)
	{
		$ID=mysqli_insert_id($CN);
		$Imagename=$ID.".jpg";
		
		$UQ="update post set Thumbnail='$Imagename'where ID=$ID";
		mysqli_query($CN,$UQ);
		$location="../../upload/".$Imagename;
		
		move_uploaded_file($tmp,$location);
		$Message="Category Saved Successfully";
	}
	else	
	{
		$Message="Server Error ...";
	}
	$Response[]=array("Message"=>$Message);
	echo json_encode($Response);
?>									