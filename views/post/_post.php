<?php

use yii\helpers\Html;

/** @var app\models\Post $model */

?>
<div class="lesson__card">
    <div class="card-p">
        <div class="post-card--info">
            <a href="<?= Yii::$app->urlManager->createUrl(['post/view', 'post_id' => $model->id]) ?>">
                <h1><?= Html::encode($model->name) ?></h1>
            </a>
            <p>Автор: <?= Html::encode($model->user->username) ?></p>
        </div>
        <div class="post-card--bottom">
            <div class="bottom-1">
                <div class="bottom-visits">
                    <img class="lesson--popular" src="/images/svg/eye.svg" alt="">
                    <p><?= Html::encode($model->visits_count) ?></p>
                </div>
                <div class="bottom-date">
                    <img class="lesson--date" src="/images/svg/calendar.svg" alt="">
                    <p><?= Html::encode(Yii::$app->formatter->asDate($model->date, 'yyyy-MM-dd')) ?></p>
                </div>
            </div>
            <div class="bottom-2">
                <p>#<?= Html::encode($model->category->name) ?></p> <!-- Добавлено имя категории с "маской" -->
            </div>
        </div>
    </div>
</div>