
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
<div class="container" style="width: 70%; margin: 30px, 40px;">
	<table class="table table-bordered table-dark table-hover table-striped">
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
					<form action="" method="POST" accept-charset="utf-8" >
						<td class="form-group">
							<?php echo $s['level']; ?>
							
						</td>
						<td>
							<input class="form-control form-control-sm" type="number" name="salary" value="<?php echo $s['salary']; ?>">
						</td>
						<td><?php echo date("d-m-Y | h:i:sa",strtotime($s['created_at'])); ?></td>
						<td class="border-0" style="width: 30px;">
							<button class="btn btn-info btn-sm" name="edit" value=<?php echo $s['salarylevel_id']; ?>>Edit</button>
						
						</td>
						<td class="border-0" style="width: 30px;">
						
							<button class="btn btn-danger btn-sm" name="delete" value=<?php echo $s['salarylevel_id']; ?>>Delete</button>
						</td>
					</form>
				</tr>
				<?php $val=$s['level']; ?>
			<?php endforeach ?>
			
		</tbody>
	</table>
	<button id="addsalarylevel" class="btn btn-info">Add salary level</button>
	<div class="card" id="adds">
		<div class="card-header badge-dark">
			<center><strong>Salary Add</strong></center> 
		</div>
		
	
		<form class="card-body bg-dark" style="color: #BFBEBE" action="salaryedit.php" method="POST">
			<div class=" form-group row text-md-right input-group" >
				<label class="form-control-label col-md-2">Salary label</label>
				<input class="form-control form-control-sm col-md-2" type="number" name="salarylevel" value=<?php echo $val+1; ?>>	
				<label class="form-control-label col-md-2">Salary</label>
				<input class="form-control col-md-2 form-control-sm" type="number" name="salary" min="0">
				<button type="submit" class="btn btn-dark col-md-2 border-secondary" style="margin-left: 10%" name="addlevel">Submit</button>
			</div>
			
		</form>
	</div>
</div>
</body>
</html>
<?php 
	if (isset($_POST['addlevel'])) {
		$salarylevel=$_POST['salarylevel'];
		$salary=$_POST['salary'];
		$sql = "INSERT INTO `salarylevel` (`salarylevel_id`, `level`, `salary`, `created_at`) VALUES ('$salarylevel', '$salarylevel', '$salary', CURRENT_TIMESTAMP)";
		if (mysqli_query($con, $sql)) {
			echo "successful";
			header('Location: salaryedit.php');
		}
		else{
			echo "failed";
			echo $sql;
		}
	}
	if (isset($_POST['delete'])) {
		$id=validate($_POST['delete']);
		$sql= "DELETE FROM `salarylevel` WHERE `salarylevel`.`salarylevel_id` = $id";
		if (mysqli_query($con, $sql)) {
			header('Location: salaryedit.php');
		}else{
			echo "Deletion failed";
		}
	}
	if (isset($_POST['edit'])) {
		$id=validate($_POST['edit']);
		$salary=validate($_POST['salary']);

		$sql= "UPDATE `salarylevel` SET `salary`='$salary' WHERE `salarylevel`.`salarylevel_id`='$id'";
		if (mysqli_query($con, $sql)) {
			header('Location: salaryedit.php');
		}else{
			echo "Deletion failed";
		}
	}
 ?>
 <script>
 	$(document).ready(function(){
 		$("#adds").hide();
 		$("#addsalarylevel").click(function(){
 			$("#adds").toggle(500);
 			
 			if ($(this).text()=="Add salary level") {
 				$("#addsalarylevel").text("cancel");
 			}else{
 				$("#addsalarylevel").text("Add salary level");
 			}
 		});
 		
 	});
 </script>