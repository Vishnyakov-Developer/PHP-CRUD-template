<?php 

require_once '../config/database.php';
mysqli_query($conn, "DELETE FROM users WHERE ID = ".$_GET['userid']."");
header('Location: /index.php');