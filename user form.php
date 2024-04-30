<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center"><u>Student form</u></h1>
        <form action="usertable.php" method="POST">
            <div class="form-group">
                <label for="student_id"> student_ID</label>
                <input type="number" class="form-control" name="student_id" student_id="student_id">
            </div>
            <div class="form-group">
                <label for="reg_number">reg_number</label>
                <input type="text" class="form-control" name="reg_number" id="reg_number">
            </div>
            <div class="form-group">
                <label for="course_id">course_id</label>
                <input type="text" class="form-control" name="course_id" id="course_id">
            </div>
            <div class="form-group">
                <label for="email_address">email_address</label>
                <input type="text" class="form-control" name="email_address" id="email_address">
            </div>
            
            <button type="submit" class="btn btn-primary">INSERT</button><br>
        </form>
        <form action="home.html">
            <button type="button" class="btn btn-secondary" onclick="window.location.href='home.html'">BACK TO HOME</button>
        </form>
    </div>
    <footer class="text-center mt-5"><!-- Footer section -->
        <p>&copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A</p><!-- Copyright and trademark notice -->
    </footer><!-- Footer section -->

    <!-- Bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
