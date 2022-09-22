<?php

include "db_conn.php"; 


    if ((isset($_GET['d_id'])) && (isset($_GET['u_id'])) && ($_GET['status'] == 'incart')) {
        
		$d_id = $_GET['d_id'];
		$u_id = $_GET['u_id'];
		
        mysqli_autocommit($conn, false);
		
		$sql1 = "select u_id
					   from dec_dvd where u_id = '$u_id'";
		
		$result1 = mysqli_query($conn, $sql1);
		
		
		
	
		
		
		
		if(mysqli_num_rows($result1) < 1 ){
			
			date_default_timezone_set('UTC');
			$myDate = date('Y/m/d');
			$sql2 = "INSERT INTO dec_dvd(u_id, d_id, dec_date) VALUES('$u_id', '$d_id' , '$myDate')";
			$result2 = mysqli_query($conn, $sql2);
			
			if ($result2) {
            mysqli_commit($conn);
			header("Location:homepage.php");
            } else {
            mysqli_rollback($conn);
            }		
		}else {		
			
			$sql4 = "select dec_date
					   from dec_dvd where u_id = '$u_id'";
		
		$result4 = mysqli_query($conn, $sql4);
		$row = mysqli_fetch_array($result4);
		$dec_date=$row['dec_date'];
			
			
			$sql3 = "INSERT INTO dec_dvd(u_id, d_id, dec_date) VALUES('$u_id', '$d_id', '$dec_date')";
			$result3 = mysqli_query($conn, $sql3);
			
			
			
			if ($result3) {
            mysqli_commit($conn);
			header("Location:homepage.php");
           } else {
            mysqli_rollback($conn);
           }
			
			
		}
		
			   
					   
					   
	
	
    }
    
	
	
	?>