
<?php require_once('connect.php'); ?>
<?php 
	$sql = "SELECT * FROM `salarylevel`";
	$sal = mysqli_query($con, $sql);

 ?>
<!DOCTYPE html>
<html>
<?php include('head.php'); ?>
<body class="bg-secondary">
	<?php include('navbar.php'); ?>
<div class="container">
	<table class="table table-bordered table-dark table-hover">
		<thead>
			<tr>
				
				<th>Salary Level</th>
				<th>Salary/Day</th>
				<th>Added at</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($sal as $s): ?>
				<tr>
					<td><?php echo $s['level']; ?></td>
					<td><?php echo $s['salary']; ?></td>
					<td><?php echo date($s['created_at']); ?></td>
				</tr>
				<?php $val=$s['level']; ?>
			<?php endforeach ?>
			
		</tbody>
	</table>
	<a href="salaryedit.php"><button class="btn btn-info" >Edit</button></a>
	
	
</div>
</body>
</html>

 <script>
 	$(document).ready(function(){
 		$("#adds").hide();
 		$("#addsalarylevel").click(function(){
 			$("#adds").toggle(500); 
 		});
 		
 	});
 </script>