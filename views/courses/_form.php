<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('https://code.jquery.com/jquery-3.6.0.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);

$this->registerJs("
    $('#price').mask('000,000,000 ₽', {reverse: true});
");

/** @var yii\web\View $this */
/** @var app\models\Courses $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="courses-form">

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

    <?= $form->field($model, 'price')->textInput([
        'maxlength' => true,
        'id' => 'price',
        'class' => 'form-control',
    ]) ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
