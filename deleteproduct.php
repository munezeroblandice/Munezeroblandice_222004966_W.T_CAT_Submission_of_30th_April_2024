<?php
session_start();
if (isset($_GET["product_id"])) {
   $product_id=$_GET["product_id"];
include "dbconnection.php";
$sql="DELETE FROM product WHERE product_id=$product_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:viewproduct.php");
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>
