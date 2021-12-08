<?php
    require_once '../logics/connect.php';

    if($_POST){
        $group = mysqli_real_escape_string($mysql,$_POST['group']);
        $subject = mysqli_real_escape_string($mysql,$_POST['subject']);
        $query = "INSERT INTO groupsubjects (`groupsubjects_id`, `group_id`, `subjects_id`) VALUES ( NULL, '$group', '$subject')";
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