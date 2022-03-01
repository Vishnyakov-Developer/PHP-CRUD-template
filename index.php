<?php
    require_once 'config/database.php';
    require_once 'config/default.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataBase</title>
    <link rel="stylesheet" href="css/null.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital@1&display=swap" rel="stylesheet">   
</head>
<body>
    <header class="header">
        <div class="header_text">Текущий список сотрудников:</div> 
    </header>
    <section class="user_section">
        <?php 
            if(!$conn) {
                die("BD FAILDED");
            }
        ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Project</th>
            </tr>
            <?php
                $users = mysqli_query($conn, "SELECT * FROM users");
                $users = mysqli_fetch_all($users);
                foreach($users as $user){
                ?>
                <tr>
                <td><?=$user[0]?> <a href="vendor/delete_user.php?userid=<?=$user[0]?>">[<span class="Delete">-</span>]</a></td>
                <td><?=GetNameByID($user[0])?></td>
                <td><a href="projects.php?userid=<?=$user[0]?>">Посмотреть</a></td>

                <?php } ?>
                </tr>
            
        </table>
    </section>
    <form action="vendor/new_user.php" method="post">
        <p>Зачислить нового сотрудника:</p>
        <input type="text" name="name">
        <button type="submit">ОК</button>
    </form>
    <div class="linker">
        <a class="linker_a" href="projects.php">Перейти к проектам</a>
    </div>
</body>
</html>