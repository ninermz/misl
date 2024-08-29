<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Регистрация';
?>


<main class="main">

    <section class="form-log-reg">
        <div class="container__main-form">
            <div class="log__info">
                <h2 class="title-form">Регистрация</h2>
            </div>
            <div class="log__form">
                <form action="#" method="post">
                    <div class="form-group">

                        <?= $this->render('_form', [
                            'model' => $model,
                        ]) ?>

                    </div>
                </form>
            </div>
        </div>
    </section>

</main>
