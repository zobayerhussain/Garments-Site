<?php 
	$monthstring=array(1=>'January', 2=>'February', 3=>'March', 4=>'April', 5=>'May', 6=>'June', 7=>'July', 8=>'August', 9=>'September', 10=>'October', 11=>'November', 12=>'December');
	


	if (isset($_POST['calculate'])) :
		$monthid= validate($_POST['monthid']);
		$yearid=validate($_POST['year']);
		$sql="SELECT workers_id as id, (SELECT worker_name FROM workers WHERE `worker_id`=`workers_id`) as name, (SELECT salarylevel_id FROM workers WHERE `worker_id`=`workers_id`) as level, SUM(regulartime) AS reg, SUM(overtime) as over, YEAR(`date`) as year, MONTH(`date`) as month FROM `worktime` WHERE `included`=0 AND MONTH(`date`)='$monthid' AND YEAR(`date`)='$yearid' GROUP BY(`workers_id`) "; 
	// $sql = "SELECT workers_id as id, (SELECT worker_name FROM workers WHERE `worker_id`=`workers_id`) as name,(SELECT salarylevel_id FROM workers WHERE `worker_id`=`workers_id`) as level, SUM(regulartime) AS reg, SUM(overtime) as over  FROM `worktime` GROUP BY(`workers_id`)";
		if (mysqli_query($con, $sql)) {
			$worktimes = mysqli_query($con, $sql);
		
	
			foreach ($worktimes as $worker) :
				
				$id= $worker['id'];
				$name= $worker['name'];
				$reg= $worker['reg'];
				$over= $worker['over'];
				$l=$worker['level'];
				$sql2= "SELECT `salary` FROM `salarylevel` WHERE `salarylevel_id`='$l'";
				if (mysqli_query($con, $sql2)) {
					$data=mysqli_fetch_assoc(mysqli_query($con, $sql2));
					$totalsalary=ceil($worker['reg']*$data['salary']/2+$worker['over']*$data['salary']/4);
				}
				$sql3="INSERT INTO `payment_dates`(`payment_month`, `paymentyear`, `worker_id`, `regular`, `overtime`, `balance`) VALUES ('$monthid','$yearid','$id','$reg','$over','$totalsalary')";
				$sql4="UPDATE `worktime` SET `included`=1 WHERE `included`=0 AND `worker_id`='$id'";
				if (mysqli_query($con, $sql3)) {
					echo "Calculated Successfully";
					//$sql5="UPDATE `worktime` SET `included`=1 WHERE `included`=0
					$sql5="UPDATE `worktime` SET `included`=1 WHERE `workers_id`='$id'";
					echo $sql5;
					if (mysqli_query($con, $sql5)) {
					 	echo "Data Included";
					 } else {
					 	echo "Sorry Data Update failed";
					 }		
				}
			endforeach;	

		}else{
			echo "Failed";
		}
	endif;

 ?>