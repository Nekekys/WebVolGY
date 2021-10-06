<?php  require "logics/connect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>laba1</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>

    
    <?php  require "header.php"; ?>
   <!-- <form class="container pt-3 pb-3" action="index.php" method="GET" name="fillter">
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
    </form>-->

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <?php  if($_SESSION['user']){ echo ' <th scope="col">Фотография</th>';} ?>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>