<?php

use app\models\Lesson;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Уроки';

?>
<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <h1 class="banner_top">УРОКИ</h1>
        </div>
        <p>
            <?= Html::a('Вернуться на главную', ['/admin/index'], ['class' => 'btn-acc']) ?>
            <?= Html::a('Добавить урок', ['create'], ['class' => 'btn-acc']) ?>
            <?= Html::a('Категории уроков', ['/lesson-preview/index'], ['class' => 'btn-acc']) ?>
        </p>
        <div class="banner__border"></div>
    </section>


    <div class="table--css">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'brief',
            'description:ntext',
            'date',
            'video_url',
            'video_name',
            'visits_count',
            [
                'attribute' => 'lesson_preview_id',
                'value' => function ($model) {
                    return $model->lessonPreview ? $model->lessonPreview->name : null;
                },
                'label' => 'Тема уроков',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Lesson $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

</main>