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
        <h1 class="text-center"><u>Student Form</u></h1>
        <form action="student_table.php" method="POST">
            <div class="form-group">
                <label for="student_id">student_id</label>
                <input type="number" class="form-control" name="student_id" sid="student_id">
            </div>
            <div class="form-group">
                 <label for="first_name">first_name</label>
                <input type="text" class="form-control" name="first_name" id="first_name">
                </div>
                <div class="form-group">
                <label for="last_name">last_name</label>
                <input type="text" class="form-control" name="last_name" id="last_name">
            </div>
            <div class="form-group">
                <label for="registration_number">registration_number</label>
                <input type="text" class="form-control" name="reg_number" id="reg_number">
            </div>
            <div class="form-group">
                <label for="course_id">course_id</label>
                <input type="number" class="form-control" name="course_id" id="course_id">
            </div>
            <div>
                <label>email_address</label>
                <input type="text" class="form-control" name="email_address" id="email_address">
            </div>
            <div>
                <label>password</label>
                <input type="password" class="form-control" name="password" id="email_address">
            </div>
            
             <button type="submit">
            <div class="form-group">
                <label for="" class="btn btn-primary">INSERT</button>
        </form>
        <form action="home.html">
            <button type="submit" class="btn btn-secondary">BACK TO HOME</button>
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