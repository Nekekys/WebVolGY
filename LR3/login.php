<?php 
    session_start();
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="styleLogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main">
        <form action="logics/signin.php" method="POST">
            <h2 class="text-center">Войти</h2>
            <a class="text-center d-block" href="index.php">Домой</a>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
                <input value="<?php echo $_SESSION['emailL'];?>" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <?php 
                if($_SESSION['error']) {
                    echo "<p class='error erroeL'>".$_SESSION['error']."</p>";
                } 
                unset($_SESSION['error']);
            ?>
            <button type="submit" class="btn btn-primary w-100 mt-2">Войти</button>
            <p class="text-center mt-1">Нет аккаунта? <a href="register.php">Зарегестрироваться</a></p>
        </form>
    </div>
</body>
</html>