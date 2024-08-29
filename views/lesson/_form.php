<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Lesson $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $lesson_preview  */
?>

<div class="lesson--form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'lesson_preview_id')->dropDownList($lesson_preview, [
        'prompt' => 'Выберите тему',
        'id' => 'category_id',
        'class' => 'form-control',
    ]) ?>

    <?= $form->field($model, 'name')->textInput([
        'maxlength' => true,
        'id' => 'name',
        'class' => 'form-control',
    ]) ?>

    <?= $form->field($model, 'brief')->textInput([
        'maxlength' => true,
        'id' => 'brief',
        'class' => 'form-control',
    ]) ?>

    <?= $form->field($model, 'subtitle')->textInput([
        'maxlength' => true,
        'id' => 'subtitle',
        'class' => 'form-control',
    ]) ?>

    <?= $form->field($model, 'description')->textarea([
        'rows' => 6,
        'id' => 'description',
        'class' => 'form-control',
    ]) ?>

    <?= $form->field($model, 'video_url')->textInput([
        'maxlength' => true,
        'id' => 'video_url',
        'class' => 'form-control',
    ]) ?>

    <?= $form->field($model, 'video_name')->textInput([
        'maxlength' => true,
        'id' => 'video_name',
        'class' => 'form-control',
    ]) ?>

    <?= $form->field($model, 'date')->input('date', [
        'id' => 'date',
        'class' => 'form-control',
    ]) ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
