<?php

session_start();
include "db_conn.php";

if(isset($_POST['d_title']) && isset($_POST['d_actors']) && isset($_POST['d_director']) && isset($_POST['d_lang']) && isset($_POST['d_subs'])  && isset($_POST['d_duration']) && isset($_POST['d_genre'])  && isset($_POST['d_price']) && isset($_POST['d_date']) && isset($_POST['d_stock'])) {
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$d_title = test_input($_POST['d_title']);
	$d_actors = test_input($_POST['d_actors']);
	$d_director = test_input($_POST['d_director']);
	$d_lang = test_input($_POST['d_lang']);
	$d_subs = test_input($_POST['d_subs']);
	$d_duration = test_input($_POST['d_duration']);
	$d_genre = test_input($_POST['d_genre']);
	$d_price = test_input($_POST['d_price']);
	$d_date = test_input($_POST['d_date']);
	$d_stock = test_input($_POST['d_stock']);
	

    if (empty($d_title)) {
		header("Location:add_empl_dvd.php?error=Title is Required");
	
	}else if (empty($d_actors)) {
		header("Location:add_empl_dvd.php?error=Actors are Required");
	}
	else if (empty($d_director)) {
		header("Location:add_empl_dvd.php?error=Director is Required");
	}
	else if (empty($d_lang)) {
		header("Location:add_empl_dvd.php?error=Language is Required");
	}
	else if (empty($d_subs)) {
		header("Location:add_empl_dvd.php?error=Subtitles are Required");
	}
	else if (empty($d_duration)) {
		header("Location:add_empl_dvd.php?error=Duration is Required");
	}
	else if (empty($d_genre)) {
		header("Location:add_empl_dvd.php?error=Genre is Required");
	}
	else if (empty($d_price)) {
		header("Location:add_empl_dvd.php?error=Price is Required");
	}
	else if (empty($d_date)) {
		header("Location:add_empl_dvd.php?error=Date is Required");
	}
	else if (empty($d_stock)) {
		header("Location:add_empl_dvd.php?error=Stock is Required");
	}
	 else {
		
		
		
		$sql = "SELECT d_title, d_director FROM dvd WHERE d_title='$d_title' and d_director = '$d_director'";
		
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0){
			
			header("Location:add_empl_dvd.php?error=A DVD with this Title and Director, already exists");
			
		}else{
		
			
			$sql2 = "INSERT INTO dvd(d_title, d_actors, d_director, d_lang, d_subs, d_duration, d_genre, d_price, d_date, d_stock) VALUES('$d_title', '$d_actors', '$d_director', '$d_lang', '$d_subs', '$d_duration', '$d_genre', '$d_price', '$d_date', '$d_stock')";
			$result2 = mysqli_query($conn, $sql2);
			header("Location:homepage.php");
		}
		}
		
	

	
}