<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eclass Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 style="text-align: center; font-family: century; font-weight: bold;">ENTERPRISE MANAGEMENT SYSTEM</h2>
        <h4 style="text-align: center; font-family: century; font-weight: bold;">LIST OF PRODUCT IN OUR ENTERPRISE</h4>
        <a href="user form.php" class="btn btn-primary" style="margin-top: 0px;">New Product</a>
        <a href="home.html" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table class="table table-bordered">
            <thead class="bg-warning">
                <tr>
                    <th> Id</th>
                    <th>Product Name</th>
                    <th>User Id</th>
                    <th>Quantity Available</th>
                    <th>Price of Product</th>
                    <th>Added Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "dbconnection.php";
                $sql = "SELECT * FROM users";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['product_id']}</td>
                        <td>{$row['productname']}</td> 
                        <td>{$row['user_id']}</td>
                        <td>{$row['quantityavailable']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['add_date']}</td>
                        <td>
                            <a href='/Enterprise_management_system/editproduct.php?product_id={$row['product_id']}' class='btn btn-primary btn-sm'>Edit</a>
                            <a href='/Enterprise_management_system/deleteproduct.php?product_id={$row['product_id']}' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
