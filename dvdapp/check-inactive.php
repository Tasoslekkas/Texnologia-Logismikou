<?php

include "db_conn.php"; 


    
    if ((isset($_GET['u_id'])) && ($_GET['status'] == 'inactive')) {
        $u_id = $_GET['u_id'];
        
		$update = "update users set u_approved= 0 where u_id='$u_id'";
         $sql=mysqli_query($conn,$update);
        
		
		
        if($sql)
       { 
           /*Successful*/
           
		   header('location:all_users.php');
       }
    }
    
	
	
	?>