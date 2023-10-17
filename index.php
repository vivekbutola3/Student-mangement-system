<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT MANAGEMENT SYSTEM</title>
    <link href="index.css" rel="stylesheet">
</head>

<body>


    <?php

    include('header.php')
    ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 jumbotron">
                <h2 style="text-align: center;">
                    WELCOME TO STUDENT MANAGEMENT SYSTEM
                    <span style="float: right;"><a href="login.php" class="btn btn-info btn-lg">Admin Login</a></span>
                </h2>
            </div>
        </div>
    </div>

    <div class="student-info text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-13 jumbotron1">
                    <h2>STUDENT'S INFORMATION</h2>
                    <form action="index.php" method="post">
                        <input type="text" name="Erpid" placeholder="Enter Erp Id"
                            style="width: 240px;height: 35px;"><br><span style="font-size: 35px;">&<span>
                                <select name="Year" class="btn2">
                                    <option>SELECT YEAR</option>
                                    <option>1st</option>
                                    <option>2nd</option>
                                    <option>3rd</option>
                                    <option>4th</option>

                                </select>
                                <input type="submit" name="show" value="RESULT" class="btn3" style="margin-left: 30px;">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table class="table ">
        <tr>
            <th class="text-center">Erpid</th>
            <th class="text-center">Year</th>
            <th class="text-center">Full Name</th>
            <th class="text-center">City</th>
            <th class="text-center">parent phone No.</th>
            <th class="text-center">Profile Pic</th>
        </tr>
        <?php
        include('dbcon.php');
        if (isset($_POST['show'])) {
            $Year = $_POST['Year'];
            $Erpid = $_POST['Erpid'];

            $sql = "SELECT * FROM `student` WHERE `Year` = '$Year' OR `Erpid`='$Erpid'";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($DataRows = mysqli_fetch_assoc($result)) {
                    $Id = $DataRows['id'];
                    $Erpid = $DataRows['Erpid'];
                    $Name = $DataRows['name'];
                    $City = $DataRows['city'];
                    $Pcontact = $DataRows['pcontact'];
                    $Year = $DataRows['Year'];
                    $ProfilePic = $DataRows['image'];
        ?>
        <tr>
            <td><?php echo $Erpid; ?></td>
            <td><?php echo $Year; ?></td>
            <td><?php echo $Name; ?></td>
            <td><?php echo $City; ?></td>
            <td><?php echo $Pcontact; ?></td>
            <td><img src="databaseimg/<?php echo $ProfilePic; ?>" alt="img"></td>
        </tr>
        <?php

                }
            } else {
                echo "<tr><td colspan ='7' class='text-center'>No Record Found</td></tr>";
            }
        }

        ?>




        <?php include('footer.php') ?>

</body>

</html>