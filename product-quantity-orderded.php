<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form-quantity of orders</title>
</head>
<body>
    <form action="product-quantity-orderded.php" method="GET">
    <input type="text" name="product_name" placeholder="Enter product Name">
    <br>
    <input type="submit" name="submit" value="submit">
    
    </form>

<?php
if (isset($_GET['submit'])){

    $productName=$_GET['product_name'];
    $error=[];

    if(empty($productName)){
        $error[]= "please enter productName";
    }
    else if(strlen($productName) > 255){
        $error[]=' username max 255 chars';
    }

print_r($error);
echo"<br> <br>";

$conn= mysqli_connect("localhost","root","","route34_sat");
$query="SELECT products.productName,orderdetails.productCode, orderdetails.orderNumber, SUM(orderdetails.quantityOrdered)
 FROM orderdetails JOIN products
 ON orderdetails.productCode = products.productCode
  WHERE products.productName ='$productName'
 GROUP BY productName";
$result = mysqli_query($conn, $query);
$confirm=mysqli_fetch_all($result,MYSQLI_ASSOC);


// print_r($confirm);
?>

<table border="1">
<thead  style="color:blue;">
<tr>
<th> ProductName</th>
<th> ProductCode</th>
<th> OrderNumber</th>
<th> Total Number Of Pieces Ordered</th>
</tr>
</thead>
<tbody>
<?php foreach ($confirm as $product) { ?>
<tr>
<td> <?= $product['productName']?></td>
<td> <?= $product['productCode']?></td>
<td> <?= $product['orderNumber']?></td>
<td> <?= $product['SUM(orderdetails.quantityOrdered)']?></td>
</tr>

<?php }}?>
</tbody>


</table>




</body>
</html>














