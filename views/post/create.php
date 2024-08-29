<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Post $model */
/** @var array $categories */


$this->title = 'Новый пост';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <h1 class="banner_top">СОЗДАТЬ ПОСТ</h1>
        </div>
        <div class="banner__border"></div>
    </section>
    <section class="post__mid">
    <div class="post__form">
        <form action="#" method="post">
            <div class="form-group">
                <?= $this->render('_form', [
                    'model' => $model,
                    'categories' => $categories,
                ]) ?>
            </div>
        </form>
    </div>
    </section>
</main>

