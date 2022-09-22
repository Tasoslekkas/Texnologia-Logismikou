<?php

include "db_conn.php"; 


    if ((isset($_GET['u_id'])) && (isset($_GET['total_price'])) && ($_GET['status'] == 'buy')) {
       
	    $u_id = $_GET['u_id'];
		$total_price=$_GET['total_price'];
		
        
    }
    
	
	
	?>
	
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
				
				
				<li style="float:left;"><a href="view_my_cart.php"style="display:block; color:white; text-align:center; padding: 14px 16px; text-decoration: none;">Back</a></li>				
				
			</ul>
			
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
	
	<form class="border shadow p-3 rounded" method="post" style="width: 450px">
	<h3 class="text-center p-3">Customer's Order Info:</h3>
	
	<?php if (isset($_GET['error'])){ ?>
		
	<div class="alert alert-danger" role="alert">
     <?=$_GET['error']?>
    </div>
	
	<?php } ?>
	
	
	
	
	
  <div class="mb-3">
    <label for="or_address" 
	class="form-label">Address</label>
    <input type="text" class="form-control" id="or_address" name = "or_address">
    
  </div>
  
  <div class="mb-3">
    <label for="or_num" 
	class="form-label">Address Number</label>
    <input type="number" class="form-control" id="or_num" name = "or_num">
    
  </div>
  
  
  
  
  
  <div class="mb-3">
    <label for="or_tk" 
	class="form-label">TK</label>
    <input type="number" class="form-control" id="or_tk" name = "or_tk">
    
  </div>
      
 
  
  <button type="submit" class="btn btn-primary" name="submit"   value="order1">Confirm</button><br>
  

  

   
</form>

<?php
  
  
  if (isset($_POST['submit']) && $_POST['submit'] == "order1"){
	  
	  $or_address=$_POST['or_address'];
	  $or_num=$_POST['or_num'];
	  $or_tk=$_POST['or_tk'];
	  
	  $randomNumber = rand(0,10000);
	  
	  $sql2 = "INSERT INTO orders(or_id, u_id, or_price, or_address, or_num, or_tk) VALUES('$randomNumber', '$u_id' , '$total_price', '$or_address', '$or_num', '$or_tk')";
	  $result2 = mysqli_query($conn, $sql2);
	  

$sql = "select  dvd.d_id,
	                dvd.d_title,
	                dvd.d_director,
                    dvd.d_date,
                    dvd.d_price,
					dec_dvd.dec_id,
					dvd.d_stock
            from dvd,dec_dvd where dvd.d_id = dec_dvd.d_id AND dec_dvd.u_id=$u_id ";

    $result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)){
	
	$tasos = $row['d_id'];
	$alex = $row['d_stock'];
	$x = 1;
	$kyriakos = $alex-$x;
	
	$sql1 = "INSERT INTO dec_orders(or_id, u_id, d_id) VALUES('$randomNumber', '$u_id' , '$tasos')";
	  $result1 = mysqli_query($conn, $sql1);
		
	$sql6 = "DELETE FROM dec_dvd WHERE u_id = $u_id ";
	$result6 = mysqli_query($conn, $sql6);

    $sql8 = "UPDATE dvd SET d_stock=$kyriakos WHERE d_id=$tasos ";
	$result8 = mysqli_query($conn, $sql8);	
	
}









if($sql2)
       { 
           /*Successful*/
           
		   header('location:homepage.php');
       }


  }

?>
		</body>






</html>