<?php

include '../config.php';


  $sql="SELECT * FROM `items`";
while ($row=mysqli_fetch_array($result)){
$sql="INSERT INTO `orders` (`name`, `table_no`, `phone_no`, `item_name`) VALUES ('aaa', '234', '8987232323', '$row['item_name']')";
)


?>
