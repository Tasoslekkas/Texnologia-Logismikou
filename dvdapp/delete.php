<?php

include "db_conn.php"; 


    if ((isset($_GET['u_id'])) && ($_GET['status'] == 'delete')) {
        $u_id = $_GET['u_id'];
        mysqli_autocommit($conn, false);
        $sql = "delete FROM users
									WHERE
						u_id = '$u_id'";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            mysqli_commit($conn);
			header("Location:all_users.php");
        } else {
            mysqli_rollback($conn);
        }
    }
    
	
	
	?>
