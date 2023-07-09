<?php

include '../config.php';


session_start();


if (isset($_POST['submit'])) {
	$_SESSION['item_name']= $_POST['name'];
	$_SESSION['price']= $_POST['price'];

}


if (isset($_POST["enter"])) {

  $i_name=$_SESSION['item_name'];
  $price=$_SESSION['price'];
  $name = $_POST['name'];
  $tno = $_POST['tno'];
  $pno = $_POST['pno'];


  $sql="INSERT INTO `orders`(`name`, `table_no`, `phone_no`, `item_name`,`price`) VALUES ('$name','$tno','$pno','$i_name','$price')";


  $result= mysqli_query($conn,$sql);
  echo "<script>alert('Order Placed')</script>";

  header("Location: page1.php");
}

?>
