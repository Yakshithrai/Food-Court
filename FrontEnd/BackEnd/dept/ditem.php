<?php

include '../config.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['item'];
 



  $sql="DELETE FROM `items` WHERE `item_name` ='$name'";


  $result= mysqli_query($conn,$sql);

  header("Location: page1.php");
}

?>