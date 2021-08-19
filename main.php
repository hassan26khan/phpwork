<?php
$servername = "localhost";
$username = "root";
$password = "";
$db  = "bookshop";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$jsondata = file_get_contents('Code Challenge (Sales).json');
$data = json_decode($jsondata, true);
foreach ($data as  $row) 
{

	$sql = "INSERT INTO sales (sale_id,customer_name,customer_mail,product_id,product_name,product_price,sale_date) VALUES ('".$row["sale_id"]."','".$row["customer_name"]."','".$row["customer_mail"]."','".$row["product_id"]."','".$row["product_name"]."','".$row["product_price"]."','".$row["sale_date"]."')";
			mysqli_query($conn,$sql);
}
echo "added";
?>