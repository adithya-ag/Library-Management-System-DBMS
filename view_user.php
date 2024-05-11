<!DOCTYPE html>
<html>
<head>
<style>
table,td,tr,th {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

td, th {
  border: 1px solid #ddd;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}

th{
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
img{
  width : 2%;
}

</style>
</head>
<body>
  <a href="signup.php"><img  src="vector-add-icon.webp" alt=""></a>
</body>
</html>
<?php
include './config/db.php';
session_start();
if(!isset($_SESSION["username"])){}
$sql = "SELECT * FROM user";
$result =  mysqli_query($conn,  $sql);

if ($result) {
  echo "<table><tr><th>Firstname</th><th>Lastname</th><th>Email</th><th>Mobile_Number</th>";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row["Firstname"]."</td><td>".$row["Lastname"]."</td><td>".$row["Email"]."</td><td>".$row["Mobile_Number"]."</th>";
  }
  echo "</table>";
}
?>

