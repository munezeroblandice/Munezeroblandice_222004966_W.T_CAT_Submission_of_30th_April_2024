<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "revenuesystem";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->select_db($dbname);

$sql = "INSERT INTO user (id, first_name, last_name, tin_number, date_of_birth, address, email, registration_date, agent_id)
VALUES ($_POST[id]', '$_POST[first_name]', '$_POST[last_name]', '$_POST[tin_number]', '$_POST[date_of_birth]','$_POST[address]', '$_POST[email]','$_POST[registration_date]','$_POST[agent_id]')";


if ($conn->query($sql) === false) {
    echo " data inserted successfully<br>";
    header("location:index.php");
} else {
    echo "Error inserting sample data: " . $conn->error;
}

// Close connection
$conn->close();
?>