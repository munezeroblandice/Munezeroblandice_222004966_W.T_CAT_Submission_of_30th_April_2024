<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>

        body {
    background-color: #yellowgreen; /* Light grey background */
}

.container {
    width: 400px;
    margin: 0 auto; /* Center the container horizontally */
    padding: 20px;
    border-radius: 5px;
    background-color: cyan; /* Cyan background */
}

footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: cyan; /* Cyan background */
    padding: 10px 0;
    text-align: center;
    border-top: 1px solid #ccc;
}

        /* Styles for the container */


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

input[type="text"],
input[type="email"],
input[type="password"],
input[type="submit"] {
    width: calc(100% - 22px); /* Adjust for padding */
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}



    </style>
</head>
<body>
<div class="container">
<section>
    <form action="userdata.php" method="POST">
        <h3>REGISTRATION FORM</h3>
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="first_name" required=""></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="last_name" required=""></td>
            </tr>
            <tr>
                <td>Registration Number:</td>
                <td><input type="text" name="registration_number" required=""></td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td><input type="email" name="email_address" required=""></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" required=""></td>
            </tr>
            <tr>
                <td>Course ID:</td>
                <td><input type="text" name="course_id" required=""></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="send" value="Apply">
                    <input type="submit" name="send" value="Cancel">
                </td>
            </tr>
        </table>
    </form>
</section>
</div>

<footer><!-- Footer section -->
    <p>&copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A</p><!-- Copyright and trademark notice -->
</footer><!-- Footer section -->

</body>
</html>
