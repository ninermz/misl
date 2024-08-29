<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Category $model */

$this->title = 'Добавить категорию';

?>
<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <h1 class="banner_top">НОВАЯ КАТЕГОРИЯ</h1>
        </div>
        <div class="banner__border"></div>
    </section>

    <div class="less__form category--form">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</main>
