<?php
// Connection details
$host = "localhost";
$user = "root";
$pass = "";
$database = "eclass management system";

$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
// Check if assessment_id is set
if(isset($_REQUEST['assessment_id'])) {
    $assessment_id = $_REQUEST['assessment_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM assessment WHERE assessment_id=?");
    $stmt->bind_param("i", $assessment_id);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Record</title>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
</head>
<body>
    <?php
    // Display a message indicating which record will be deleted
    echo "<p>Deleting record with user ID: $assessment_id</p>";
    ?>

    <form method="post" onsubmit="return confirmDelete();">
        <input type="hidden" name="assessment_id" value="<?php echo $assessment_id; ?>">
        <input type="submit" value="Delete">
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Execute the DELETE statement
        if ($stmt->execute()) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting data: " . $stmt->error;
        }
    }
    ?>
    <a href="assessmet table.php" class="btn btn-primary" style="margin-top: 0px;">back to assessment</a>
</body>
</html>
<?php
    // Close the prepared statement
    $stmt->close();
} else {
    echo "Assessment ID is not set.";
}

// Close the database connection
$connection->close();
?>