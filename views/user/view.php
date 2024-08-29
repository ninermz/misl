<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<main class="main">
    <section class="lessons__top">
        <div class="banner">

            <h1 class="banner_top"><?= Html::encode($this->title) ?></h1>
        </div>


        <p>
            <?= Html::a('Повысить до администратора', ['user/increase', 'id' => $model->id], [
                'class' => 'btn-acc-inc',
                'data' => [
                    'confirm' => 'Вы уверены, что хотите повысить этого пользователя до администратора?',
                    'method' => 'post',
                ],
            ]) ?>

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
            'email:email',
            'username',
            'password',
            'role'
        ],
    ]) ?>

    </div>

</main>
