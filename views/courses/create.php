<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Courses $model */

$this->title = 'Добавить курс';
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <h1 class="banner_top">НОВЫЙ КУРС</h1>
        </div>
        <div class="banner__border"></div>
    </section>

    <div class="less__form">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</main>

