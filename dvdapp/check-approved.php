<?php

include "db_conn.php"; 


    
    if ((isset($_GET['u_id'])) && ($_GET['status'] == 'approve')) {
        $u_id = $_GET['u_id'];
        
		$update = "update users set u_approved= 1 where u_id='$u_id'";
         $sql=mysqli_query($conn,$update);
        
		
		
        if($sql)
       { 
           /*Successful*/
           
		   header('location:unapproved_users.php');
       }
    }
    
	
	
	?>