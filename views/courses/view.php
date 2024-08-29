<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Courses $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<main class="main">
    <section class="lessons__top">
        <div class="banner">

            <h1 class="banner_top"><?= Html::encode($this->title) ?></h1>
        </div>

        <p>
            <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn-acc']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn-acc',
                'data' => [
                    'confirm' => 'Вы действительно хотите удалить запись?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <div class="banner__border"></div>
    </section>

    <div class="table--css">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
            'photo',
            'price',
            'comment_courses_id',
        ],
    ]) ?>

    </div>

</main>
