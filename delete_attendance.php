<?php
include "dbconnection.php";

if (isset($_GET["attendance_id"])) {
    $attendance_id = $connection->real_escape_string($_GET["attendance_id"]);

    // Prepare DELETE statement
    $sql = "DELETE FROM attendance WHERE attendance_id = $attendance_id";

    // Execute DELETE statement
    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
         header("Location: attendance table.php");
    } else {
        echo "Error deleting record: " . $connection->error;
    }
}
$connection->close();
?>