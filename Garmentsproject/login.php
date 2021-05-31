<?php session_start(); ob_start(); ?>

<?php 
//error_reporting(0);

	if (isset($_POST['submit'])) {
		$uname= validate($_POST['username']);
		$pass= md5($_POST['password']);
		
		
		echo $uname;
		$query="SELECT * FROM `users` WHERE `username`='".$uname."'";
		$users=mysqli_fetch_array(mysqli_query($con,$query));
		
		if ($uname==$users['username'] && $pass==$users['password']) {
			$_SESSION['name']=$uname;
			
		
			header('Location: home.php');
		}else {
			echo "<h1 style='color: red'>wrong password</h1>";
		}
		// if (!empty(mysqli_query($con,$query))) {
		// 	mysqli_fetch_array(mysqli_query($con,$query));
		// 	echo 'welcome brother you are an user';
		// }

	}


 ?>