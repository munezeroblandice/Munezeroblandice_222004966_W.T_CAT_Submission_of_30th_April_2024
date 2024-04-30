<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> e-learning</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 style="text-align: center; font-family: century; font-weight: bold;">ECLASS MANAGEMENT SYSTEM</h2>
        <h4 style="text-align: center; font-family: century; font-weight: bold;">LIST OF REGISTERED STUDENTS IN OUR SYSTEM</h4>
        <a href="register form.html" class="btn btn-primary" style="margin-top: 0px;">New register</a>
        <a href="home.html" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table class="table table-bordered">
            <thead class="bg-warning">


<?php
// Connection details


// SQL query to fetch data from the register table

?>

<!-- Your HTML code here -->


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
         footer{
    height: 50px;
    text-align: center;
    padding: 25px;
    color: white;
    background-color: blue;
}
    </style> 
</head>
<body>
    <center><h2></h2></center>
    <table border="5">
        <table border="8">
        <tr>
            <th>student_name</th>
            <th>Email</th>
            <th>password</th>
            <th>college</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php

            $host = "localhost";
$user = "root";
$pass = "";
$database = "eclass management system";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$sql = "SELECT * FROM student";
$result = $connection->query($sql);

        // Check if there are any cars
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $student_name = $row['student_name']; // Fetch the car Id
                echo "<tr>
                    <td>" . $row['first_name'] . "</td>
                    <td>" . $row['Email'] . "</td>
                    <td>" . $row['password'] . "</td>
                    <td>" . $row['college'] . "</td>
                    <td><a style='padding:4px' href='deletestudent.php?student_name={$row['student_name']}>Delete</a></td>
                    <td><a style='padding:4px' href='student_edit.php?student_name={$row['student_name']}'>edit</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
</body>
</html>

</section>
  
<footer><!-- Footer section -->
            <p>&copy &reg 2024 UR CBE BIT YEAR 2 @ Group A</p><!-- Copyright and trademark notice -->
        </center></footer><!-- Footer section -->
    </body>
    </html>