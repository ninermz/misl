<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LessonPreview $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lesson-preview-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput([
        'maxlength' => true,
        'id' => 'name',
        'class' => 'form-control',
    ]) ?>


    <?= $form->field($model, 'description')->textarea([
        'rows' => 6,
        'id' => 'description',
        'class' => 'form-control',
    ]) ?>

    <?= $form->field($model, 'photo')->fileInput([
        'class' => 'form-control-file',
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
