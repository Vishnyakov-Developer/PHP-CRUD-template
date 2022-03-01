<?php 

require_once '../config/database.php';

$name_user = $_POST['name'];

mysqli_query($conn, "INSERT INTO users (name) VALUES ( \"".$_POST['name']."\" );");


header('Location: /index.php');