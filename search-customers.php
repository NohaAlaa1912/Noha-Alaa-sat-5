<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Form</title>
</head>
<body>
    <form action="search-customers.php" method="GET">
    <input type="text" name="search_keyword" placeholder="Enter search keyword">
    <br>
    <input type="submit" value="search" name="submit">
    </form>

<?php
    if(isset($_GET['submit'])){

    $keyword=$_GET['search_keyword'];
    $error=[];


    if(empty($keyword)){
        $error[]= "please enter any keyword to search";
    }
    elseif(!is_string($keyword) or is_numeric($keyword)){
        $error[]= "keyword must be string";
    }

    print_r($error);
    echo "<br><br>";

    $conn =mysqli_connect("localhost","root","","route34_sat");
    $query = "SELECT customerName FROM customers 
    WHERE customerName like '%$keyword%'";
    $result =mysqli_query($conn, $query);
    $msg = mysqli_fetch_all($result, MYSQLI_ASSOC);


// print_r($msg);

?>

<table border="1">
<thead style="color: #09c;">
<tr>
<td> <b>customerName</b></td>
</tr>
</thead>
<tbody>
<?php foreach($msg as $name) {?>

<tr>
<td> <?= $name['customerName']?> </td>
</tr>

<?php }}?>
</tbody>

</table>


</body>
</html>