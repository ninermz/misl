<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Courses $courses */
/** @var app\models\CommentCourses[] $comments */

$this->title = 'Комментарии к курсу: ' . $courses->name;
$this->params['breadcrumbs'][] = $this->title;
?>

<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <h1 class="banner_top"><?= Html::encode($courses->name) ?></h1>
        </div>
        <div class="banner__border"></div>
    </section>

    <!-- КОММЕНТАРИИ -->
    <section class="comments">
        <h2>Комментарии</h2>
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <p>
                    <strong><?= Html::encode($comment->user->username) ?>:</strong>
                </p>
                <p><?= Html::encode($comment->description) ?></p>
                <p>
                    <small><?= Yii::$app->formatter->asDate($comment->date, 'yyyy-MM-dd') ?></small>
                </p>
            </div>
        <?php endforeach; ?>
    </section>
</main>