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
    <!--
    <div class="hidden_con d-none" id="hidden">
       <div class="container">
           <div class="pt-3 pb-3 hidden__main w-100 d-flex align-items-flex-start flex-row justify-content-between">
               <div class="hidden_col">
                   <div class="hidden_col-title">Мужская одежда</div>
                   <div class="hidden_col-elem">Мембрановая одежда</div>
                   <div class="hidden_col-elem">Флисовая одежда</div>
                   <div class="hidden_col-elem">Софтшел одежда</div>
                   <div class="hidden_col-elem">Летняя одежда</div>
                   <div class="hidden_col-elem">Одежда для бега</div>
                   <div class="hidden_col-elem">Термобельё</div>
                   <div class="hidden_col-elem">Зимняя одежда</div>
                   <div class="hidden_col-elem">Утепленая одежда</div>
                   <div class="hidden_col-elem">Горнолыжная одежда</div>
                   <div class="hidden_col-elem weight-bold">Скидки</div>
                   <div class="hidden_col-elem weight-bold">Вся мужская одеджа</div>
               </div>
               <div class="hidden_col">
                   <div class="hidden_col-title">Женская одежда</div>
                   <div class="hidden_col-elem">Мембрановая одежда</div>
                   <div class="hidden_col-elem">Флисовая одежда</div>
                   <div class="hidden_col-elem">Софтшел одежда</div>
                   <div class="hidden_col-elem">Летняя одежда</div>
                   <div class="hidden_col-elem">Одежда для бега</div>
                   <div class="hidden_col-elem">Термобельё</div>
                   <div class="hidden_col-elem">Зимняя одежда</div>
                   <div class="hidden_col-elem">Утепленая одежда</div>
                   <div class="hidden_col-elem">Горнолыжная одежда</div>
                   <div class="hidden_col-elem weight-bold">Скидки</div>
                   <div class="hidden_col-elem weight-bold">Вся женская одеджа</div>
               </div>
               <div class="hidden_col">
                   <div class="hidden_col-title">Детская одежда</div>
                   <div class="hidden_col-elem">Мембрановая одежда</div>
                   <div class="hidden_col-elem">Флисовая одежда</div>
                   <div class="hidden_col-elem">Софтшел одежда</div>
                   <div class="hidden_col-elem">Летняя одежда</div>
                   <div class="hidden_col-elem">Термобельё</div>
                   <div class="hidden_col-elem">Зимняя одежда</div>
                   <div class="hidden_col-elem">Утепленая одежда</div>
                   <div class="hidden_col-elem">Горнолыжная одежда</div>
                   <div class="hidden_col-elem weight-bold">Скидки</div>
                   <div class="hidden_col-elem weight-bold">Вся детская одеджа</div>
               </div>
               <div class="hidden_col">
                   <div class="hidden_col-title">Аксессуары</div>
                   <div class="hidden_col-elem">Носки</div>
                   <div class="hidden_col-elem">Банданы, шарфы, повязки</div>
                   <div class="hidden_col-elem">Перчатки</div>
                   <div class="hidden_col-elem">Варежки</div>
                   <div class="hidden_col-elem">Шапки</div>
                   <div class="hidden_col-elem">Кепки и панамы</div>
                   <div class="hidden_col-elem">Ремни и подтяжки</div>
                   <div class="hidden_col-elem">Накидки и плащи</div>
                   <div class="hidden_col-elem weight-bold">Вся аксессуары</div>
               </div>
               <div class="hidden_col_dop">
                   <div class="hidden_col-elem">Термобелье</div>
                   <div class="hidden_col-elem">Флиз</div>
                   <div class="hidden_col-elem">Мембранная одежда</div>
                   <div class="hidden_col-elem">Софтшел одежда</div>
                   <div class="hidden_col-elem">Утепленая одежда</div>
                   <div class="hidden_col-elem">Одежда для бега</div>
                   <div class="hidden_col-elem">Горнолыжная одежда</div>
                   <div class="hidden_col-elem">Летняя одежда</div>
                   <div class="hidden_col-elem">Только скидки</div>
               </div>
           </div>
       </div>
    </div>
    <div class="navigate">
        <div class="container">
            <div class="navigate_content">
                <a href="#">Главная</a>
                <span>&#62;</span>
                <a href="#">Каталог</a>
                <span>&#62;</span>
                <a href="#">Альпинистское снаряжение</a>
                <span>&#62;</span>
                <a href="#">Страховочное снаряжение</a>
                <span>&#62;</span>
                <a href="#">Страховочные системы</a>
                <span>&#62;</span>
                <span>Беседка Camp Impulse Orange</span>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="main_content row">
                <div class="col-lg-8">
                    <div class="gallery d-flex">
                        <div class="img_container d-flex flex-column">
                            <img src="file/image1.jpg" alt="" class="img_gallery active" id="img img1">
                            <img src="file/image2.jpg" alt="" class="img_gallery" id="img img2">
                            <img src="file/image3.jpg" alt="" class="img_gallery" id="img img3">
                            <img src="file/image4.jpg" alt="" class="img_gallery" id="img img4">
                        </div>
                        <div class="main_img d-flex align-items-center">
                            <img src="file/image1.jpg" alt="" class="" id="main">
                        </div>
                    </div>
                    <div class="mini_nav">
                        <div class="mini_nav-elem active text-uppercase" var="1">О товаре</div>
                        <div class="mini_nav-elem text-uppercase" var="2">Характеристики</div>
                        <div class="mini_nav-elem text-uppercase" var="3">о бренде</div>
                    </div>
                    <div class="show_specifications_con">
                        <div class="specifications mb-4" id="show">
                            <p>Модель Impulse — лучшая страховочная система CAMP для скалолазания.</p>
                            <p>Отличительной особенностью стала совершенно новая конструкция пояса, сочетающая
                                в себе перфорированный материал EVA и 3D подкладку. Как результат - система с отличным уровнем комфорта и вентиляции.</p>
                            <p>Ножные обхваты так же не оказались без внимания инженеров. Простая, но очень эффективная конструкция
                                в виде треугольного каркаса обеспечат должный уровень комфорта при срывах и зависаниях.
                                Стальная регулируемая пряжка обратного хода поможет точно отрегулировать пояс.</p>
                            <p>Четыре развесочных петли имеют жёсткий каркас для удобного расположения снаряжения.
                                Сзади расположена пятая петля, куда удобно подстегнуть запасное снаряжение, вторую веревку или мешок с магнезией.</p>
                        </div>
                        <div class="about_the_product mb-4" id="show">
                            <div class="about_the_product-elem">
                                <div class="about_the_product-col1">
                                    <span>Вес (кг)</span>
                                    <div></div>
                                </div>
                                <div class="about_the_product-col2">
                                    <span>0.355</span>
                                </div>
                            </div>
                            <div class="about_the_product-elem">
                                <div class="about_the_product-col1">
                                    <span>Тип</span>
                                    <div></div>
                                </div>
                                <div class="about_the_product-col2">
                                    <span>Страховочная система</span>
                                </div>
                            </div>
                            <div class="about_the_product-elem">
                                <div class="about_the_product-col1">
                                    <span>Количество пряжек</span>
                                    <div></div>
                                </div>
                                <div class="about_the_product-col2">
                                    <span>1</span>
                                </div>
                            </div>
                            <div class="about_the_product-elem">
                                <div class="about_the_product-col1">
                                    <span>Слоты под кэритулы</span>
                                    <div></div>
                                </div>
                                <div class="about_the_product-col2">
                                    <span>Нет</span>
                                </div>
                            </div>
                            <div class="about_the_product-elem">
                                <div class="about_the_product-col1">
                                    <span>Тип страховочной системы</span>
                                    <div></div>
                                </div>
                                <div class="about_the_product-col2">
                                    <span>Нижняя</span>
                                </div>
                            </div>
                            <div class="about_the_product-elem">
                                <div class="about_the_product-col1">
                                    <span>Сезон</span>
                                    <div></div>
                                </div>
                                <div class="about_the_product-col2">
                                    <span>21</span>
                                </div>
                            </div>
                            <div class="about_the_product-elem">
                                <div class="about_the_product-col1">
                                    <span>Пол</span>
                                    <div></div>
                                </div>
                                <div class="about_the_product-col2">
                                    <span>Унисекс</span>
                                </div>
                            </div>
                        </div>
                        <div class="about_the_brand mb-4" id="show">
                            <a href="#">Camp</a>
                            <p>Компания C.A.M.P. основана в 1889 году в маленьком городке Премана на севере Италии.
                                Является одной из старейших компаний по производству снаряжения для самых разных видов
                                активностей, связанных с деятельностью на высоте: альпинизм, туризм, скалолазание,
                                промышленный альпинизм, трейл-раннинг и мультиспорт. Продукция CAMP, CAMP Safety и
                                CASSIN производится на 9-ти фабриках в Европе, Азии и Африке. 80% производится на
                                экспорт. 20% всех сотрудников работают в отделе исследования и разработок, чем
                                обеспечивается большое количество собственных патентов и изобретений. Основная
                                специализация – создание самых функциональных, легких и технологичных образцов снаряжения.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="prices">
                        <div class="prices_logo d-flex align-items-center flex-row justify-content-between mb-3">
                            <img src="file/iconPrice.png" alt="">
                            <img class="prices_logo-like" src="file/like-svgrepo-com.svg" alt="">
                        </div>
                        <h1 class="prices_title">
                            Беседка Camp Impulse Orange
                        </h1>
                        <div class="prices_price">
                            9 990 ₽
                        </div>
                        <div class="prices_src_con">
                            <a href="#" class="prices_src">Сообщить о снижении цены</a>
                            <a href="#" class="prices_src">Нашли дешевле?</a>
                        </div>
                        <div class="prices_kod">Код товара <span class="prices_kod_sub">2936</span></div>
                        <div class="prices_color">Цвет <img src="file/image1.jpg" alt=""></div>
                        <div class="prices_size">
                            <span>Размер</span>
                            <div class="prices_size-con">
                                <div class="prices_size-row">
                                    <div class="prices_size-button active" id="size">XS</div>
                                    <div class="prices_size-button" id="size">S</div>
                                </div>
                                <div class="prices_size-row">
                                    <div class="prices_size-button" id="size">M</div>
                                    <div class="prices_size-button" id="size">L</div>
                                </div>
                            </div>
                        </div>
                        <div class="prices_count_con">
                            <span>Размер</span>
                            <div class="prices_count">
                                <div class="prices_count_elem prices_count_elem_cursor" id="minus">-</div>
                                <div class="prices_count_elem" id="number"></div>
                                <div class="prices_count_elem prices_count_elem_cursor" id="plus">+</div>
                            </div>
                        </div>
                        <div class="prices_basket-button prices-button">В корзину</div>
                        <div class="prices_comparison-button prices-button">К сравнению</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="control_carousel_main">
            <div class="control_carousel_title">
                <h3>Сопутствующие товары</h3>
            </div>
            <div class="control_carousel_con">
                <div data-bs-target="#carouselExampleControls"  data-bs-slide="prev">&#60;</div>
                <div data-bs-target="#carouselExampleControls"  data-bs-slide="next">&#62;</div>
            </div>
        </div>
    </div>
    <div class="carousel_con">
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-around">
                            <div class="carousel_col">
                                <img src="file/carousel_1.jpeg" alt="">
                                <div class="carousel_price">1 350 ₽</div>
                                <div class="carousel_sub-text">Tendon</div>
                                <div class="carousel_text">Карабин Camp Orbit Lock Gun Metal</div>
                            </div>
                            <div class="carousel_col">
                                <img src="file/carousel_2.jpeg" alt="">
                                <div class="carousel_price">1 350 ₽</div>
                                <div class="carousel_sub-text">Tendon</div>
                                <div class="carousel_text">Карабин Camp Orbit Lock Gun Metal</div>
                            </div>
                            <div class="carousel_col">
                                <img src="file/carousel_3.jpeg" alt="">
                                <div class="carousel_price">1 350 ₽</div>
                                <div class="carousel_sub-text">Tendon</div>
                                <div class="carousel_text">Карабин Camp Orbit Lock Gun Metal</div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item row">
                        <div class="d-flex  justify-content-around">
                            <div class=" carousel_col">
                                <img src="file/carousel_3.jpeg" alt="">
                                <div class="carousel_price">1 350 ₽</div>
                                <div class="carousel_sub-text">Tendon</div>
                                <div class="carousel_text">Карабин Camp Orbit Lock Gun Metal</div>
                            </div>
                            <div class=" carousel_col">
                                <img src="file/carousel_2.jpeg" alt="">
                                <div class="carousel_price">1 350 ₽</div>
                                <div class="carousel_sub-text">Tendon</div>
                                <div class="carousel_text">Карабин Camp Orbit Lock Gun Metal</div>
                            </div>
                            <div class=" carousel_col">
                                <img src="file/carousel_1.jpeg" alt="">
                                <div class="carousel_price">1 350 ₽</div>
                                <div class="carousel_sub-text">Tendon</div>
                                <div class="carousel_text">Карабин Camp Orbit Lock Gun Metal</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
-->


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