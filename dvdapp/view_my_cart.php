<?php
    
	session_start();
    include ("db_conn.php");
	
	$u_id=$_SESSION['u_id'];
	
	
		
		$sql3 = "select dec_id
					   from dec_dvd where u_id = '$u_id'";
		
		$result3 = mysqli_query($conn, $sql3);
		
		
		if(mysqli_num_rows($result3) > 0 ){
		$sql4 = "select dec_date
					   from dec_dvd where u_id = '$u_id'";
		
		$result4 = mysqli_query($conn, $sql4);
		$row = mysqli_fetch_array($result4);
		$dec_date=$row['dec_date'];
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
				
				
				<li style="float:left;"><a href="homepage.php"style="display:block; color:white; text-align:center; padding: 14px 16px; text-decoration: none;">Home</a></li>				
				
			</ul>
			
  
<br>
<br>
<br>

<h1><center>-My Cart-</center></h1>
<h8><center>This cart was created at</center></h8>

<?php     if(mysqli_num_rows($result3) > 0 ){  ?> 

<h8><center>-<?php echo $dec_date; ?>-</center></h8> <?php } ?>

<br>

<?php if (isset($_GET['error'])){ ?>
		
	<div class="alert alert-danger" role="alert">
     <?=$_GET['error']?>
    </div>
	
	<?php } ?>


<center>
	
	<?php
	
    
	$sql = "select  dvd.d_id,
	                dvd.d_title,
	                dvd.d_director,
                    dvd.d_date,
                    dvd.d_price,
					dec_dvd.dec_id
            from dvd,dec_dvd where dvd.d_id = dec_dvd.d_id AND dec_dvd.u_id=$u_id ";

    $result = mysqli_query($conn, $sql);
	
	
    ?>

	
	
	
	<table class="table table-dark table-hover" style="width: 82%;">
  <thead>
    <tr>
      
      
      <th scope="col">Title</th>
      <th scope="col">Director</th>
	  <th scope="col">Release Date</th>
	  <th scope="col">Price</th>
	  
	  
	  <th scope="col"></th>
	  
	  
    </tr>
  </thead>


  <?php
  $total_price=0;
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr class="alt">
                
                <td><?php echo $row['d_title']; ?></td>
                <td><?php echo $row['d_director']; ?></td>
				<td><?php echo $row['d_date']; ?></td>
				<td><?php echo $row['d_price']; ?></td>
			
				
<td><a onClick="return confirm('Are you sure you want to remove this DVD from your cart?')" href="del_dec_dvd.php?status=delete&dec_id=<?php echo $row['dec_id']; ?>"><img src="cancel-photo.jpg" style="height:32px; width:32px;"></a></td>            
				
	
				
            </tr>
            <?php
							$total_price += ($row['d_price']);

        }
		
		
        ?>
		
		<tr>
        <td colspan="3" align="right">Total:</td>
		<td align="left" colspan="3"><strong><?php echo "€".number_format($total_price, 0); ?></strong></td>
		
		
</table>
	<br>
<br>


          <?php
if(mysqli_num_rows($result3) > 0 ){ ?>
	<a href="buy_now.php?status=buy&u_id=<?php echo $u_id; ?>&total_price=<?php echo $total_price; ?>" class="btn btn-warning">Buy Now</a>
	
<?php } ?>
	
</center>	
	
	
	
	
	

		</body>






</html>