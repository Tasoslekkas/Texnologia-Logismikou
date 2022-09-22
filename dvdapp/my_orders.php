<?php
    
	session_start();
    include ("db_conn.php");
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
				
				
				<li style="float:left;"><a href="homepage.php"style="display:block; color:white; text-align:center; padding: 14px 16px; text-decoration: none;">Home</a></li>				
				
			</ul>
			
  
<br>
<br>
<br>

<h1><center>-My Orders-</center></h1>
<br>


<center>
	
	<?php
	$u_id=$_SESSION['u_id'];
    
	$sql = "select  or_id,
	                or_price
            from orders where u_id = $u_id ";

    $result = mysqli_query($conn, $sql);
	
	
	
	while ($row  = mysqli_fetch_array($result)) { ?>
	
    
<h3><center>-Order: <?php echo $row['or_id']; ?>-</center></h3>
	
	
	
	<?php    
	
	         $tasos=$row['or_id'];
             $sql1 = "select  dvd.d_title,
	                          dvd.d_director,
							  dvd.d_date,
                              dvd.d_price							  
                        from dvd,dec_orders where dec_orders.or_id = $tasos and dec_orders.d_id= dvd.d_id ";

    $result1 = mysqli_query($conn, $sql1);







	?>
	
	
	
	
	
	
	<table class="table table-dark table-hover" style="width: 82%;">
  <thead>
    <tr>
      
      <th scope="col">Title</th>
      <th scope="col">Director</th>
	  <th scope="col">Release Date</th>
	  <th scope="col">Price</th>
	  
	  
    </tr>
  </thead>


  <?php
        while ($row1 = mysqli_fetch_array($result1)) {
            ?>
            <tr class="alt">
                <td><?php echo $row1['d_title']; ?></td>
                <td><?php echo $row1['d_director']; ?></td>
				<td><?php echo $row1['d_date']; ?></td>
				<td><?php echo $row1['d_price']; ?></td>
				
			
				
	
				
            </tr>
            <?php
        }	
        ?>
		
		<td colspan="3" align="right">Total:</td>
		<td align="left" colspan="3"><strong><?php echo "€".number_format($row['or_price'], 0); ?></strong></td>
		
		
</table>
	<?php } ?>
	
	
</center>	
	
	
	
	
	

		</body>






</html>