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
                        <a href="secretPage.php" id="open" class="item">секретная страница</a>
                    </div>
                    <div class="signIn d-flex align-items-center">
                        <?php 

                            if($_SESSION['user']){
                                echo '<span class="enter d-block" style="padding: 0 8px;">Здравствуйте, '.$_SESSION['user']['name'].' </span><a href="logics/exit.php" style="text-decoration: underline;" class="enter">выход</a>';
                            }else{
                                echo '<a href="login.php"  class="enter">вход</a>';
                            }
                        ?>
                        
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
                        <?php 
                            if($_SESSION['user']){
                                echo '<a href="logics/exit.php" class="enter">выход</a>';
                            }else{
                                echo '<a href="login.php" class="enter">вход</a>';
                            }
                        ?>
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