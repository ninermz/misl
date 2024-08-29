<?php
/** @var yii\web\View $this */
/** @var string $content */


use yii\helpers\Url;
use yii\helpers\Html;
use app\assets\AppAsset;


AppAsset::register($this);

$this->registerCssFile('@web/css/modal.css', ['depends' => [\yii\web\YiiAsset::class]]);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<!-- ШАПКА -->
<header class="header">
    <div class="container">
        <nav class="nav">
            <a class="logo" href="/site/index">
                <img src="/images/svg/logo.svg" alt="">
            </a>
            <ul class="menu">
                <li class="menu__list">
                    <a href="/lesson-preview/preview" class="menu__link">Уроки</a>
                </li>
                <li class="menu__list">
                    <a href="/courses/courses" class="menu__link">Курсы</a>
                </li>
                <li class="menu__list">
                    <a href="/post/index" class="menu__link"> <span>Форум</span> </a>
                </li>
                <li class="menu__list">
                    <a href="/site/about" class="menu__link">О нас</a>
                </li>
                <li class="menu__list">
                    <a href="#" class="menu__link">Инструменты</a>
                    <ul class="submenu">
                        <li><a href="/site/metr">Метроном</a></li>
                        <li><a href="/site/tuner">Тюнер</a></li>
                    </ul>
                </li>
            </ul>
            <?php
            if (Yii::$app->user->isGuest) {
                echo '<a class="account account--on" href="/site/login" id="accountIcon">
            <img src="/images/svg/enter.svg" alt="Войти">
          </a>';
            } else {
                echo '<div class="account-container">
            <a class="account account--on" href="#" id="accountIcon">
                <img src="/images/svg/account.svg" alt="Личный кабинет">
            </a>
            <div class="dropdown-menu-top">
                <a href="/site/account">Аккаунт</a>
                <a href="/site/bookmarks">Закладки</a>';

                // Проверяем, является ли пользователь администратором
                if (Yii::$app->user->identity->role == 1 && !Yii::$app->user->isGuest) {
                    echo '<a href="/admin/index">Администрирование</a>';
                }

                echo '<div class="logout-divider"></div>
                <div class="logout-btn-container">'
                    . Html::beginForm(['/site/logout'], 'post', [ 'id' => 'logout-form'])
                    . Html::submitButton('Submit', ['style' => 'display:none;'])
                    . Html::endForm() .
                    Html::a('Выйти', '#', ['class' => 'logout-btn', 'onclick' => 'document.getElementById("logout-form").submit();'])
                    .'</div>
            </div>
          </div>';
            }
            ?>
        </nav>
    </div>
</header>


<?= $content ?>
<?php if (Yii::$app->user->isGuest): ?>
    <div id="cookie-banner" class="cookie-banner">
        <p>Наш сайт использует файлы cookie для улучшения пользовательского опыта. Продолжая использовать сайт, вы соглашаетесь на использование файлов cookie в соответствии с нашей <a href="<?= Url::to(['/privacy-policy']) ?>">Политикой конфиденциальности</a>.</p>
        <button id="cookie-close" class="btn-acc-form-cookie">Закрыть</button>
        <div class="icon-container">
            <a href="https://ru.wikipedia.org/wiki/Cookie">
                <img src="/images/svg/question.svg" alt="">
            </a>
        </div>
    </div>
<?php endif; ?>
</div>

<?php
$script = <<< JS
document.addEventListener("DOMContentLoaded", function() {
    const cookieBanner = document.getElementById('cookie-banner');
    const cookieClose = document.getElementById('cookie-close');

    if (cookieBanner) {
        cookieBanner.style.display = 'block';

        cookieClose.addEventListener('click', function() {
            cookieBanner.style.display = 'none';
        });
    }
});
JS;
$this->registerJs($script);
?>


<!-- ПОДВАЛ -->
<footer class="footer">
    <div class="container">
        <nav class="footer__nav">
            <ul class="footer__nav-list">
                <li class="footer__nav-item">
                    <a href="/site/index" class="footer__nav-link">Главная</a>
                </li>
                <li class="footer__nav-item">
                    <a href="/lesson-preview/preview" class="footer__nav-link">Уроки</a>
                </li>
                <li class="footer__nav-item">
                    <a href="/courses/courses" class="footer__nav-link">Курсы</a>
                </li>
                <li class="footer__nav-item">
                    <a href="/post/index" class="footer__nav-link">Форум</a>
                </li>
                <li class="footer__nav-item">
                    <a href="/site/about" class="footer__nav-link">О нас</a>
                </li>
                <li class="footer__nav-item">
                    <a href="/site/policy" class="footer__nav-link">Политика конфиденциальности</a>
                </li>
            </ul>
            <div class="footer__contacts">
                <a class="contact__youtube" href="#">
                    <img src="/images/svg/youtube.svg" alt="">
                </a>
                <a class="contact__vk" href="https://vk.com/club226264468">
                    <img src="/images/svg/vk.svg" alt="">
                </a>
            </div>
        </nav>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
