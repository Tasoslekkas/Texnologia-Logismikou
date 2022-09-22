<?php
    session_start(); ?>


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
				
				
				<li style="float:left;"><a href="homepage.php"style="display:block; color:white; text-align:center; padding: 14px 16px; text-decoration: none;">Home</a></li>				
				
			</ul>
			
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
	
	<form class="border shadow p-3 rounded" action="profile_update.php" method="post" style="width: 450px">
	<h1 class="text-center p-3">My Information</h1>
	
	<?php if (isset($_GET['error'])){ ?>
		
	<div class="alert alert-danger" role="alert">
     <?=$_GET['error']?>
    </div>
	
	<?php } ?>
	
	
	
	
	
  <div class="mb-3">
    <label for="u_name" 
	class="form-label">Name</label>
    <input type="text" class="form-control" id="u_name" name = "u_name" value = "<?=$_SESSION['u_name']?>">
    
  </div>
  
  <div class="mb-3">
    <label for="u_surname" 
	class="form-label">Surname</label>
    <input type="text" class="form-control" id="u_surname" name = "u_surname" value = "<?=$_SESSION['u_surname']?>">
    
  </div>
  
  
  
  
  
  <div class="mb-3">
    <label for="u_email" 
	class="form-label">Email</label>
    <input type="text" class="form-control" id="u_email" name = "u_email" value = "<?=$_SESSION['u_email']?>">
    
  </div>
      
 
  
  <div class="mb-3">
    <label for="u_password" 
	class="form-label">Password</label>
    <input type="password" class="form-control" id="u_password" name = "u_password" >
    
  </div>
  
  <div class="mb-3">
    <label for="repeat_password" 
	class="form-label">Repeat Password</label>
    <input type="password" class="form-control" id="repeat_password" name = "repeat_password">
    
  </div>
  
  <div class="mb-1">
    <label class="form-label">Select User Type:</label>
    
  </div>
  
  <?php if ($_SESSION['u_role'] == 'admin'){?>
  <select class="form-select mb-3" name="role" aria-label="Default select example" >
  
  <option value="client">Client</option>
  <option value="employer">Employer</option>
  <option selected value="admin">Admin</option>
</select>
  
  <button type="submit" class="btn btn-primary" name="edit">Change Information</button><br>  
 
 <?php }else if($_SESSION['u_role'] == 'client') { ?>
  
  <select class="form-select mb-3" name="u_role" aria-label="Default select example" >
  
  <option selected value="client">Client</option>
  
</select>
  
  <button type="submit" class="btn btn-primary" name="edit">Change Information</button><br>
  
  <?php }else { ?>
  
  <select class="form-select mb-3" name="u_role" aria-label="Default select example" >
  
  
  <option selected value="employer">Employer</option>
  
</select>
  
  <button type="submit" class="btn btn-primary" name="edit">Change Information</button><br>
  
  <?php } ?>
  
</form>
   
</form>

		</body>






</html>