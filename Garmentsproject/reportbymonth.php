<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html>
<?php include('head.php'); ?>
<body class="bg-secondary">
<?php include('navbar.php'); ?>

<div class="container text-light" style="padding: auto;">
<?php include('functions/monthreportfunctions.php'); ?>
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
							<option value=<?php echo $i; ?>> <?php echo $month[$i]; ?> </option>
						<?php endfor ?>
					</select>
				</td>
				<td><h5>Year</h5></td>
				<td><input type="number" name="year" min="<?php echo date('Y')-5;?>" max="<?php echo date('Y'); ?>" value="<?php echo date('Y'); ?>" class="form-control-sm bg-dark text-light"></td>
				<td><input class="btn-sm btn-outline-success" type="submit" name="submit"></td>
			</tr>
		</table>
		</form>
	</div>
	<div>

		<?php 
		if (isset($_POST['submit'])) :
			
			$month= validate($_POST['monthid']);
			$year=validate($_POST['year']);
			$sql = "SELECT * FROM `worktime` WHERE MONTH(`date`)='$month' AND YEAR(`date`)='$year'";
			if (mysqli_query($con, $sql)) {
				$data= mysqli_query($con, $sql);
			}
		 
			if (!empty($data)):  ?>
			<table class=" table table-dark table-hover table-striped table-sm text-md-center text-lg-center text-sm-center">
				<thead>
					<tr>
						<th>Worker Id</th>
						<th>Date</th>
						<th>Regular Time</th>
						<th>Overtime</th>
					</tr>
				</thead>
				<tbody>
		<?php 
				foreach ($data as $dat) :  ?>
						<tr>
							<td><?php echo $dat['workers_id']; ?></td>
							<td><?php echo $dat['date']; ?></td>
							<td><?php echo $dat['regulartime']; ?></td>
							<td><?php echo $dat['overtime']; ?></td>
							<td><?php echo $dat['included'] = 1 ? "Included" : "Not included" ; ?></td>
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