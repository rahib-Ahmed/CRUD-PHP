<?php 
    $CN=mysqli_connect("localhost","root","");
        if(!$CN)
        {
            echo("Server not established");
        }
        $DB=mysqli_select_db($CN,"demo3");
         if(!$DB)
         {
             echo("Server error");
         }
?>