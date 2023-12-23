<?php
require 'config.php';
if(!empty($_SESSION["Email"])){
  $Email = $_SESSION["Email"];
  
  $result = mysqli_query($conn, "SELECT * FROM Users WHERE Email = '$Email'");
  $row = mysqli_fetch_assoc($result);  
}
else{
  header("Location: landing.php");
}



$ItemID = $_GET["ItemID"];

$foundQ = mysqli_query($conn, "UPDATE `lostposts` SET `itemStatus`='FOUND!' WHERE ItemID = '$ItemID'");

header("Location: UserDashboard.php");

?>