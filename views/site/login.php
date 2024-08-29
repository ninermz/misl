<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Авторизация';
?>

<main class="main">

    <section class="form-log-reg">
        <div class="container__main-form">
            <div class="log__info">
                <h2 class="title-form">Авторизация</h2>
            </div>
            <div class="log__form">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "<div class=\"form-group\">\n{label}\n{input}\n{error}\n</div>",
                        'labelOptions' => ['class' => 'control-label'],
                    ],
                    'options' => ['class' => ''],
                ]); ?>
                <?= $form->field($model, 'email')->textInput([
                    'autofocus' => true,
                    'type' => 'email',
                    'class' => 'form-control',
                    'id' => 'email',
                    'required' => true,
                ]) ?>

                <?= $form->field($model, 'password')->passwordInput([
                    'class' => 'form-control',
                    'id' => 'password',
                    'required' => true,
                ]) ?>

                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class=\"form-group form-check\">\n{input}\n{label}\n{error}\n</div>",
                    'class' => 'form-check-input',
                    'id' => 'remember',
                    'name' => 'remember',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Войти', ['class' => 'btn-acc-form']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </section>


</main>
