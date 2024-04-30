<?php
include "dbconnection.php";

if (isset($_GET["student_id"])) {
    $student_id = $connection->real_escape_string($_GET["student_id"]);

    // Prepare DELETE statement
    $sql = "DELETE FROM student WHERE student_id = '$student_id'";

    // Execute DELETE statement
    if ($connection->query($sql) === TRUE) {
        // Record deleted successfully, redirect to student_table.php
        header("Location: student_table.php");
        exit; // Added exit after header redirect
    } else {
        // Error deleting record
        echo "Error deleting record: " . $connection->error;
    }
}

$connection->close();
?>
