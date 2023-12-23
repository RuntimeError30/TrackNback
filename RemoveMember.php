<?php
require 'config.php';




$ID = $_GET["ID"];

$deleteQ = mysqli_query($conn, "DELETE FROM Users WHERE ID = '$ID'");

header("Location: UserList.php");

?>