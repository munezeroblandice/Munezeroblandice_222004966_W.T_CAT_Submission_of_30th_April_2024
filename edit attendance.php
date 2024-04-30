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

// Check if attendance_id is set
if (isset($_REQUEST['attendance_id'])) {
  $attendance_id = $_REQUEST['attendance_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM attendance WHERE attendance_id=?");
  $stmt->bind_param("i", $attendance_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $x = $row['attendance_id'];
    $y = $row['student_id'];
    $z = $row['course_id'];
    $w = $row['date'];
  } else {
    echo "Student not found.";
  }

  $stmt->close(); // Close the statement after use
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update attendance</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update student form -->
    <h2><u>Update Form of attendance</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="student_id">student-id:</label>
    <input type="number" name="student_id" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="course_id">course_id:</label>
    <input type="number" name="course_id" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <label for="date">date:</label>
    <input type="date" name="date" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>
    <input type="hidden" name="attendance_id" value="<?php echo isset($attendance_id) ? $attendance_id : ''; ?>">
    <input type="submit" name="up" value="Update">

  </form>
   <a href="attendance table.php" class="btn btn-primary" style="margin-top: 0px;">Back to Register</a>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $student_id = $_POST['student_id'];
  $course_id = $_POST['course_id'];
  $date = $_POST['date'];
  
  // Update the attendance in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE attendance SET student_id=?, course_id=?, date=? WHERE attendance_id=?");
  $stmt->bind_param("sssissi", $student_id, $course_id, $date);
  $stmt->execute();

  // Redirect to attendance table.php
  header('Location: attendance table.php');
  exit(); // Ensure no other attendance is sent after redirection
}

// Close the connection (important to close after use)
$connection->close();
?><?php 
// Call the file that contains the database connection
include "dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $attendance_id = $_GET["attendance_id"];

    // Read the row of the selected product from the database
    $sql = "SELECT * FROM attendance WHERE attendance_id=$attendance_id";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $attendance_id = $row["attendance_id"];
        $student_id = $row["student_id"];
        $course_id = $row["course_id"];
        $date = $row["date"];
    } else {
        header("location: /myproject/attendance table.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $attendance_id = $_POST["attendance_id"];
    $student_id = $_POST["student_id"];
    $course_id = $_POST["course_id"];
    $date = $_POST["date"];
    if (empty($attendance_id) || empty($student_id) || empty($course_id) || empty($date)) {
        echo "All fields are required!"; 
    } else {
        $sql = "UPDATE attendance SET attendance_id='$attendance_id', student_id='$student_id', course_id='$course_id', date='$date' WHERE attendance_id='$attendance_id'";
    }
    if ($connection->query($sql) === TRUE) {
        echo "Information updated successfully";
        header("location:/myproject/attendance table.php");
    } else {
        echo "Error updating record: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eclass Management system</title>
    <style>
        h2{
            font-family: Castellar;
            color: darkblue;
        }
        label{
            font-family: elephant;
            font-size: 20px;
        }
        .sb{
            font-family: Georgia;
            padding: 10px;
            border-color: blue;
            background-color: skyblue;
            width: 200px;
            margin-top: 5px;
            border-radius: 12px;
            font-weight: bold;
            color: blue;
        }

        .input{
            width: 350px;
            height: 35px;
            border-radius: 12px;
            border-color: green;
        }
    </style>
</head>
<body>
    <center>
        <h2>ECLASS MANAGEMENT SYSTEM</h2>
        <h3 style="color:green;">UPDATE ATTENDANCE HERE</h3>
        <!-- Section that contains form that helps to update supply information -->
        <section class="forms">
            <form method="POST">
                <label>Attendance ID</label><br>
                <input type="number" name="attendance_id" readonly class="input" value="<?php echo $attendance_id; ?>"><br>
                <label>Student ID</label><br>
                <input type="number" name="student_id" class="input" value="<?php echo $student_id; ?>"><br>
                <label>Course ID</label><br>
                <input type="number" name="course_id" class="input" value="<?php echo $course_id; ?>"><br> 
                <label>Date</label><br>
                <input type="text" name="date" class="input" value="<?php echo $date; ?>"><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <!-- Footer section -->
        <p>&copy &reg 2024 UR CBE BIT YEAR 2 @ Group A</p>
        <!-- Copyright and trademark notice -->
    </footer>
    <!-- Footer section -->
</body>
</html>
