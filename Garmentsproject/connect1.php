<?php 
//establish connection with database
	$host='localhost';
	$user='root';
	$pass='';
	$db='arifaproject';
	$con=mysqli_connect($host,$user,$pass,$db);
	if (!$con) {
		die("Database not connected".mysqli_connect_error());
	}
	function validate($data){
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

 ?>