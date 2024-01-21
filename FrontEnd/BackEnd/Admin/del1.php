<?php

include '../config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $item = $_POST['did'];
  $sql="DELETE FROM `department` WHERE `department`.`item_name` = '$item'";
  $result= mysqli_query($conn,$sql);
  header("Location: page2.php");
}


?>