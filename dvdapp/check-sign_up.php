<?php

session_start();
include "db_conn.php";

if(isset($_POST['u_name']) && isset($_POST['u_surname']) && isset($_POST['u_email']) && isset($_POST['u_username']) && isset($_POST['u_password']) && isset($_POST['repeat_password']) && isset($_POST['u_role'])) {
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$u_name = test_input($_POST['u_name']);
	$u_surname = test_input($_POST['u_surname']);
	$u_email = test_input($_POST['u_email']);
	$u_username = test_input($_POST['u_username']);
	$u_password = test_input($_POST['u_password']);
	$repeat_password = test_input($_POST['repeat_password']);
	$u_role = test_input($_POST['u_role']);
	$u_approved=0;
	
	$uppercase = preg_match('@[A-Z]@', $u_password);
    $lowercase = preg_match('@[a-z]@', $u_password);
    $number    = preg_match('@[0-9]@', $u_password);
    $specialChars = preg_match('@[^\w]@', $u_password);

    if (empty($u_name)) {
		header("Location:sign-up.php?error=Name is Required");
	
	}else if (empty($u_surname)) {
		header("Location:sign-up.php?error=Surname is Required");
	}else if(empty($u_email)) {
		header("Location:sign-up.php?error=Email is Required");
	}else if(empty($u_username)) {
		header("Location:sign-up.php?error=Username is Required");
	}else if(empty($u_password)) {
		header("Location:sign-up.php?error=Password is Required");
	}else if(empty($repeat_password)) {
		header("Location:sign-up.php?error=Repeat Password is Required");
	}else if($u_password !== $repeat_password) {
		header("Location:sign-up.php?error=The password does not match");
	}else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($u_password) < 8){
		header("Location:sign-up.php?error=Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character");
	}else if(strlen($u_username)<5){
		header("Location:sign-up.php?error=The username must have at least 5 characters");
	}else {
		
		$u_password = md5($u_password);
		
		$sql = "SELECT * FROM users WHERE u_username='$u_username'";
		
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0){
			
			header("Location:sign-up.php?error=An Account with this Username, already exists");
			
		}else{
			
			$sql2 = "INSERT INTO users(u_role, u_username, u_password, u_name, u_surname, u_email, u_approved) VALUES('$u_role', '$u_username', '$u_password', '$u_name', '$u_surname', '$u_email', '$u_approved')";
			$result2 = mysqli_query($conn, $sql2);
			header("Location:first-page.php");
		}
		
	}

	
}else {
	
	header("Location:sign-up.php");
	
}