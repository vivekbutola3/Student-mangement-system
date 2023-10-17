<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="admindash.css" rel="stylesheet">
</head>

<body>
    <?php require_once('../include/Session.php'); ?>
    <?php require_once('../include/Functions.php'); ?>
    <?php echo AdminAreaAccess(); ?>

    <?php include('../header.php') ?>

    <div class="header">

        <h2 class="text-center">
            WELCOME TO ADMIN DASHBOARD
            <span><a href="logout.php" class="btn" style="float: right;">LOGOUT</a><span>
        </h2>

    </div>



    <div class="col-md-6 col-md-offset-3 jumbotron">
        <a href="addstudent.php" class="btn1"><img src="add.png" width=80px />INSERT STUDENT DETAILS</a><br><br>
        <a href="updatestudent.php" class="btn2"><img src="exchange.png" width=80px />UPDATE STUDENT DETAILS</a><br><br>
        <a href="deletestudent.php" class="btn3"><img src="deletee.png" width=80px />DELETE STUDENT DETAILS</a>
    </div>


    <?php include('../footer.php') ?>
</body>

</html>