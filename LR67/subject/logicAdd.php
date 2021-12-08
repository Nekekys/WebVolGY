<?php
    require_once '../logics/connect.php';

    if($_POST){
        $name = mysqli_real_escape_string($mysql,$_POST['name']);
        $query = "INSERT INTO subjects (`subject_id`, `subject_name`) VALUES ( NULL, '$name')";
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