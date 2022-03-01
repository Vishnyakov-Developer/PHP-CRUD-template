<?php 

require_once '../config/database.php';
require_once '../config/default.php';
if($_GET['day'] > 0 && strlen($_GET['username']) > 0 && $_GET['project'] > 0) {
    $query = "UPDATE projects SET day".$_GET['day']."=". GetIDByName($_GET['username'])." WHERE ID = ".$_GET['project'].";";
    mysqli_query($conn, $query);
    header('Location: /projects.php');
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/null.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital@1&display=swap" rel="stylesheet">   
</head>
<body>
    <header class="header"> 
        <div class="header_text">Текущий список сотрудников:</div> 
    </header>
        <form action="user_do.php">
            <p>Введите день недели по счёту:</p>
            <input type="text" name="day" value="<?=$_GET['day']?>">
            <p>Введите номер проекта:</p>
            <input type="text" name="project" value="<?=$_GET['project']?>">
            <p>Введите имя сотрудника:</p>
            <input type="text" name="username" value="<?=$_GET['username']?>">
            <button type="submit">ОК</button>
        </form>
</body>
</html>

