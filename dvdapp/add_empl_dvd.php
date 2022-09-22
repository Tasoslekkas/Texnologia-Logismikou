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
	
	<form class="border shadow p-3 rounded" action="check_add_dvd.php" method="post" style="width: 450px">
	<h1 class="text-center p-3">-New DVD-</h1>
	
	<?php if (isset($_GET['error'])){ ?>
		
	<div class="alert alert-danger" role="alert">
     <?=$_GET['error']?>
    </div>
	
	<?php } ?>
	
	
	
	
	
  <div class="mb-3">
    <label for="d_title" 
	class="form-label">Title</label>
    <input type="text" class="form-control" id="d_title" name = "d_title">
    
  </div>
  
  <div class="mb-3">
    <label for="d_actors" 
	class="form-label">Actors</label>
    <input type="text" class="form-control" id="d_actors" name = "d_actors">
    
  </div>
  
  <div class="mb-3">
    <label for="d_director" 
	class="form-label">Director</label>
    <input type="text" class="form-control" id="d_director" name = "d_director">
    
  </div>
  
  <div class="mb-3">
    <label for="d_lang" 
	class="form-label">Languages</label>
    <input type="text" class="form-control" id="d_lang" name = "d_lang">
    
  </div>
  
  <div class="mb-3">
    <label for="d_subs" 
	class="form-label">Subtitles</label>
    <input type="text" class="form-control" id="d_subs" name = "d_subs">
    
  </div>
  
  <div class="mb-3">
    <label for="d_duration" 
	class="form-label">Duration</label>
    <input type="number" class="form-control" id="d_duration" name = "d_duration">
    
  </div>
  
  
  

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
  
  
  <div class="mb-3">
    <label for="d_price" 
	class="form-label">Price</label>
    <input type="number" class="form-control" id="d_price" name = "d_price">
    
  </div>
  
  <div class="mb-3">
    <label for="d_date" 
	class="form-label">Release date</label>
    <input type="date" class="form-control" id="d_date" name = "d_date">
    
  </div>
  
  <div class="mb-3">
    <label for="d_stock" 
	class="form-label">Stock</label>
    <input type="number" class="form-control" id="d_stock" name = "d_stock">
    
  </div>
<br>
 
  <button type="submit" class="btn btn-success" name="add">Add</button><br>
  
 
  
</form>
   
</form>

		</body>






</html>