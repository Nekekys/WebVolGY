<?php
    require_once '../logics/connect.php';

    if($_POST){
        $id = mysqli_real_escape_string($mysql,$_POST['id']);
        $student = mysqli_real_escape_string($mysql,$_POST['student']);
        $subject = mysqli_real_escape_string($mysql,$_POST['subject']);
        $mark = mysqli_real_escape_string($mysql,$_POST['mark']);
        $query = "UPDATE marks SET  mark_student_id = '$student', mark_subject_id = '$subject', mark_rating = '$mark' WHERE mark_id = $id";
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
    ?>