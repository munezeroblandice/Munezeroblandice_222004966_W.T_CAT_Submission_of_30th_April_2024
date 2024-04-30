<?php
// Database connection details
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

// Prepare SQL statement to insert data into the table
$sql = "INSERT INTO student (first_name, last_name, registration_number, email_address, password, course_id)
VALUES ('$_POST[first_name]', '$_POST[last_name]', '$_POST[registration_number]', '$_POST[email_address]', '$_POST[password]', '$_POST[course_id]')";

if ($connection->query($sql) === TRUE) {
    echo "Data inserted successfully";
    // Redirect to login page
    header("Location: login.php");
    exit();
} else {
    echo "Error inserting data: " . $connection->error;
}


// Close connection
$connection->close();
?>
