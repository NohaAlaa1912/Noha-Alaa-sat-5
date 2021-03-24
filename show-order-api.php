<?php
if(isset($_GET['submit'])){
    $orderNumber=$_GET['orderNumber'];
    
$conn =mysqli_connect("localhost","root","","route34_sat");
$query = "SELECT * FROM orders
where orderNumber = '$orderNumber'";
$result =mysqli_query($conn, $query);
$msg = mysqli_fetch_assoc($result);
header("Conect-Type: application/json");
echo json_encode($msg);
}
