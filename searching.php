
<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "bookshop";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}
$sql = "SELECT * FROM sales";
if( isset($_GET['search']) ){
 // $searchKey = $_GET['search'];
    $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT  * FROM sales WHERE customer_name  like '%$name%' or product_name like '%$name%' or product_price like '%$name%'" ;
}
$result = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<label></label>
<form action="" method="GET">
<input type="text" placeholder="Search by customer name, product name or porduct price" name="search">&nbsp;
<input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
</form>
<h2></h2>
<table class="table table-striped table-responsive" id="res">
<tr>
<th>Customer Name</th>
<th>Customer Email</th>
<th>Product Name</th>
<th>Product Price</th>
</tr>
<?php
while($row = $result->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $row['customer_name']; ?></td>
    <td><?php echo $row['customer_mail']; ?></td>
    <td><?php echo $row['product_name']; ?></td>
     <td class="countable"><?php echo $row['product_price']; ?></td>
    </tr>
    <tr>
</tr>
    <?php
}
?>
</table>
Total<p id = "sum">  </p>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  var cls = document.getElementById("res").getElementsByTagName("td");
    var sum = 0;
    for (var i = 0; i < cls.length; i++){
        if(cls[i].className == "countable"){
            sum += isNaN(cls[i].innerHTML) ? 0 : parseFloat(cls[i].innerHTML);
        }
    }
    document.getElementById("sum").innerHTML = sum;
</script>