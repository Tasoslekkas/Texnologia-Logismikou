<?php

include "db_conn.php"; 


    if ((isset($_GET['or_id'])) && ($_GET['status'] == 'delete')) {
        $or_id = $_GET['or_id'];
        mysqli_autocommit($conn, false);
		
		
        $sql = "delete FROM orders
									WHERE
						or_id = '$or_id'";

        $result = mysqli_query($conn, $sql);
		
		$sql1 = "delete FROM dec_orders
									WHERE
						or_id = '$or_id'";

        $result1 = mysqli_query($conn, $sql1);
		
        if ($result) {
            mysqli_commit($conn);
			header("Location:view_empl_orders.php");
        } else {
            mysqli_rollback($conn);
        }
    }
    
	
	
	?>
