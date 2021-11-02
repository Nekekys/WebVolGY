<?php
    require_once 'connect.php';

    if($_POST){
        $email = mysqli_real_escape_string($mysql,$_POST['email']);
        $password = $_POST['password'];


        
        $num = (isset ($_SESSION["num"])) ? $_SESSION["num"] : 0;
        $time = (isset ($_SESSION["time"])) ? $_SESSION["time"] : 0;
        if((time() - $time >= 60*60)&&($num >= 3)){
            $num = 0;
        }
        if($num < 3){
            if($email && $password){
                $result = $mysql->query("SELECT * FROM `users` WHERE `e-mail` = '$email'");
                $id = $mysql->insert_id;
                if(mysqli_num_rows($result) > 0){
                    $user = mysqli_fetch_assoc($result);
                    if(password_verify($password,$user['password'])){
                        $_SESSION['user']['id'] = $user['id'];
                        $_SESSION['user']['name'] = $user['name'];
                        $response = [
                            "check" => true
                        ];
                        echo json_encode($response);

                    }else{
                        $num++;
                        $_SESSION["num"] = $num;
                        $_SESSION["time"] = time();
                        $response = [
                            "check" => false,
                            "error" => "Неправильный пароль"
                        ];
                        echo json_encode($response);
                    }
                }else{
                    $response = [
                        "check" => false,
                        "error" => "Неправильный логин"
                    ];
                    echo json_encode($response);
                }
            }else{
                $response = [
                    "check" => false,
                    "error" => "Заполните все поля"
                ];
                echo json_encode($response);
            }
        }else{
            $response = [
                "check" => false,
                "error" => "Вы превысили лимит ввода неправильного пароля"
            ];
            echo json_encode($response);
        }
    }
?>
