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
            <h2 class="text-center">Регистрация</h2>
            <div class="container_form">
                <div class="col-w">
                    <div class="mb-2">
                        <label for="email" class="form-label">Электронная почта</label>
                        <input  name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="name" class="form-label">Имя</label>
                        <input  name="name" type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-2">
                        <label for="last_name" class="form-label">Фамилия</label>
                        <input  name="last_name" type="text" class="form-control" id="last_name">
                    </div>
                    <div class="mb-2">
                        <label for="otchestvo" class="form-label">Отчество</label>
                        <input  name="otchestvo" type="text" class="form-control" id="otchestvo">
                    </div>
                    <label class="form-label">Пол</label>
                    <div class="form-check ">
                        <input checked  name="sex" value="0" class="form-check-input" type="radio" name="flexRadioDefaultSex" id="flexRadioDefaultSex1">
                        <label  class="form-check-label" for="flexRadioDefaultSex1">
                            Мужской
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input   name="sex" value="1" class="form-check-input" type="radio" name="flexRadioDefaultSex" id="flexRadioDefaultSex2" >
                        <label class="form-check-label" for="flexRadioDefaultSex2">
                            Женский
                        </label>
                    </div>
                    <div class="mb-2">
                        <label for="date" class="form-label">Дата рождения</label>
                        <input  name="date" type="date" class="form-control"  id="date">
                    </div>
                </div>
                <div class="col-w">
                    <div class="mb-2">
                        <label for="adress" class="form-label">Адрес</label>
                        <input  name="adress" type="text" class="form-control" id="adress">
                    </div>
                    <div class="mb-2">
                        <label for="interests" class="form-label">Интересы</label>
                        <input  name="interests" type="text" class="form-control" id="interests">
                    </div>
                    <div class="mb-2">
                        <label for="src_vk" class="form-label">Ссылка на страничку Вк</label>
                        <input  name="src_vk" type="text" class="form-control" id="src_vk">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Группа крови</label>
                        <select name="blood_type" class="form-select" aria-label="Default select example" id="select">
                            <option value="0" >Выберите группу крови</option>
                            <option value="1" >Первая</option>
                            <option value="2" >Вторая</option>
                            <option value="3" >Третья</option>
                            <option value="4" >Четвертая</option>
                        </select>
                    </div>
                    <label class="form-label">Резус фактор</label>
                    <div class="form-check ">
                        <input  name="rhesus_factor" value="1" class="form-check-input" type="radio" name="flexRadioDefaultRF" id="flexRadioDefaultRF1">
                        <label class="form-check-label" for="flexRadioDefaultRF1">
                            Положительный
                        </label>
                        </div>
                        <div class="form-check mb-2">
                        <input checked name="rhesus_factor" value="0" class="form-check-input" type="radio" name="flexRadioDefaultRF" id="flexRadioDefaultRF2" >
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
            <p class='error' id="errorR"></p>
            <button type="submit" class="btn btn-primary w-100 mt-2" id="button">Зарегестрироваться</button>
            <p class="text-center mt-1">Уже зарестрированны? <a href="login.php">Войти</a></p>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/validate.js"></script>
</body>
</html>