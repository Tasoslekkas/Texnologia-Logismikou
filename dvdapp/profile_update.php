<?php
 
 session_start();
 include "db_conn.php";
 
 if(isset($_POST['edit']))
 {
    $u_id=$_SESSION['u_id'];
    $u_name=$_POST['u_name'];
    $u_surname=$_POST['u_surname'];
    $u_email=$_POST['u_email'];
	$u_username=$_POST['u_username'];
	$u_password=$_POST['u_password'];
	$repeat_password = $_POST['repeat_password'];
	$u_role=$_POST['u_role'];
    $select= "select * from users where u_id='$u_id'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['u_id'];
	
	$uppercase = preg_match('@[A-Z]@', $u_password);
    $lowercase = preg_match('@[a-z]@', $u_password);
    $number    = preg_match('@[0-9]@', $u_password);
    $specialChars = preg_match('@[^\w]@', $u_password);
	
	if(empty($u_password)) {
		header("Location:profile.php?error=Password is Required");
	}else if(empty($repeat_password)) {
		header("Location:profile.php?error=Repeat Password is Required");
	}else if(empty($u_name)) {
		header("Location:profile.php?error=Name is Required");
	}else if(empty($u_surname)) {
		header("Location:profile.php?error=Surname is Required");
	}else if(empty($u_email)) {
		header("Location:profile.php?error=Email is Required");
	}else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($u_password) < 8){
		header("Location:profile.php?error=Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character");
	}else if($u_password !== $repeat_password) {
		header("Location:profile.php?error=The password does not match");
	}else{
	
	$u_password = md5($u_password);
	
    if($res === $u_id)
    {
        
		 
		
		 $update = "update users set u_name='$u_name',u_surname='$u_surname', u_email='$u_email', u_password='$u_password', u_role='$u_role' where u_id='$u_id'";
         $sql2=mysqli_query($conn,$update);
		
      
       if($sql2)
       { 
           /*Successful*/
           
		   header('location:first-page.php');
       }
     
    
	}
 }
 }
?>