<?php


include '../config.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['did'];
  $item = $_POST['item'];

  $sql=" UPDATE `department` SET `d_name`='$name' where `item_name`='$item'";


  $result= mysqli_query($conn,$sql);

  header("Location: page1.php");
}

?>