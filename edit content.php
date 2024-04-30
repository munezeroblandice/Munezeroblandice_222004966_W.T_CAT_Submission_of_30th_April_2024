<?php 
//call the file that contain database connection
include "dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $content_id = $_GET["content_id"];

    // Read the row of the selected product from the database
    $sql = "SELECT * FROM content WHERE content_id=$content_id";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $content_id = $row["content_id"];
        $content_title = $row["content_title"];
        $upload_date = $row["upload_date"];
        $author = $row["author"];
    } else {
        header("location: /myproject/content table.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content_id = $_POST["content_id"];
    $content_title = $_POST["content_title"];
    $upload_date = $_POST["upload_date"];
    $author = $_POST["author"];

    // Check if all fields are filled
    if (empty($content_id) || empty($content_title) || empty($upload_date) || empty($author)) {
        echo "All fields are required!"; 
    } else {
        $sql = "UPDATE content SET content_title='$content_title', upload_date='$upload_date', author='$author' WHERE content_id='$content_id'";
    
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location:/myproject/content table.php");
            exit;
        } else {
            echo "Error updating record: " . $connection->error;
        }
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
        h2 {
            font-family: Castellar;
            color: darkblue;
        }
        label {
            font-family: elephant;
            font-size: 20px;
        }
        .sb {
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

        .input {
            width: 350px;
            height: 35px;
            border-radius: 12px;
            border-color: green;
        }

    </style>
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
if (isset($_REQUEST['content_id'])) {
  $content_id = $_REQUEST['content_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM content WHERE content_id=?");
  $stmt->bind_param("i", $student_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $x = $row['content_id'];
    $y = $row['content_title'];
     $y = $row['upload_date'];
    $t = $row['author'];
  } else {
    echo "Student not found.";
  }

  $stmt->close(); // Close the statement after use
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update content</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update content form -->
    <h2><u>Update Form of content</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="content_title">content_title:</label>
    <input type="text" name="content_title" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="upload_date">Last name:</label>
    <input type="date" name="upload_date" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <label for="author">Registration number:</label>
    <input type="text" name="author" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>
    <input type="hidden" name="content_id" value="<?php echo isset($content_id) ? $content_id : ''; ?>">
    <input type="submit" name="up" value="Update">

  </form>
   <a href="content table.php" class="btn btn-primary" style="margin-top: 0px;">Back to Register</a>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $content_title = $_POST['content_title'];
  $upload_date = $_POST['upload_date'];
  $author = $_POST['author'];
  
  // Update the content in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE content SET content_title=?, upload_date=?, author=?,  WHERE content_id=?");
  $stmt->bind_param("sdss", $content_title, $upload_date, $author, $content_id);
  $stmt->execute();

  // Redirect to student_table.php
  header('Location: content table.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
$connection->close();
?>
</head>
<body>
    <center>
        <h2>ECLASS MANAGEMENT SYSTEM</h2>
        <h3 style="color:green;">UPDATE CONTENT HERE</h3>
        <!-- section that contain form that help to update supply information-->
        <section class="forms">
            <form method="POST">
                <label>Content ID</label><br>
                <input type="number" name="content_id" readonly class="input" value="<?php echo $content_id; ?>"><br>
                <label>Content Title</label><br>
                <input type="text" name="content_title" class="input" value="<?php echo $content_title; ?>"><br>
                <label>Upload Date</label><br>
                <input type="date" name="upload_date" class="input" value="<?php echo $upload_date; ?>"><br> 
                <label>Author</label><br>
                <input type="text" name="author" class="input" value="<?php echo $author; ?>"><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer><!-- Footer section -->
        <p>&copy &reg 2024 UR CBE BIT YEAR 2 @ Group A</p><!-- Copyright and trademark notice -->
    </footer><!-- Footer section -->
</body>
</html>
