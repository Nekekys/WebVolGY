<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
    require "../header.php";
    require "../logics/connect.php";
   ?>
   <div class="container">
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../mark.php">Оценки</a></li>
        <li class="breadcrumb-item active" aria-current="page">Новая оценка</li>
    </ol>
    </nav>
    <h1>Добавииь оценку</h1>
        <div class="alert alert-danger" role="alert" id="errorR" style="display: none">
            error
        </div>
        <form action="" class="d-flex">
            <select style='width: 220px;' class="form-select" name="student" aria-label="Default select example">
                <?php
                     $query = "SELECT student_id, student_name  FROM students";
                     $result = $mysql->query($query);
                     while ($row = $result->fetch_assoc()) {
                         echo " <option selected value='" . $row['student_id'] . "'>" . $row['student_name'] . "</option>";
                     }
                    
                ?>
            </select>
            <select style='width: 220px; margin-left: 15px' class="form-select" name="subject" aria-label="Default select example">
                <?php
                     $query = "SELECT subject_id, subject_name  FROM subjects";
                     $result = $mysql->query($query);
                     while ($row = $result->fetch_assoc()) {
                         echo " <option selected value='" . $row['subject_id'] . "'>" . $row['subject_name'] . "</option>";
                     }
                    
                ?>
            </select>
            <input style='width: 90px; margin-left: 15px' class="form-control" type="number" value="0" name="mark" max="100" min="0">
            <button style='margin-left: 15px' type='button' class='btn btn-primary' id="button">Отправить</button>
        </form>      
   </div>
   

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <script src="handler.js"></script>
</body>
</html>