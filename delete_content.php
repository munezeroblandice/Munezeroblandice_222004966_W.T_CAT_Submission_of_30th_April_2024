<?php
include "dbconnection.php";

if (isset($_GET["content_id"])) {
    $content_id = $connection->real_escape_string($_GET["content_id"]);

    // Prepare DELETE statement
    $sql = "DELETE FROM content WHERE content_id = $content_id";

    // Execute DELETE statement
    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
         header("Location: content table.php");
    } else {
        echo "Error deleting record: " . $connection->error;
    }
}
$connection->close();
?>