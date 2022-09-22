<?php

session_start();
include "db_conn.php";

if(isset($_POST['u_username']) && isset($_POST['u_password']) && isset($_POST['u_role'])) {
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$u_username = test_input($_POST['u_username']);
	$u_password = test_input($_POST['u_password']);
	$u_role = test_input($_POST['u_role']);

    if (empty($u_username)) {
		header("Location:index.php?error=User Name is Required");
	
	}else if (empty($u_password)) {
		header("Location:index.php?error=Password is Required");
	}else {
		
		$u_password = md5($u_password);
		
		$sql = "SELECT * FROM users WHERE u_username='$u_username' AND u_password='$u_password'";
		
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) === 1){
			
			$row = mysqli_fetch_assoc($result);
			
			if ($row['u_password'] === $u_password && $row['u_role'] == $u_role && $row['u_approved'] == 1 ){
				
				$_SESSION['u_name'] = $row['u_name'];
				$_SESSION['u_id'] = $row['u_id'];
				$_SESSION['u_username'] = $row['u_username'];
				$_SESSION['u_surname'] = $row['u_surname'];
				$_SESSION['u_email'] = $row['u_email'];
				$_SESSION['u_role'] = $row['u_role'];
				
				header("Location:homepage.php");
			}else if ($row['u_password'] === $u_password && $row['u_role'] == $u_role && $row['u_approved'] == 0 ){
			
			header("Location:index.php?error=Your account needs an admin approval in order to log in!");
				
			}else{
				
				header("Location:index.php?error=Incorrect User name or password");
			}
			
		}else {
			header("Location:index.php?error=Incorrect User name or password");
		}
		
	}

	
}else {
	
	header("Location:index.php");
	
}