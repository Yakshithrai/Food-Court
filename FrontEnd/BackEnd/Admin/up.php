<?php

include '../config.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['did'];
  $pass = $_POST['pass'];

  $sql=" UPDATE `dept_login` SET password='$pass' where `dept_id`='$name'";


  $result= mysqli_query($conn,$sql);

  header("Location: page1.php");
}

?>