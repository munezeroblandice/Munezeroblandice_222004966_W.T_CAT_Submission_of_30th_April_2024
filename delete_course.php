<?php
include "dbconnection.php";

if (isset($_GET["course_id"])) {
    $course_id = $connection->real_escape_string($_GET["course_id"]);

    // Prepare DELETE statement
    $sql = "DELETE FROM course WHERE course_id = $course_id";

    // Execute DELETE statement
    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
         header("Location: course table.php");
    } else {
        echo "Error deleting record: " . $connection->error;
    }
}
$connection->close();
?>