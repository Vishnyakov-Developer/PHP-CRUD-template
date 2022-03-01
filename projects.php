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
        <div class="header_text">Планирование проектов</div> 
    </header>
    <section class="user_section">
        <?php 
            if(!$conn) {
                die("BD FAILDED");
            }
        ?>
        <table>
            <tr>
                <th>ID проекта</th>
                <th>Название проекта</th>
                <th>Понедельник</th>
                <th>Вторник</th>
                <th>Среда</th>
                <th>Четверг</th>
                <th>Пятница</th>
                <th>Суббота</th>
                <th>Воскресенье</th>
            </tr>
            <?php
                $projects = mysqli_query($conn, "SELECT * FROM projects");
                $projects = mysqli_fetch_all($projects);
                foreach($projects as $project){
                ?>
                <tr>
                <td><?=$project[0]?><a href="vendor/delete_project.php?project=<?=$project[0]?>">[<span class="Delete">-</span>]</a></td>
                <td><?=$project[1]?></td>

                <?php 
                for($i = 0; $i<7; $i++) {
                        if($project[$i+2] < 1 || strlen(GetNameByID($project[$i+2])) < 1) {
                            ?>
                            <td><a href="vendor/user_do.php?day=<?=$i+1?>&project=<?=$project[0]?>">Назначить</a></td>
                            <?php
                        } else {
                            if($project[$i+2] == $_GET['userid'])
                            {
                                  ?>
                                  <td><span class="selected"><?=GetNameByID($project[$i+2])?></span> <a href="vendor/delete_user_project.php?project=<?=$project[0]?>&day=<?=$i+1?>">[<span class="Delete">-</span>]</a></td>
                                  <?php
                            }
                            else {
                            ?>
                            <td><?=GetNameByID($project[$i+2])?> <a href="vendor/delete_user_project.php?project=<?=$project[0]?>&day=<?=$i+1?>">[<span class="Delete">-</span>]</a></td>
                            <?php
                            }
                        }
                }

                } ?>
                </tr>
            
        </table>
    </section>
    <form action="vendor/new_project.php" method="post">
        <p class="p_from">Создать новое дело:</p>
        <input type="text" name="name">
        <button type="submit">ОК</button>
    </form>
    <div class="linker">
        <a class="linker_a" href="index.php">Перейти к юзерам</a>
    </div>
</body>
</html>