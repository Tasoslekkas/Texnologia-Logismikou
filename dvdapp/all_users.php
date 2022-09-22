<?php
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

<h1><center>-All Users-</center></h1>
<br>


<center>
	
	<?php
    $sql = "select  u_name,
	                u_id,
                    u_surname,
                    u_email,
					u_username,
                    u_role					
            from users where u_approved = 1";

    $result = mysqli_query($conn, $sql);
    ?>
	<table class="table table-dark table-hover" style="width: 82%;">
  <thead>
    <tr>
      
      <th scope="col">Name</th>
      <th scope="col">Surname</th>
      <th scope="col">Email</th>
	  <th scope="col">Username</th>
	  <th scope="col">Role</th>
	  <th scope="col"></th>
	  <th scope="col"></th>
	  <th scope="col"></th>
    </tr>
  </thead>
  <?php
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr class="alt">
                <td><?php echo $row['u_name']; ?></td>
                <td><?php echo $row['u_surname']; ?></td>
                <td><?php echo $row['u_email']; ?></td>
				<td><?php echo $row['u_username']; ?></td>
				<td><?php echo $row['u_role']; ?></td>
				
				<td><a onClick="return confirm('Are you sure you want to delete this user?')" href="delete.php?status=delete&u_id=<?php echo $row['u_id']; ?>"><img src="kados.jpg" style="height:32px; width:32px;"></a></td>
				<td><a href="edit.php?status=edit-update&u_id=<?php echo $row['u_id']; ?>"><img src="edit_image.jpg" style="height:32px; width:32px;"></a></td>
				<td><a onClick="return confirm('Are you sure you want to make this user inactive?')" href="check-inactive.php?status=inactive&u_id=<?php echo $row['u_id']; ?>"><img src="inactive.jpg" style="height:32px; width:32px;"></a></td>
            </tr>
            <?php
        }
        ?>
</table>
	
	
	
</center>	
	
	
	
	
	
	
	

		</body>






</html>