<?php

use app\models\Courses;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Курсы';
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <h1 class="banner_top">КУРСЫ</h1>
        </div>


    <p>
        <?= Html::a('Вернуться на главную', ['/admin/index'], ['class' => 'btn-acc']) ?>
        <?= Html::a('Добавить курс', ['create'], ['class' => 'btn-acc']) ?>
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
            'description:ntext',
            'photo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Courses $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>



    </div>

</main>
