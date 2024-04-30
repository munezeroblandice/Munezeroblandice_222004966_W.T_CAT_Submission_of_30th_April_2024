<?php 
include "dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET["course_id"])) {
        $course_id = $_GET["course_id"];
        $sql = "SELECT * FROM course WHERE course_id=$course_id";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $course_title = $row["course_title"];
            $start_date = $row["start_date"];
            $end_date = $row["end_date"];
            $course_materials = $row["course_materials"];
        } else {
            header("location: /myproject/course table.php");
            exit;
        }
    } else {
        echo "Invalid request";
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if all fields are filled
    if (empty($_POST["course_id"]) || empty($_POST["course_title"]) || empty($_POST["start_date"]) || empty($_POST["end_date"]) || empty($_POST["course_materials"])) {
        echo "All fields are required!";
        exit;
    }

    // Prepare and bind parameters
    $stmt = $connection->prepare("UPDATE course SET course_title=?, start_date=?, end_date=?, course_materials=? WHERE course_id=?");
    $stmt->bind_param("sddsi", $_POST["course_title"], $_POST["start_date"], $_POST["end_date"], $_POST["course_materials"], $_POST["course_id"]);    // Execute the statement
    if ($stmt->execute()) {
        echo "Record updated successfully";
        header("Location: course table.php");
        exit;
    } else {
        echo "Error updating record: " . $connection->error;
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> e-learning</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
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

// Check if student_id is set
if (isset($_REQUEST['course_id'])) {
  $course_id = $_REQUEST['course_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM course WHERE course_id=?");
  $stmt->bind_param("i", $course_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $x = $row['course_id'];
    $y = $row['course_title'];
    $z = $row['start_date'];
    $w = $row['end_date'];
    $s = $row['course_materials'];
    
  } else {
    echo "Student not found.";
  }

  $stmt->close(); // Close the statement after use
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update course</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update course form -->
    <h2><u>Update Form of course</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="course_title">course_title:</label>
    <input type="text" name="course_title" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="start_date">start_date:</label>
    <input type="date" name="start_date" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <label for="end_date">end_date:</label>
    <input type="date" name="end_date" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>

    <label for="course_materials">course_materials:</label>
    <input type="text" name="course_materials" value="<?php echo isset($s) ? $s : ''; ?>">
    <br><br>
    <input type="hidden" name="course_id" value="<?php echo isset($course_id) ? $course_id : ''; ?>">
    <input type="submit" name="up" value="Update">

  </form>
   <a href="course table.php" class="btn btn-primary" style="margin-top: 0px;">Back to Register</a>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $course_title = $_POST['course_title'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $course_materials = $_POST['course_materials'];
  // Update the course in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE course SET course_title=?, start_date=?, end_date=?, course_materials=?, WHERE course_id=?");
  $stmt->bind_param("sddsi", $course_title, $start_date, $end_date, $course_materials, $course_id);
  $stmt->execute();

  // Redirect to course table.php
  header('Location: course table.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
$connection->close();
?>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center; font-family: century; font-weight: bold;">ECLASS MANAGEMENT SYSTEM</h2>
        <h4 style="text-align: center; font-family: century; font-weight: bold;">EDIT COURSE</h4>
        <form method="POST">
            <label>Course ID</label><br>
            <input type="number" name="course_id" class="input" value="<?php echo $course_id; ?>" readonly><br>
            <label>Course Title</label><br>
            <input type="text" name="course_title" class="input" value="<?php echo $course_title; ?>"><br>
            <label>Start Date</label><br>
            <input type="date" name="start_date" class="input" value="<?php echo $start_date; ?>"><br>
            <label>End Date</label><br>
            <input type="date" name="end_date" class="input" value="<?php echo $end_date; ?>"><br>
            <label>Course Materials</label><br>
            <input type="text" name="course_materials" class="input" value="<?php echo $course_materials; ?>"><br>
            <input type="submit" name="submit" value="Update" class="btn btn-primary">
        </form>
    </div>
</body>
</html>
