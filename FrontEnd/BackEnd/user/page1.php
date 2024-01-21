<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>MENU</title>
  </head>
  <body>
<?php


include '../config.php';





session_start();

if (isset($_POST["enter"])) {
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['tno'] = $_POST['tno'];
  $_SESSION['pno'] = $_POST['pno'];
}

if (isset($_POST['submit'])) {
  $i_name=$_POST['iname'];
  $price=$_POST['price'];

  $name=$_SESSION['name'];
  $pno=$_SESSION['pno'] ;
  $tno=$_SESSION['tno'];


 

  $sql="INSERT INTO `orders`(`name`, `table_no`, `phone_no`, `item_name`,`price`) VALUES ('$name','$tno','$pno','$i_name','$price')";


  $result= mysqli_query($conn,$sql);
  echo "<script>alert('Order Placed')</script>";

  header("Location: page1.php");
}



$sql="SELECT * FROM `items`";

?>

<?php
if($result= mysqli_query($conn,$sql)){

  while ($row=mysqli_fetch_array($result)){
    echo "
    <div  class='flex'> 
    <div class='card' style='width: 18rem;'>
    <form action='page1.php' method='post' > 
    <button name='submit' >
    <h5>
    <input name='iname' value=".$row['item_name']. "></h5>
    <img src='" .$row['img']."'class='card-img-top' alt=''>
    <div class='card-body'>
    <p class='card-text'></p>".$row['price']."
    <input type='hidden' name='price' value=".$row['price']. ">
    </div>
    </form>
    </div>
    </div> 
    </button>
    ";
  }
}
   
?>



<?php 
$tno=$_SESSION['tno'];


// $tno=1;

if (isset($_POST['bill'])) {

$tblno=$_POST['tno'];


$sql = " INSERT INTO temp_order
 SELECT * from orders WHERE table_no='$tblno'";
$result = $conn->query($sql);




$sql = "SELECT name,table_no,phone_no,sum(price) as total from  temp_order  WHERE table_no='$tblno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
          $tno=$row["table_no"];
          $pno=$row["phone_no"];
          $price=$row["total"];
          $name=$row["name"];
        } 
  }else {
        echo "";
    }
     
$sql2="Insert into bill values('$tno','$name','$pno','$price');" ; 
$result = $conn->query($sql2);

   
    header("Refresh:0; url=../bill/bill.php");
    $_SESSION['tno']=$tno;

  }
?>

<form action="page1.php" method="post">
<div class="footer">


<div class="buttons">
<input name="tno" type="hidden" value="<?php echo $tno ?>">
<button name="bill" class="btn-hover color-8">Generate Bill</button>
<div>
  <form>
<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  color: white;
  text-align: center;
}
</style>
</div>
<style>
  * {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.buttons {
    margin: 10%;
    text-align: center;
}

.btn-hover {
    width: 200px;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    margin: 20px;
    height: 55px;
    text-align:center;
    border: none;
    background-size: 300% 100%;

    border-radius: 50px;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}

.btn-hover:hover {
    background-position: 100% 0;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}

.btn-hover:focus {
    outline: none;
}

.btn-hover.color-1 {
    background-image: linear-gradient(to right, #25aae1, #40e495, #30dd8a, #2bb673);
    box-shadow: 0 4px 15px 0 rgba(49, 196, 190, 0.75);
}
.btn-hover.color-2 {
    background-image: linear-gradient(to right, #f5ce62, #e43603, #fa7199, #e85a19);
    box-shadow: 0 4px 15px 0 rgba(229, 66, 10, 0.75);
}
.btn-hover.color-3 {
    background-image: linear-gradient(to right, #667eea, #764ba2, #6B8DD6, #8E37D7);
    box-shadow: 0 4px 15px 0 rgba(116, 79, 168, 0.75);
}
.btn-hover.color-4 {
    background-image: linear-gradient(to right, #fc6076, #ff9a44, #ef9d43, #e75516);
    box-shadow: 0 4px 15px 0 rgba(252, 104, 110, 0.75);
}
.btn-hover.color-5 {
    background-image: linear-gradient(to right, #0ba360, #3cba92, #30dd8a, #2bb673);
    box-shadow: 0 4px 15px 0 rgba(23, 168, 108, 0.75);
}
.btn-hover.color-6 {
    background-image: linear-gradient(to right, #009245, #FCEE21, #00A8C5, #D9E021);
    box-shadow: 0 4px 15px 0 rgba(83, 176, 57, 0.75);
}
.btn-hover.color-7 {
    background-image: linear-gradient(to right, #6253e1, #852D91, #A3A1FF, #F24645);
    box-shadow: 0 4px 15px 0 rgba(126, 52, 161, 0.75);
}
.btn-hover.color-8 {
    background-image: linear-gradient(to right, #29323c, #485563, #2b5876, #4e4376);
    box-shadow: 0 4px 15px 0 rgba(45, 54, 65, 0.75);
}
.btn-hover.color-9 {
    background-image: linear-gradient(to right, #25aae1, #4481eb, #04befe, #3f86ed);
    box-shadow: 0 4px 15px 0 rgba(65, 132, 234, 0.75);
}
.btn-hover.color-10 {
        background-image: linear-gradient(to right, #ed6ea0, #ec8c69, #f7186a , #FBB03B);
    box-shadow: 0 4px 15px 0 rgba(236, 116, 149, 0.75);
}
.btn-hover.color-11 {
       background-image: linear-gradient(to right, #eb3941, #f15e64, #e14e53, #e2373f);  box-shadow: 0 5px 15px rgba(242, 97, 103, .4);
}

  </style>

   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
  <style>
    .flex{
      display:inline-block;
    }
  </style>
</html>