<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-learning</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 style="text-align: center; font-family: century; font-weight: bold;">ECLASS MANAGEMENT SYSTEM</h2>
        <h4 style="text-align: center; font-family: century; font-weight: bold;">LIST OF ASSESSMENTS DONE BY STUDENTS IN OUR SYSTEM</h4>
        <a href="assessment_form.html" class="btn btn-primary" style="margin-top: 0px;">New assessment</a>
        <a href="home.html" class="btn btn-secondary" style="margin-left: 10px;">Back Home</a>
        <table class="table table-bordered">
            <thead class="bg-warning">
                <tr>
                    <th>Assessment ID</th>
                    <th>Due Date</th>
                    <th>Course ID</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connection details
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

                // SQL query to fetch data from the assessment table
                $sql = "SELECT * FROM assessment";
                $result = $connection->query($sql);

                // Check if there are any assessments
                if ($result->num_rows > 0) {
                    // Output data for each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['assessment_id'] . "</td>
                                <td>" . $row['due_date'] . "</td>
                                <td>" . $row['course_id'] . "</td>
                                
                                <td><a class='btn btn-danger' href='delete_assessment.php?assessment_id=" . $row['assessment_id'] . "'>Delete</a></td>
                                <td><a class='btn btn-primary' href='edit assessment.php?assessment_id=" . $row['assessment_id'] . "'>Edit</a></td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No data found</td></tr>";
                }
                // Close the database connection
                $connection->close();
                ?>
            </tbody>
        </table>
    </div>
    <footer><!-- Footer section -->
        <div style="text-align: center; padding: 25px; background-color: blue; color: white;">
            <p>&copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A</p><!-- Copyright and trademark notice -->
        </div>
    </footer><!-- Footer section -->
</body>
</html>
