<?php

/* @var $this yii\web\View */

$this->title = 'Главная страница';


?>


<!-- КОНТЕНТ -->

<main class="main">
    <section class="top">
        <div class="container__main">
            <h1 class="title">Музыка проще чем ты думаешь</h1>
            <?php if (Yii::$app->user->isGuest):?>
            <p class="subtitle">Начни своё обучение уже сейчас!</p>
            <a href="/user/create" class="reg--btn">
                <span>Зарегистрироваться</span>
            </a>
            <p class="top__text">У тебя уже есть аккаунт? <a href="/site/login" class="log_link"><span>Войти</span></a> </p>

            <?php endif; ?>
        </div>
    </section>


    <!-- ССЫЛКИ НА ПОПУЛЯРНОЕ -->
    <div class="recom">
        <section class="recom__gallery">
            <h2 class="recom__gallery-title">Полезное для начинающих</h2>
            <ul class="recom__list">

                <li class="recom__list-item">
                    <picture class="recom__img-wrapper">
                        <img class="recom__img" src="/images/forumLink.jpg" alt="">
                    </picture>
                    <h3 class="recom__img-title">
                        <a class="recom__img__title-link" href="/post/index">
                            Общайся и делись опытом
                        </a>
                    </h3>
                </li>

                <li class="recom__list-item">
                    <picture class="recom__img-wrapper">
                        <img class="recom__img" src="/images/guitarLink.jpg" alt="">
                    </picture>
                    <h3 class="recom__img-title">
                        <a class="recom__img__title-link" href="/lesson/lessons?preview_id=1">
                            Первый шаг в освоении гитары
                        </a>
                    </h3>
                </li>

                <li class="recom__list-item">
                    <picture class="recom__img-wrapper">
                        <img class="recom__img" src="/images/SolfLink.jpg" alt="">
                    </picture>
                    <h3 class="recom__img-title">
                        <a class="recom__img__title-link" href="/lesson/lessons?preview_id=2">
                            Базовые знания о сольфеджио
                        </a>
                    </h3>
                </li>

            </ul>
        </section>
    </div>
</main>
