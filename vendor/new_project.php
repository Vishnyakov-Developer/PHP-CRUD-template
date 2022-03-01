<?php 

require_once '../config/database.php';

$name_user = $_POST['name'];

mysqli_query($conn, "INSERT INTO projects (name) VALUES ( \"".$_POST['name']."\" );");


header('Location: /projects.php');