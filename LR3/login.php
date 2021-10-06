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
        <form action="" method="POST">
            <h2 class="text-center">Войти</h2>
            <a class="text-center d-block" href="index.php">Домой</a>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
                <input  name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <p class='error erroeL' id="errorL"></p>
            <button type="submit" class="btn btn-primary w-100 mt-2" id="buttonL">Войти</button>
            <p class="text-center mt-1">Нет аккаунта? <a href="register.php">Зарегестрироваться</a></p>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/validate.js"></script>
</body>
</html>