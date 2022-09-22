<?php

include "db_conn.php"; 


    if ((isset($_GET['d_id'])) && ($_GET['status'] == 'delete')) {
        $d_id = $_GET['d_id'];
        mysqli_autocommit($conn, false);
        $sql = "delete FROM dvd
									WHERE
						d_id = '$d_id'";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            mysqli_commit($conn);
			header("Location:homepage.php");
        } else {
            mysqli_rollback($conn);
        }
    }
    
	
	
	?>
