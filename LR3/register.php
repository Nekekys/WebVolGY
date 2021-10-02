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
        <form action="logics/signup.php" method="POST">
            <h2 class="text-center">Регистрация</h2>
            <div class="container_form">
                <div class="col-w">
                    <div class="mb-2">
                        <label for="email" class="form-label">Электронная почта</label>
                        <input value="<?php echo $_SESSION['email'];?>" name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="name" class="form-label">Имя</label>
                        <input value="<?php echo $_SESSION['name'];?>" name="name" type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-2">
                        <label for="last_name" class="form-label">Фамилия</label>
                        <input value="<?php echo $_SESSION['last_name'];?>" name="last_name" type="text" class="form-control" id="last_name">
                    </div>
                    <div class="mb-2">
                        <label for="otchestvo" class="form-label">Отчество</label>
                        <input value="<?php echo $_SESSION['otchestvo'];?>" name="otchestvo" type="text" class="form-control" id="otchestvo">
                    </div>
                    <label class="form-label">Пол</label>
                    <div class="form-check ">
                        <input <?php if($_SESSION['sex'] == 0) echo 'checked'?> name="sex" value="0" class="form-check-input" type="radio" name="flexRadioDefaultSex" id="flexRadioDefaultSex1">
                        <label  class="form-check-label" for="flexRadioDefaultSex1">
                            Мужской
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input <?php if($_SESSION['sex'] == 1) echo 'checked'?>  name="sex" value="1" class="form-check-input" type="radio" name="flexRadioDefaultSex" id="flexRadioDefaultSex2" >
                        <label class="form-check-label" for="flexRadioDefaultSex2">
                            Женский
                        </label>
                    </div>
                    <div class="mb-2">
                        <label for="date" class="form-label">Дата рождения</label>
                        <input value="<?php echo $_SESSION['date'];?>" name="date" type="date" class="form-control"  id="date">
                    </div>
                </div>
                <div class="col-w">
                    <div class="mb-2">
                        <label for="adress" class="form-label">Адрес</label>
                        <input value="<?php echo $_SESSION['adress'];?>" name="adress" type="text" class="form-control" id="adress">
                    </div>
                    <div class="mb-2">
                        <label for="interests" class="form-label">Интересы</label>
                        <input value="<?php echo $_SESSION['interests'];?>" name="interests" type="text" class="form-control" id="interests">
                    </div>
                    <div class="mb-2">
                        <label for="src_vk" class="form-label">Ссылка на страничку Вк</label>
                        <input value="<?php echo $_SESSION['src_vk'];?>" name="src_vk" type="text" class="form-control" id="src_vk">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Группа крови</label>
                        <select name="blood_type" class="form-select" aria-label="Default select example">
                            <option value="0" <?php if($_SESSION['blood_type'] == 0) echo 'selected'?>>Выберите группу крови</option>
                            <option value="1" <?php if($_SESSION['blood_type'] == 1) echo 'selected'?>>Первая</option>
                            <option value="2" <?php if($_SESSION['blood_type'] == 2) echo 'selected'?>>Вторая</option>
                            <option value="3" <?php if($_SESSION['blood_type'] == 3) echo 'selected'?>>Третья</option>
                            <option value="4" <?php if($_SESSION['blood_type'] == 4) echo 'selected'?>>Четвертая</option>
                        </select>
                    </div>
                    <label class="form-label">Резус фактор</label>
                    <div class="form-check ">
                        <input <?php if($_SESSION['rhesus_factor'] == 1) echo 'checked'?>  name="rhesus_factor" value="1" class="form-check-input" type="radio" name="flexRadioDefaultRF" id="flexRadioDefaultRF1">
                        <label class="form-check-label" for="flexRadioDefaultRF1">
                            Положительный
                        </label>
                        </div>
                        <div class="form-check mb-2">
                        <input <?php if($_SESSION['rhesus_factor'] == 0) echo 'checked'?> name="rhesus_factor" value="0" class="form-check-input" type="radio" name="flexRadioDefaultRF" id="flexRadioDefaultRF2" >
                        <label class="form-check-label" for="flexRadioDefaultRF2">
                            Отрицательный
                        </label>
                    </div>
                    <div class="mb-2">
                        <label  for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputPassword2" class="form-label">Подтвердите пароль</label>
                        <input name="password2" type="password" class="form-control" id="exampleInputPassword2">
                    </div>
                </div>
            </div>
            <?php 
                if($_SESSION['error']) {
                    echo "<p class='error'>".$_SESSION['error']."</p>";
                } 
                unset($_SESSION['error']);
            ?>
            <button type="submit" class="btn btn-primary w-100 mt-2">Зарегестрироваться</button>
            <p class="text-center mt-1">Уже зарестрированны? <a href="login.php">Войти</a></p>
        </form>
    </div>
</body>
</html>