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
        <h1 class="text-center"><u>course form</u></h1>
        <form action="course table.php" method="POST">
            <div class="form-group">
                <label for="course_id"> course_id</label>
                <input type="number" class="form-control" name="course_id" student_id="C_id">
            </div>
            <div class="form-group">
                <label for="course_title">course_title</label>
                <input type="text" class="form-control" name="course_title" id="course_title">
            </div>
            <div class="form-group">
                <label for="start_date">start_date</label>
                <input type="date" class="form-control" name="start_date" id="start_date">
            </div>
            <div class="form-group">
                <label for="end_date">end_date</label>
                <input type="date" class="form-control" name="end_date" id="end_date">
            </div>
             <div class="form-group">
                <label for="course_materials">course_materials</label>
                <input type="text" class="form-control" name="course_materials" id="course_materials">
            </div>
            
            
            <button type="submit" class="btn btn-primary">INSERT</button>
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
