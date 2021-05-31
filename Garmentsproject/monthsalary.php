<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html>
<?php include('head.php'); ?>

<body class="bg-secondary">
<?php include('navbar.php'); ?>
<div class="container">
<?php include('functions/salaryformation.php'); ?>
	<div>
		<div>
			
		</div>
		<div>
			<table class="table table-hover table-dark table-striped table-bordered table-sm" style="text-align: center;">
				<thead>
					<tr style="text-align: center;">
						<th>Payment Month</th>
						<th>Worker Reg</th>
						<th>Worker Name</th>
						<th>Regular</th>
						<th>Overtime</th>
						<th>Salary</th>
						<th>Last Added</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($worktimes as $worker) : ?>
					<tr>
						<td><?php echo $month[$worker['month']]." ".$worker['year']; ?></td>
						<td><?php echo $worker['id']; ?></td>
						<td><?php echo $worker['name']; ?></td>
						<td><?php echo $worker['reg']; ?></td>
						<td><?php echo $worker['over']; ?></td>
						<td><?php echo $worker['balance']; ?></td>
						<td><?php echo $worker['lastdate']; ?></td>
						<!-- <td>
							<form action="" method="post">
								<button class="btn btn-success btn-sm" type="submit" name="addtoaccount">Add</button>
							</form>
						</td> -->
						
						
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<!-- <form action="" method="post">
				<button class="btn btn-success float-right" type="submit" name="addall">Add All</button>
			</form> -->
		</div>
	</div>
</div>

</body>
</html>