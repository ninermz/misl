<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Lesson $model */
/** @var array $lesson_preview  */

$this->title = 'Новый урок';
?>

<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <h1 class="banner_top">НОВЫЙ УРОК</h1>
        </div>
        <div class="banner__border"></div>
    </section>

<div class="less__form">

    <?= $this->render('_form', [
        'model' => $model,
        'lesson_preview' => $lesson_preview,
    ]) ?>

</div>
</main>
