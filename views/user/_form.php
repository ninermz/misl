<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true,  'autofocus' => true,
        'type' => 'email',
        'class' => 'form-control',
        'id' => 'email',
        'required' => true,]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true,  'autofocus' => true,
        'type' => 'text',
        'class' => 'username-field',
        'id' => 'username',
        'required' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,
        'class' => 'form-control',
        'type' => 'password',
        'id' => 'password',
        'required' => true,]) ?>

    <?= $form->field($model, 'passwordRepeat')->passwordInput(['maxlength' => true,
        'class' => 'form-control',
        'type' => 'password',
        'id' => 'password',
        'required' => true,]) ?>

    <?= $form->field($model, 'check')->checkBox() ?>

    <div class="form-group">
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn-acc-form']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



