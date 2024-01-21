<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "project";

$conn = mysqli_connect($server, $user, $pass, $database);


$sql="SELECT * FROM `orders`";

$result= mysqli_query($conn,$sql);



?>

<!DOCTYPE html>
<html>
<head>
  <title>Order list</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Order List</h2>
<table>
    <?php
    while ($row=mysqli_fetch_array($result)){
   echo" <tr>
    <th>Name</th>
    <th>Table_no</th>
    <th>Item_name</th>
  </tr>
  <tr>
    <td>".$row['name']."</td>
    <td>".$row['table_no']."</td>
    <td>".$row['item_name']."</td>
  </tr>";
    }
  ?>
</table>
</body>
</html>

