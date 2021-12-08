<?php
    require_once '../logics/connect.php';

    if($_POST){
        $id = mysqli_real_escape_string($mysql,$_POST['id']);
        $name = mysqli_real_escape_string($mysql,$_POST['name']);
        $year = mysqli_real_escape_string($mysql,$_POST['year']);
        $edu = mysqli_real_escape_string($mysql,$_POST['edu']);
        $email = mysqli_real_escape_string($mysql,$_POST['email']);
        $group = mysqli_real_escape_string($mysql,$_POST['group']);

        if ($_FILES && $_FILES["filename"]["error"] == UPLOAD_ERR_OK){
            $url = "../file/".$_FILES["ava"]["name"];
            move_uploaded_file($_FILES["ava"]["tmp_name"], $url);
            $fileName = $_FILES["ava"]["name"];

            $query = "UPDATE students SET  student_name = '$name', student_group_id = '$group', student_of_birth = '$year', student_education = '$edu', student_email = '$email', student_foto = '$fileName' WHERE student_id = $id";
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
        }else{
            $query = "UPDATE students SET  student_name = '$name', student_group_id = '$group', student_of_birth = '$year', student_education = '$edu', student_email = '$email' WHERE student_id = $id";
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
        
    }
    ?>