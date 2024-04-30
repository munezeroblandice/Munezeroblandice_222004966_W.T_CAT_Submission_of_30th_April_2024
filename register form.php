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
        <h1 class="text-center"><u>register Form</u></h1>
        <form action="register table.php" method="POST">
            <div class="form-group">
                <label for="student_name">name</label>
                <input type="text" class="form-control" name="student_name" sname="student_name">
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" class="form-control" name="Email" id="Email">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="number" class="form-control" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="college">college</label>
                <input type="text" class="form-control" name="college" id="college">
            </div>
            
             <button type="submit" class="btn btn-primary">INSERT</button>
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