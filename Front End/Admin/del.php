<?php


include '../config.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['did'];
  $sql=" DELETE from `dept_login` where `dept_id`='$name' ";


  $result= mysqli_query($conn,$sql);

  header("Location: page1.php");
}

?>