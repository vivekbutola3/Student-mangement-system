<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>

<?php 

	include('../dbcon.php');
	$update_record= $_GET['Update'];
	$sql = "select * from student where id = '$update_record'";
	$result = mysqli_query($conn,$sql);

	while ($data_row = mysqli_fetch_assoc($result)) {
		$update_id = $data_row['id']; 
		$Erpid = $data_row['Erpid'];
		$Name = $data_row['name'];
		$City = $data_row['city'];
		$Pcontact = $data_row['pcontact'];
		$Year = $data_row['Year'];

	}

 ?>

<?php include('../header.php') ?>

<?php include('admin.header.php') ?>

<div class="container jumbotron">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2 class="text-center">UPDATE STUDENT DETAIL</h2>
			<form action="UpdateRecord.php?update_id=<?php echo $update_id;?>" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				      Erpid:<input type="text" class="form-control" name="Erpid" value="<?php echo 
				      $Erpid;?>" >
				  </div>
				  <div class="form-group">
				    
				    Full Name:<input type="text" class="form-control" name="fullname" value="<?php echo 
				    $Name;?>" placeholder="full name" required>
				  </div>
				  <div class="form-group">
				      City: <input type="text" class="form-control" name="city" value="<?php echo $City;?>"  required>
				  </div>
				  <div class="form-group">
				    
				    Parent Phone No.:<input type="text" class="form-control" name="pphone" value="<?php echo $Pcontact;?>" required>
				  </div>
				  <div class="form-group">
				    
				    Year:<input type="number" class="form-control" name="Year" value="<?php echo $Year;?>" required>
				  </div>

				  <button type="submit" name="submit" class="btn btn-success btn-lg">UPDATE</button>
			</form>
		</div>
	</div>
</div>

<?php include('../footer.php') ?>


<?php 
//This php code block is for editing the data that we got after clicking on update button
	if (isset($_POST['submit'])) {
		if (!empty($_POST['Erpid']) && !empty($_POST['fullname'])) {
		
			include ('../dbcon.php');
			$id = $_GET['update_id'];
			$Erpid=$_POST['Erpid'];
			$name=$_POST['fullname'];
			$city=$_POST['city'];
			$pphone=$_POST['pphone'];
			$Year=$_POST['Year'];

			$sql = "UPDATE student SET rollno = '$roll', name = '$name', city='$city', pcontact = '$pphone', Year = '$Year' WHERE id = '$id'";

			$Execute = mysqli_query($conn,$sql);

			if ($Execute) {
				 $_SESSION['SuccessMessage'] = " Data Updated Successfully";
                Redirect_to("updatestudent.php");

			}


		}

	}

 ?>
