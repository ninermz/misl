<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Post $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $categories */
?>

<div class="user-form">

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

    <?= $form->field($model, 'category_id')->dropDownList($categories, [
        'prompt' => 'Выберите категорию',
        'id' => 'category_id',
        'class' => 'form-control',
    ]) ?>

    <?= $form->field($model, 'post_video_url')->textInput([
        'maxlength' => true,
        'id' => 'video_url',
        'class' => 'form-control',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn-acc-form']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>