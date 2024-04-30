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
if (isset($_REQUEST['student_id'])) {
  $student_id = $_REQUEST['student_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM student WHERE student_id=?");
  $stmt->bind_param("i", $student_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $x = $row['student_id'];
    $y = $row['first_name'];
    $z = $row['last_name'];
    $w = $row['registration_number'];
    $s = $row['email_address'];
    $r = $row['password'];
    $t = $row['course_id'];
  } else {
    echo "Student not found.";
  }

  $stmt->close(); // Close the statement after use
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update student</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update student form -->
    <h2><u>Update Form of student</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="fname">First name:</label>
    <input type="text" name="fname" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="lname">Last name:</label>
    <input type="text" name="lname" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <label for="registration_number">Registration number:</label>
    <input type="number" name="rg" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>

    <label for="email_address">Email address:</label>
    <input type="text" name="eml" value="<?php echo isset($s) ? $s : ''; ?>">
    <br><br>

    <label for="password">Password:</label>
    <input type="text" name="psw" value="<?php echo isset($r) ? $r : ''; ?>">
    <br><br>

    <label for="course_id">Course ID:</label>
    <input type="number" name="nmb" value="<?php echo isset($t) ? $t : ''; ?>">
    <br><br>

    <input type="hidden" name="student_id" value="<?php echo isset($student_id) ? $student_id : ''; ?>">
    <input type="submit" name="up" value="Update">

  </form>
   <a href="usertable.php" class="btn btn-primary" style="margin-top: 0px;">Back to Register</a>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $first_name = $_POST['fname'];
  $last_name = $_POST['lname'];
  $registration_number = $_POST['rg'];
  $email_address = $_POST['eml'];
  $password = $_POST['psw'];
  $course_id = $_POST['nmb'];

  // Update the student in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE student SET first_name=?, last_name=?, registration_number=?, email_address=?, password=?, course_id=? WHERE student_id=?");
  $stmt->bind_param("sssissi", $first_name, $last_name, $registration_number, $email_address, $password, $course_id, $student_id);
  $stmt->execute();

  // Redirect to student_table.php
  header('Location: student_table.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
$connection->close();
?>