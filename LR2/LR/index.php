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
    <div class="header">
        <div class="container">
            <div class="header_container">
                <div class="header__logo-container">
                    <div class="d-flex align-items-center">
                        <div class="logo">
                            <img src="file/logo-short.svg" alt="">
                        </div>
                        <h1 class="title">Спорт &#9830; Марафон</h1>
                    </div>
                    <div class="right_container">
                        <a href="#" class="item">доставка и оплата</a>
                        <a href="#" class="item">контакты</a>
                        <a href="#" class="item">сервис</a>
                        <a href="#" class="item">блог</a>
                        <a href="#" class="item">YouTube</a>
                        <a href="#" class="item">клуб</a>
                        <a href="#" class="item">лукбук</a>
                        <a href="#" class="item">подкасты</a>
                        <a href="#" class="item">о магазине</a>
                    </div>
                </div>
                <div class="header__menu">
                    <div class="menu">
                        <a href="#" class="item">скидки</a>
                        <a href="#" class="item">новинки</a>
                        <a href="#" id="open" class="item">каталог</a>
                        <a href="#" id="open" class="item">одежда</a>
                        <a href="#" class="item">обувь</a>
                        <a href="#" class="item">туризм</a>
                        <a href="#" id="open" class="item">бег</a>
                        <a href="#" class="item">альпинизм</a>
                        <a href="#" id="open" class="item">путешевствия</a>
                        <a href="#" id="open" class="item">сноуборд</a>
                    </div>
                    <div class="signIn d-flex align-items-center">
                        <a href="#" class="enter">вход</a>
                        <div class="icon">
                            <img src="file/shopping-basket-svgrepo-com.svg" alt="">
                        </div>
                        <div class="icon">
                            <img src="file/like-svgrepo-com.svg" alt="">
                        </div>
                        <div class="icon">
                            <img src="file/search-svgrepo-com.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_hidden_container">
                <div class="hidden_menu">
                    <img src="file/free-icon-menu-566020.png" alt="">
                </div>
                <div class="hidden_logo">
                    <img src="file/logo-short.svg" alt="">
                </div>
                <div class="hidden_signIn">
                    <div class="signIn d-flex align-items-center">
                        <a href="#" class="enter">вход</a>
                        <div class="icon">
                            <img src="file/shopping-basket-svgrepo-com.svg" alt="">
                        </div>
                        <div class="icon">
                            <img src="file/like-svgrepo-com.svg" alt="">
                        </div>
                        <div class="icon">
                            <img src="file/search-svgrepo-com.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

    <form class="container pt-3 pb-3" action="index.php" method="GET" name="fillter">
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
                    require "form.php";
                ?>
            </tbody>
        </table>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>
