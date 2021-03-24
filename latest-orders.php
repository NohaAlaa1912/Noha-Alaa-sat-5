<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>
<body>
    <form action="latest-orders.php" method="GET">
    <input type="number" name="number" placeholder="Enter Number">
    <br>
    <input type="submit" value="submit" name="submit">
    </form>
    <br>


<?php
if(isset($_GET['submit']))
{
    $num =$_GET['number'];
    $error=[];
    
    // echo $num;

if(empty($num)){
    $error[]= "please enter number";
}
else if ($num < 0)
{
    $error[]= "please enter positive number";
}

print_r($error);
echo"<br> <br>";


$conn=mysqli_connect("localhost","root","","route34_sat");
$query ="SELECT orderNumber, orderDate, customerNumber FROM orders
ORDER BY orderDate DESC
LIMIT $num";
$result = mysqli_query($conn, $query);
$msg=mysqli_fetch_all($result,MYSQLI_ASSOC);
}
// print_r($msg);
?>

<table border="1" color="blue">
<thead>
<tr>
<th> orderNumber </th>
<th> orderDate </th>
<th> customerNumber </th>
</tr>
</thead>
<tbody>
<?php foreach ($msg as $data) { ?>
<tr>
    <td> <?= $data['orderNumber']?> </td>
    <td> <?= $data['orderDate']?> </td>
    <td> <?= $data['customerNumber']?> </td>
</tr>
<?php }?>
</tbody>

</table>





</body>
</html>