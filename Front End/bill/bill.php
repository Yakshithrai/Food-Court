<?php
include '../config.php';
session_start();

$tno=$_SESSION['tno'];



if(isset($_POST['del'])) {
$tno=$_POST['tno'];
         $sql = "delete from `temp_order` where table_no='$tno'";
         $result = mysqli_query($conn, $sql);
         header("Location: ../index.php");

}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>bill</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="wrapper">
  
  <div class="table">
    <div style="color:white;">

  <th><?php $sql = "SELECT  `name`,`phone_no` FROM bill WHERE table_no='$tno'";
	$result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
            echo "NAME:   " .$row["name"];
            echo "<br>Phone Number: " .$row["phone_no"];

        
        
    } else {
        echo "RS 0";
    }
    



?>
    </div>
</th>
    <div class="row header">
      <div class="cell">
        Item Name
      </div>
      <div class="cell">
        Price
      </div>

    </div>
    
    <div class="row">
      <div class="cell" data-title="Name">
          <?php
      $sql = "SELECT item_name FROM temp_order WHERE table_no='$tno'";
	$result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           echo "" . $row["item_name"]."<br><br><br>";

        }
    } else {
        echo "";
    }
    ?>
          </div>
      <div class="cell" data-title="Age">
          <?php
      $sql = "SELECT price FROM temp_order WHERE table_no='$tno'";
	$result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           echo "RS " . $row["price"]."<br><br><br>";

        }
    } else {
        echo "RS 0";
    }
    ?>
      </div>
  
      
    
  
  </div>
  <?php
      $sql = "SELECT total FROM bill WHERE table_no='$tno'";
	$result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $total = $row["total"];

        }
    } else {
        echo "RS 0";
    }
    ?>

    <form action="bill.php" method="post">
      <input type="hidden" name="tno" value="<?php echo $tno?>" >
  <button name="del" class="glow-on-hover" >Pay <?php echo $total?></button>
<form>






  
<style>
    html,
body {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    background: #000;
}

.glow-on-hover {
    width: 220px;
    height: 50px;
    border: none;
    outline: none;
    color: #fff;
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
}

.glow-on-hover:before {
    content: '';
    background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
    position: absolute;
    top: -2px;
    left:-2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing 20s linear infinite;
    opacity: 0;
    transition: opacity .3s ease-in-out;
    border-radius: 10px;
}

.glow-on-hover:active {
    color: #000
}

.glow-on-hover:active:after {
    background: transparent;
}

.glow-on-hover:hover:before {
    opacity: 1;
}

.glow-on-hover:after {
    z-index: -1;
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #111;
    left: 0;
    top: 0;
    border-radius: 10px;
}

@keyframes glowing {
    0% { background-position: 0 0; }
    50% { background-position: 400% 0; }
    100% { background-position: 0 0; }
}
    </style>

  
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
<style>
    body {
  font-family: "Helvetica Neue", Helvetica, Arial;
  font-size: 14px;
  line-height: 20px;
  font-weight: 400;
  color: #3b3b3b;
  -webkit-font-smoothing: antialiased;
  font-smoothing: antialiased;
  background: #2b2b2b;
}
@media screen and (max-width: 580px) {
  body {
    font-size: 16px;
    line-height: 22px;
  }
}

.wrapper {
  margin: 0 auto;
  padding: 40px;
  max-width: 800px;
}

.table {
  margin: 0 0 40px 0;
  width: 100%;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
  display: table;
}
@media screen and (max-width: 580px) {
  .table {
    display: block;
  }
}

.row {
  display: table-row;
  background: #f6f6f6;
}
.row:nth-of-type(odd) {
  background: #e9e9e9;
}
.row.header {
  font-weight: 900;
  color: #ffffff;
  background: #ea6153;
}
.row.green {
  background: #27ae60;
}
.row.blue {
  background: #2980b9;
}
@media screen and (max-width: 580px) {
  .row {
    padding: 14px 0 7px;
    display: block;
  }
  .row.header {
    padding: 0;
    height: 6px;
  }
  .row.header .cell {
    display: none;
  }
  .row .cell {
    margin-bottom: 10px;
  }
  .row .cell:before {
    margin-bottom: 3px;
    content: attr(data-title);
    min-width: 98px;
    font-size: 10px;
    line-height: 10px;
    font-weight: bold;
    text-transform: uppercase;
    color: #969696;
    display: block;
  }
}

.cell {
  padding: 6px 12px;
  display: table-cell;
}
@media screen and (max-width: 580px) {
  .cell {
    padding: 2px 16px;
    display: block;
  }
}
    </style>