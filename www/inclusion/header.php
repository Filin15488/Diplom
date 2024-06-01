<header>
    <!-- скрытый класс. видно только при низком разрешении экрана. кликабелен -->
    <?php  
    if (!empty($_SESSION)){
    ?>
    <div class="logo mobile-logo" id="mobile-logo">
        <img src="./img/logo.svg" alt="">
    </div>
    <?php
    }
    ?>

    <!-- header-content -->
    <div class="header__content">
        <div class="header__title">
        RTM Group & ВГУИТ
        </div>
        <div class="header__desc">
            Поиск следов присутстствия стенографического ПО
        </div>
    </div>

</header>