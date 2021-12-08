<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
    require "header.php";
    require "logics/connect.php";
   ?>
   <div class="container">
        <h1>Список предметов</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Название предмета</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $query = "SELECT subject_id, subject_name FROM subjects";
                    $result = $mysql->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['subject_id'] . "</td>
                            <td>" . $row['subject_name'] . "</td>
                            <td><a href='subject/edit.php?id=".$row['subject_id']."' type='button' class='btn btn-primary'>Редактировать</a></td>
                            <td><button onclick='deleteMain(".$row['subject_id'].", `subject`)' type='button' class='btn btn-danger'>Удалить</button></td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
        <a href="subject/add.php" type='button' class='btn btn-primary' id="button">Добавить</a>
   </div>
   


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <script src="main.js"></script>
</body>
</html>