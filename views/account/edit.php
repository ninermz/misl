<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Редактировать аккаунт';
?>
<main class="main">

    <section class="form-log-reg">
        <div class="container__main-form">
            <div class="log__info">
                <h2 class="title-form">Редактирование</h2>
            </div>
            <div class="log__form">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

            </div>
        </div>
    </section>


</main>
