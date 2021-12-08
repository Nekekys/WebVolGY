<?php
    require_once '../logics/connect.php';

    if($_POST){
        $student = mysqli_real_escape_string($mysql,$_POST['student']);
        $subject = mysqli_real_escape_string($mysql,$_POST['subject']);
        $mark = mysqli_real_escape_string($mysql,$_POST['mark']);
        $query = "INSERT INTO marks (`mark_id`, `mark_student_id`, `mark_subject_id`, `mark_rating`) VALUES ( NULL, '$student', '$subject', '$mark')";
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