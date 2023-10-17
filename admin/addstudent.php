<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="addstudent.css" rel="stylesheet">
</head>

<body>



    <?php require_once('../include/Session.php'); ?>
    <?php require_once('../include/Functions.php'); ?>
    <?php echo AdminAreaAccess(); ?>

    <?php include('../header.php') ?>

    <?php include('admin.header.php') ?>


    <div class="insert">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
            enctype="multipart/form-data">
            <h2 style="text-align: center;">INSERT STUDENT DETAIL</h2>
            <div class="form-group">
                Erpid:<input type="text" class="form-control" name="Erpid" placeholder="Enter Erp ID.">
            </div>
            <div class="form-group1">

                Full Name:<input type="text" class="form-control" name="fullname" placeholder="full name" required>
            </div>
            <div class="form-group2">
                City: <input type="text" class="form-control" name="city" placeholder="Enter City" required>
            </div>
            <div class="form-group3">

                Parent Phone No.:<input type="text" class="form-control" name="pphone"
                    placeholder="Enter Parent Phone No." required>
            </div>
            <div class="form-group4">

                Year:<input type="number" min="1" max="4" class="form-control" name="Year"
                    placeholder="Enter Student Year" required>
            </div>

            <div class="form-group5">

                Image:<input type="file" class="form-control" name="simg" required>
            </div>

            <button type="submit" name="submit">INSERT</button>
        </form>
    </div>


    <?php include('../footer.php') ?>

    <?php

	if (isset($_POST['submit'])) {
		if (!empty($_POST['Erpid']) && !empty($_POST['fullname'])) {

			include('../dbcon.php');
			$Erpid = $_POST['Erpid'];
			$name = $_POST['fullname'];
			$city = $_POST['city'];
			$pphone = $_POST['pphone'];
			$Year = $_POST['Year'];
			include('ImageUpload.php');

			$sql = "INSERT INTO `student`( `Erpid`, `name`, `city`, `pcontact`, `Year`,`image`) VALUES ('$Erpid','$name','$city','$pphone',$Year,'$imgName')";

			$run = mysqli_query($conn, $sql);

			if ($run == true) {

	?>
    <script>
    alert("Data Inserted Successfully");
    </script>
    <?php
			} else {
				echo "Error : " . $sql . "<br>" . mysqli_error($conn);
			}
		} else {
			?>
    <script>
    alert("Please insert atleast roll no. and fullname");
    </script>
    <?php
		}
	}

	?>
</body>

</html>