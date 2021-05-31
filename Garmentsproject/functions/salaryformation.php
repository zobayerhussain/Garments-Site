<?php
	$month=array(1=>'January', 2=>'February', 3=>'March', 4=>'April', 5=>'May', 6=>'June', 7=>'July', 8=>'August', 9=>'September', 10=>'October', 11=>'November', 12=>'December');


	$sql="SELECT  `worker_id` AS id,(SELECT workers.worker_name FROM workers WHERE workers.worker_id = payment_dates.worker_id) AS name, `paymentyear` AS year, `payment_month` AS month, `regular`as reg,`overtime` AS over, `balance` AS balance, `created_at` AS lastdate FROM `payment_dates` WHERE 1";
	// $sql = "SELECT workers_id as id, (SELECT worker_name FROM workers WHERE `worker_id`=`workers_id`) as name,(SELECT salarylevel_id FROM workers WHERE `worker_id`=`workers_id`) as level, SUM(regulartime) AS reg, SUM(overtime) as over  FROM `worktime` GROUP BY(`workers_id`)";
	

	if (mysqli_query($con, $sql)) {
		$worktimes = mysqli_query($con, $sql);
		
	}else{
		echo "Failed";
	}

	
 ?>