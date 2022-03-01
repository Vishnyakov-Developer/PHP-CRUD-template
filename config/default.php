<?php
require_once 'database.php';
function GetNameByID($id) {
    global $conn;
    $usersName = mysqli_query($conn, "SELECT name FROM users WHERE ID = ".$id ." LIMIT 1");
    
    $usersName = mysqli_fetch_all($usersName);
    return $usersName[0][0];
    
    
}

function GetIDByName($name) {
    global $conn;
    $query = "SELECT ID FROM users WHERE name = \"".$name ."\" LIMIT 1";
    $usersName = mysqli_query($conn, $query);
    $usersName = mysqli_fetch_all($usersName);
    return $usersName[0][0];
    
    
}

?>