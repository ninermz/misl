<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <h1 class="banner_top">ПОЛЬЗОВАТЕЛЕЙ</h1>
        </div>
        <p>
            <?= Html::a('Вернуться на главную', ['/admin/index'], ['class' => 'btn-acc']) ?>
        </p>
        <div class="banner__border"></div>
    </section>

    </div>
    <div class="table--css">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'email:email',
            'username',
            'password',
            'role',
            //'avatar_url:url',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {delete}',
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>



    </div>

</main>
