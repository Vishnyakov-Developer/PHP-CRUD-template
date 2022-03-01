<?php 

require_once '../config/database.php';
mysqli_query($conn, "UPDATE projects SET day".$_GET['day']."=-1 WHERE ID = ".$_GET['project']."");
header('Location: /projects.php');