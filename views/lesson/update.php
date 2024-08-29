<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Lesson $model */

$this->title = 'Редактировать урок: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Lessons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <h1 class="banner_top">РЕДАКТИРОВАНИЕ УРОКА</h1>
        </div>
        <div class="banner__border"></div>
    </section>

    <div class="less__form">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</main>
