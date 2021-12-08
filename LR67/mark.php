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
    <h1>Оценки</h1>
    <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Студент</th>
                    <th scope="col">Предмет</th>
                    <th scope="col">Оценка</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT mark_id, students.student_name, subjects.subject_name, mark_rating FROM marks INNER JOIN subjects ON subjects.subject_id = marks.mark_subject_id INNER JOIN students ON students.student_id = marks.mark_student_id";
                    $result = $mysql->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['mark_id'] . "</td>
                            <td>" . $row['student_name'] . "</td>
                            <td>" . $row['subject_name'] . "</td>
                            <td>" . $row['mark_rating'] . "</td>
                            <td><a href='mark/edit.php?id=".$row['mark_id']."' type='button' class='btn btn-primary'>Редактировать</a></td>
                            <td><button onclick='deleteMain(".$row['mark_id'].", `mark`)' type='button' class='btn btn-danger'>Удалить</button></td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
        <a href="mark/add.php" type='button' class='btn btn-primary'>Добавить</a>
   </div>
   

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <script src="main.js"></script>
</body>
</html>