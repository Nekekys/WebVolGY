<?php
    session_start();
    require_once 'connect.php';

    $email = mysqli_real_escape_string($mysql,$_POST['email']);
    $password = $_POST['password'];


    $_SESSION['emailL'] = $email;

    $num = (isset ($_COOKIE["num"])) ? $_COOKIE["num"] : 0;
    if($num < 3){
        if($email && $password){
            //$password = md5($password);
            //$password = password_hash($password, PASSWORD_DEFAULT);
            $result = $mysql->query("SELECT * FROM `users` WHERE `e-mail` = '$email'");
            if(mysqli_num_rows($result) > 0){
                $user = mysqli_fetch_assoc($result);
                if(password_verify($password,$user['password'])){
                    $_SESSION['user'] = $user;
                    header('Location: ../index.php');
                }else{
                    $num++;
                    setcookie("num", $num , time() + 60*60);
                    $_SESSION['error'] = 'Неправильный пароль';
                    header('Location: ../login.php');
                }
            }else{
                $_SESSION['error'] = 'Неправильный логин';
                header('Location: ../login.php');
            }
        }else{
            $_SESSION['error'] = 'Заполните все поля';
            header('Location: ../login.php');
        }
    }else{
        $_SESSION['error'] = 'Вы превысили лимит ввода неправильного пароля';
        header('Location: ../login.php');
    }
    
?>
