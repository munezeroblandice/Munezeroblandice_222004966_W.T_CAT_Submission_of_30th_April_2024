<?php 
// Call the file that contains the database connection
include "dbconnection.php";

// Check if assessment_id is provided in the URL
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["assessment_id"])) {
    $assessment_id = $_GET["assessment_id"];

    // Prepare and bind parameters for the SELECT query to prevent SQL injection
    $stmt = $connection->prepare("SELECT * FROM assessment WHERE assessment_id=?");
    $stmt->bind_param("i", $assessment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $assessment_id = $row["assessment_id"];
        $assessment_title = $row["assessment_title"];
        $due_date = $row["due_date"];
        $maximum_score = $row["maximum_score"];
        $grading_rubric = $row["grading_rubric"];
        $course_id = $row["course_id"];
    } else {
        echo "Assessment not found";
        exit;
    }

    $stmt->close();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $assessment_title = $_POST["assessment_title"];
    $due_date = $_POST["due_date"];
    $maximum_score= $_POST["maximum_score"];
    $grading_rubric = $_POST["grading_rubric"];
    $course_id = $_POST["course_id"];

    // Check if all fields are filled
   if (empty($assessment_id) || empty($assessment_title) || empty($due_date) || empty($maximum_score) || empty($grading_rubric) || empty($course_id)) {
    echo "All fields are required!";
} else {
    // Prepare and bind parameters for the UPDATE query to prevent SQL injection
    $stmt = $connection->prepare("UPDATE assessment SET assessment_title=?, due_date=?, maximum_score=?, grading_rubric=?, course_id=? WHERE assessment_id=?");
    $stmt->bind_param("sdssii", $assessment_title, $due_date, $maximum_score, $grading_rubric, $course_id, $assessment_id);

    // Execute the statement
    if ($stmt->execute()) {
        $stmt->close();
        // Redirect to the page after updating
        header("location: assessment table.php");
        exit;
    } else {
        echo "Error updating record: " . $connection->error;
    }
    $stmt->close();
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
        <h3 style="color:green;">UPDATE ASSESSMENT HERE</h3>
        <!-- Section that contains form that helps to update assessment information -->
        <section class="forms">
            <form method="POST">

               <label>Assessment title</label><br>
<input type="text" name="assessment_title" class="input" value="<?php echo $assessment_title; ?>"><br>

<label>Due date</label><br>
<input type="date" name="due_date" class="input" value="<?php echo $due_date; ?>"><br> 

<label>Maximum score</label><br>
<input type="text" name="maximum_score" class="input" value="<?php echo $maximum_score; ?>"><br>

<label>Grading rubric</label><br>
<input type="text" name="grading_rubric" class="input" value="<?php echo $grading_rubric; ?>"><br>  

<label>Course ID</label><br>
<input type="number" name="course_id" class="input" value="<?php echo $course_id; ?>"><br> 


                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <!-- Footer section -->
        <p>&copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A</p>
        <!-- Copyright and trademark notice -->
    </footer>
</body>
</html>

  