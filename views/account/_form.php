<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Account $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput([
        'type' => 'text',
        'class' => 'username-field',
        'id' => 'username',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'email')->textInput([
        'autofocus' => true,
        'type' => 'email',
        'class' => 'form-control',
        'id' => 'email',
        'required' => true,
    ]) ?>

    <?= $form->field($model, 'passwordNew')->passwordInput([
        'class' => 'form-control',
        'id' => 'password',
        'required' => true,
    ])->label('Новый пароль') ?>

    <?= $form->field($model, 'passwordRepeat')->passwordInput([
        'class' => 'form-control',
        'id' => 'password',
        'required' => true,
    ])->label('Подтвердите новый пароль') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn-acc-form']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>