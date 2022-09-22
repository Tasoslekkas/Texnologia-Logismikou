<?php

include "db_conn.php"; 


    if ((isset($_GET['dec_id'])) && ($_GET['status'] == 'delete')) {
       
	    $dec_id = $_GET['dec_id'];
		
        mysqli_autocommit($conn, false);
        $sql = "delete FROM dec_dvd
									WHERE
						dec_id = '$dec_id'";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            mysqli_commit($conn);
			header("Location:view_my_cart.php");
        } else {
            mysqli_rollback($conn);
        }
    }
    
	
	
	?>