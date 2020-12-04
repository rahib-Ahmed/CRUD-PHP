
	<?php
		require_once("../common/connection.php");

		$SQ="Select * from usercomment  order by id desc";
   
		global $CN;

		$Table=mysqli_query($CN,$SQ);

		
 		$SNo=1;

		while($Row=mysqli_fetch_array($Table))
		{
			$Res[]=array("Row"=>$Row);
			//print_r($Res);
			//print_r($Row);while($Row=mysqli_fetch_array($Table)){
				$ID=$Row['ID'];
			$Name=$Row['UserName'];
			$Email=$Row['Email'];
			$Comment=$Row['Comment'];
	$CreatedDateTime=$Row['CreatedDateTime'];
	$statusID=$Row['statusID'];
			
			
			
	echo("<tr>");
	echo("<td>".$SNo."</td>");
			echo("<td>".$Name."</td>");
			echo("<td>".$Comment."</td>");
	echo("<td>".$Email."</td>");
	
				echo("<td>".$CreatedDateTime."</td>");
				
				
	echo("<td>
	<a href='#' type='button' 
	class='btn btn-success btn-flat'
	onClick='Active($ID)'
	title='Active'
	tooltip='Active'
	data-original-title='Active'>
	<i class='fa fa-check'></i>
	</a>
	<a href='#' type='button' 
	class='btn btn-warning btn-flat'
	onClick='inactive($ID)'
	title='inactive'
	tooltip='inactive'
	data-original-title='inactive'>
	<i class='fa fa-close'></i>
	</a>

	<a href='#' type='button' 
	class='btn btn-danger btn-flat'
	onClick='DeleteRecord($ID)'
	title='deleteRecord'
	tooltip='deleteRecord'
	data-original-title='deleteRecord'>
	<i class='fa fa-trash-o'></i>
	</a>
	</td>");
			echo("<td>".$statusID."</td>");
	echo("</tr>");
	$SNo++;
			echo($Row["CategoryName"]);
			
		}

?>
