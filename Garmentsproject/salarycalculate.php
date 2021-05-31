<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html>
<?php include('head.php'); ?>
<body class="bg-secondary">
<?php include('navbar.php'); ?>

<div class="container text-light" style="padding: auto;">
<?php include('functions/salarycalculatefunctions.php'); ?>
	<div>
		<form action="" method="POST">
		<table class="table table-dark">
			<tr>
				<td>
					<h5>Month</h5>	
				</td>
							
			
				<td>
					<select name="monthid" class="form-control-sm bg-dark text-light">
						<?php for ($i=1; $i<=12; $i++): ?>
							<option value=<?php echo $i; ?>> <?php echo $monthstring[$i]; ?> </option>
						<?php endfor ?>
					</select>
				</td>
				<td><h5>Year</h5></td>
				<td><input type="number" name="year" min="<?php echo date('Y')-5;?>" max="<?php echo date('Y'); ?>" value="<?php echo date('Y'); ?>" class="form-control-sm bg-dark text-light"></td>
				<td><input class="btn-sm btn-outline-success" type="submit" name="submit"></td>
				<td><button class="btn-sm btn-outline-success"type="submit" name="calculate">Calculate</button></td>
			</tr>
		</table>
		</form>
	</div>
	<div>

		<?php 
		if (isset($_POST['submit'])) :
			$month= validate($_POST['monthid']);
			$year=validate($_POST['year']);
			
			//$sql = "SELECT * FROM `worktime` WHERE MONTH(`date`)='$month' AND YEAR(`date`)='$year'";
			$sql="SELECT workers_id as id, (SELECT worker_name FROM workers WHERE `worker_id`=`workers_id`) as name, (SELECT salarylevel_id FROM workers WHERE `worker_id`=`workers_id`) as level, SUM(regulartime) AS reg, SUM(overtime) as over, YEAR(`date`) as year, MONTH(`date`) as month, `included` FROM `worktime` WHERE MONTH(`date`)='$month' AND YEAR(`date`)='$year' GROUP BY(`workers_id`) "; 
			if (mysqli_query($con, $sql)) {
				$data= mysqli_query($con, $sql);
			}
		 
			if (!empty($data)):  ?>
			<table class=" table table-dark table-hover table-striped table-sm text-md-center text-lg-center text-sm-center">
				<thead>
					<tr>
						<th>Worker Id</th>
						<th>Worker Name</th>
						<th>Year</th>
						<th>Month</th>
						<th>Regular Time</th>
						<th>Overtime</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
		<?php 
				foreach ($data as $dat) :  ?>
						<tr>
							<td><?php echo $dat['id']; ?></td>
							<td><?php echo $dat['name']; ?></td>
							<td><?php echo $dat['year']; ?></td>
							<td><?php $i=$dat['month'];echo $monthstring[$i]; ?></td>
							<td><?php echo $dat['reg']; ?></td>
							<td><?php echo $dat['over']; ?></td>
							<td><?php echo ($dat['included'] == 1) ? "Included" : "Not included" ; ?> </td>
						</tr>
		<?php		
				endforeach; ?>
					</tbody>
				</table>
		<?php 
			else:
				echo "<h3 class='text-warning'> Sorry No data </h3>";
				
			endif;
			
		endif;
		 ?>
		
	</div>
</div>

<div>

</div>
</body>
</html>

