<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CommentCourses $model */

$this->title = 'Update Comment Courses: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comment Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comment-courses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
