<?php
    require_once '../logics/connect.php';

    if($_POST){
        $id = mysqli_real_escape_string($mysql,$_POST['id']);
        $group = mysqli_real_escape_string($mysql,$_POST['group']);
        $subject = mysqli_real_escape_string($mysql,$_POST['subject']);
        $query = "UPDATE groupsubjects SET  group_id = '$group', subjects_id = '$subject' WHERE groupsubjects_id = $id";
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