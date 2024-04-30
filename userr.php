<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>user</title>
  </head>

  <header>



</header>
<section>

    <h1><u> Product Form </u></h1>
    <form action="userdata.php" method="POST">
            <label for="id">ID</label>
            <input type="number" name="id" id="id"><br><br>

            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name"><br><br>

            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name"><br><br>

            <label for="tin_number">Tin Number</label>
            <input type="number" name="tin_number" id="tin_number"><br><br>

            <label for="date_of_birth">DOB</label>
            <input type="date" name="date_of_birth" id="date_of_birth"><br><br>

            <label for="address">Address</label>
            <input type="text" name="address" id="address"><br><br>

            <label for="email">Email</label>
            <input type="text" name="email" id="email"><br><br>

            <label for="registration_date">Registration Date</label>
            <input type="date" name="registration_date" id="registration_date"><br><br>

            <label for="agent_id">Agent Id</label>
            <input type="number" name="agent_id" id="agent_id"><br><br>

            <input type="submit" value="Register">
        </form><br>
      </section>


<?php
// Connection details
$host = "localhost";
$user = "root";
$pass = "";
$database = "revenuesystem";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO user(id, first_name, last_name, tin_number, date_of_birth, address, email, registration_date, agent_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssss", $pid, $pname, $pdescription, $pprice);
    // Set parameters and execute
    $pid = $_POST['id'];
    $pname = $_POST['fname'];
    $pdescription = $_POST['lname'];
    $tnumber = $_POST['tnumber'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $rdate = $_POST['rdate'];
    $agentid = $_POST['agentid'];

   
    if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$connection->close();
?>

<?php
// Connection details
$host = "localhost";
$user = "root";
$pass = "";
$database = "stock_management_system";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
// SQL query to fetch data from the Product table
$sql = "SELECT * FROM Product";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of Product</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>Table of Products</h2></center>
    <table border="5">
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Price</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        // Define connection parameters
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "stock_management_system";

        // Establish a new connection
        $connection = new mysqli($host, $user, $pass, $database);

        // Check if connection was successful
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        // Prepare SQL query to retrieve all products
        $sql = "SELECT * FROM Product";
        $result = $connection->query($sql);

        // Check if there are any products
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row['Product_Id']; // Fetch the Product_Id
                echo "<tr>
                    <td>" . $row['Product_Id'] . "</td>
                    <td>" . $row['Product_Name'] . "</td>
                    <td>" . $row['Product_Desciption'] . "</td>
                    <td>" . $row['Product_Price'] . "</td>
                    <td><a style='padding:4px' href='delete_product.php?Product_Id=$pid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_product.php?Product_Id=$pid'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
</body>

    </section>


  
<footer>
  <center> 
    <b><h2>UR CBE BIT &copy, 2024 &reg, Designer by: @Jean Nepo IRADUKUNDA</h2></b>
  </center>
</footer>
</body>
</html>