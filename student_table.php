<?php
// Connection details
$host = "localhost";
$user = "root";
$pass = "";
$database = "eclass management system"; // removed space, better to avoid spaces in database names

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set parameters
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name']; 
    $last_name = $_POST['last_name']; 
    $registration_number = $_POST['reg_number'];   
    $course_id = $_POST['course_id'];
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];

    // Check if student_id already exists
    $check_sql = "SELECT * FROM student WHERE student_id = '$student_id'";
    $check_result = $connection->query($check_sql);
    if ($check_result->num_rows > 0) {
        echo "Error: Student with ID $student_id already exists.";
    } else {
        // Execute the statement
        $sql = "INSERT INTO student (student_id, first_name, last_name, registration_number, course_id, email_address, password) 
                VALUES ('$student_id', '$first_name', '$last_name', '$registration_number', '$course_id', '$email_address', '$password')";
        
        if ($connection->query($sql) === TRUE) {
            echo "New record has been added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    }
}

// SQL query to fetch data from the student table
$sql = "SELECT * FROM student";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eclass Management system</title>
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
        
        footer {
            height: 50px;
            text-align: center;
            padding: 25px;
            color: white;
            background-color: blue;
        }
    </style> 
</head>
<body>
    <center><h2>ECLASS MANAGEMENT SYSTEM</h2></center>
    <table border="5">
        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Registration Number</th>
            <th>Course ID</th>
            <th>Email Address</th>
            <th>Password</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php

        // Check if there are any students
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $student_id = $row['student_id']; // Fetch the student ID
                echo "<tr>
                    <td>" . $row['student_id'] . "</td>
                    <td>" . $row['first_name'] . "</td>
                    <td>" . $row['last_name'] . "</td>
                    <td>" . $row['registration_number'] . "</td>
                    <td>" . $row['course_id'] . "</td>
                    <td>" . $row['email_address'] . "</td>
                    <td>" . $row['password'] . "</td>
                    <td><a style='padding:4px' href='delete_student.php?student_id=" . $row['student_id'] . "'>Delete</a></td>
                    <td><a style='padding:4px' href='edit student.php?student_id=" . $row['student_id'] . "'>Edit</a></td>

                </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>

    <footer><!-- Footer section -->
        <p>&copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A</p><!-- Copyright and trademark notice -->
    </footer><!-- Footer section -->
</body>
</html>
