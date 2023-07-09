<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "project";

$conn = mysqli_connect($server, $user, $pass, $database);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['item'];
  $pass = $_POST['prc'];
  $sql=" UPDATE `items` SET `price`='$pass' where `item_name`='$name'";


  $result= mysqli_query($conn,$sql);

  header("Location: page1.php");
}

?>