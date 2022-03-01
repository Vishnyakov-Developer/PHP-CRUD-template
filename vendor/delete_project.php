<?php 

require_once '../config/database.php';
mysqli_query($conn, "DELETE FROM projects WHERE ID = ". $_GET['project']);
header('Location: /projects.php');