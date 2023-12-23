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
$FounderID = $_GET["FounderID"];
$OwnerID = $_GET["OwnerID"];



$FounderFetch = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM Users WHERE ID = '$FounderID'"));
$founderName = $FounderFetch["Name"];
$FounderMobile = $FounderFetch["Mobile"];

$notifi = "Found the item by $founderName . Mobile: $FounderMobile";





$deleteQ = mysqli_query($conn, "INSERT INTO notifications(NotificationDesc, OwnerID, FounderID, itemID) VALUES ('$notifi','$OwnerID','$FounderID','$ItemID')");

header("Location: UserDashboard.php");

?>