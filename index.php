

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both email and password are provided
    if (isset($_POST['email_address']) && isset($_POST['password'])) {
        // Retrieve email and password from the form
        $email = $_POST['email_address'];
        $pass = $_POST['password'];
        
        // Database connection details
        $host = "localhost";
        $username = "root"; // Update with your database username
        $db_password = ""; // Update with your database password
        $database = "eclass management system"; // Update with your database name

        // Create connection
        $conn = new mysqli($host, $username, $db_password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM student WHERE email_address = ? AND password = ?");
        $stmt->bind_param("ss", $email, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User exists, redirect to dashboard or home page
    header("Location: home.html"); // Change to the appropriate page
    exit(); // Add this line to stop further execution
} else {
    // User does not exist or invalid credentials, display error message
    $error_message = "Invalid email or password. Please try again.";
}


        // Close the prepared statement and database connection
        $stmt->close();
        $conn->close();
    } else {
        // Form fields not provided
        $error_message = "Please provide both email and password.";
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        /* Styles for the container */
        .container {
            width: 400px;
            margin: 0 auto; /* Center the container horizontally */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 50px; /* Adjust as needed */
        }

        /* Styles for the form header */
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Styles for the form fields */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="email_address"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Styles for the buttons */
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-cancel {
            background-color: #dc3545;
            margin-left: 10px;
        }

        /* Styles for the footer */
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
            border-top: 1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="form-header">
            <h3>LOGIN FORM</h3>
        </div>
        <?php if(isset($error_message)) { ?>
            <div class="form-group">
                <p style="color: red;"><?php echo $error_message; ?></p>
            </div>
        <?php } ?>
        <div class="form-group">
            <label for="email_address">Email Address:</label>
            <input type="email" id="email_address" name="email_address" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <input type="submit" name="login" value="Login" class="btn">
            <input type="reset" value="Reset" class="btn btn-cancel">
        </div>
        <div class="form-group">
            <p>Don't have an account? <a href="registration.php">Sign up here</a></p>
            <p>Don't have an account? <a href="resetpassword.php">Sign up here</a></p>
        </div>
    </form>
</div>

<footer><!-- Footer section -->
    <p>&copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A</p><!-- Copyright and trademark notice -->
</footer><!-- Footer section -->

</body>
</html>

