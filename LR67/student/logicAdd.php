<?php
    require_once '../logics/connect.php';

    if($_POST){
        $name = mysqli_real_escape_string($mysql,$_POST['name']);
        $year = mysqli_real_escape_string($mysql,$_POST['year']);
        $edu = mysqli_real_escape_string($mysql,$_POST['edu']);
        $email = mysqli_real_escape_string($mysql,$_POST['email']);
        $group = mysqli_real_escape_string($mysql,$_POST['group']);

        if ($_FILES && $_FILES["filename"]["error"] == UPLOAD_ERR_OK){
            $url = "../file/".$_FILES["ava"]["name"];
            move_uploaded_file($_FILES["ava"]["tmp_name"], $url);
        }
        $fileName = $_FILES["ava"]["name"];
       
        $query = "INSERT INTO students (`student_id`, `student_name`, `student_group_id`, `student_of_birth`, `student_education`, `student_email`, `student_foto`) 
                    VALUES ( NULL, '$name', '$group', '$year', '$edu', '$email', '$fileName')";
        $result = $mysql->query($query);
        if($result){
            $response = [
                "check" => true
            ];
            echo json_encode($response);
        }else{
            $response = [
                "check" => false
            ];
            echo json_encode($response);
        }
    }