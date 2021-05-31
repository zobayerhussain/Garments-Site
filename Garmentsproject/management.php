<?php require_once('connect.php') ?>

<!DOCTYPE html>
<html>
<?php include('head.php') ?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<body class="bg-secondary">
<?php include('navbar.php') ?>

<div class="wrapper" style="margin-top: 80px;">
	<div style=" width: 70%; margin: auto; margin-bottom: 50px;" class="row">

		 <a href="salary_detail.php" class="col-md-3 boxreference" >
		 	<div > Salary Detail</div>
		 </a>
		 <a href="monthsalary.php" class="col-md-3 boxreference" >
		 	<div > Salary</div>
		 </a>
		 <a href="reportbymonth.php" class="col-md-3 boxreference" >
		 	<div> Report by Month</div>
		 </a>
	</div>
		<div style=" width: 70%; margin: auto; margin-bottom: 50px;" class="row">
		
		 <a href="salaryedit.php" class="col-md-3 boxreference" >
		 	<div> Salary Level Edit</div>
		 </a>
		 <a href="monthreportbyperson.php" class="col-md-3 boxreference" >
		 	<div>Month report by Person</div>
		 </a>
		 <a href="salarycalculate.php" class="col-md-3 boxreference" >
		 	<div> Salary Calculate</div>
		 </a>
	</div>
	
</div>
</body>
</html>