<?php
    require_once '../logics/connect.php';

    if($_POST){
        $id = mysqli_real_escape_string($mysql,$_POST['id']);
        $name = mysqli_real_escape_string($mysql,$_POST['name']);
        $query = "UPDATE subjects SET  subject_name = '$name' WHERE subject_id = $id";
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