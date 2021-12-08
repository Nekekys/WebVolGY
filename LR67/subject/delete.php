<?php
    require_once '../logics/connect.php';

    if($_POST){
        $id = mysqli_real_escape_string($mysql,$_POST['id']);

        $query = "DELETE FROM subjects WHERE subject_id = $id";
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
        
   
