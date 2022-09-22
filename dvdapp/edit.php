<?php
 
 session_start();
 include "db_conn.php";
 
 if ((isset($_GET['u_id'])) && ($_GET['status'] == 'edit-update')) {
        $u_id = $_GET['u_id'];

        $sql = "select u_id,
                        u_name,
						u_surname,
						u_email,
						u_role
                from users where u_id = '$u_id'";
        $result = mysqli_query($conn, $sql); 

        $row = mysqli_fetch_array($result);
		
        $u_name = $row['u_name'];
        $u_surname = $row['u_surname'];
        $u_email = $row['u_email'];
		$u_role = $row['u_role'];
		
    }
    
?>







<!DOCTYPE html>


<html>


<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"> 
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<style>
	li a:hover {
  background-color: #111;
}

</style>
</head>

<body>

<div class="header" style="padding: 1px; text-align: center; background: #1abc9c; color: white; font-size: 30px">
<h1>DvD-app</h1>
<p>..The Best App..</p>
</div>

<ul style="list-style-type:none; margin:0; padding:0; overflow:hidden; background-color:#333">
				
				
				<li style="float:left;"><a href="all_users.php"style="display:block; color:white; text-align:center; padding: 14px 16px; text-decoration: none;">Back</a></li>				
				
			</ul>
	
	
	<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
	
	<form class="border shadow p-3 rounded"  method="post" style="width: 450px">
	<h1 class="text-center p-3">-User's Information-</h1>
	
	
  <div class="mb-3">
    <label for="u_name" 
	class="form-label">Name</label>
    <input type="text" class="form-control" id="u_name" name = "u_name" value = "<?=$u_name?>">
    
  </div>
  
  <div class="mb-3">
    <label for="u_surname" 
	class="form-label">Surname</label>
    <input type="text" class="form-control" id="u_surname" name = "u_surname" value = "<?=$u_surname?>">
    
  </div>
  
  
  
  <div class="mb-3">
    <label for="u_email" 
	class="form-label">Email</label>
    <input type="text" class="form-control" id="u_email" name = "u_email" value = "<?=$u_email?>">
    
  </div>
    
 
  
  <div class="mb-1">
    <label class="form-label">Select User Type:</label>
    
  </div>
  
  <?php if ($u_role == 'admin'){?>
  <select class="form-select mb-3" name="u_role" aria-label="Default select example" >
  
  <option value="client">Client</option>
  <option value="employer">Employer</option>
  <option selected value="admin">Admin</option>
</select>
  
    
 
 <?php }else if($u_role == 'client') { ?>
  
  <select class="form-select mb-3" name="u_role" aria-label="Default select example" >
  
  <option selected value="client">Client</option>
  <option value="employer">Employer</option>
  <option  value="admin">Admin</option>
</select>
  
  
  
  <?php }else { ?>
  
  <select class="form-select mb-3" name="u_role" aria-label="Default select example" >
  
  <option  value="client">Client</option>
  <option selected value="employer">Employer</option>
  <option  value="admin">Admin</option>
</select>
  

  <?php } ?> 
  
  
  
<button type="submit" class="btn btn-primary" name="submit" value="update1">Change Information</button><br>  
  

   
</form>
	
	<?php
  
  
  if (isset($_POST['submit']) && $_POST['submit'] == "update1"){
	  
	$u_name=$_POST['u_name'];
    $u_surname=$_POST['u_surname'];
    $u_email=$_POST['u_email'];
	
	$u_role=$_POST['u_role'];
    $select= "select * from users where u_id='$u_id'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['u_id'];
	
	
	

	
    if($res === $u_id)
    {
        
		 
		
		 $update = "update users set u_name='$u_name',u_surname='$u_surname', u_email='$u_email', u_role='$u_role' where u_id='$u_id'";
         $sql2=mysqli_query($conn,$update);
		
      
       if($sql2)
       { 
           /*Successful*/
           
		   header('location:all_users.php');
       }
     
    
	}
	  
	 	  
	  
	  
  }
  
  
  
  
  ?>
	

		</body>






</html>