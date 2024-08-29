<?php
/** @var \app\models\User $user_info */

use yii\helpers\Html;

$this->title = 'Личный кабинет';
?>
<main class="main">
    <section class="lessons__top">
        <div class="banner">
                <h1 class="banner_top">ЛИЧНЫЙ КАБИНЕТ</h1>
        </div>
        <div class="banner__border"></div>
    </section>

<div class="account__main">
    <div class="account__left">
        <h2 class="h-right">Профиль пользователя</h2>
        <p class="p-right">Имя пользователя:<span> <?= Html::encode($user_info->username) ?> </span></p>
        <p class="p-right">Email: <span><?= Html::encode($user_info->email) ?></span></p>
        <?= Html::a('Редактировать аккаунт', ['account/edit'], ['class' => 'btn-acc']) ?>
        <?= Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton('Выйти', ['class' => 'btn-acc'])
        . Html::endForm() ?>
    </div>

</div>

<?php unset($_SESSION['selected_lesson_id']); ?>

</main>
