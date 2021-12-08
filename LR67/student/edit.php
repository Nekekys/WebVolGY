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

    if($_GET['id']){
        $id = mysqli_real_escape_string($mysql,$_GET['id']);
        $query = "SELECT student_id, student_name, student_group_id, student_of_birth, student_education, student_email  FROM students WHERE student_id = $id";
        $result = $mysql->query($query);
        $row = $result->fetch_assoc();
        $student_id = $row['student_id'];
        $student_name = $row['student_name'];
        $student_group_id = $row['student_group_id'];
        $student_of_birth = $row['student_of_birth'];
        $student_education = $row['student_education'];
        $student_email = $row['student_email'];
    }else{
        header("Location: http://localhost/lr/student.php");
    }
   ?>
   <div class="container">
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../student.php">Студенты</a></li>
        <li class="breadcrumb-item active" aria-current="page">Редактировать студента <?php echo $student_name ?></li>
    </ol>
    </nav>
    <h1>Редактировать студента</h1>
        <div class="alert alert-danger" role="alert" id="errorR" style="display: none">
            error
        </div>
        <form action="" class="d-flex flex-wrap">
            <input style='width: 200px; margin-bottom: 15px' value="<?php echo $student_name ?>" class="form-control" type="text" name="name" placeholder="Имя студента">
            <input style='width: 200px; margin-left: 15px; margin-bottom: 15px' value="<?php echo $student_of_birth ?>" class="form-control" type="text" name="gr" placeholder="Год рождения">
            <input style='width: 200px; margin-left: 15px; margin-bottom: 15px' value="<?php echo $student_education ?>" class="form-control" type="text" name="edu" placeholder="Образование">
            <input style='width: 200px; margin-left: 15px; margin-bottom: 15px' value="<?php echo $student_email ?>" class="form-control" type="text" name="email" placeholder="Электронная почта">
            <input style='width: 200px; margin-left: 15px; margin-bottom: 15px' value="<?php echo $student_name ?>" class="form-control" type="file" name="ava" >
            <select style='width: 200px; margin-left: 15px; margin-bottom: 15px' value="<?php echo $student_name ?>" class="form-select" name="group" aria-label="Default select example">
                <?php
                     $query = "SELECT group_id, group_name  FROM groups";
                     $result = $mysql->query($query);
                     while ($row = $result->fetch_assoc()) {
                        if($student_group_id == $row['group_id'])
                            echo " <option selected value='" . $row['group_id'] . "'>" . $row['group_name'] . "</option>";
                        else
                            echo " <option value='" . $row['group_id'] . "'>" . $row['group_name'] . "</option>";
                     }
                    
                ?>
            </select>
            <button style='margin-left: 15px; margin-bottom: 15px' type='button' class='btn btn-primary' onclick="editFunction('<?php echo $student_id ?>')">Отправить</button>
        </form>      
   </div>
   

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <script src="./handler.js"></script>
</body>
</html>