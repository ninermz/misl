<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LessonPreview $model */

$this->title = 'Редактировать категорию: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Lesson Previews', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <h1 class="banner_top">РЕДАКТИРОВАНИЕ КАТЕГОРИЮ УРОКОВ</h1>
        </div>
        <div class="banner__border"></div>
    </section>

    <div class="less__form">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</main>
