<?php
    require_once 'connect.php';

    if($_POST){
        $email = mysqli_real_escape_string($mysql,$_POST['email']);
        $name = mysqli_real_escape_string($mysql,$_POST['name']);
        $last_name = mysqli_real_escape_string($mysql,$_POST['last_name']);
        $otchestvo = mysqli_real_escape_string($mysql,$_POST['otchestvo']);
        $sex = boolval($_POST['sex']);
        $rhesus_factor = boolval($_POST['rhesus_factor']);
        $blood_type = $_POST['blood_type'];
        $date = $_POST['date'];
        $adress = mysqli_real_escape_string($mysql,$_POST['adress']);
        $interests = mysqli_real_escape_string($mysql,$_POST['interests']);
        $src_vk = mysqli_real_escape_string($mysql,$_POST['src_vk']);
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['otchestvo'] = $otchestvo;
        $_SESSION['sex'] = $_POST['sex'];
        $_SESSION['rhesus_factor'] = $_POST['rhesus_factor'];
        $_SESSION['blood_type'] = $blood_type;
        $_SESSION['date'] = $date;
        $_SESSION['adress'] = $adress;
        $_SESSION['interests'] = $interests;
        $_SESSION['src_vk'] = $src_vk;


        if($email &&  $name && $last_name && $otchestvo && $date && $adress && $interests && $src_vk && $password && $password2 && $blood_type){
            if($password == $password2){
                $BLLCheck = false;
                $SLLCheck = false;
                $length6Check = false;
                $SSpecCheck = false;
                $SSpaceCheck = false;
                $SHyphenCheck = false;
                $SUnderlineCheck = false;
                $numberCheck = false;
                $BNotCirilic = false;
                $SNotCirilic = false;
                
                if((preg_match("#[0-9]+#",$password))){ 
                    $numberCheck = true;
                } 
                if((preg_match("#[A-Z]+#",$password))){ 
                    $BLLCheck = true;
                } 
                if((preg_match("#[a-z]+#",$password))){ 
                    $SLLCheck = true;
                } 
                if((!preg_match("#[А-Я]+#",$password))){ 
                    $BNotCirilic = true;
                } 
                if((!preg_match("#[а-я]+#",$password))){ 
                    $SNotCirilic = true;
                }   
                if((preg_match("#[\W]+#",$password) )){ 
                    $SSpecCheck = true;
                }  
            
                for($i = 0; $i <  strlen($password); $i++){
                        if(ord($password[$i]) == 45){
                            $SHyphenCheck = true;
                        }
                        if(ord($password[$i]) == 95){
                            $SUnderlineCheck = true;
                        }
                        if(ord($password[$i]) == 32){
                            $SSpaceCheck = true;
                        }
                }

                if($BLLCheck && $SLLCheck && (strlen($password) > 6) && $SSpecCheck && $SSpaceCheck && $SHyphenCheck &&
                $SUnderlineCheck && $numberCheck && $BNotCirilic && $SNotCirilic){
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $result = $mysql->query("SELECT `e-mail` FROM `users` WHERE `e-mail` = '$email'");

                    if(mysqli_num_rows($result) > 0){
                        $response = [
                            "check" => false,
                            "error" => "Пользователь с таким e-mail уже зарегестрирован"
                        ];
                        echo json_encode($response);
                    }else{
                        $resultQ = $mysql->query("INSERT INTO `users` 
                        (`id`, `e-mail`, `name`, `last_name`, `otchestvo`, `sex`, `birth_day`, `interests`, `blood_type_id`, `rhesus_factor`, `link_vk`, `adress`, `password`) 
                        VALUES (NULL, '$email', '$name', '$last_name', '$otchestvo', '$sex', '$date', '$interests', '$blood_type', '$rhesus_factor', '$src_vk', '$adress', '$password')");

                        
                        $id = $mysql->insert_id;

                        if($resultQ){
                            $_SESSION['user']['id'] = $id;
                            $_SESSION['user']['name'] = $name;
                            $response = [
                                "check" => true
                            ];
                            echo json_encode($response);
                        }
                    }
                }else{
                    $response = [
                        "check" => false,
                        "error" => "Пароль должен быть не мение 6 символов, обязательно содержать большие латинские буквы, маленькие латинские буквы, спецсимволы (знаки препинания, арифметические действия и тп), пробел, дефис, подчеркивание и цифры"
                ];
                    echo json_encode($response);
                }

            }else{
                $response = [
                    "check" => false,
                    "error" => "Пароли должны совпадать"
                ];
                echo json_encode($response);
            }
        }else{
            $response = [
                "check" => false,
                "error" => 'Заполните все поля'
            ];
            echo json_encode($response );


        }
    }
?>
