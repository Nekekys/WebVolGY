<?php 
    session_start();
    if(!$_SESSION['user']){
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Секретная страница</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php  require "header.php"; ?>
    <div class="mainSP">
        <h3 class="text-center">Здравствуйте, <?php echo $_SESSION['user']['name'] ?>, вы авторизованны</h3>
    </div>
    <form class="container pt-3 pb-3" action="secretPage.php" method="GET" name="fillter">
        <div class="price d-flex align-items-center justify-content-center">
           <span style="padding-right: 8px;">Цена от: </span>
           <input style='width: 90px' class="form-control" type="number" name="ot">
           <span style="padding: 0 8px;"> до </span>
           <input style='width: 90px' class="form-control " type="number" name="do">
           <input style='width: 220px; margin-left: 15px' class="form-control" name="name" type="text" placeholder="Название товара">
           <select style='width: 220px; margin-left: 15px' class="form-select" name="brand" aria-label="Default select example">
                <option selected value="0">Название бренда</option>
                <option value="1">Camp</option>
                <option value="2">Norrona</option>
                <option value="3">Mammut</option>
                <option value="4">Gore-Tex</option>
                <option value="5">Haglofs</option>
            </select>
            <button type="submit" class="btn btn-primary"  style='margin-left: 15px'>Применить</button>
            <a class="btn btn-warning" href="/LR" style='margin-left: 15px'>Отчистить</a>
        </div>
    </form>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Фотография</th>
                    <th scope="col">Название</th>
                    <th scope="col">Брэнд</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Стоймость</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require "filter.php";
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>