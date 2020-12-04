
	<?php
		require_once("../common/connection.php");

		$SQ="Select * from admincomment  order by id desc";
   
		global $CN;

		$Table=mysqli_query($CN,$SQ);

		
 		$SNo=1;

		while($Row=mysqli_fetch_array($Table))
		{
			$Res[]=array("Row"=>$Row);
			//print_r($Res);
			//print_r($Row);while($Row=mysqli_fetch_array($Table)){
				$ID=$Row['ID'];
			$UserID=$Row['UserID'];
			
			$Comment=$Row['Comment'];
	$CreatedDateTime=$Row['CreatedDateTime'];
	$statusID=$Row['statusID'];
			
			
			
	echo("<tr>");
	echo("<td>".$SNo."</td>");
			echo("<td>".$UserID."</td>");

	echo("<td>".$Comment."</td>");
				echo("<td>".$CreatedDateTime."</td>");
				
				
	echo("<td>
	<a href='#' type='button' 
	class='btn btn-success btn-flat'
	onClick='Activea($ID)'
	title='Active'
	tooltip='Active'
	data-original-title='Active'>
	<i class='fa fa-check'></i>
	</a>
	<a href='#' type='button' 
	class='btn btn-warning btn-flat'
	onClick='inactivea($ID)'
	title='inactive'
	tooltip='inactive'
	data-original-title='inactive'>
	<i class='fa fa-close'></i>
	</a>

	<a href='#' type='button' 
	class='btn btn-danger btn-flat'
	onClick='DeleteRecorda($ID)'
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
