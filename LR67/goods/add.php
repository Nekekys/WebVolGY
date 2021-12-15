<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/logics/databaseClass.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/logics/brandClass.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
    require "../header.php";
   ?>
   <div class="container">
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../goods.php">Товары</a></li>
        <li class="breadcrumb-item active" aria-current="page">Новый товар</li>
    </ol>
    </nav>
    <h1>Добавить товар</h1>
        <div class="alert alert-danger" role="alert" id="errorR" style="display: none">
            error
        </div>
        <form action="" class="d-flex flex-wrap">
            <input style='width: 200px; margin-bottom: 15px' class="form-control" type="text" name="name" placeholder="Название товара">
            <input style='width: 200px; margin-left: 15px; margin-bottom: 15px' class="form-control" type="text" name="cost" placeholder="Стоймость">
            <input style='width: 200px; margin-left: 15px; margin-bottom: 15px' class="form-control" type="text" name="des" placeholder="Описание">
            <input style='width: 200px; margin-left: 15px; margin-bottom: 15px' class="form-control" type="file" name="ava" >
            <select style='width: 200px; margin-left: 15px; margin-bottom: 15px' class="form-select" name="brand" aria-label="Default select example">
                <?php
                    $arr = Brand::show();
                    foreach( $arr as $elem){
                         echo " <option selected value='" . $elem['id_brand'] . "'>" . $elem['name_brand'] . "</option>";
                     }
                    
                ?>
            </select>
            <button style='margin-bottom: 15px' type='button' class='btn btn-primary' id="button">Отправить</button>
        </form>      
   </div>
   

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <script src="./handler.js"></script>
</body>
</html>