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
        <h4 style="text-align: center; font-family: century; font-weight: bold;">LIST OF STUDENTS WHO ATTENDED CLASS IN OUR SYSTEM</h4>
        <a href="attendance form.html" class="btn btn-primary" style="margin-top: 0px;">New attendance</a>
        <a href="home.html" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table class="table table-bordered">
            <thead class="bg-warning">
<?php
// Connection details
$host = "localhost";
$user = "root";
$pass = "";
$database = "eclass management system";

// Cxfhbfdgnhgfjnreating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
 $stmt = $connection->prepare("INSERT INTO attendance (attendance_id, student_id, course_id, date) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iiid", $attendance_id, $student_id, $course_id, $date);

// Set parameters
$attendance_id = $_POST['attendance_id'];
$student_id = $_POST['student_id'];    
$course_id= $_POST['course_id'];
$date = $_POST['date'];

// Execute the statement
if ($stmt->execute()) {
    echo "New record has been added successfully";
} else {
    echo "Error: " . $stmt->error;
}
    // Close the statement
    $stmt->close();

}
// SQL query to fetch data from the car table
$sql = "SELECT * FROM attendance";
$result = $connection->query($sql);

?>

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
            <th>attendance_id</th>
            <th>student_id</th>
            <th>course_id</th>
            <th>date</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php

        // Check if there are any cars
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $attendance_id = $row['attendance_id']; // Fetch the car Id
                echo "<tr>
                    <td>" . $row['attendance_id'] . "</td>
                    <td>" . $row['student_id'] . "</td>
                    <td>" . $row['course_id'] . "</td>
                    <td>" . $row['date'] . "</td>
                    <td><a style='padding:4px' href='delete_attendance.php?attendance_id={$row['attendance_id']}'>Delete</a></td>
                    <td><a style='padding:4px' href='edit attendance.php?attendance_id={$row['attendance_id']}'>edit</a></td> 
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