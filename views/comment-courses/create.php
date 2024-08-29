<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CommentCourses $model */

$this->title = 'Create Comment Courses';
$this->params['breadcrumbs'][] = ['label' => 'Comment Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-courses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
