<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Редактирование пользователя: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<main class="main" xmlns="http://www.w3.org/1999/html">
    <p class="lessons__top">
        <div class="banner">
            <h1 class="banner_top">РЕДАКТИРОВАНИЕ ПОЛЬЗОВАТЕЛЯ</h1>
        </div>

        <div class="banner__border"></div>
    </section>

    <div class="less__form">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</main>
