<?php
    session_start();
	include ("db_conn.php");
	if (isset($_SESSION['u_username']) && ($_SESSION['u_id'])){ ?>
		
	


<!DOCTYPE html>


<html>


<head>
    <title>HOME</title>
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
				
				
				<li style="float:left;"><a href="profile.php"style="display:block; color:white; text-align:center; padding: 14px 16px; text-decoration: none;">My Profile</a></li>
				
				
				
			</ul>
	<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
	


	<?php if ($_SESSION['u_role'] == 'admin'){?>
		
		<div class="card" style="width: 28rem;">
  <img src="admin_photo.JPG" class="card-img-top" alt="admin image">
  <div class="card-body">
    <h5 class="card-title">
	<?=$_SESSION['u_name']?>
	</h5>
	
    <a href="first-page.php" class="btn btn-dark">Logout</a>
	<a href="all_users.php" class="btn btn-dark">All Users</a>
	<a href="unapproved_users.php" class="btn btn-dark">Unapproved Users</a>
  </div>
</div>
		
		
	<?php }else if($_SESSION['u_role'] == 'client') { ?>
	
	
	
	<div class="card" style="width: 30rem;">
  <img src="users_photo.JPG" class="card-img-top" alt="users image">
  <div class="card-body">
    <h5 class="card-title">
	<?=$_SESSION['u_name']?>
	</h5>
	
    <a href="first-page.php" class="btn btn-dark">Logout</a>

	<a href="view_my_cart.php" class="btn btn-dark">My Cart</a>
	<a href="my_orders.php" class="btn btn-dark">My Orders</a>
  </div>
</div>
</div>


<h1><center>-All Available DvDs-</center></h1>


<br><br>
<center>

<?php
	
    
	$sql = "select  d_id,
					d_title,
					d_actors,
					d_director,
					d_lang,
					d_subs,
					d_duration,
					d_genre,
					d_price,
					d_date,
					d_stock
            from dvd where d_stock>0";

    $result = mysqli_query($conn, $sql);
    ?>

<table class="table table-dark table-hover" style="width: 82%;">
  <thead>
    <tr>
      
      
      <th scope="col">Title</th>
      <th scope="col">Actors</th>
	  <th scope="col">Director</th>
	  <th scope="col">Languages</th>
	  <th scope="col">Subtitles</th>
	  <th scope="col">Duration(min)</th>
	  <th scope="col">Genre</th>
	  <th scope="col">Price</th>
	  <th scope="col">Release Date</th>
	  <th scope="col">Stock</th>
	  <th scope="col"></th>
	  <th scope="col"></th>
	  
	  
    </tr>
  </thead>

<?php
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr class="alt">
                <td><?php echo $row['d_title']; ?></td>
                <td><?php echo $row['d_actors']; ?></td>
				<td><?php echo $row['d_director']; ?></td>
				<td><?php echo $row['d_lang']; ?></td>
				<td><?php echo $row['d_subs']; ?></td>
				<td><?php echo $row['d_duration']; ?></td>
				<td><?php echo $row['d_genre']; ?></td>
				<td><?php echo $row['d_price']; ?></td>
				<td><?php echo $row['d_date']; ?></td>
				<td><?php echo $row['d_stock']; ?></td>
				
				<td></td>
				
			<td><a onClick="return confirm('Are you sure you want to add this DVD in your cart?')" href="add_dvd_cart.php?status=incart&d_id=<?php echo $row['d_id']; ?>&u_id=<?php echo $_SESSION['u_id']; ?>"><img src="cart.png" style="height:32px; width:32px;"></a></td>
				
	
				
            </tr>
            <?php
        }
        ?>
</table>
	
	<?php }else { ?>
		
		<div class="card" style="width: 28rem;">
  <img src="users_photo.JPG" class="card-img-top" alt="users image">
  <div class="card-body">
    <h5 class="card-title">
	<?=$_SESSION['u_name']?>
	</h5>
	
    <a href="first-page.php" class="btn btn-dark">Logout</a>
	<a href="add_empl_dvd.php" class="btn btn-success">+ New DVD</a>
	<a href="view_empl_orders.php" class="btn btn-dark">View Orders</a>
	
  </div>
</div>
</div>


<h1><center>-All DvDs-</center></h1>

<br><br>
<center>

<?php
	
    
	$sql = "select  d_id,
					d_title,
					d_actors,
					d_director,
					d_lang,
					d_subs,
					d_duration,
					d_genre,
					d_price,
					d_date,
					d_stock
            from dvd where d_stock>0";

    $result = mysqli_query($conn, $sql);
    ?>

<table class="table table-dark table-hover" style="width: 82%;">
  <thead>
    <tr>
      
      
      <th scope="col">Title</th>
      <th scope="col">Actors</th>
	  <th scope="col">Director</th>
	  <th scope="col">Languages</th>
	  <th scope="col">Subtitles</th>
	  <th scope="col">Duration(min)</th>
	  <th scope="col">Genre</th>
	  <th scope="col">Price</th>
	  <th scope="col">Release Date</th>
	  <th scope="col">Stock</th>
	  <th scope="col"></th>
	  <th scope="col"></th>
	  <th scope="col"></th>
	  
	  
    </tr>
  </thead>

<?php
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr class="alt">
                <td><?php echo $row['d_title']; ?></td>
                <td><?php echo $row['d_actors']; ?></td>
				<td><?php echo $row['d_director']; ?></td>
				<td><?php echo $row['d_lang']; ?></td>
				<td><?php echo $row['d_subs']; ?></td>
				<td><?php echo $row['d_duration']; ?></td>
				<td><?php echo $row['d_genre']; ?></td>
				<td><?php echo $row['d_price']; ?></td>
				<td><?php echo $row['d_date']; ?></td>
				<td><?php echo $row['d_stock']; ?></td>
				
				<td></td>
				
			<td><a onClick="return confirm('Are you sure you want to remove this dvd from the list?')" href="del_empl_dvd.php?status=delete&d_id=<?php echo $row['d_id']; ?>"><img src="kados.jpg" style="height:32px; width:32px;"></a></td>
			<td><a href="edit_empl_dvd.php?status=edit&d_id=<?php echo $row['d_id']; ?>"><img src="edit_image.jpg" style="height:32px; width:32px;"></a></td>	
	
				
            </tr>
            <?php
        }
        ?>
</table>

		
	<?php } ?>
	
	</div>
			
					

		</body>


</html>
	<?php }else{
		header("Location:index.php");
		
	} ?>