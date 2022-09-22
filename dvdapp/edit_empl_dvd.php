<?php
    session_start(); 
	include "db_conn.php"; 
	
	if ((isset($_GET['d_id'])) && ($_GET['status'] == 'edit')){
		
		$d_id = $_GET['d_id'];
        mysqli_autocommit($conn, false);
		
		
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
            from dvd where d_id=$d_id";
			
        $result = mysqli_query($conn, $sql); 

        $row = mysqli_fetch_array($result);
		
        
		
		$d_title = $row['d_title'];
	$d_actors =  $row['d_actors'];
	$d_director =  $row['d_director'];
	$d_lang =  $row['d_lang'];
	$d_subs =  $row['d_subs'];
	$d_duration =  $row['d_duration'];
	$d_genre =  $row['d_genre'];
	$d_price = $row['d_price'];
	$d_date = $row['d_date'];
	$d_stock = $row['d_stock'];
		
		
		
		
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
			
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
	
	<form class="border shadow p-3 rounded" method="post"  style="width: 450px">
	<h1 class="text-center p-3">-Edit DVD-</h1>
	
	
	
	
	
  <div class="mb-3">
    <label for="d_title" 
	class="form-label">Title</label>
    <input type="text" class="form-control" id="d_title" name = "d_title" value = "<?=$d_title?>">
    
  </div>
  
  <div class="mb-3">
    <label for="d_actors" 
	class="form-label">Actors</label>
    <input type="text" class="form-control" id="d_actors" name = "d_actors" value = "<?=$d_actors?>">
    
  </div>
  
  <div class="mb-3">
    <label for="d_director" 
	class="form-label">Director</label>
    <input type="text" class="form-control" id="d_director" name = "d_director" value = "<?=$d_director?>">
    
  </div>
  
  <div class="mb-3">
    <label for="d_lang" 
	class="form-label">Languages</label>
    <input type="text" class="form-control" id="d_lang" name = "d_lang" value = "<?=$d_lang?>">
    
  </div>
  
  <div class="mb-3">
    <label for="d_subs" 
	class="form-label">Subtitles</label>
    <input type="text" class="form-control" id="d_subs" name = "d_subs" value = "<?=$d_subs?>">
    
  </div>
  
  <div class="mb-3">
    <label for="d_duration" 
	class="form-label">Duration</label>
    <input type="number" class="form-control" id="d_duration" name = "d_duration" value = "<?=$d_duration?>">
    
  </div>
  
  
  <?php  if( $d_genre == 'comedy' ){   ?>

  <div class="mb-1">
    <label class="form-label">Select Genre</label>
    
  </div>
  <select class="form-select mb-3" name="d_genre" aria-label="Default select example">
  <option selected value="comedy">Comedy</option>
  <option value="drama">Drama</option>
  <option value="action">Action</option>
  <option value="erotic">Erotic</option>
  <option value="thriller">Thriller</option>
  
  </select>
  
  <?php } else if($d_genre == 'drama'){ ?>
  
  
  
  <div class="mb-1">
    <label class="form-label">Select Genre</label>
    
  </div>
  <select class="form-select mb-3" name="d_genre" aria-label="Default select example">
  <option  value="comedy">Comedy</option>
  <option selected value="drama">Drama</option>
  <option value="action">Action</option>
  <option value="erotic">Erotic</option>
  <option value="thriller">Thriller</option>
  
  </select>
  
  
  <?php } else if($d_genre == 'action'){ ?>
  
  
  
  <div class="mb-1">
    <label class="form-label">Select Genre</label>
    
  </div>
  <select class="form-select mb-3" name="d_genre" aria-label="Default select example">
  <option  value="comedy">Comedy</option>
  <option  value="drama">Drama</option>
  <option selected value="action">Action</option>
  <option value="erotic">Erotic</option>
  <option value="thriller">Thriller</option>
  
  </select>
  
  
  <?php } else if($d_genre == 'erotic'){ ?>
  
  
  
  <div class="mb-1">
    <label class="form-label">Select Genre</label>
    
  </div>
  <select class="form-select mb-3" name="d_genre" aria-label="Default select example">
  <option  value="comedy">Comedy</option>
  <option  value="drama">Drama</option>
  <option value="action">Action</option>
  <option selected value="erotic">Erotic</option>
  <option value="thriller">Thriller</option>
  
  </select>
  
  <?php } else if($d_genre == 'thriller'){ ?>
  
  
  
  <div class="mb-1">
    <label class="form-label">Select Genre</label>
    
  </div>
  <select class="form-select mb-3" name="d_genre" aria-label="Default select example">
  <option  value="comedy">Comedy</option>
  <option  value="drama">Drama</option>
  <option value="action">Action</option>
  <option value="erotic">Erotic</option>
  <option selected value="thriller">Thriller</option>
  
  </select>
  
  
  <?php } ?>
  
  
  
  
  
  
  <div class="mb-3">
    <label for="d_price" 
	class="form-label">Price</label>
    <input type="number" class="form-control" id="d_price" name = "d_price" value = "<?=$d_price?>">
    
  </div>
  
  <div class="mb-3">
    <label for="d_date" 
	class="form-label">Release date</label>
    <input type="date" class="form-control" id="d_date" name = "d_date" value = "<?=$d_date?>">
    
  </div>
  
  <div class="mb-3">
    <label for="d_stock" 
	class="form-label">Stock</label>
    <input type="number" class="form-control" id="d_stock" name = "d_stock" value = "<?=$d_stock?>">
    
  </div>
<br>
 
  <button type="submit" class="btn btn-primary" name="submit" value="update1">Update Info</button><br>
  

  
</form>
   
<?php
  
  
  if (isset($_POST['submit']) && $_POST['submit'] == "update1"){
	  
	
	$d_title = $_POST['d_title'];
	$d_actors = $_POST['d_actors'];
	$d_director = $_POST['d_director'];
	$d_lang = $_POST['d_lang'];
	$d_subs = $_POST['d_subs'];
	$d_duration = $_POST['d_duration'];
	$d_genre = $_POST['d_genre'];
	$d_price = $_POST['d_price'];
	$d_date = $_POST['d_date'];
	$d_stock = $_POST['d_stock'];
	
	$select= "select * from dvd where d_id='$d_id'";
    $sql1 = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql1);
	
    $res= $row['d_id'];
	
	if($res === $d_id)
    {
	$update = "update dvd set d_title='$d_title',d_actors='$d_actors', d_director='$d_director', d_lang='$d_lang', d_subs='$d_subs' d_duration='$d_duration', d_genre='$d_genre', d_price='$d_date', d_stock='$d_stock' where d_id='$d_id'";
         $sql2=mysqli_query($conn,$update);
  
		if($sql2)
       { 
           /*Successful*/
           
		   header('location:homepage.php');
       }
  }
  }
  
  
  ?>

		</body>






</html>